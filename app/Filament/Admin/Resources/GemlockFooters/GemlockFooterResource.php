<?php

namespace App\Filament\Admin\Resources\GemlockFooters;

use App\Filament\Admin\Resources\GemlockFooters\Pages\CreateGemlockFooter;
use App\Filament\Admin\Resources\GemlockFooters\Pages\EditGemlockFooter;
use App\Filament\Admin\Resources\GemlockFooters\Pages\ListGemlockFooters;
use App\Filament\Admin\Resources\GemlockFooters\Schemas\GemlockFooterForm;
use App\Filament\Admin\Resources\GemlockFooters\Tables\GemlockFootersTable;
use App\Models\ContentItem;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class GemlockFooterResource extends Resource
{
    protected static ?string $model = ContentItem::class;

    protected static ?string $navigationLabel = 'Cấu hình Footer';

    protected static ?int $navigationSort = 9;

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
        return GemlockFooterForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GemlockFootersTable::configure($table);
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
            'index' => ListGemlockFooters::route('/'),
            'create' => CreateGemlockFooter::route('/create'),
            'edit' => EditGemlockFooter::route('/{record}/edit'),
        ];
    }
}
