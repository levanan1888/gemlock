<?php

namespace App\Filament\Admin\Resources\ContentItems\Pages;

use App\Filament\Admin\Resources\ContentItems\ContentItemResource;
use Filament\Resources\Pages\CreateRecord;

class CreateContentItem extends CreateRecord
{
    protected static string $resource = ContentItemResource::class;
}
