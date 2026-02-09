<?php

namespace App\Filament\Admin\Pages;

use App\Models\ContentItem;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;

class ManagePerfectHouseContent extends Page implements HasForms
{
    use InteractsWithForms;

    /**
     * Navigation icon must match the base Page property type: BackedEnum|string|null.
     */
    protected static \BackedEnum|string|null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected string $view = 'filament.admin.pages.manage-perfect-house-content';

    protected static ?string $navigationLabel = 'Chỉnh nội dung Perfect House';

    protected static ?string $title = 'Chỉnh nội dung Perfect House';

    protected static ?int $navigationSort = 1;

    public static function getNavigationGroup(): ?string
    {
        return 'Perfect House';
    }

    public static function canAccess(): bool
    {
        $user = auth()->user();

        return $user && method_exists($user, 'isAdmin') && $user->isAdmin();
    }

    public ?array $data = [];

    public function mount(): void
    {
        $this->loadContent();
    }

    public function loadContent(): void
    {
        $sections = [
            // Trang chủ
            'home' => [
                'hero_title' => ContentItem::get('hero_title', '', 'perfect_house') ?? '',
                'hero_subtitle_vn' => ContentItem::get('hero_subtitle_vn', '', 'perfect_house') ?? '',
                'hero_subtitle_en' => ContentItem::get('hero_subtitle_en', '', 'perfect_house') ?? '',
                'hero_description' => ContentItem::get('hero_description', '', 'perfect_house') ?? '',
                'hero_button_text' => ContentItem::get('hero_button_text', '', 'perfect_house') ?? '',
                'hero_button_link' => ContentItem::get('hero_button_link', '', 'perfect_house') ?? '',
                'hero_background_image' => ContentItem::get('hero_background_image', '', 'perfect_house') ?? '',
                // Khối 2 - Section-wrapper full-width full-height p-relative
                'section2_title' => ContentItem::get('section2_title', '', 'perfect_house') ?? '',
                'section2_description' => ContentItem::get('section2_description', '', 'perfect_house') ?? '',
                'section2_background_image' => ContentItem::get('section2_background_image', '', 'perfect_house') ?? '',
                // Khối 3 - id="w-vgiz3u9m" (Sứ mệnh & Giá trị cốt lõi)
                'section3_title' => ContentItem::get('section3_title', '', 'perfect_house') ?? '',
                'section3_description' => ContentItem::get('section3_description', '', 'perfect_house') ?? '',
                'section3_background_image' => ContentItem::get('section3_background_image', '', 'perfect_house') ?? '',
                // Khối 4 - id="w-qesmjs5l" (Dịch vụ / lĩnh vực kinh doanh)
                'section4_title' => ContentItem::get('section4_title', '', 'perfect_house') ?? '',
                'section4_description' => ContentItem::get('section4_description', '', 'perfect_house') ?? '',
                'section4_background_image' => ContentItem::get('section4_background_image', '', 'perfect_house') ?? '',
                // Khối 5 - id="w-nypif9tt" (Giới thiệu Perfect House)
                'section5_title' => ContentItem::get('section5_title', '', 'perfect_house') ?? '',
                'section5_description' => ContentItem::get('section5_description', '', 'perfect_house') ?? '',
                'section5_background_image' => ContentItem::get('section5_background_image', '', 'perfect_house') ?? '',
                // Khối 6 - id="w-j7njhkti" (Về chúng tôi)
                'section6_title' => ContentItem::get('section6_title', '', 'perfect_house') ?? '',
                'section6_description' => ContentItem::get('section6_description', '', 'perfect_house') ?? '',
                'section6_background_image' => ContentItem::get('section6_background_image', '', 'perfect_house') ?? '',
                // Khối 8 - id="w-ynofe2b1" (Tin tức / bài viết)
                'section8_title' => ContentItem::get('section8_title', '', 'perfect_house') ?? '',
                'section8_description' => ContentItem::get('section8_description', '', 'perfect_house') ?? '',
                'section8_background_image' => ContentItem::get('section8_background_image', '', 'perfect_house') ?? '',
                // Khối 9 - id="w-2pll8ynd"
                'section9_title' => ContentItem::get('section9_title', '', 'perfect_house') ?? '',
                'section9_description' => ContentItem::get('section9_description', '', 'perfect_house') ?? '',
                'section9_background_image' => ContentItem::get('section9_background_image', '', 'perfect_house') ?? '',
                // Khối 10 - id="w-efrfvi0v" (Thông tin liên hệ cuối trang)
                'section10_title' => ContentItem::get('section10_title', '', 'perfect_house') ?? '',
                'section10_description' => ContentItem::get('section10_description', '', 'perfect_house') ?? '',
                'section10_background_image' => ContentItem::get('section10_background_image', '', 'perfect_house') ?? '',
            ],
            // Về chúng tôi - Tầm nhìn
            'vision' => [
                'vision_title' => ContentItem::get('vision_title', '', 'perfect_house') ?? '',
                'vision_description' => ContentItem::get('vision_description', '', 'perfect_house') ?? '',
            ],
            // Về chúng tôi - Sứ mệnh
            'mission' => [
                'mission_title' => ContentItem::get('mission_title', '', 'perfect_house') ?? '',
                'mission_description' => ContentItem::get('mission_description', '', 'perfect_house') ?? '',
            ],
            // Về chúng tôi - Giá trị cốt lõi
            'core_values' => [
                'core_values_title' => ContentItem::get('core_values_title', '', 'perfect_house') ?? '',
                'core_values_description' => ContentItem::get('core_values_description', '', 'perfect_house') ?? '',
            ],
            // Về chúng tôi - Cam kết
            'commitment' => [
                'commitment_title' => ContentItem::get('commitment_title', '', 'perfect_house') ?? '',
                'commitment_description' => ContentItem::get('commitment_description', '', 'perfect_house') ?? '',
            ],
            // Các lĩnh vực kinh doanh - GemMechan
            'gemmechan' => [
                'gemmechan_title' => ContentItem::get('gemmechan_title', '', 'perfect_house') ?? '',
                'gemmechan_description' => ContentItem::get('gemmechan_description', '', 'perfect_house') ?? '',
            ],
            // Các lĩnh vực kinh doanh - GemLock
            'gemlock' => [
                'gemlock_title' => ContentItem::get('gemlock_title', '', 'perfect_house') ?? '',
                'gemlock_description' => ContentItem::get('gemlock_description', '', 'perfect_house') ?? '',
            ],
            // Các lĩnh vực kinh doanh - GemSolar
            'gemsolar' => [
                'gemsolar_title' => ContentItem::get('gemsolar_title', '', 'perfect_house') ?? '',
                'gemsolar_description' => ContentItem::get('gemsolar_description', '', 'perfect_house') ?? '',
            ],
            // Các lĩnh vực kinh doanh - GemTech
            'gemtech' => [
                'gemtech_title' => ContentItem::get('gemtech_title', '', 'perfect_house') ?? '',
                'gemtech_description' => ContentItem::get('gemtech_description', '', 'perfect_house') ?? '',
            ],
            // Đối tác và Dự án
            'partners' => [
                'partners_title' => ContentItem::get('partners_title', '', 'perfect_house') ?? '',
                'partners_description' => ContentItem::get('partners_description', '', 'perfect_house') ?? '',
            ],
            // Tài liệu
            'documents' => [
                'documents_title' => ContentItem::get('documents_title', '', 'perfect_house') ?? '',
                'documents_description' => ContentItem::get('documents_description', '', 'perfect_house') ?? '',
            ],
            // Liên hệ
            'contact' => [
                'contact_title' => ContentItem::get('contact_title', '', 'perfect_house') ?? '',
                'contact_address' => ContentItem::get('contact_address', '', 'perfect_house') ?? '',
                'contact_phone' => ContentItem::get('contact_phone', '', 'perfect_house') ?? '',
                'contact_email' => ContentItem::get('contact_email', '', 'perfect_house') ?? '',
            ],
        ];

        $this->data = $sections;
    }

