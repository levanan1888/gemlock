<?php

namespace App\Filament\Admin\Resources\GemsolarContents\Pages;

use App\Filament\Admin\Resources\GemsolarContents\GemsolarContentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditGemsolarContent extends EditRecord
{
    protected static string $resource = GemsolarContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
