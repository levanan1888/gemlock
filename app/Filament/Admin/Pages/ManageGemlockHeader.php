<?php

namespace App\Filament\Admin\Pages;

use App\Models\ContentItem;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Grid;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;

class ManageGemlockHeader extends Page implements HasForms
{
    use InteractsWithForms;

    protected static \BackedEnum|string|null $navigationIcon = Heroicon::OutlinedComputerDesktop;

    protected string $view = 'filament.admin.pages.manage-gemlock-header';

    protected static ?string $navigationLabel = 'Cấu hình Header';

    protected static ?string $title = 'Cấu hình Header';

    protected static ?int $navigationSort = 9;

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
        $this->loadContent();
    }

    public function loadContent(): void
    {
        $items = ContentItem::where('page_type', 'gemlock')
            ->where('section', 'header')
            ->get();

        $formattedData = [];

        // 1. Logo & Hotline
        $formattedData['general'] = [
            'logo' => $items->where('key', 'header_logo_gemlock')->first()?->value ?? '',
            'logo_active' => (bool) ($items->where('key', 'header_logo_gemlock')->first()?->is_active ?? true),
            'phone' => $items->where('key', 'header_phone_gemlock')->first()?->value ?? '',
            'phone_active' => (bool) ($items->where('key', 'header_phone_gemlock')->first()?->is_active ?? true),
            'topbar_text' => $items->where('key', 'header_topbar_text_gemlock')->first()?->value ?? '',
            'topbar_link' => $items->where('key', 'header_topbar_link_gemlock')->first()?->value ?? url('/'),
            'topbar_active' => (bool) ($items->where('key', 'header_topbar_text_gemlock')->first()?->is_active ?? true),
        ];

        // 2. Banner Slides
        $bannerItems = $items->where('key', 'header_banner_slides')->first();
        $formattedData['banners'] = $bannerItems ? json_decode($bannerItems->value, true) : [];

        $this->form->fill($formattedData);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('header_tabs')
                    ->tabs([
                        Tab::make('general_tab')
                            ->label('Cơ bản')
                            ->schema([
                                Section::make('Logo & Liên hệ')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            FileUpload::make('general.logo')
                                                ->label('Logo Header')
                                                ->image()
                                                ->disk('public')
                                                ->directory('content'),
                                            Toggle::make('general.logo_active')->label('Bật')->inline(false),
                                        ]),
                                        Grid::make(2)->schema([
                                            TextInput::make('general.phone')
                                                ->label('Hotline hiển thị'),
                                            Toggle::make('general.phone_active')->label('Bật')->inline(false),
                                        ]),
                                        Grid::make(2)->schema([
                                            TextInput::make('general.topbar_text')
                                                ->label('Nội dung thanh trên cùng')
                                                ->maxLength(255),
                                            Toggle::make('general.topbar_active')->label('Hiển thị thanh trên cùng')->inline(false),
                                        ]),
                                        TextInput::make('general.topbar_link')
                                            ->label('Link thanh trên cùng')
                                            ->placeholder('https://... hoặc /')
                                            ->maxLength(255),
                                    ]),
                            ]),
                        Tab::make('banners_tab')
                            ->label('Slider Banner')
                            ->schema([
                                Section::make('Quản lý Slide')
                                    ->schema([
                                        Repeater::make('banners')
                                            ->label('Danh sách Banner')
                                            ->schema([
                                                FileUpload::make('image')
                                                    ->label('Ảnh banner')
                                                    ->image()
                                                    ->required()
                                                    ->disk('public')
                                                    ->directory('content'),
                                                TextInput::make('url')
                                                    ->label('Link liên kết (nếu có)')
                                                    ->placeholder('https://...'),
                                                Toggle::make('is_active')
                                                    ->label('Hiển thị')
                                                    ->default(true),
                                            ])
                                            ->collapsible()
                                            ->itemLabel(fn (array $state): ?string => $state['url'] ?? 'Slide'),
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull(),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        // Lưu Logo & Phone
        $mappings = [
            'header_logo_gemlock' => ['value' => $data['general']['logo'] ?? '', 'is_active' => (bool) ($data['general']['logo_active'] ?? true), 'type' => 'image'],
            'header_phone_gemlock' => ['value' => $data['general']['phone'] ?? '', 'is_active' => (bool) ($data['general']['phone_active'] ?? true), 'type' => 'text'],
            'header_topbar_text_gemlock' => ['value' => $data['general']['topbar_text'] ?? '', 'is_active' => (bool) ($data['general']['topbar_active'] ?? true), 'type' => 'text'],
            'header_topbar_link_gemlock' => ['value' => $data['general']['topbar_link'] ?? url('/'), 'is_active' => (bool) ($data['general']['topbar_active'] ?? true), 'type' => 'link'],
        ];

        foreach ($mappings as $key => $values) {
            ContentItem::updateOrCreate(
                ['key' => $key],
                [
                    'page_type' => 'gemlock',
                    'section' => 'header',
                    'type' => $values['type'],
                    'label' => ucfirst(str_replace(['header_', '_'], ['', ' '], $key)),
                    'value' => $values['value'] ?? '',
                    'is_active' => $values['is_active'],
                ]
            );
        }

        // Lưu Slides (JSON)
        ContentItem::updateOrCreate(
            ['key' => 'header_banner_slides'],
            [
                'page_type' => 'gemlock',
                'section' => 'header',
                'type' => 'json',
                'label' => 'Banner Slides',
                'value' => json_encode($data['banners'] ?? []),
                'is_active' => true,
            ]
        );

        Notification::make()
            ->title('Đã lưu cấu hình Header thành công!')
            ->success()
            ->send();
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
