<?php

namespace App\Filament\Admin\Resources\PerfectHouseMenus;

use App\Filament\Admin\Resources\PerfectHouseMenus\Pages\CreatePerfectHouseMenu;
use App\Filament\Admin\Resources\PerfectHouseMenus\Pages\EditPerfectHouseMenu;
use App\Filament\Admin\Resources\PerfectHouseMenus\Pages\ListPerfectHouseMenus;
use App\Filament\Admin\Resources\PerfectHouseMenus\Schemas\PerfectHouseMenuForm;
use App\Filament\Admin\Resources\PerfectHouseMenus\Tables\PerfectHouseMenusTable;
use App\Models\MenuItem;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PerfectHouseMenuResource extends Resource
{
    protected static ?string $model = MenuItem::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBars3;

    protected static ?string $navigationLabel = 'Menu';

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
        return PerfectHouseMenuForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PerfectHouseMenusTable::configure($table);
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
            'index' => ListPerfectHouseMenus::route('/'),
            'create' => CreatePerfectHouseMenu::route('/create'),
            'edit' => EditPerfectHouseMenu::route('/{record}/edit'),
        ];
    }
}
