<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Transformers\SuccessTransformer;
use App\Models\Flag;
use App\Http\Requests\CreateFlagRequest;
use App\Http\Requests\UpdateFlagRequest;
use App\Transformers\FlagTransformer;
use App\UseCases\Flags\CreateFlagUseCase;
use App\UseCases\Flags\UpdateFlagUseCase;
use Spatie\Fractal\Fractal;

class FlagsController extends Controller
{
    public function index(): Fractal
    {
        return fractal(Flag::all(), new FlagTransformer());
    }

    public function store(CreateFlagRequest $request, CreateFlagUseCase $case): Fractal
    {
        return fractal($case($request), new FlagTransformer());
    }

    public function show(Flag $flag): Fractal
    {
        return fractal($flag, new FlagTransformer());
    }

    public function update(
        Flag $flag,
        UpdateFlagRequest $request,
        UpdateFlagUseCase $case
    ): Fractal {
        return fractal($case($flag, $request), new FlagTransformer());
    }

    public function destroy(Flag $flag): Fractal
    {
        return fractal($flag->delete(), new SuccessTransformer());
    }
}
