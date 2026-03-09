<?php

namespace App\Filament\Admin\Resources\GemlockPages\Pages;

use App\Filament\Admin\Resources\GemlockPages\GemlockPageResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditGemlockPage extends EditRecord
{
    protected static string $resource = GemlockPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
