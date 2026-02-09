<?php

namespace App\Filament\Gemsolar\Resources\PageContents\Pages;

use App\Filament\Gemsolar\Resources\PageContents\PageContentResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePageContent extends CreateRecord
{
    protected static string $resource = PageContentResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['page_type'] = 'gemsolar';

        return $data;
    }
}
