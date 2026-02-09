<?php

namespace App\Filament\Gemlock\Resources\PageContents\Pages;

use App\Filament\Gemlock\Resources\PageContents\PageContentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListPageContents extends ListRecords
{
    protected static string $resource = PageContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()->where('page_type', 'gemlock');
    }
}
