<?php

namespace App\Filament\Admin\Resources\GemlockPages;

use App\Filament\Admin\Resources\GemlockPages\Pages\CreateGemlockPage;
use App\Filament\Admin\Resources\GemlockPages\Pages\EditGemlockPage;
use App\Filament\Admin\Resources\GemlockPages\Pages\ListGemlockPages;
use App\Models\GemlockPage;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class GemlockPageResource extends Resource
{
    protected static ?string $model = GemlockPage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentDuplicate;

    protected static ?string $navigationLabel = 'Pages Gemlock';

    protected static ?string $slug = 'gemlock-pages';

    protected static ?int $navigationSort = 6;

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
                ->maxLength(255)
                ->live(onBlur: true)
                ->afterStateUpdated(fn ($state, $set, $get) => blank($get('slug')) ? $set('slug', Str::slug($state)) : null),

            TextInput::make('slug')
                ->label('URL tùy chọn')
                ->helperText('Nếu URL đã tồn tại, hệ thống sẽ tự động tạo URL mới với suffix -2, -3...')
                ->required()
                ->maxLength(255)
                ->unique(ignoreRecord: true),

            Textarea::make('excerpt')
                ->label('Mô tả ngắn')
                ->rows(3)
                ->columnSpanFull(),

            RichEditor::make('content')
                ->label('Nội dung')
                ->required()
                ->columnSpanFull(),

            FileUpload::make('banner')
                ->label('Ảnh banner')
                ->image()
                ->directory('pages/gemlock')
                ->disk('public')
                ->visibility('public'),

            Toggle::make('is_active')
                ->label('Hiển thị')
                ->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('no')
                    ->label('STT')
                    ->rowIndex(),
                TextColumn::make('title')->label('Tiêu đề')->searchable()->sortable()->limit(50),
                TextColumn::make('slug')->label('URL')->searchable()->copyable(),
                IconColumn::make('is_active')->label('Hiển thị')->boolean(),
                TextColumn::make('updated_at')->label('Cập nhật')->dateTime('d/m/Y H:i')->sortable(),
            ])
            ->defaultSort('updated_at', 'desc')
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
            'index' => ListGemlockPages::route('/'),
            'create' => CreateGemlockPage::route('/create'),
            'edit' => EditGemlockPage::route('/{record}/edit'),
        ];
    }
}
