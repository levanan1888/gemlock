<?php

namespace App\Filament\Admin\Resources\MenuItems;

use App\Filament\Admin\Resources\MenuItems\Pages\CreateMenuItem;
use App\Filament\Admin\Resources\MenuItems\Pages\EditMenuItem;
use App\Filament\Admin\Resources\MenuItems\Pages\ListMenuItems;
use App\Filament\Admin\Resources\MenuItems\Schemas\MenuItemForm;
use App\Filament\Admin\Resources\MenuItems\Tables\MenuItemsTable;
use App\Models\MenuItem;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MenuItemResource extends Resource
{
    protected static ?string $model = MenuItem::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBars3;

    protected static ?string $navigationLabel = 'Cấu hình Menu';

    protected static ?int $navigationSort = 8;

    public static function getNavigationGroup(): ?string
    {
        return 'Gemlock';
    }

    public static function shouldRegisterNavigation(): bool
    {
        return true;
    }

    public static function form(Schema $schema): Schema
    {
        return MenuItemForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MenuItemsTable::configure($table);
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
            'index' => ListMenuItems::route('/'),
            'create' => CreateMenuItem::route('/create'),
            'edit' => EditMenuItem::route('/{record}/edit'),
        ];
    }
}
