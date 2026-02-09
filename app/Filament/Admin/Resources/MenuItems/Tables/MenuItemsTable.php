<?php

namespace App\Filament\Admin\Resources\MenuItems\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class MenuItemsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('label')
                    ->label('Tên menu')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('url')
                    ->label('URL')
                    ->searchable(),
                TextColumn::make('page_type')
                    ->label('Trang')
                    ->badge()
                    ->sortable(),
                TextColumn::make('menu_type')
                    ->label('Loại')
                    ->badge()
                    ->sortable(),
                TextColumn::make('parent.label')
                    ->label('Menu cha')
                    ->sortable(),
                IconColumn::make('is_active')
                    ->label('Kích hoạt')
                    ->boolean()
                    ->sortable(),
                TextColumn::make('order')
                    ->label('Thứ tự')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('page_type')
                    ->label('Trang')
                    ->options([
                        'perfect_house' => 'Perfect House',
                        'gemlock' => 'Gemlock',
                        'gemsolar' => 'Gemsolar',
                    ]),
                SelectFilter::make('menu_type')
                    ->label('Loại menu')
                    ->options([
                        'header' => 'Header',
                        'footer' => 'Footer',
                    ]),
            ])
            ->defaultSort('order')
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
