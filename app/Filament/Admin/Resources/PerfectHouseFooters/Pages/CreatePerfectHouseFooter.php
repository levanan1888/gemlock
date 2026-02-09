<?php

namespace App\Filament\Admin\Resources\PerfectHouseFooters\Pages;

use App\Filament\Admin\Resources\PerfectHouseFooters\PerfectHouseFooterResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePerfectHouseFooter extends CreateRecord
{
    protected static string $resource = PerfectHouseFooterResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['page_type'] = 'perfect_house';
        $data['section'] = 'footer';

        return $data;
    }
}
