<?php

namespace App\Filament\Admin\Resources\PerfectHouseMenus\Pages;

use App\Filament\Admin\Resources\PerfectHouseMenus\PerfectHouseMenuResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePerfectHouseMenu extends CreateRecord
{
    protected static string $resource = PerfectHouseMenuResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['page_type'] = 'perfect_house';

        return $data;
    }
}
