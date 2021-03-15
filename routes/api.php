<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{
    RacesController,
    RacersController,
    TrackersController,
    FlagsController,
};

use App\Http\Controllers\{
    TrackerAuthenticationController,
    MakeMovementController,
    GetRacePublicController,
    TraccarAppController,
    RaceLiveController,
};



Route::group(['prefix' => 'admin'], function () {
    Route::apiResources([
        'races' => RacesController::class,
        'racers' => RacersController::class,
        'trackers' => TrackersController::class,
        'flags' => FlagsController::class,
    ]);
});

Route::group(['prefix' => 'trackers'], function () {
    Route::post('{tracker}/auth', TrackerAuthenticationController::class);
    Route::post('movements', MakeMovementController::class);
});


Route::post('trackers/movements/traccarapp', TraccarAppController::class);
Route::get('races/{race}/live', RaceLiveController::class);
Route::post('movements', MakeMovementController::class);
Route::get('races/{race}', GetRacePublicController::class);
