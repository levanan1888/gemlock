<?php

namespace App\Filament\Gemlock\Resources\PageContents\Pages;

use App\Filament\Gemlock\Resources\PageContents\PageContentResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePageContent extends CreateRecord
{
    protected static string $resource = PageContentResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['page_type'] = 'gemlock';

        return $data;
    }
}
