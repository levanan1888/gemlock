<?php

namespace App\Filament\Admin\Resources\Media\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MediaTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('path')
                    ->label('Ảnh')
                    ->circular()
                    ->size(50),
                TextColumn::make('name')
                    ->label('Tên file')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('ext')
                    ->label('Định dạng')
                    ->badge()
                    ->sortable(),
                TextColumn::make('alt')
                    ->label('Alt text')
                    ->searchable()
                    ->limit(30),
                TextColumn::make('size')
                    ->label('Kích thước')
                    ->formatStateUsing(fn ($state) => $state ? round($state / 1024, 2) . ' KB' : '-')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Ngày tạo')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
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
