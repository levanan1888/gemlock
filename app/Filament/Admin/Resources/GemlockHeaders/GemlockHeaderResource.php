<?php

namespace App\Filament\Admin\Resources\GemlockHeaders;

use App\Filament\Admin\Resources\GemlockHeaders\Pages\CreateGemlockHeader;
use App\Filament\Admin\Resources\GemlockHeaders\Pages\EditGemlockHeader;
use App\Filament\Admin\Resources\GemlockHeaders\Pages\ListGemlockHeaders;
use App\Filament\Admin\Resources\GemlockHeaders\Schemas\GemlockHeaderForm;
use App\Filament\Admin\Resources\GemlockHeaders\Tables\GemlockHeadersTable;
use App\Models\ContentItem;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GemlockHeaderResource extends Resource
{
    protected static ?string $model = ContentItem::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Header';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?int $navigationSort = 2;

    public static function getNavigationGroup(): ?string
    {
        return 'Gemlock';
    }

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public static function canAccess(): bool
    {
        $user = auth()->user();

        return $user && ($user->isAdmin() || $user->isGemlockAdmin());
    }

    public static function form(Schema $schema): Schema
    {
        return GemlockHeaderForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GemlockHeadersTable::configure($table);
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
            'index' => ListGemlockHeaders::route('/'),
            'create' => CreateGemlockHeader::route('/create'),
            'edit' => EditGemlockHeader::route('/{record}/edit'),
        ];
    }
}
