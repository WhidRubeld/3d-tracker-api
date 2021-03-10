<?php

namespace App\UseCases\Racers;

use Illuminate\Support\Facades\DB;
use App\Models\Racer;
use App\Http\Requests\CreateRacerRequest;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Throwable;

class CreateRacerUseCase
{
    public function __invoke(CreateRacerRequest $request): Racer
    {
        try {
            DB::beginTransaction();

            $racer = Racer::create($request->validated());

            DB::commit();
        } catch (Throwable $exception) {
            DB::rollBack();
            throw new BadRequestHttpException($exception->getMessage());
        }

        return $racer;
    }
}
