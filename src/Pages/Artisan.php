<?php

namespace io3x1\FilamentCommands\Pages;

use Filament\Pages\Page;
use io3x1\FilamentCommands\Http\Controllers\GuiController;

class Artisan extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-code';

    protected static string $view = 'gui::index';

    protected static ?string $navigationGroup = 'Settings';

    protected static function shouldRegisterNavigation(): bool
    {
        return static::hasCommands();
    }

    public function mount(): void
    {
        abort_unless(static::hasCommands(), 403);
    }

    private static function hasCommands(): bool
    {
        return !empty((new GuiController())->prepareTojson(config('artisan-gui.commands', [])));
    }
}
