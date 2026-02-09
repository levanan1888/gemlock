<?php

namespace App\Filament\Admin\Resources\Media\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class MediaTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('file_path')
                    ->label('Ảnh')
                    ->circular()
                    ->size(50),
                TextColumn::make('name')
                    ->label('Tên file')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('page_type')
                    ->label('Trang')
                    ->badge()
                    ->default('Chung')
                    ->sortable(),
                TextColumn::make('file_type')
                    ->label('Loại')
                    ->badge()
                    ->sortable(),
                TextColumn::make('alt_text')
                    ->label('Alt text')
                    ->searchable()
                    ->limit(30),
                TextColumn::make('created_at')
                    ->label('Ngày tạo')
                    ->dateTime()
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
                SelectFilter::make('file_type')
                    ->label('Loại file')
                    ->options([
                        'image' => 'Hình ảnh',
                        'video' => 'Video',
                        'document' => 'Tài liệu',
                    ]),
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
