<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{
    RacesController,
};


Route::group(['prefix' => 'admin'], function () {
    Route::apiResources([
        'races' => RacesController::class,
    ]);
});
