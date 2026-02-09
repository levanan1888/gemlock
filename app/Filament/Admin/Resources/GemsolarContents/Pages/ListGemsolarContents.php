<?php

namespace App\Filament\Admin\Resources\GemsolarContents\Pages;

use App\Filament\Admin\Resources\GemsolarContents\GemsolarContentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListGemsolarContents extends ListRecords
{
    protected static string $resource = GemsolarContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()->where('page_type', 'gemsolar');
    }
}
