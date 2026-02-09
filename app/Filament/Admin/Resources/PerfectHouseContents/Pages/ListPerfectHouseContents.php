<?php

namespace App\Filament\Admin\Resources\PerfectHouseContents\Pages;

use App\Filament\Admin\Resources\PerfectHouseContents\PerfectHouseContentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListPerfectHouseContents extends ListRecords
{
    protected static string $resource = PerfectHouseContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()->where('page_type', 'perfect_house');
    }
}
