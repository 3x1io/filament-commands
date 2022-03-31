<?php

use io3x1\FilamentCommands\Http\Controllers\GuiController;
use Illuminate\Support\Facades\Route;

Route::get('/json', [GuiController::class, 'indexJSON'])
    ->name('gui.index');

Route::post('/json/{command}', [GuiController::class, 'run'])
    ->name('gui.run');
