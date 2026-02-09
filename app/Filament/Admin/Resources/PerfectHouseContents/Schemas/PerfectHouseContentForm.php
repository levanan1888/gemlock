<?php

namespace App\Filament\Admin\Resources\PerfectHouseContents\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PerfectHouseContentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('page_type')
                    ->default('perfect_house')
                    ->required()
                    ->disabled()
                    ->dehydrated(),
                Select::make('section')
                    ->label('Phần')
                    ->options([
                        'head' => 'Head (Đầu trang HTML)',
                        'main' => 'Main (Nội dung chính HTML)',
                        'footer' => 'Footer (Chân trang HTML)',
                        'hero' => 'Hero (Banner đầu trang)',
                        'about' => 'Về chúng tôi',
                        'services' => 'Dịch vụ',
                        'features' => 'Tính năng',
                        'why_choose' => 'Tại sao chọn chúng tôi',
                        'contact' => 'Liên hệ',
                        'meta' => 'Meta tags (SEO)',
                    ])
                    ->required()
                    ->native(false),
                TextInput::make('key')
                    ->label('Key (Định danh)')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->helperText('Ví dụ: hero_title, hero_subtitle, hero_button_link, about_description')
                    ->maxLength(255),
                Select::make('type')
                    ->label('Loại')
                    ->options([
                        'text' => 'Text',
                        'html' => 'HTML',
                        'image' => 'Hình ảnh',
                        'link' => 'Link/URL',
                        'number' => 'Số',
                    ])
                    ->required()
                    ->native(false),
                TextInput::make('label')
                    ->label('Nhãn (hiển thị trong admin)')
                    ->required()
                    ->maxLength(255),
                Textarea::make('value')
                    ->label('Giá trị')
                    ->rows(function ($get) {
                        // Nếu là head, main, footer thì hiển thị nhiều dòng hơn
                        $section = $get('section');

                        return in_array($section, ['head', 'main', 'footer']) ? 30 : 4;
                    })
                    ->columnSpanFull()
                    ->helperText(function ($get) {
                        $section = $get('section');
                        if (in_array($section, ['head', 'main', 'footer'])) {
                            return 'Nhập HTML đầy đủ cho phần này. Có thể chỉnh sửa trực tiếp HTML từ home1.html';
                        }

                        return 'Nhập text, HTML, đường dẫn ảnh, hoặc URL tùy theo loại';
                    }),
                Textarea::make('description')
                    ->label('Mô tả (cho admin)')
                    ->rows(2)
                    ->columnSpanFull(),
                TextInput::make('order')
                    ->label('Thứ tự')
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->label('Kích hoạt')
                    ->default(true),
            ]);
    }
}
