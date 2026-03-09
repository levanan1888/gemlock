<?php

namespace App\Filament\Admin\Resources\GemlockFooters\Pages;

use App\Filament\Admin\Resources\GemlockFooters\GemlockFooterResource;
use Filament\Resources\Pages\CreateRecord;

class CreateGemlockFooter extends CreateRecord
{
    protected static string $resource = GemlockFooterResource::class;

    public static function canAccess(array $parameters = []): bool
    {
        return false;
    }
}
