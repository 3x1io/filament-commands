<?php

namespace io3x1\FilamentCommands\Pages;

use Filament\Pages\Page;

class Artisan extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-code';

    protected static string $view = 'gui::index';

    protected static ?string $navigationGroup = 'Settings';
}
