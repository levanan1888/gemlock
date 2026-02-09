<?php

namespace App\Filament\Admin\Resources\Media\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MediaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('page_type')
                    ->label('Trang (để trống = dùng chung)')
                    ->options([
                        'perfect_house' => 'Perfect House',
                        'gemlock' => 'Gemlock',
                        'gemsolar' => 'Gemsolar',
                    ])
                    ->nullable()
                    ->native(false),
                TextInput::make('name')
                    ->label('Tên file')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('file_path')
                    ->label('File')
                    ->directory('media')
                    ->image()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif', 'image/webp', 'image/svg+xml'])
                    ->maxSize(10240)
                    ->required()
                    ->columnSpanFull()
                    ->helperText('Chấp nhận: JPG, PNG, GIF, WEBP, SVG. Tối đa 10MB'),
                Select::make('file_type')
                    ->label('Loại file')
                    ->options([
                        'image' => 'Hình ảnh',
                        'video' => 'Video',
                        'document' => 'Tài liệu',
                    ])
                    ->default('image')
                    ->native(false),
                TextInput::make('alt_text')
                    ->label('Alt text (cho SEO)')
                    ->maxLength(255),
                Textarea::make('description')
                    ->label('Mô tả')
                    ->rows(3)
                    ->columnSpanFull(),
            ]);
    }
}
