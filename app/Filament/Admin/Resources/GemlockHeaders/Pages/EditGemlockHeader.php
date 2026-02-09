<?php

namespace App\Filament\Admin\Resources\GemlockHeaders\Pages;

use App\Filament\Admin\Resources\GemlockHeaders\GemlockHeaderResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditGemlockHeader extends EditRecord
{
    protected static string $resource = GemlockHeaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
