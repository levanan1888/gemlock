<?php

namespace App\Filament\Admin\Resources\ContentItems\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ContentItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('page_type')
                    ->label('Trang')
                    ->options([
                        'perfect_house' => 'Perfect House',
                        'gemlock' => 'Gemlock',
                        'gemsolar' => 'Gemsolar',
                    ])
                    ->required()
                    ->native(false),
                Select::make('section')
                    ->label('Phần')
                    ->options([
                        'hero' => 'Hero Slider',
                        'gallery' => 'Gallery',
                        'stats' => 'Thống kê',
                        'testimonial' => 'Đánh giá khách hàng',
                        'faq' => 'Câu hỏi thường gặp',
                        'news' => 'Tin tức',
                        'cta' => 'Call to Action',
                        'other' => 'Khác',
                    ])
                    ->required()
                    ->native(false),
                TextInput::make('key')
                    ->label('Key (Định danh duy nhất)')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->helperText('Ví dụ: hero_slide_1_image, gallery_title, stats_item_1_number')
                    ->maxLength(255),
                Select::make('type')
                    ->label('Loại')
                    ->options([
                        'text' => 'Text',
                        'image' => 'Hình ảnh',
                        'link' => 'Link',
                        'html' => 'HTML',
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
                    ->rows(4)
                    ->columnSpanFull(),
                Textarea::make('description')
                    ->label('Mô tả')
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
