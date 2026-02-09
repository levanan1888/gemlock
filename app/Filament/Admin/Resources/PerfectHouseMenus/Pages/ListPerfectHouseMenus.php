<?php

namespace App\Filament\Admin\Resources\PerfectHouseMenus\Pages;

use App\Filament\Admin\Resources\PerfectHouseMenus\PerfectHouseMenuResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListPerfectHouseMenus extends ListRecords
{
    protected static string $resource = PerfectHouseMenuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()
            ->where('page_type', 'perfect_house');
    }
}
