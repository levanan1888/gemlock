<?php

namespace App\Filament\Admin\Resources\GemlockFooters\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class GemlockFooterForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('page_type')
                    ->default('gemlock')
                    ->required()
                    ->disabled()
                    ->dehydrated(),
                TextInput::make('section')
                    ->default('footer')
                    ->required()
                    ->disabled()
                    ->dehydrated(),
                TextInput::make('key')
                    ->label('Key (Định danh)')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->helperText('Ví dụ: footer_description, footer_copyright, footer_social_facebook')
                    ->maxLength(255),
                Select::make('type')
                    ->label('Loại')
                    ->options([
                        'text' => 'Text',
                        'image' => 'Hình ảnh',
                        'link' => 'Link',
                        'html' => 'HTML',
                    ])
                    ->required()
                    ->native(false),
                TextInput::make('label')
                    ->label('Nhãn')
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
            ]);
    }
}
