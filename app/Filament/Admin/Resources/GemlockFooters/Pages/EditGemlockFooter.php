<?php

namespace App\Filament\Admin\Resources\GemlockFooters\Pages;

use App\Filament\Admin\Resources\GemlockFooters\GemlockFooterResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditGemlockFooter extends EditRecord
{
    protected static string $resource = GemlockFooterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
