<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Transformers\SuccessTransformer;
use App\Models\Racer;
use App\Http\Requests\CreateRacerRequest;
use App\Http\Requests\UpdateRacerRequest;
use App\Transformers\RacerTransformer;
use App\UseCases\Racers\CreateRacerUseCase;
use App\UseCases\Racers\UpdateRacerUseCase;
use Spatie\Fractal\Fractal;

class RacersController extends Controller
{
    public function index(): Fractal
    {
        return fractal(Racer::all(), new RacerTransformer());
    }

    public function store(CreateRacerRequest $request, CreateRacerUseCase $case): Fractal
    {
        return fractal($case($request), new RacerTransformer());
    }

    public function show(Racer $racer): Fractal
    {
        return fractal($racer, new RacerTransformer());
    }

    public function update(
        Racer $racer,
        UpdateRacerRequest $request,
        UpdateRacerUseCase $case
    ): Fractal {
        return fractal($case($racer, $request), new RacerTransformer());
    }

    public function destroy(Racer $racer): Fractal
    {
        return fractal($racer->delete(), new SuccessTransformer());
    }
}
