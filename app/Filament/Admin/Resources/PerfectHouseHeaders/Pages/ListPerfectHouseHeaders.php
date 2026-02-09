<?php

namespace App\Filament\Admin\Resources\PerfectHouseHeaders\Pages;

use App\Filament\Admin\Resources\PerfectHouseHeaders\PerfectHouseHeaderResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListPerfectHouseHeaders extends ListRecords
{
    protected static string $resource = PerfectHouseHeaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()
            ->where('page_type', 'perfect_house')
            ->where('section', 'header');
    }
}
