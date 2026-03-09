<?php

namespace App\Filament\Admin\Pages;

use App\Models\ContentItem;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class ManageGemlockFooter extends Page implements HasForms
{
    use InteractsWithForms;

    protected static \BackedEnum|string|null $navigationIcon = Heroicon::OutlinedLifebuoy;

    protected string $view = 'filament.admin.pages.manage-gemlock-footer';

    protected static ?string $navigationLabel = 'Cấu hình Footer';

    protected static ?string $title = 'Cấu hình Footer';

    protected static ?int $navigationSort = 10;

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

    private const FOOTER_FIELDS = [
        'footer_description_gemlock' => [
            'label' => 'Mô tả footer',
            'default' => 'Perfect House Việt Nam - Kết nối tương lai. Chuyên cung cấp giải pháp Smart Home và Năng lượng sạch.',
            'type' => 'text',
            'order' => 1,
        ],
        'footer_social_title_gemlock' => [
            'label' => 'Liên kết mạng xã hội',
            'default' => 'Liên kết mạng xã hội',
            'type' => 'text',
            'order' => 2,
        ],
        'footer_company_title_gemlock' => [
            'label' => 'Tiêu đề cột Công ty',
            'default' => 'Công ty',
            'type' => 'text',
            'order' => 6,
        ],
        'footer_more_title_gemlock' => [
            'label' => 'Tiêu đề cột Thêm',
            'default' => 'Thêm',
            'type' => 'text',
            'order' => 7,
        ],
        'footer_policy_title_gemlock' => [
            'label' => 'Tiêu đề cột Chính sách',
            'default' => 'Chính sách & Pháp lý',
            'type' => 'text',
            'order' => 8,
        ],
        'footer_logo_gemlock' => [
            'label' => 'Logo',
            'default' => 'image/Logo Tách Nền.png',
            'type' => 'image',
            'order' => 9,
        ],
        'footer_copyright_gemlock' => [
            'label' => 'Copyright',
            'default' => 'Copyright © 2025 Perfect House Việt Nam.',
            'type' => 'text',
            'order' => 10,
        ],
    ];

    private const FOOTER_SOCIAL_ITEMS_KEY = 'footer_social_items_gemlock';

    private const FOOTER_COMPANY_ITEMS_KEY = 'footer_company_items_gemlock';

    private const FOOTER_MORE_ITEMS_KEY = 'footer_more_items_gemlock';

    private const FOOTER_POLICY_ITEMS_KEY = 'footer_policy_items_gemlock';

    public function mount(): void
    {
        $this->ensureFooterKeys();
        $this->loadContent();
    }

    private function ensureFooterKeys(): void
    {
        foreach (self::FOOTER_FIELDS as $key => $config) {
            $item = ContentItem::firstOrCreate(
                ['key' => $key],
                [
                    'page_type' => 'gemlock',
                    'section' => 'footer',
                    'label' => $config['label'],
                    'type' => $config['type'],
                    'value' => $config['default'],
                    'order' => $config['order'],
                    'is_active' => true,
                ],
            );

            $item->update([
                'page_type' => 'gemlock',
                'section' => 'footer',
                'label' => $config['label'],
                'type' => $config['type'],
                'order' => $config['order'],
            ]);
        }

        $this->ensureJsonKey(
            self::FOOTER_SOCIAL_ITEMS_KEY,
            'Danh sách mạng xã hội',
            [
                ['label' => 'Facebook', 'url' => 'https://facebook.com/', 'icon' => 'bi bi-facebook'],
                ['label' => 'Youtube', 'url' => 'https://youtube.com/', 'icon' => 'bi bi-youtube'],
                ['label' => 'Zalo', 'url' => 'https://zalo.me/', 'icon' => 'bi bi-chat-dots-fill'],
            ],
            19,
        );

        $this->ensureJsonKey(
            self::FOOTER_COMPANY_ITEMS_KEY,
            'Danh sách item cột Công ty',
            [
                ['label' => 'Trang chủ', 'url' => '/'],
                ['label' => 'Giới thiệu', 'url' => '/about'],
                ['label' => 'Tin tức', 'url' => '/blog'],
            ],
            20,
        );

        $this->ensureJsonKey(
            self::FOOTER_MORE_ITEMS_KEY,
            'Danh sách item cột Thêm',
            [
                ['label' => 'Cảm nhận', 'url' => '#'],
                ['label' => 'Liên hệ', 'url' => '/contact'],
                ['label' => 'Giấy phép', 'url' => '#'],
            ],
            21,
        );

        $this->ensureJsonKey(
            self::FOOTER_POLICY_ITEMS_KEY,
            'Danh sách item cột Chính sách',
            [
                ['label' => 'Chính sách bảo mật', 'url' => '#'],
                ['label' => 'Điều khoản sử dụng', 'url' => '#'],
            ],
            22,
        );
    }

    private function ensureJsonKey(string $key, string $label, array $defaultValue, int $order): void
    {
        $item = ContentItem::firstOrCreate(
            ['key' => $key],
            [
                'page_type' => 'gemlock',
                'section' => 'footer',
                'label' => $label,
                'type' => 'json',
                'value' => json_encode($defaultValue, JSON_UNESCAPED_UNICODE),
                'order' => $order,
                'is_active' => true,
            ],
        );

        $item->update([
            'page_type' => 'gemlock',
            'section' => 'footer',
            'label' => $label,
            'type' => 'json',
            'order' => $order,
        ]);
    }

    public function loadContent(): void
    {
        $jsonKeys = [
            self::FOOTER_SOCIAL_ITEMS_KEY,
            self::FOOTER_COMPANY_ITEMS_KEY,
            self::FOOTER_MORE_ITEMS_KEY,
            self::FOOTER_POLICY_ITEMS_KEY,
        ];

        $items = ContentItem::query()
            ->where('page_type', 'gemlock')
            ->where('section', 'footer')
            ->whereIn('key', [...array_keys(self::FOOTER_FIELDS), ...$jsonKeys])
            ->get()
            ->keyBy('key');

        $decode = function (?string $value): array {
            $data = json_decode($value ?? '[]', true);

            return is_array($data) ? $data : [];
        };

        $this->form->fill([
            'footer_description_gemlock' => $items['footer_description_gemlock']->value ?? self::FOOTER_FIELDS['footer_description_gemlock']['default'],
            'footer_social_title_gemlock' => $items['footer_social_title_gemlock']->value ?? self::FOOTER_FIELDS['footer_social_title_gemlock']['default'],
            'footer_company_title_gemlock' => $items['footer_company_title_gemlock']->value ?? self::FOOTER_FIELDS['footer_company_title_gemlock']['default'],
            'footer_more_title_gemlock' => $items['footer_more_title_gemlock']->value ?? self::FOOTER_FIELDS['footer_more_title_gemlock']['default'],
            'footer_policy_title_gemlock' => $items['footer_policy_title_gemlock']->value ?? self::FOOTER_FIELDS['footer_policy_title_gemlock']['default'],
            'footer_logo_gemlock' => $items['footer_logo_gemlock']->value ?? self::FOOTER_FIELDS['footer_logo_gemlock']['default'],
            'footer_copyright_gemlock' => $items['footer_copyright_gemlock']->value ?? self::FOOTER_FIELDS['footer_copyright_gemlock']['default'],
            'footer_social_items_gemlock' => $decode($items[self::FOOTER_SOCIAL_ITEMS_KEY]->value ?? null),
            'footer_company_items_gemlock' => $decode($items[self::FOOTER_COMPANY_ITEMS_KEY]->value ?? null),
            'footer_more_items_gemlock' => $decode($items[self::FOOTER_MORE_ITEMS_KEY]->value ?? null),
            'footer_policy_items_gemlock' => $decode($items[self::FOOTER_POLICY_ITEMS_KEY]->value ?? null),
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('footer_tabs')
                    ->tabs([
                        Tab::make('thong_so')
                            ->label('Thông số chung')
                            ->schema([
                                Section::make('Thông số footer cần cấu hình')
                                    ->schema([
                                        TextInput::make('footer_description_gemlock')
                                            ->label('Mô tả')
                                            ->required(),
                                        TextInput::make('footer_social_title_gemlock')
                                            ->label('Tiêu đề mạng xã hội')
                                            ->required(),
                                        TextInput::make('footer_company_title_gemlock')
                                            ->label('Tiêu đề cột Công ty')
                                            ->required(),
                                        TextInput::make('footer_more_title_gemlock')
                                            ->label('Tiêu đề cột Thêm')
                                            ->required(),
                                        TextInput::make('footer_policy_title_gemlock')
                                            ->label('Tiêu đề cột Chính sách')
                                            ->required(),
                                        FileUpload::make('footer_logo_gemlock')
                                            ->label('Logo')
                                            ->image()
                                            ->directory('content/footer')
                                            ->disk('public')
                                            ->visibility('public')
                                            ->required(),
                                        TextInput::make('footer_copyright_gemlock')
                                            ->label('Copyright')
                                            ->required(),
                                    ]),
                            ]),
                        Tab::make('mang_xa_hoi')
                            ->label('Mạng xã hội')
                            ->schema([
                                Section::make('Danh sách mạng xã hội')
                                    ->collapsible()
                                    ->schema([
                                        Repeater::make('footer_social_items_gemlock')
                                            ->label('Items mạng xã hội')
                                            ->schema([
                                                TextInput::make('label')->label('Tên hiển thị')->required(),
                                                TextInput::make('url')->label('URL')->required(),
                                                TextInput::make('icon')->label('Class icon (VD: bi bi-facebook)'),
                                            ])
                                            ->itemLabel(fn (array $state): ?string => $state['label'] ?? null)
                                            ->collapsible()
                                            ->collapsed()
                                            ->defaultItems(0),
                                    ]),
                            ]),
                        Tab::make('cong_ty')
                            ->label('Menu Công ty')
                            ->schema([
                                Section::make('Danh sách item cột Công ty')
                                    ->collapsible()
                                    ->schema([
                                        Repeater::make('footer_company_items_gemlock')
                                            ->label('Items Công ty')
                                            ->schema([
                                                TextInput::make('label')->label('Tên item')->required(),
                                                TextInput::make('url')->label('URL')->required(),
                                            ])
                                            ->itemLabel(fn (array $state): ?string => $state['label'] ?? null)
                                            ->collapsible()
                                            ->collapsed()
                                            ->defaultItems(0),
                                    ]),
                            ]),
                        Tab::make('them')
                            ->label('Menu Thêm')
                            ->schema([
                                Section::make('Danh sách item cột Thêm')
                                    ->collapsible()
                                    ->schema([
                                        Repeater::make('footer_more_items_gemlock')
                                            ->label('Items Thêm')
                                            ->schema([
                                                TextInput::make('label')->label('Tên item')->required(),
                                                TextInput::make('url')->label('URL')->required(),
                                            ])
                                            ->itemLabel(fn (array $state): ?string => $state['label'] ?? null)
                                            ->collapsible()
                                            ->collapsed()
                                            ->defaultItems(0),
                                    ]),
                            ]),
                        Tab::make('chinh_sach')
                            ->label('Menu Chính sách')
                            ->schema([
                                Section::make('Danh sách item cột Chính sách')
                                    ->collapsible()
                                    ->schema([
                                        Repeater::make('footer_policy_items_gemlock')
                                            ->label('Items Chính sách')
                                            ->schema([
                                                TextInput::make('label')->label('Tên item')->required(),
                                                TextInput::make('url')->label('URL')->required(),
                                            ])
                                            ->itemLabel(fn (array $state): ?string => $state['label'] ?? null)
                                            ->collapsible()
                                            ->collapsed()
                                            ->defaultItems(0),
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

        foreach (self::FOOTER_FIELDS as $key => $config) {
            ContentItem::updateOrCreate(
                ['key' => $key],
                [
                    'page_type' => 'gemlock',
                    'section' => 'footer',
                    'label' => $config['label'],
                    'type' => $config['type'],
                    'value' => $data[$key] ?? $config['default'],
                    'order' => $config['order'],
                    'is_active' => true,
                ],
            );
        }

        $this->saveJsonItems(
            self::FOOTER_SOCIAL_ITEMS_KEY,
            'Danh sách mạng xã hội',
            $data['footer_social_items_gemlock'] ?? [],
            19,
        );

        $this->saveJsonItems(
            self::FOOTER_COMPANY_ITEMS_KEY,
            'Danh sách item cột Công ty',
            $data['footer_company_items_gemlock'] ?? [],
            20,
        );

        $this->saveJsonItems(
            self::FOOTER_MORE_ITEMS_KEY,
            'Danh sách item cột Thêm',
            $data['footer_more_items_gemlock'] ?? [],
            21,
        );

        $this->saveJsonItems(
            self::FOOTER_POLICY_ITEMS_KEY,
            'Danh sách item cột Chính sách',
            $data['footer_policy_items_gemlock'] ?? [],
            22,
        );

        Notification::make()
            ->title('Đã lưu cấu hình Footer thành công!')
            ->success()
            ->send();
    }

    private function saveJsonItems(string $key, string $label, array $items, int $order): void
    {
        ContentItem::updateOrCreate(
            ['key' => $key],
            [
                'page_type' => 'gemlock',
                'section' => 'footer',
                'label' => $label,
                'type' => 'json',
                'value' => json_encode($items, JSON_UNESCAPED_UNICODE),
                'order' => $order,
                'is_active' => true,
            ],
        );
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
