<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Transformers\SuccessTransformer;
use App\Models\Flag;
use App\Http\Requests\CreateFlagRequest;
use App\Http\Requests\UpdateFlagRequest;
use App\Transformers\FlagTransformer;
use Spatie\Fractal\Fractal;

class FlagsController extends Controller
{
    public function index(): Fractal
    {
        return fractal(Flag::all(), new FlagTransformer());
    }

    public function store(CreateFlagRequest $request): Fractal
    {
        return fractal(Flag::create($request->validated()), new FlagTransformer());
    }

    public function show(Flag $flag): Fractal
    {
        return fractal($flag, new FlagTransformer());
    }

    public function update(Flag $flag, UpdateFlagRequest $request): Fractal
    {
        $flag->update($request->validated());

        return fractal($flag->refresh(), new FlagTransformer());
    }

    public function destroy(Flag $flag): Fractal
    {
        return fractal($flag->delete(), new SuccessTransformer());
    }
}
