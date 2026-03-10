<?php

namespace App\Filament\Admin\Resources\GemlockContents;

use App\Filament\Admin\Resources\GemlockContents\Pages\CreateGemlockContent;
use App\Filament\Admin\Resources\GemlockContents\Pages\EditGemlockContent;
use App\Filament\Admin\Resources\GemlockContents\Pages\ListGemlockContents;
use App\Filament\Admin\Resources\GemlockContents\Schemas\GemlockContentForm;
use App\Filament\Admin\Resources\GemlockContents\Tables\GemlockContentsTable;
use App\Models\PageContent;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GemlockContentResource extends Resource
{
    protected static ?string $model = PageContent::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Nội dung Gemlock';

    protected static ?int $navigationSort = 7;

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
        return GemlockContentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GemlockContentsTable::configure($table);
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
            'index' => ListGemlockContents::route('/'),
            'create' => CreateGemlockContent::route('/create'),
            'edit' => EditGemlockContent::route('/{record}/edit'),
        ];
    }
}
