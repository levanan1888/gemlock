<?php

namespace App\Filament\Admin\Resources\GemlockMenus\Pages;

use App\Filament\Admin\Resources\GemlockMenus\GemlockMenuResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListGemlockMenus extends ListRecords
{
    protected static string $resource = GemlockMenuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()
            ->where('page_type', 'gemlock');
    }
}
