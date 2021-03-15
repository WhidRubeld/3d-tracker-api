<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{
    RacesController,
    RacersController,
    TrackersController,
    FlagsController,
};

use App\Http\Controllers\{
    TraccarAppController,
};



Route::group(['prefix' => 'admin'], function () {
    Route::apiResources([
        'races' => RacesController::class,
        'racers' => RacersController::class,
        'trackers' => TrackersController::class,
        'flags' => FlagsController::class,
    ]);
});

Route::post('trackers/movements/traccarapp', TraccarAppController::class);
