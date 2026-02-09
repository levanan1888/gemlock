<?php

namespace App\Filament\Admin\Resources\GemlockMenus;

use App\Filament\Admin\Resources\GemlockMenus\Pages\CreateGemlockMenu;
use App\Filament\Admin\Resources\GemlockMenus\Pages\EditGemlockMenu;
use App\Filament\Admin\Resources\GemlockMenus\Pages\ListGemlockMenus;
use App\Filament\Admin\Resources\GemlockMenus\Schemas\GemlockMenuForm;
use App\Filament\Admin\Resources\GemlockMenus\Tables\GemlockMenusTable;
use App\Models\MenuItem;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GemlockMenuResource extends Resource
{
    protected static ?string $model = MenuItem::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBars3;

    protected static ?string $navigationLabel = 'Menu';

    public static function getNavigationGroup(): ?string
    {
        return 'Gemlock';
    }

    public static function canAccess(): bool
    {
        $user = auth()->user();

        return $user && ($user->isAdmin() || $user->isGemlockAdmin());
    }

    public static function form(Schema $schema): Schema
    {
        return GemlockMenuForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GemlockMenusTable::configure($table);
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
            'index' => ListGemlockMenus::route('/'),
            'create' => CreateGemlockMenu::route('/create'),
            'edit' => EditGemlockMenu::route('/{record}/edit'),
        ];
    }
}
