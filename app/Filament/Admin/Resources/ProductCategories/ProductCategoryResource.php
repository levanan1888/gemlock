<?php

namespace App\Filament\Admin\Resources\ProductCategories;

use App\Filament\Admin\Resources\ProductCategories\Pages\CreateProductCategory;
use App\Filament\Admin\Resources\ProductCategories\Pages\EditProductCategory;
use App\Filament\Admin\Resources\ProductCategories\Pages\ListProductCategories;
use App\Models\ProductCategory;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProductCategoryResource extends Resource
{
    protected static ?string $model = ProductCategory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedQueueList;

    protected static ?string $navigationLabel = 'Danh mục sản phẩm';

    protected static ?string $slug = 'gemlock-product-categories';

    protected static ?int $navigationSort = 1;

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
        return $schema->components([
            TextInput::make('name')
                ->label('Tên danh mục')
                ->required()
                ->maxLength(255)
                ->live(onBlur: true)
                ->afterStateUpdated(fn ($state, callable $set) =>
                    $set('slug', Str::slug($state))
                ),
            TextInput::make('slug')
                ->label('Slug')
                ->required()
                ->maxLength(255)
                ->unique(ignoreRecord: true),
            Toggle::make('is_active')
                ->label('Hiển thị')
                ->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Tên danh mục')->searchable()->sortable(),
                TextColumn::make('slug')->label('Slug')->searchable(),
                IconColumn::make('is_active')->label('Hiển thị')->boolean(),
            ])
            ->defaultSort('name')
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProductCategories::route('/'),
            'create' => CreateProductCategory::route('/create'),
            'edit' => EditProductCategory::route('/{record}/edit'),
        ];
    }
}
