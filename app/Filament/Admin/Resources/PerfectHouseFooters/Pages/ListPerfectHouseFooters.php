<?php

namespace App\Filament\Admin\Resources\PerfectHouseFooters\Pages;

use App\Filament\Admin\Resources\PerfectHouseFooters\PerfectHouseFooterResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListPerfectHouseFooters extends ListRecords
{
    protected static string $resource = PerfectHouseFooterResource::class;

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
            ->where('section', 'footer');
    }
}
