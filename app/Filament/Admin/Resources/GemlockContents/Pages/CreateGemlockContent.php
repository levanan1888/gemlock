<?php

namespace App\Filament\Admin\Resources\GemlockContents\Pages;

use App\Filament\Admin\Resources\GemlockContents\GemlockContentResource;
use Filament\Resources\Pages\CreateRecord;

class CreateGemlockContent extends CreateRecord
{
    protected static string $resource = GemlockContentResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['page_type'] = 'gemlock';

        return $data;
    }
}
