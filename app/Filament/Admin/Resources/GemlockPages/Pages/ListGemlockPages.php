<?php

namespace App\Filament\Admin\Resources\GemlockPages\Pages;

use App\Filament\Admin\Resources\GemlockPages\GemlockPageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGemlockPages extends ListRecords
{
    protected static string $resource = GemlockPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
