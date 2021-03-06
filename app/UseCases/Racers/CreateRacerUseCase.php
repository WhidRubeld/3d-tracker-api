<?php

namespace App\UseCases\Racers;

use Illuminate\Support\Facades\DB;
use App\Models\Racer;
use App\Models\Tracker;
use App\Http\Requests\CreateRacerRequest;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Throwable;

class CreateRacerUseCase
{
    public function __invoke(CreateRacerRequest $request): Racer
    {
        try {
            DB::beginTransaction();
            $tracker = Tracker::create($request->only('color_hex'));

            $racer = Racer::create(array_merge(
                $request->except('color_hex'),
                ['tracker_id' => $tracker->id],
            ));

            DB::commit();
        } catch (Throwable $exception) {
            DB::rollBack();
            throw new BadRequestHttpException($exception->getMessage());
        }

        return $racer;
    }
}
