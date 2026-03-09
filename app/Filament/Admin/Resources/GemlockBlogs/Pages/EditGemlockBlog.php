<?php

namespace App\Filament\Admin\Resources\GemlockBlogs\Pages;

use App\Filament\Admin\Resources\GemlockBlogs\GemlockBlogResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditGemlockBlog extends EditRecord
{
    protected static string $resource = GemlockBlogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
