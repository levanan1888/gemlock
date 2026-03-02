<?php

namespace App\Filament\Admin\Pages;

use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;

class ManageGemlockMenu extends Page
{
    protected static \BackedEnum|string|null $navigationIcon = Heroicon::OutlinedBars3;

    protected string $view = 'filament.admin.pages.manage-gemlock-menu';
}
