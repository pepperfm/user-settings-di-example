<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::post('users/change-settings/first', [UserController::class, 'changeSettingsRequestFirst'])
    ->name('users.change-settings.first');
Route::post('users/change-settings/second', [UserController::class, 'changeSettingsRequestSecond'])
    ->name('users.change-settings.second');
