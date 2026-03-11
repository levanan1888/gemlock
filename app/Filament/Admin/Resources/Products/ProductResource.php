<?php

namespace App\Filament\Admin\Resources\Products;

use App\Filament\Admin\Resources\Products\Pages\CreateProduct;
use App\Filament\Admin\Resources\Products\Pages\EditProduct;
use App\Filament\Admin\Resources\Products\Pages\ListProducts;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductCategory;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
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

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedShoppingBag;

    protected static ?string $navigationLabel = 'Sản phẩm';

    protected static ?string $slug = 'gemlock-products';

    protected static ?int $navigationSort = 2;

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
            Section::make('Thông tin cơ bản')
                ->schema([
                    TextInput::make('name')
                        ->label('Tên sản phẩm')
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
                    Select::make('brand_id')
                        ->label('Thương hiệu')
                        ->options(fn () => Brand::where('is_active', true)->pluck('name', 'id'))
                        ->searchable()
                        ->preload(),
                    Select::make('category_id')
                        ->label('Danh mục')
                        ->options(fn () => ProductCategory::where('is_active', true)->pluck('name', 'id'))
                        ->searchable()
                        ->preload(),
                    TextInput::make('price')
                        ->label('Giá')
                        ->numeric()
                        ->prefix('₫'),
                    TextInput::make('sale_price')
                        ->label('Giá giảm')
                        ->numeric()
                        ->prefix('₫'),
                    TextInput::make('order')
                        ->label('Thứ tự')
                        ->numeric()
                        ->default(0),
                    MarkdownEditor::make('description')
                        ->label('Mô tả')
                        ->columnSpanFull(),
                    Toggle::make('is_active')
                        ->label('Hiển thị')
                        ->default(true),
                ])->columns(2)
                ->columnSpanFull(),

            Section::make('Hình ảnh')
                ->schema([
                    CuratorPicker::make('image_id')
                        ->label('Ảnh đại diện')
                        ->buttonLabel('Chọn ảnh')
                        ->size('sm')
                        ->required(false),
                ])
                ->columnSpanFull(),

            Section::make('Bộ sưu tập ảnh')
                ->schema([
                    CuratorPicker::make('gallery_image')
                        ->label('Gallery ảnh')
                        ->buttonLabel('Chọn ảnh')
                        ->multiple()
                        ->maxItems(10)
                        ->size('sm'),
                ])
                ->columnSpanFull(),

            Section::make('Thông tin bổ sung')
                ->schema([
                    KeyValue::make('features')
                        ->label('Tính năng')
                        ->keyLabel('Tính năng')
                        ->valueLabel('Mô tả')
                        ->required(false),
                    KeyValue::make('specs')
                        ->label('Thông số kỹ thuật')
                        ->keyLabel('Thông số')
                        ->valueLabel('Giá trị')
                        ->required(false),
                ])
                ->columnSpanFull(),
        ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('no')
                    ->label('STT')
                    ->rowIndex(),
                ImageColumn::make('thumbnail')
                    ->label('Ảnh')
                    ->getStateUsing(function (Product $record) {
                        return $record->image?->url ?? asset('image/no-image.jpg');
                    })
                    ->square()
                    ->size(60),
                TextColumn::make('name')->label('Tên sản phẩm')->searchable()->sortable(),
                TextColumn::make('brand.name')->label('Thương hiệu')->badge(),
                TextColumn::make('category.name')->label('Danh mục')->badge(),
                TextColumn::make('price')->label('Giá')->money('VND')->sortable(),
                TextColumn::make('sale_price')->label('Giá giảm')->money('VND')->sortable(),
                IconColumn::make('is_active')->label('Hiển thị')->boolean(),
                TextColumn::make('order')->label('Thứ tự')->sortable(),
            ])
            ->defaultSort('order')
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProducts::route('/'),
            'create' => CreateProduct::route('/create'),
            'edit' => EditProduct::route('/{record}/edit'),
        ];
    }
}
