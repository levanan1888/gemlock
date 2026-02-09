<?php

namespace App\Filament\Admin\Resources\GemlockHeaders\Pages;

use App\Filament\Admin\Resources\GemlockHeaders\GemlockHeaderResource;
use Filament\Resources\Pages\CreateRecord;

class CreateGemlockHeader extends CreateRecord
{
    protected static string $resource = GemlockHeaderResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['page_type'] = 'gemlock';
        $data['section'] = 'header';

        return $data;
    }
}
