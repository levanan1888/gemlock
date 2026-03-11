<?php

namespace App\Filament\Admin\Resources\Media\Schemas;

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
                TextInput::make('name')
                    ->label('Tên file')
                    ->required()
                    ->maxLength(255),
                TextInput::make('alt')
                    ->label('Alt text (cho SEO)')
                    ->maxLength(255),
                TextInput::make('title')
                    ->label('Tiêu đề')
                    ->maxLength(255),
                Textarea::make('description')
                    ->label('Mô tả')
                    ->rows(3)
                    ->columnSpanFull(),
                Textarea::make('caption')
                    ->label('Chú thích')
                    ->rows(2)
                    ->columnSpanFull(),
            ]);
    }
}
