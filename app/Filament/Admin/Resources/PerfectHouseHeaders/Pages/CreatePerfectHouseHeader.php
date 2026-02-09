<?php

namespace App\Filament\Admin\Resources\PerfectHouseHeaders\Pages;

use App\Filament\Admin\Resources\PerfectHouseHeaders\PerfectHouseHeaderResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePerfectHouseHeader extends CreateRecord
{
    protected static string $resource = PerfectHouseHeaderResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['page_type'] = 'perfect_house';
        $data['section'] = 'header';

        return $data;
    }
}
