<?php

namespace App\Filament\Admin\Resources\PerfectHouseFooters\Pages;

use App\Filament\Admin\Resources\PerfectHouseFooters\PerfectHouseFooterResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPerfectHouseFooter extends EditRecord
{
    protected static string $resource = PerfectHouseFooterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
