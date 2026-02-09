<?php

namespace App\Filament\Admin\Resources\GemlockContents\Pages;

use App\Filament\Admin\Resources\GemlockContents\GemlockContentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditGemlockContent extends EditRecord
{
    protected static string $resource = GemlockContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
