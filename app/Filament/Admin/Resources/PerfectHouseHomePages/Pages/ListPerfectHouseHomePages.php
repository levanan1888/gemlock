<?php

namespace App\Filament\Admin\Resources\PerfectHouseHomePages\Pages;

use App\Filament\Admin\Resources\PerfectHouseHomePages\PerfectHouseHomePageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPerfectHouseHomePages extends ListRecords
{
    protected static string $resource = PerfectHouseHomePageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
