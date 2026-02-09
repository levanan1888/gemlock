<?php

namespace App\Filament\Gemsolar\Resources\PageContents\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PageContentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('page_type')
                    ->default('gemsolar')
                    ->required()
                    ->disabled()
                    ->dehydrated(),
                Select::make('section')
                    ->options([
                        'head' => 'Head (Đầu trang)',
                        'main' => 'Main (Nội dung chính)',
                        'footer' => 'Footer (Chân trang)',
                    ])
                    ->required()
                    ->native(false),
                TextInput::make('title')
                    ->label('Tiêu đề')
                    ->maxLength(255),
                Textarea::make('description')
                    ->label('Mô tả')
                    ->rows(3),
                Textarea::make('content')
                    ->label('Nội dung HTML')
                    ->rows(20)
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
