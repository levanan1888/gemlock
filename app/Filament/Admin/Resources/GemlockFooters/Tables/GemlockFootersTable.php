<?php

namespace App\Filament\Admin\Resources\GemlockFooters\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class GemlockFootersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order')
                    ->label('STT')
                    ->sortable(),
                TextColumn::make('label')
                    ->label('Nội dung')
                    ->searchable()
                    ->weight('medium'),
                TextColumn::make('key')
                    ->label('Mã cấu hình')
                    ->searchable()
                    ->copyable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('type')
                    ->label('Loại')
                    ->badge()
                    ->sortable(),
                TextColumn::make('value')
                    ->label('Giá trị')
                    ->limit(80)
                    ->wrap()
                    ->searchable(),
                IconColumn::make('is_active')
                    ->label('Hiển thị')
                    ->boolean()
                    ->sortable(),
            ])
            ->defaultSort('order')
            ->recordActions([
                EditAction::make()->label('Chỉnh sửa'),
            ])
            ->toolbarActions([]);
    }
}
