<?php

namespace App\Filament\Admin\Resources\PerfectHouseContents\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class PerfectHouseContentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('key')
                    ->label('Key')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('label')
                    ->label('Nhãn')
                    ->searchable(),
                TextColumn::make('section')
                    ->label('Phần')
                    ->badge()
                    ->searchable()
                    ->sortable(),
                TextColumn::make('type')
                    ->label('Loại')
                    ->badge()
                    ->sortable(),
                TextColumn::make('value')
                    ->label('Giá trị')
                    ->limit(50)
                    ->searchable(),
                IconColumn::make('is_active')
                    ->label('Kích hoạt')
                    ->boolean()
                    ->sortable(),
                TextColumn::make('order')
                    ->label('Thứ tự')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('section')
                    ->label('Phần')
                    ->options([
                        'head' => 'Head (HTML)',
                        'main' => 'Main (HTML)',
                        'footer' => 'Footer (HTML)',
                        'hero' => 'Hero',
                        'about' => 'Về chúng tôi',
                        'services' => 'Dịch vụ',
                        'features' => 'Tính năng',
                        'why_choose' => 'Tại sao chọn',
                        'contact' => 'Liên hệ',
                        'meta' => 'Meta tags',
                    ]),
                SelectFilter::make('type')
                    ->label('Loại')
                    ->options([
                        'text' => 'Text',
                        'html' => 'HTML',
                        'image' => 'Hình ảnh',
                        'link' => 'Link',
                        'number' => 'Số',
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
