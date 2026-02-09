<?php

namespace App\Filament\Admin\Resources\PerfectHouseHomePages\Pages;

use App\Filament\Admin\Resources\PerfectHouseHomePages\PerfectHouseHomePageResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPerfectHouseHomePage extends ViewRecord
{
    protected static string $resource = PerfectHouseHomePageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
