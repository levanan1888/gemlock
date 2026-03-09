<?php

namespace App\Filament\Admin\Resources\GemlockBlogs;

use App\Filament\Admin\Resources\GemlockBlogs\Pages\CreateGemlockBlog;
use App\Filament\Admin\Resources\GemlockBlogs\Pages\EditGemlockBlog;
use App\Filament\Admin\Resources\GemlockBlogs\Pages\ListGemlockBlogs;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\User;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class GemlockBlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected static ?string $navigationLabel = 'Bài viết';

    protected static ?string $slug = 'gemlock-blogs';

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
            TextInput::make('title')
                ->label('Tiêu đề')
                ->required()
                ->maxLength(255),
            TextInput::make('slug')
                ->label('Slug')
                ->required()
                ->maxLength(255)
                ->unique(ignoreRecord: true),
            Select::make('category')
                ->label('Chuyên mục')
                ->options(fn () => BlogCategory::query()
                    ->where('is_active', true)
                    ->orderBy('name')
                    ->pluck('name', 'name')
                )
                ->searchable()
                ->preload()
                ->native(false),
            Select::make('author_name')
                ->label('Tác giả')
                ->options(fn () => User::query()
                    ->orderBy('name')
                    ->pluck('name', 'name')
                )
                ->searchable()
                ->preload()
                ->native(false),
            Toggle::make('is_active')
                ->label('Hiển thị')
                ->default(true),
            Toggle::make('is_featured')
                ->label('Nổi bật')
                ->default(false),
            CuratorPicker::make('thumbnail')
                ->label('Ảnh đại diện')
                ->buttonLabel('Chọn hoặc tải ảnh')
                ->constrained()
                ->directory('blogs'),
            Textarea::make('content')
                ->label('Nội dung')
                ->rows(14)
                ->required()
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Tiêu đề')->searchable()->sortable()->limit(50),
                TextColumn::make('category')->label('Chuyên mục')->badge(),
                TextColumn::make('published_at')->label('Ngày đăng')->dateTime('d/m/Y H:i')->sortable(),
                IconColumn::make('is_active')->label('Hiển thị')->boolean(),
                IconColumn::make('is_featured')->label('Nổi bật')->boolean(),
            ])
            ->defaultSort('published_at', 'desc')
            ->recordActions([
                EditAction::make(),
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
            'index' => ListGemlockBlogs::route('/'),
            'create' => CreateGemlockBlog::route('/create'),
            'edit' => EditGemlockBlog::route('/{record}/edit'),
        ];
    }
}
