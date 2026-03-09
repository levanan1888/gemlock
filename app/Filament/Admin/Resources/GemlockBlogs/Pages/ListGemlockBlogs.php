<?php

namespace App\Filament\Admin\Resources\GemlockBlogs\Pages;

use App\Filament\Admin\Resources\GemlockBlogs\GemlockBlogResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGemlockBlogs extends ListRecords
{
    protected static string $resource = GemlockBlogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
