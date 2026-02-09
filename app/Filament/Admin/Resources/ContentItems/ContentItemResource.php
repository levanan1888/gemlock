<?php

namespace App\Filament\Admin\Resources\ContentItems;

use App\Filament\Admin\Resources\ContentItems\Pages\CreateContentItem;
use App\Filament\Admin\Resources\ContentItems\Pages\EditContentItem;
use App\Filament\Admin\Resources\ContentItems\Pages\ListContentItems;
use App\Filament\Admin\Resources\ContentItems\Schemas\ContentItemForm;
use App\Filament\Admin\Resources\ContentItems\Tables\ContentItemsTable;
use App\Models\ContentItem;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ContentItemResource extends Resource
{
    protected static ?string $model = ContentItem::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Nội dung trang';

    public static function getNavigationGroup(): ?string
    {
        return 'Quản lý nội dung';
    }

    public static function form(Schema $schema): Schema
    {
        return ContentItemForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ContentItemsTable::configure($table);
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
            'index' => ListContentItems::route('/'),
            'create' => CreateContentItem::route('/create'),
            'edit' => EditContentItem::route('/{record}/edit'),
        ];
    }
}
