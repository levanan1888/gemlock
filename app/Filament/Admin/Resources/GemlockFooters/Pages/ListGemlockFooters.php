<?php

namespace App\Filament\Admin\Resources\GemlockFooters\Pages;

use App\Filament\Admin\Resources\GemlockFooters\GemlockFooterResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListGemlockFooters extends ListRecords
{
    protected static string $resource = GemlockFooterResource::class;

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
            ->where('section', 'footer');
    }
}
