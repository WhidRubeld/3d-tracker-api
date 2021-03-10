<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Transformers\SuccessTransformer;
use App\Models\Race;
use App\Http\Requests\CreateRaceRequest;
use App\Http\Requests\GetRacesRequest;
use App\Http\Requests\UpdateRaceRequest;
use App\Transformers\Live\RaceLiveTransformer;
use App\Transformers\Simplified\RaceSimplifiedTransformer;
use App\Transformers\RaceTransformer;
use App\UseCases\Races\CreateRaceUseCase;
use App\UseCases\Races\UpdateRaceUseCase;
use Spatie\Fractal\Fractal;

class RacesController extends Controller
{
    public function index(GetRacesRequest $request): Fractal
    {
        $transformerName = $request->input('with_movements')
            ? RaceTransformer::class
            : RaceSimplifiedTransformer::class;

        return fractal(Race::query()->orderBy('id', 'DESC')->paginate(15), new $transformerName());
    }

    public function store(
        CreateRaceRequest $request,
        CreateRaceUseCase $case
    ): Fractal {
        return fractal($case($request), new RaceTransformer());
    }

    public function show(Race $race, GetRacesRequest $request): Fractal
    {
        $transformer = $request->input('with_movements')
            ? new RaceTransformer()
            : new RaceLiveTransformer();

        return fractal($race, $transformer);
    }

    public function update(
        Race $race,
        UpdateRaceRequest $request,
        UpdateRaceUseCase $case
    ): Fractal {
        $race->update($request->validated());

        return fractal($case($race, $request), new RaceTransformer());
    }

    public function destroy(Race $race): Fractal
    {
        return fractal($race->delete(), new SuccessTransformer());
    }
}
