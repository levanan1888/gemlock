<?php

namespace App\Filament\Admin\Resources\PerfectHouseMenus\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PerfectHouseMenuForm
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
                Select::make('menu_type')
                    ->label('Loại menu')
                    ->options([
                        'header' => 'Header Menu',
                        'footer' => 'Footer Menu',
                    ])
                    ->required()
                    ->default('header')
                    ->native(false),
                TextInput::make('label')
                    ->label('Tên menu')
                    ->required()
                    ->maxLength(255),
                TextInput::make('url')
                    ->label('URL')
                    ->required()
                    ->maxLength(255)
                    ->helperText('Ví dụ: /, /about, /contact, #section'),
                TextInput::make('icon')
                    ->label('Icon (Material Icons)')
                    ->maxLength(50)
                    ->helperText('Ví dụ: home, menu, contact'),
                Select::make('parent_id')
                    ->label('Menu cha')
                    ->relationship('parent', 'label')
                    ->searchable()
                    ->preload()
                    ->native(false),
                TextInput::make('order')
                    ->label('Thứ tự')
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->label('Kích hoạt')
                    ->default(true),
                Toggle::make('open_in_new_tab')
                    ->label('Mở tab mới')
                    ->default(false),
            ]);
    }
}
