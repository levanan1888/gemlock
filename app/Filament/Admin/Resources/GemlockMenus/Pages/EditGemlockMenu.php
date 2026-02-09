<?php

namespace App\Filament\Admin\Resources\GemlockMenus\Pages;

use App\Filament\Admin\Resources\GemlockMenus\GemlockMenuResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditGemlockMenu extends EditRecord
{
    protected static string $resource = GemlockMenuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
