<?php

namespace App\Filament\Gemlock\Resources\PageContents\Pages;

use App\Filament\Gemlock\Resources\PageContents\PageContentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPageContent extends EditRecord
{
    protected static string $resource = PageContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
