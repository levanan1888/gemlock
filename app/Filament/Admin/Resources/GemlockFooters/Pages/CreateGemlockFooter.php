<?php

namespace App\Filament\Admin\Resources\GemlockFooters\Pages;

use App\Filament\Admin\Resources\GemlockFooters\GemlockFooterResource;
use Filament\Resources\Pages\CreateRecord;

class CreateGemlockFooter extends CreateRecord
{
    protected static string $resource = GemlockFooterResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['page_type'] = 'gemlock';
        $data['section'] = 'footer';

        return $data;
    }
}
