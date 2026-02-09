<?php

namespace App\Filament\Admin\Resources\PerfectHouseContents;

use App\Filament\Admin\Resources\PerfectHouseContents\Pages\CreatePerfectHouseContent;
use App\Filament\Admin\Resources\PerfectHouseContents\Pages\EditPerfectHouseContent;
use App\Filament\Admin\Resources\PerfectHouseContents\Pages\ListPerfectHouseContents;
use App\Filament\Admin\Resources\PerfectHouseContents\Schemas\PerfectHouseContentForm;
use App\Filament\Admin\Resources\PerfectHouseContents\Tables\PerfectHouseContentsTable;
use App\Models\ContentItem;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class PerfectHouseContentResource extends Resource
{
    protected static ?string $model = ContentItem::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Nội dung Perfect House';

    public static function shouldRegisterNavigation(): bool
    {
        return false; // Ẩn resource này, chỉ dùng custom page
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Perfect House';
    }

    public static function canAccess(): bool
    {
        $user = auth()->user();

        return $user && method_exists($user, 'isAdmin') && $user->isAdmin();
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('page_type', 'perfect_house');
    }

    public static function form(Schema $schema): Schema
    {
        return PerfectHouseContentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PerfectHouseContentsTable::configure($table);
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
            'index' => ListPerfectHouseContents::route('/'),
            'create' => CreatePerfectHouseContent::route('/create'),
            'edit' => EditPerfectHouseContent::route('/{record}/edit'),
        ];
    }
}
