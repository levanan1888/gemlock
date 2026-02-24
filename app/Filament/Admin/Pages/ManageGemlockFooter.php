<?php

namespace App\Filament\Admin\Pages;

use App\Models\ContentItem;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Repeater;
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

    public function mount(): void
    {
        $this->loadContent();
    }

    public function loadContent(): void
    {
        $items = ContentItem::where('page_type', 'gemlock')
            ->where('section', 'footer')
            ->get();

        $formattedData = [];
        
        // 1. Thông tin công ty
        $formattedData['company'] = [
            'name' => $items->where('key', 'footer_company_name')->first()?->value ?? '',
            'name_active' => (bool) ($items->where('key', 'footer_company_name')->first()?->is_active ?? true),
            'tax_info' => $items->where('key', 'footer_tax_info')->first()?->value ?? '',
            'tax_info_active' => (bool) ($items->where('key', 'footer_tax_info')->first()?->is_active ?? true),
            'about_text' => $items->where('key', 'footer_about_text')->first()?->value ?? '',
            'about_text_active' => (bool) ($items->where('key', 'footer_about_text')->first()?->is_active ?? true),
            'bct_logo' => $items->where('key', 'footer_bct_logo')->first()?->value ?? '',
            'bct_logo_active' => (bool) ($items->where('key', 'footer_bct_logo')->first()?->is_active ?? true),
        ];

        // 2. Thông tin liên hệ đa chi nhánh (Repeater)
        $branchItems = $items->where('key', 'footer_branches')->first();
        $formattedData['branches'] = $branchItems ? json_decode($branchItems->value, true) : [];

        // 3. Chính sách (Repeater)
        $policyItems = $items->where('key', 'footer_policies')->first();
        $formattedData['policies'] = $policyItems ? json_decode($policyItems->value, true) : [];

        // 4. Bản đồ & Khác
        $formattedData['other'] = [
            'map_iframe' => $items->where('key', 'footer_map_iframe')->first()?->value ?? '',
            'map_active' => (bool) ($items->where('key', 'footer_map_iframe')->first()?->is_active ?? true),
            'copyright' => $items->where('key', 'footer_copyright')->first()?->value ?? '',
            'copyright_active' => (bool) ($items->where('key', 'footer_copyright')->first()?->is_active ?? true),
        ];

        $this->form->fill($formattedData);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('footer_tabs')
                    ->tabs([
                        Tab::make('company_tab')
                            ->label('Thông tin công ty')
                            ->schema([
                                Section::make('Thông tin chung')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            TextInput::make('company.name')
                                                ->label('Tên công ty')
                                                ->placeholder('CÔNG TY CỔ PHẦN PERFECT HOUSE VIỆT NAM'),
                                            Toggle::make('company.name_active')->label('Bật')->inline(false),
                                        ]),
                                        Grid::make(2)->schema([
                                            Textarea::make('company.tax_info')
                                                ->label('Thông tin Mã số thuế / Ngày cấp')
                                                ->rows(3),
                                            Toggle::make('company.tax_info_active')->label('Bật')->inline(false),
                                        ]),
                                        Grid::make(2)->schema([
                                            Textarea::make('company.about_text')
                                                ->label('Mô tả ngắn về công ty')
                                                ->rows(5),
                                            Toggle::make('company.about_text_active')->label('Bật')->inline(false),
                                        ]),
                                    ]),
                                Section::make('Chứng nhận Bộ Công Thương')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            FileUpload::make('company.bct_logo')
                                                ->label('Logo Đã Thông Báo BCT')
                                                ->image()
                                                ->directory('content'),
                                            Toggle::make('company.bct_logo_active')->label('Bật')->inline(false),
                                        ]),
                                    ]),
                            ]),
                        Tab::make('branches_tab')
                            ->label('Hệ thống chi nhánh')
                            ->schema([
                                Section::make('Thông tin liên hệ & Chi nhánh')
                                    ->schema([
                                        Repeater::make('branches')
                                            ->label('Danh sách chi nhánh / văn phòng')
                                            ->schema([
                                                TextInput::make('label')->label('Tên chi nhánh (VD: Trụ sở chính, VP Hà Nội...)')->required(),
                                                TextInput::make('address')->label('Địa chỉ')->required(),
                                                TextInput::make('phone')->label('Số điện thoại'),
                                                TextInput::make('email')->label('Email'),
                                                Toggle::make('is_active')->label('Hiển thị')->default(true),
                                            ])
                                            ->collapsible()
                                            ->itemLabel(fn (array $state): ?string => $state['label'] ?? null),
                                    ]),
                            ]),
                        Tab::make('policies_tab')
                            ->label('Chính sách')
                            ->schema([
                                Section::make('Liên kết chính sách')
                                    ->schema([
                                        Repeater::make('policies')
                                            ->label('Danh sách chính sách')
                                            ->schema([
                                                TextInput::make('label')->label('Tên chính sách')->required(),
                                                TextInput::make('url')->label('Đường dẫn (URL)')->required(),
                                                Toggle::make('is_active')->label('Hiển thị')->default(true),
                                            ])
                                            ->collapsible()
                                            ->itemLabel(fn (array $state): ?string => $state['label'] ?? null),
                                    ]),
                            ]),
                        Tab::make('other_tab')
                            ->label('Bản đồ & Khác')
                            ->schema([
                                Section::make('Bản đồ (Google Maps)')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            Textarea::make('other.map_iframe')
                                                ->label('Iframe Google Maps')
                                                ->helperText('Dán mã nhúng <iframe> từ Google Maps vào đây')
                                                ->rows(5),
                                            Toggle::make('other.map_active')->label('Bật')->inline(false),
                                        ]),
                                    ]),
                                Section::make('Chân trang')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            TextInput::make('other.copyright')
                                                ->label('Copyright text')
                                                ->placeholder('© Copyright 2015. All rights reserved...'),
                                            Toggle::make('other.copyright_active')->label('Bật')->inline(false),
                                        ]),
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

        // Lưu các trường đơn lẻ
        $mappings = [
            'footer_company_name' => ['value' => $data['company']['name'], 'is_active' => $data['company']['name_active'], 'type' => 'text'],
            'footer_tax_info' => ['value' => $data['company']['tax_info'], 'is_active' => $data['company']['tax_info_active'], 'type' => 'html'],
            'footer_about_text' => ['value' => $data['company']['about_text'], 'is_active' => $data['company']['about_text_active'], 'type' => 'html'],
            'footer_bct_logo' => ['value' => $data['company']['bct_logo'], 'is_active' => $data['company']['bct_logo_active'], 'type' => 'image'],
            'footer_map_iframe' => ['value' => $data['other']['map_iframe'], 'is_active' => $data['other']['map_active'], 'type' => 'html'],
            'footer_copyright' => ['value' => $data['other']['copyright'], 'is_active' => $data['other']['copyright_active'], 'type' => 'text'],
        ];

        foreach ($mappings as $key => $values) {
            ContentItem::updateOrCreate(
                ['page_type' => 'gemlock', 'key' => $key],
                [
                    'section' => 'footer',
                    'type' => $values['type'],
                    'label' => ucfirst(str_replace(['footer_', '_'], ['', ' '], $key)),
                    'value' => $values['value'] ?? '',
                    'is_active' => $values['is_active'],
                ]
            );
        }

        // Lưu các trường danh sách (JSON)
        ContentItem::updateOrCreate(
            ['page_type' => 'gemlock', 'key' => 'footer_branches'],
            [
                'section' => 'footer',
                'type' => 'json',
                'label' => 'Hệ thống chi nhánh',
                'value' => json_encode($data['branches'] ?? []),
                'is_active' => true,
            ]
        );

        ContentItem::updateOrCreate(
            ['page_type' => 'gemlock', 'key' => 'footer_policies'],
            [
                'section' => 'footer',
                'type' => 'json',
                'label' => 'Danh sách chính sách',
                'value' => json_encode($data['policies'] ?? []),
                'is_active' => true,
            ]
        );

        Notification::make()
            ->title('Đã lưu cấu hình Footer thành công!')
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
