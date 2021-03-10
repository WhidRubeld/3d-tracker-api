<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{
    RacesController,
    RacersController,
};


Route::group(['prefix' => 'admin'], function () {
    Route::apiResources([
        'races' => RacesController::class,
        'racers' => RacersController::class,
    ]);
});
