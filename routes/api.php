<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{
    RacesController,
    RacersController,
    TrackersController,
};


Route::group(['prefix' => 'admin'], function () {
    Route::apiResources([
        'races' => RacesController::class,
        'racers' => RacersController::class,
        'trackers' => TrackersController::class,
    ]);
});
