<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Race;
use App\Http\Requests\GetRacesRequest;
use App\Transformers\Live\RaceLiveTransformer;
use App\Transformers\RaceTransformer;
use Spatie\Fractal\Fractal;

class GetRacePublicController extends Controller
{
    public function __invoke(Race $race, GetRacesRequest $request): Fractal
    {
        $transformer = $request->input('with_movements')
            ? new RaceTransformer()
            : new RaceLiveTransformer();

        return fractal($race, $transformer);
    }
}
