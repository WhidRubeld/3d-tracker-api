<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Race;
use App\Http\Requests\RaceLiveRequest;
use App\Transformers\Live\RaceLiveTransformer;
use App\UseCases\Live\RaceLiveUseCase;
use Spatie\Fractal\Fractal;

class RaceLiveController extends Controller
{
    public function __invoke(
        Race $race,
        RaceLiveRequest $request,
        RaceLiveUseCase $case
    ): Fractal {
        return fractal($case($race, $request), new RaceLiveTransformer());
    }
}
