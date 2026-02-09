<?php

namespace App\Filament\Admin\Resources\PerfectHouseContents\Pages;

use App\Filament\Admin\Resources\PerfectHouseContents\PerfectHouseContentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPerfectHouseContent extends EditRecord
{
    protected static string $resource = PerfectHouseContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
