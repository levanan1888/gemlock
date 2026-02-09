<?php

namespace App\Filament\Admin\Resources\GemsolarContents;

use App\Filament\Admin\Resources\GemsolarContents\Pages\CreateGemsolarContent;
use App\Filament\Admin\Resources\GemsolarContents\Pages\EditGemsolarContent;
use App\Filament\Admin\Resources\GemsolarContents\Pages\ListGemsolarContents;
use App\Filament\Admin\Resources\GemsolarContents\Schemas\GemsolarContentForm;
use App\Filament\Admin\Resources\GemsolarContents\Tables\GemsolarContentsTable;
use App\Models\PageContent;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GemsolarContentResource extends Resource
{
    protected static ?string $model = PageContent::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Nội dung Gemsolar';

    public static function getNavigationGroup(): ?string
    {
        return 'Gemsolar';
    }

    public static function canAccess(): bool
    {
        $user = auth()->user();

        return $user && ($user->isAdmin() || $user->isGemsolarAdmin());
    }

    public static function form(Schema $schema): Schema
    {
        return GemsolarContentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GemsolarContentsTable::configure($table);
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
            'index' => ListGemsolarContents::route('/'),
            'create' => CreateGemsolarContent::route('/create'),
            'edit' => EditGemsolarContent::route('/{record}/edit'),
        ];
    }
}
