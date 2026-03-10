<?php

namespace App\Filament\Admin\Pages;

use App\Models\MenuItem;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class ManageGemlockMenu extends Page implements HasForms
{
    use InteractsWithForms;

    protected static \BackedEnum|string|null $navigationIcon = Heroicon::OutlinedBars3;

    protected string $view = 'filament.admin.pages.manage-gemlock-menu';

    protected static ?string $navigationLabel = 'Cấu hình Menu';

    protected static ?string $title = 'Cấu hình Menu';

    protected static ?int $navigationSort = 8;

    public static function getNavigationGroup(): ?string
    {
        return 'Gemlock';
    }

    public static function canAccess(): bool
    {
        $user = auth()->user();

        return $user && ($user->isAdmin() || $user->isGemlockAdmin());
    }

    public ?array $data = [];

    public function mount(): void
    {
        $this->loadMenus();
    }

    private function loadMenus(): void
    {
        $headerMenus = $this->getMenuItems('header');
        $categoryMenus = $this->getMenuItems('category');

        $this->form->fill([
            'header_menus' => $headerMenus,
            'category_menus' => $categoryMenus,
        ]);
    }

    private function getMenuItems(string $menuType): array
    {
        return MenuItem::query()
            ->where('page_type', 'gemlock')
            ->where('menu_type', $menuType)
            ->whereNull('parent_id')
            ->orderBy('order')
            ->get()
            ->map(fn (MenuItem $item) => [
                'id' => $item->id,
                'label' => $item->label,
                'url' => $item->url,
                'icon' => $item->icon,
                'order' => $item->order,
                'is_active' => $item->is_active,
                'open_in_new_tab' => $item->open_in_new_tab,
            ])
            ->toArray();
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('menu_tabs')
                    ->tabs([
                        Tab::make('header_tab')
                            ->label('Menu Header')
                            ->schema([
                                Section::make('Danh sách menu header')
                                    ->schema([
                                        Repeater::make('header_menus')
                                            ->label('Menu header')
                                            ->schema($this->menuItemSchema())
                                            ->itemLabel(fn (array $state): ?string => $state['label'] ?? 'Menu')
                                            ->collapsible()
                                            ->defaultItems(0),
                                    ]),
                            ]),
                        Tab::make('category_tab')
                            ->label('Danh mục sản phẩm')
                            ->schema([
                                Section::make('Danh sách danh mục')
                                    ->schema([
                                        Repeater::make('category_menus')
                                            ->label('Menu danh mục')
                                            ->schema($this->menuItemSchema(true))
                                            ->itemLabel(fn (array $state): ?string => $state['label'] ?? 'Danh mục')
                                            ->collapsible()
                                            ->defaultItems(0),
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull(),
            ])
            ->statePath('data');
    }

    private function menuItemSchema(bool $withIcon = false): array
    {
        $schema = [
            Hidden::make('id'),
            TextInput::make('label')
                ->label('Tên menu')
                ->required(),
            TextInput::make('url')
                ->label('URL')
                ->required(),
        ];

        if ($withIcon) {
            $schema[] = TextInput::make('icon')
                ->label('Icon (class)')
                ->placeholder('bi-caret-right-fill');
        }

        $schema[] = TextInput::make('order')
            ->label('Thứ tự')
            ->numeric()
            ->default(1);

        $schema[] = Toggle::make('is_active')
            ->label('Kích hoạt')
            ->default(true);

        $schema[] = Toggle::make('open_in_new_tab')
            ->label('Mở tab mới')
            ->default(false);

        return $schema;
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $this->syncMenuItems('header', $data['header_menus'] ?? []);
        $this->syncMenuItems('category', $data['category_menus'] ?? []);

        Notification::make()
            ->title('Đã lưu cấu hình Menu thành công!')
            ->success()
            ->send();
    }

    private function syncMenuItems(string $menuType, array $items): void
    {
        $existingIds = MenuItem::query()
            ->where('page_type', 'gemlock')
            ->where('menu_type', $menuType)
            ->whereNull('parent_id')
            ->pluck('id')
            ->all();

        $submittedIds = [];

        foreach ($items as $index => $item) {
            $payload = [
                'page_type' => 'gemlock',
                'menu_type' => $menuType,
                'label' => $item['label'] ?? '',
                'url' => $item['url'] ?? '',
                'icon' => $item['icon'] ?? null,
                'parent_id' => null,
                'order' => $item['order'] ?? ($index + 1),
                'is_active' => (bool) ($item['is_active'] ?? true),
                'open_in_new_tab' => (bool) ($item['open_in_new_tab'] ?? false),
            ];

            if (! empty($item['id'])) {
                MenuItem::query()->where('id', $item['id'])->update($payload);
                $submittedIds[] = (int) $item['id'];
                continue;
            }

            $created = MenuItem::create($payload);
            $submittedIds[] = $created->id;
        }

        $idsToDelete = array_diff($existingIds, $submittedIds);

        if (! empty($idsToDelete)) {
            MenuItem::query()->whereIn('id', $idsToDelete)->delete();
        }
    }

    protected function getFormActions(): array
    {
        return [
            \Filament\Actions\Action::make('save')
                ->label('Lưu thay đổi')
                ->submit('save')
                ->color('primary'),
        ];
    }
}
