<?php

namespace App\Filament\Admin\Resources\GemlockContents\Pages;

use App\Filament\Admin\Resources\GemlockContents\GemlockContentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListGemlockContents extends ListRecords
{
    protected static string $resource = GemlockContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()->where('page_type', 'gemlock');
    }
}
