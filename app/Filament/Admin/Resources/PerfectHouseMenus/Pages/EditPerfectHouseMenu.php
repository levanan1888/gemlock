<?php

namespace App\Filament\Admin\Resources\PerfectHouseMenus\Pages;

use App\Filament\Admin\Resources\PerfectHouseMenus\PerfectHouseMenuResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPerfectHouseMenu extends EditRecord
{
    protected static string $resource = PerfectHouseMenuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
