<?php

namespace App\Filament\Admin\Resources\PerfectHouseContents\Pages;

use App\Filament\Admin\Resources\PerfectHouseContents\PerfectHouseContentResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePerfectHouseContent extends CreateRecord
{
    protected static string $resource = PerfectHouseContentResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['page_type'] = 'perfect_house';

        return $data;
    }
}
