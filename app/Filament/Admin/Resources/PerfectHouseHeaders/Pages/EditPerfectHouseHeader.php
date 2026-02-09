<?php

namespace App\Filament\Admin\Resources\PerfectHouseHeaders\Pages;

use App\Filament\Admin\Resources\PerfectHouseHeaders\PerfectHouseHeaderResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPerfectHouseHeader extends EditRecord
{
    protected static string $resource = PerfectHouseHeaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
