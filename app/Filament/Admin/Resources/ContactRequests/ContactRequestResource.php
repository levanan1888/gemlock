<?php

namespace App\Filament\Admin\Resources\ContactRequests;

use App\Filament\Admin\Resources\ContactRequests\Pages\ListContactRequests;
use App\Models\ContactRequest;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ContactRequestResource extends Resource
{
    protected static ?string $model = ContactRequest::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedEnvelope;

    protected static ?string $navigationLabel = 'Yêu cầu liên hệ';

    protected static ?int $navigationSort = 11;

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
        return $schema;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Thời gian')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
                TextColumn::make('name')
                    ->label('Họ tên')
                    ->searchable(),
                TextColumn::make('phone')
                    ->label('Số điện thoại')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('message')
                    ->label('Nội dung')
                    ->limit(60)
                    ->toggleable(),
                TextColumn::make('status')
                    ->label('Trạng thái')
                    ->badge()
                    ->formatStateUsing(fn (string $state) => $state === 'handled' ? 'Đã xử lý' : 'Mới')
                    ->color(fn (string $state) => $state === 'handled' ? 'success' : 'warning'),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Trạng thái')
                    ->options([
                        'new' => 'Mới',
                        'handled' => 'Đã xử lý',
                    ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->recordUrl(null)
            ->recordActions([
                ViewAction::make()
                    ->modalHeading('Chi tiết yêu cầu')
                    ->modalWidth('lg')
                    ->form(fn (ContactRequest $record) => [
                        \Filament\Forms\Components\TextInput::make('name')
                            ->label('Họ tên')
                            ->default($record->name)
                            ->disabled(),
                        \Filament\Forms\Components\TextInput::make('phone')
                            ->label('Số điện thoại')
                            ->default($record->phone)
                            ->disabled(),
                        \Filament\Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->default($record->email)
                            ->disabled(),
                        \Filament\Forms\Components\Textarea::make('message')
                            ->label('Nội dung')
                            ->default($record->message)
                            ->rows(6)
                            ->disabled(),
                        \Filament\Forms\Components\Select::make('status')
                            ->label('Trạng thái')
                            ->options([
                                'new' => 'Mới',
                                'handled' => 'Đã xử lý',
                            ])
                            ->default($record->status)
                            ->live()
                            ->afterStateUpdated(function ($state) use ($record) {
                                $record->update(['status' => $state]);
                            }),
                    ]),
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
            'index' => ListContactRequests::route('/'),
        ];
    }
}

