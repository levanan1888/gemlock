<?php

namespace App\Filament\Admin\Resources\GemlockFooters\Schemas;

use App\Models\ContentItem;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class GemlockFooterForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Placeholder::make('key_info')
                    ->label('Mã cấu hình')
                    ->content(fn (?ContentItem $record): string => $record?->key ?? '-'),
                Placeholder::make('type_info')
                    ->label('Loại dữ liệu')
                    ->content(fn (?ContentItem $record): string => match ($record?->key) {
                        'footer_logo_gemlock' => 'Image path',
                        'footer_social_facebook_gemlock',
                        'footer_social_youtube_gemlock',
                        'footer_social_zalo_gemlock' => 'Link URL',
                        default => 'Text',
                    }),
                Textarea::make('value')
                    ->label('Giá trị')
                    ->required()
                    ->rows(3)
                    ->columnSpanFull(),
                Textarea::make('description')
                    ->label('Ghi chú (tuỳ chọn)')
                    ->rows(2)
                    ->columnSpanFull(),
                Toggle::make('is_active')
                    ->label('Hiển thị')
                    ->default(true),
            ]);
    }
}
