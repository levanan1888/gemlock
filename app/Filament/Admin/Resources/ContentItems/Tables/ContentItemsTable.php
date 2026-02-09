<?php

namespace App\Filament\Admin\Resources\ContentItems\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ContentItemsTable
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
                TextColumn::make('page_type')
                    ->label('Trang')
                    ->badge()
                    ->sortable(),
                TextColumn::make('section')
                    ->label('Phần')
                    ->badge()
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
                SelectFilter::make('page_type')
                    ->label('Trang')
                    ->options([
                        'perfect_house' => 'Perfect House',
                        'gemlock' => 'Gemlock',
                        'gemsolar' => 'Gemsolar',
                    ]),
                SelectFilter::make('section')
                    ->label('Phần')
                    ->options([
                        'hero' => 'Hero Slider',
                        'gallery' => 'Gallery',
                        'stats' => 'Thống kê',
                        'testimonial' => 'Đánh giá khách hàng',
                        'faq' => 'Câu hỏi thường gặp',
                        'news' => 'Tin tức',
                        'cta' => 'Call to Action',
                        'other' => 'Khác',
                    ]),
                SelectFilter::make('type')
                    ->label('Loại')
                    ->options([
                        'text' => 'Text',
                        'image' => 'Hình ảnh',
                        'link' => 'Link',
                        'html' => 'HTML',
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
