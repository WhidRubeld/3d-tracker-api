<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Http\Requests\MakeMovementRequest;
use App\Transformers\TrackerMovementTransformer;
use App\UseCases\Movements\MakeMovementUseCase;
use Spatie\Fractal\Fractal;

class MakeMovementController extends Controller
{
    public function __invoke(
        MakeMovementRequest $request,
        MakeMovementUseCase $case
    ): Fractal {
        return fractal($case($request), new TrackerMovementTransformer());
    }
}
