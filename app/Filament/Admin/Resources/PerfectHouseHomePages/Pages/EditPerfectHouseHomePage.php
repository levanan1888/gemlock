<?php

namespace App\Filament\Admin\Resources\PerfectHouseHomePages\Pages;

use App\Filament\Admin\Resources\PerfectHouseHomePages\PerfectHouseHomePageResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPerfectHouseHomePage extends EditRecord
{
    protected static string $resource = PerfectHouseHomePageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
