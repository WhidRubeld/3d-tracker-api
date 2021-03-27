<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{
    RacesController,
    RacersController,
    FlagsController,
};

use App\Http\Controllers\MakeMovementController;


Route::group(['prefix' => 'admin'], function () {
    Route::apiResources([
        'races' => RacesController::class,
        'racers' => RacersController::class,
        'flags' => FlagsController::class,
    ]);
});

Route::post('movement', MakeMovementController::class);
