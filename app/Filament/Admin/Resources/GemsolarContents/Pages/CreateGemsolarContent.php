<?php

namespace App\Filament\Admin\Resources\GemsolarContents\Pages;

use App\Filament\Admin\Resources\GemsolarContents\GemsolarContentResource;
use Filament\Resources\Pages\CreateRecord;

class CreateGemsolarContent extends CreateRecord
{
    protected static string $resource = GemsolarContentResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['page_type'] = 'gemsolar';

        return $data;
    }
}
