<?php

namespace App\UseCases\Movements;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\TrackerMovement;
use App\Models\Tracker;
use App\Http\Requests\MakeMovementRequest;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Throwable;

class MakeMovementUseCase
{
    public function __invoke(MakeMovementRequest $request): TrackerMovement
    {
        try {
            DB::beginTransaction();

            $tracker = Tracker::where('id', $request->input('tracker_id'))->first();

            if (!Hash::check($request->input('password'), $tracker->password)) {
                throw new BadRequestHttpException('The tracker can not be moved.');
            }

            $movement = TrackerMovement::create($request->validated());

            DB::commit();
        } catch (Throwable $exception) {
            DB::rollBack();
            throw new BadRequestHttpException($exception->getMessage());
        }


        return $movement;
    }
}
