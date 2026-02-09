<?php

namespace App\Filament\Admin\Resources\PerfectHouseFooters;

use App\Filament\Admin\Resources\PerfectHouseFooters\Pages\CreatePerfectHouseFooter;
use App\Filament\Admin\Resources\PerfectHouseFooters\Pages\EditPerfectHouseFooter;
use App\Filament\Admin\Resources\PerfectHouseFooters\Pages\ListPerfectHouseFooters;
use App\Filament\Admin\Resources\PerfectHouseFooters\Schemas\PerfectHouseFooterForm;
use App\Filament\Admin\Resources\PerfectHouseFooters\Tables\PerfectHouseFootersTable;
use App\Models\ContentItem;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PerfectHouseFooterResource extends Resource
{
    protected static ?string $model = ContentItem::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Footer';

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
        return PerfectHouseFooterForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PerfectHouseFootersTable::configure($table);
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
            'index' => ListPerfectHouseFooters::route('/'),
            'create' => CreatePerfectHouseFooter::route('/create'),
            'edit' => EditPerfectHouseFooter::route('/{record}/edit'),
        ];
    }
}
