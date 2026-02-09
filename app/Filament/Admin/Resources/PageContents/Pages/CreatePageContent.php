<?php

namespace App\Filament\Admin\Resources\PageContents\Pages;

use App\Filament\Admin\Resources\PageContents\PageContentResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePageContent extends CreateRecord
{
    protected static string $resource = PageContentResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['page_type'] = 'perfect_house';

        return $data;
    }
}
