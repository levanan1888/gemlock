<?php

namespace App\Filament\Admin\Resources\GemlockBlogs;

use App\Filament\Admin\Resources\GemlockBlogs\Pages\CreateGemlockBlog;
use App\Filament\Admin\Resources\GemlockBlogs\Pages\EditGemlockBlog;
use App\Filament\Admin\Resources\GemlockBlogs\Pages\ListGemlockBlogs;
use App\Models\Blog;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DateTimePicker;
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
            TextInput::make('title')->label('Tiêu đề')->required()->maxLength(255),
            TextInput::make('slug')->label('Slug')->required()->maxLength(255)->unique(ignoreRecord: true),
            TextInput::make('category')->label('Chuyên mục')->maxLength(120),
            TextInput::make('author_name')->label('Tác giả')->default('Gemlock Team')->maxLength(255),
            TextInput::make('thumbnail')
                ->label('Ảnh đại diện')
                ->maxLength(255)
                ->helperText('Nhập đường dẫn ảnh trong storage, ví dụ: blogs/post-1.jpg'),
            Textarea::make('excerpt')->label('Mô tả ngắn')->rows(3)->maxLength(1000),
            Textarea::make('content')->label('Nội dung')->rows(12)->required()->columnSpanFull(),
            DateTimePicker::make('published_at')->label('Ngày đăng')->seconds(false),
            Toggle::make('is_active')->label('Hiển thị')->default(true),
            Toggle::make('is_featured')->label('Nổi bật')->default(false),
            TextInput::make('meta_title')->label('Meta title')->maxLength(255),
            Textarea::make('meta_description')->label('Meta description')->rows(2)->maxLength(255),
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
