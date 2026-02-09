<?php

namespace App\Filament\Admin\Resources\GemlockMenus\Pages;

use App\Filament\Admin\Resources\GemlockMenus\GemlockMenuResource;
use Filament\Resources\Pages\CreateRecord;

class CreateGemlockMenu extends CreateRecord
{
    protected static string $resource = GemlockMenuResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['page_type'] = 'gemlock';

        return $data;
    }
}
