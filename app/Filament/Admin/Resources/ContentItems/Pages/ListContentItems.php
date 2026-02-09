<?php

namespace App\Filament\Admin\Resources\ContentItems\Pages;

use App\Filament\Admin\Resources\ContentItems\ContentItemResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListContentItems extends ListRecords
{
    protected static string $resource = ContentItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
