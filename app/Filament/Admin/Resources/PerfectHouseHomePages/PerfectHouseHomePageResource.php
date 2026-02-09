<?php

namespace App\Filament\Admin\Resources\PerfectHouseHomePages;

use App\Filament\Admin\Resources\PerfectHouseHomePages\Pages\CreatePerfectHouseHomePage;
use App\Filament\Admin\Resources\PerfectHouseHomePages\Pages\EditPerfectHouseHomePage;
use App\Filament\Admin\Resources\PerfectHouseHomePages\Pages\ListPerfectHouseHomePages;
use App\Filament\Admin\Resources\PerfectHouseHomePages\Pages\ViewPerfectHouseHomePage;
use App\Filament\Admin\Resources\PerfectHouseHomePages\Schemas\PerfectHouseHomePageForm;
use App\Filament\Admin\Resources\PerfectHouseHomePages\Schemas\PerfectHouseHomePageInfolist;
use App\Filament\Admin\Resources\PerfectHouseHomePages\Tables\PerfectHouseHomePagesTable;
use App\Models\ContentItem;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PerfectHouseHomePageResource extends Resource
{
    protected static ?string $model = ContentItem::class;

    public static function canAccess(): bool
    {
        return false; // Ẩn resource này
    }

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return PerfectHouseHomePageForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PerfectHouseHomePageInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PerfectHouseHomePagesTable::configure($table);
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
            'index' => ListPerfectHouseHomePages::route('/'),
            'create' => CreatePerfectHouseHomePage::route('/create'),
            'view' => ViewPerfectHouseHomePage::route('/{record}'),
            'edit' => EditPerfectHouseHomePage::route('/{record}/edit'),
        ];
    }
}
