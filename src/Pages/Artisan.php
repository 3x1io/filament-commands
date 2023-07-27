<?php

namespace io3x1\FilamentCommands\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\App;
use io3x1\FilamentCommands\Http\Controllers\GuiController;

class Artisan extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-code';

    protected static string $view = 'gui::index';

    protected static ?string $navigationGroup = 'Settings';

    protected static function shouldRegisterNavigation(): bool
    {
        $show = true;
        if (config('artisan-gui.navigation.show-only-commands-showing', false)) {
            $local = App::environment('local');
            $only = config('artisan-gui.local', true);
            $show = ($local || !$only);
        }

        return $show && static::hasCommands();
    }

    protected static function getNavigationGroup(): ?string
    {
        return strval(__(config('artisan-gui.navigation.group') ?? static::$navigationGroup));
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
