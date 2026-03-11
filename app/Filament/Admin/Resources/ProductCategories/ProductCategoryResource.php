<?php

namespace App\Filament\Admin\Resources\ProductCategories;

use App\Filament\Admin\Resources\ProductCategories\Pages\CreateProductCategory;
use App\Filament\Admin\Resources\ProductCategories\Pages\EditProductCategory;
use App\Filament\Admin\Resources\ProductCategories\Pages\ListProductCategories;
use App\Models\ProductCategory;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
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
            Section::make('Thông tin danh mục')
                ->schema([
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
                    TextInput::make('series')
                        ->label('Series')
                        ->maxLength(255),
                    TextInput::make('title')
                        ->label('Tiêu đề')
                        ->maxLength(255),
                    CuratorPicker::make('image')
                        ->label('Ảnh đại diện')
                        ->buttonLabel('Chọn ảnh')
                        ->size('sm'),
                    TextInput::make('order')
                        ->label('Thứ tự hiển thị')
                        ->numeric()
                        ->default(0),
                    Toggle::make('is_active')
                        ->label('Hiển thị')
                        ->default(true),
                ])
                ->columnSpanFull()
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('no')
                    ->label('STT')
                    ->rowIndex(),
                ImageColumn::make('image')
                    ->label('Ảnh')
                    ->square()
                    ->size(60),
                TextColumn::make('name')
                    ->label('Tên danh mục')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable(),
                TextColumn::make('series')
                    ->label('Series')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('title')
                    ->label('Tiêu đề')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('order')
                    ->label('Thứ tự')
                    ->sortable(),
                IconColumn::make('is_active')
                    ->label('Hiển thị')
                    ->boolean(),
            ])
            ->defaultSort('order')
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
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
