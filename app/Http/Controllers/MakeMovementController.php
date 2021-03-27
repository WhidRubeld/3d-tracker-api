<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UseCases\Movements\MakeMovementUseCase;
use App\Transformers\TrackerMovementTransformer;
use Spatie\Fractal\Fractal;

class MakeMovementController extends Controller
{
    public function __invoke(
        Request $request,
        MakeMovementUseCase $case
    ): Fractal {
        return fractal($case($request), new TrackerMovementTransformer());
    }
}
