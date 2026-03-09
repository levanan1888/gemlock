<?php

namespace App\Filament\Admin\Resources\GemlockBlogs\Pages;

use App\Filament\Admin\Resources\GemlockBlogs\GemlockBlogResource;
use Filament\Resources\Pages\CreateRecord;

class CreateGemlockBlog extends CreateRecord
{
    protected static string $resource = GemlockBlogResource::class;
}
