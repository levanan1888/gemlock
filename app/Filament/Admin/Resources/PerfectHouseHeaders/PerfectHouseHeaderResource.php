<?php

namespace App\Filament\Admin\Resources\PerfectHouseHeaders;

use App\Filament\Admin\Resources\PerfectHouseHeaders\Pages\CreatePerfectHouseHeader;
use App\Filament\Admin\Resources\PerfectHouseHeaders\Pages\EditPerfectHouseHeader;
use App\Filament\Admin\Resources\PerfectHouseHeaders\Pages\ListPerfectHouseHeaders;
use App\Filament\Admin\Resources\PerfectHouseHeaders\Schemas\PerfectHouseHeaderForm;
use App\Filament\Admin\Resources\PerfectHouseHeaders\Tables\PerfectHouseHeadersTable;
use App\Models\ContentItem;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PerfectHouseHeaderResource extends Resource
{
    protected static ?string $model = ContentItem::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Header';

    public static function getNavigationGroup(): ?string
    {
        return 'Perfect House';
    }

    public static function canAccess(): bool
    {
        $user = auth()->user();

        return $user && $user->isAdmin();
    }

    public static function form(Schema $schema): Schema
    {
        return PerfectHouseHeaderForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PerfectHouseHeadersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPerfectHouseHeaders::route('/'),
            'create' => CreatePerfectHouseHeader::route('/create'),
            'edit' => EditPerfectHouseHeader::route('/{record}/edit'),
        ];
    }
}
