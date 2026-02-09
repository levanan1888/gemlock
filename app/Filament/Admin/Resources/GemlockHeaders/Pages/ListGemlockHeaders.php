<?php

namespace App\Filament\Admin\Resources\GemlockHeaders\Pages;

use App\Filament\Admin\Resources\GemlockHeaders\GemlockHeaderResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListGemlockHeaders extends ListRecords
{
    protected static string $resource = GemlockHeaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()
            ->where('page_type', 'gemlock')
            ->where('section', 'header');
    }
}
