<?php

namespace App\UseCases\Racers;

use Illuminate\Support\Facades\DB;
use App\Models\Racer;
use App\Http\Requests\UpdateRacerRequest;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Throwable;

class UpdateRacerUseCase
{
    public function __invoke(Racer $racer, UpdateRacerRequest $request): Racer
    {
        try {
            DB::beginTransaction();

            $racer->update($request->except('color_hex'));
            if ($request->has('color_hex')) {
                $racer->tracker()->update($request->only('color_hex'));
            }

            DB::commit();
        } catch (Throwable $exception) {
            DB::rollBack();
            throw new BadRequestHttpException($exception->getMessage());
        }

        return $racer->refresh();
    }
}