    protected function getFormSchema(): array
    {
        return [
            Tabs::make('content_tabs')
                ->tabs([
                    // Tab Trang chủ
                    Tab::make('home')
                        ->label('Trang chủ')
                        ->schema([
                            Section::make('Hero Section')
                                ->schema([
                                    TextInput::make('home.hero_title')
                                        ->label('Tiêu đề chính'),
                                    TextInput::make('home.hero_subtitle_vn')
                                        ->label('Phụ đề tiếng Việt'),
                                    TextInput::make('home.hero_subtitle_en')
                                        ->label('Phụ đề tiếng Anh'),
                                    Textarea::make('home.hero_description')
                                        ->label('Mô tả')
                                        ->rows(5),
                                    TextInput::make('home.hero_button_text')
                                        ->label('Nút bấm'),
                                    TextInput::make('home.hero_button_link')
                                        ->label('Link nút bấm'),
                                    TextInput::make('home.hero_background_image')
                                        ->label('Hình nền'),
                                ]),
                            Section::make('Khối 2 - Cam kết & Thông điệp (section-wrapper full-width full-height p-relative)')
                                ->schema([
                                    TextInput::make('home.section2_title')
                                        ->label('Tiêu đề khối 2'),
                                    Textarea::make('home.section2_description')
                                        ->label('Nội dung khối 2')
                                        ->rows(5),
                                    TextInput::make('home.section2_background_image')
                                        ->label('Ảnh nền khối 2 (đường dẫn)'),
                                ]),
                            Section::make('Khối 3 - Sứ mệnh & Giá trị cốt lõi (id=\"w-vgiz3u9m\")')
                                ->schema([
                                    TextInput::make('home.section3_title')
                                        ->label('Tiêu đề khối 3'),
                                    Textarea::make('home.section3_description')
                                        ->label('Nội dung khối 3')
                                        ->rows(5),
                                    TextInput::make('home.section3_background_image')
                                        ->label('Ảnh nền khối 3 (đường dẫn)'),
                                ]),
                            Section::make('Khối 4 - Lĩnh vực kinh doanh (id=\"w-qesmjs5l\")')
                                ->schema([
                                    TextInput::make('home.section4_title')
                                        ->label('Tiêu đề khối 4'),
                                    Textarea::make('home.section4_description')
                                        ->label('Nội dung khối 4')
                                        ->rows(5),
                                    TextInput::make('home.section4_background_image')
                                        ->label('Ảnh nền khối 4 (đường dẫn)'),
                                ]),
                            Section::make('Khối 5 - Giới thiệu Perfect House (id=\"w-nypif9tt\")')
                                ->schema([
                                    TextInput::make('home.section5_title')
                                        ->label('Tiêu đề khối 5'),
                                    Textarea::make('home.section5_description')
                                        ->label('Nội dung khối 5')
                                        ->rows(5),
                                    TextInput::make('home.section5_background_image')
                                        ->label('Ảnh nền khối 5 (đường dẫn)'),
                                ]),
                            Section::make('Khối 6 - Về chúng tôi (id=\"w-j7njhkti\")')
                                ->schema([
                                    TextInput::make('home.section6_title')
                                        ->label('Tiêu đề khối 6'),
                                    Textarea::make('home.section6_description')
                                        ->label('Nội dung khối 6')
                                        ->rows(5),
                                    TextInput::make('home.section6_background_image')
                                        ->label('Ảnh nền khối 6 (đường dẫn)'),
                                ]),
                            Section::make('Khối 8 - Tin tức / Bài viết (id=\"w-ynofe2b1\")')
                                ->schema([
                                    TextInput::make('home.section8_title')
                                        ->label('Tiêu đề khối 8'),
                                    Textarea::make('home.section8_description')
                                        ->label('Nội dung khối 8')
                                        ->rows(5),
                                    TextInput::make('home.section8_background_image')
                                        ->label('Ảnh nền khối 8 (đường dẫn)'),
                                ]),
                            Section::make('Khối 9 (id=\"w-2pll8ynd\")')
                                ->schema([
                                    TextInput::make('home.section9_title')
                                        ->label('Tiêu đề khối 9'),
                                    Textarea::make('home.section9_description')
                                        ->label('Nội dung khối 9')
                                        ->rows(5),
                                    TextInput::make('home.section9_background_image')
                                        ->label('Ảnh nền khối 9 (đường dẫn)'),
                                ]),
                            Section::make('Khối 10 - Liên hệ cuối trang (id=\"w-efrfvi0v\")')
                                ->schema([
                                    TextInput::make('home.section10_title')
                                        ->label('Tiêu đề khối 10'),
                                    Textarea::make('home.section10_description')
                                        ->label('Nội dung khối 10')
                                        ->rows(5),
                                    TextInput::make('home.section10_background_image')
                                        ->label('Ảnh nền khối 10 (đường dẫn)'),
                                ]),
                        ]),

                    // Tab Về chúng tôi
                    Tab::make('about')
                        ->label('Về chúng tôi')
                        ->schema([
                            Tabs::make('about_tabs')
                                ->tabs([
                                    Tab::make('vision')
                                        ->label('Tầm nhìn')
                                        ->schema([
                                            TextInput::make('vision.vision_title')
                                                ->label('Tiêu đề'),
                                            Textarea::make('vision.vision_description')
                                                ->label('Mô tả')
                                                ->rows(10),
                                        ]),
                                    Tab::make('mission')
                                        ->label('Sứ mệnh')
                                        ->schema([
                                            TextInput::make('mission.mission_title')
                                                ->label('Tiêu đề'),
                                            Textarea::make('mission.mission_description')
                                                ->label('Mô tả')
                                                ->rows(10),
                                        ]),
                                    Tab::make('core_values')
                                        ->label('Giá trị cốt lõi')
                                        ->schema([
                                            TextInput::make('core_values.core_values_title')
                                                ->label('Tiêu đề'),
                                            Textarea::make('core_values.core_values_description')
                                                ->label('Mô tả')
                                                ->rows(10),
                                        ]),
                                    Tab::make('commitment')
                                        ->label('Cam kết của chúng tôi')
                                        ->schema([
                                            TextInput::make('commitment.commitment_title')
                                                ->label('Tiêu đề'),
                                            Textarea::make('commitment.commitment_description')
                                                ->label('Mô tả')
                                                ->rows(10),
                                        ]),
                                ]),
                        ]),

                    // Tab Các lĩnh vực kinh doanh
                    Tab::make('business')
                        ->label('Các lĩnh vực kinh doanh')
                        ->schema([
                            Tabs::make('business_tabs')
                                ->tabs([
                                    Tab::make('gemmechan')
                                        ->label('GemMechan (Cơ khí)')
                                        ->schema([
                                            TextInput::make('gemmechan.gemmechan_title')
                                                ->label('Tiêu đề'),
                                            Textarea::make('gemmechan.gemmechan_description')
                                                ->label('Mô tả')
                                                ->rows(10),
                                        ]),
                                    Tab::make('gemlock')
                                        ->label('GemLock (Khóa thông minh)')
                                        ->schema([
                                            TextInput::make('gemlock.gemlock_title')
                                                ->label('Tiêu đề'),
                                            Textarea::make('gemlock.gemlock_description')
                                                ->label('Mô tả')
                                                ->rows(10),
                                        ]),
                                    Tab::make('gemsolar')
                                        ->label('GemSolar (Điện năng lượng mặt trời)')
                                        ->schema([
                                            TextInput::make('gemsolar.gemsolar_title')
                                                ->label('Tiêu đề'),
                                            Textarea::make('gemsolar.gemsolar_description')
                                                ->label('Mô tả')
                                                ->rows(10),
                                        ]),
                                    Tab::make('gemtech')
                                        ->label('GemTech (Công nghệ)')
                                        ->schema([
                                            TextInput::make('gemtech.gemtech_title')
                                                ->label('Tiêu đề'),
                                            Textarea::make('gemtech.gemtech_description')
                                                ->label('Mô tả')
                                                ->rows(10),
                                        ]),
                                ]),
                        ]),

                    // Tab Đối tác và Dự án
                    Tab::make('partners')
                        ->label('Đối tác và Dự án')
                        ->schema([
                            TextInput::make('partners.partners_title')
                                ->label('Tiêu đề'),
                            Textarea::make('partners.partners_description')
                                ->label('Mô tả')
                                ->rows(10),
                        ]),

                    // Tab Tài liệu
                    Tab::make('documents')
                        ->label('Tài liệu')
                        ->schema([
                            TextInput::make('documents.documents_title')
                                ->label('Tiêu đề'),
                            Textarea::make('documents.documents_description')
                                ->label('Mô tả')
                                ->rows(10),
                        ]),

                    // Tab Liên hệ
                    Tab::make('contact')
                        ->label('Liên hệ')
                        ->schema([
                            TextInput::make('contact.contact_title')
                                ->label('Tiêu đề'),
                            Textarea::make('contact.contact_address')
                                ->label('Địa chỉ')
                                ->rows(3),
                            TextInput::make('contact.contact_phone')
                                ->label('Số điện thoại'),
                            TextInput::make('contact.contact_email')
                                ->label('Email'),
                        ]),
                ]),
        ];
    }

    protected function getFormStatePath(): ?string
    {
        return 'data';
    }

    public function save(): void
    {
        $data = $this->data;

        foreach ($data as $section => $fields) {
            foreach ($fields as $key => $value) {
                $fullKey = $section === 'home' ? $key : "{$section}_{$key}";
                $type = 'text';

                if (str_ends_with($key, '_background_image')) {
                    $type = 'image';
                } elseif (str_contains($key, 'description')) {
                    $type = 'html';
                }

                ContentItem::updateOrCreate(
                    [
                        'key' => $fullKey,
                        'page_type' => 'perfect_house',
                    ],
                    [
                        'key' => $fullKey,
                        'page_type' => 'perfect_house',
                        'section' => $section,
                        'type' => $type,
                        'label' => ucfirst(str_replace('_', ' ', $fullKey)),
                        'value' => $value ?? '',
                        'is_active' => true,
                        'order' => 0,
                    ]
                );
            }
        }

        Notification::make()
            ->title('Đã lưu thành công!')
            ->success()
            ->send();
    }

    protected function getFormActions(): array
    {
        return [
            \Filament\Actions\Action::make('save')
                ->label('Lưu')
                ->submit('save')
                ->color('primary'),
        ];
    }
}
