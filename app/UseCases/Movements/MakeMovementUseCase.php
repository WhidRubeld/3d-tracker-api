<?php

namespace App\UseCases\Movements;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\TrackerMovement;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Throwable;
use Carbon\Carbon;

class MakeMovementUseCase
{
    public function __invoke(Request $request): TrackerMovement
    {
        try {
            DB::beginTransaction();

            $movement = TrackerMovement::create([
                'tracker_id' => (int) $request->input('id'),
                'latitude' => (float) $request->input('lat'),
                'longitude' => (float) $request->input('lon'),
                'altitude' => (float) $request->input('altitude'),
                'battery' => (int) $request->input('batt'),
                'bearing' => (float) $request->input('bearing'),
                'speed' => (float) $request->input('speed'),
                'generated_at' => Carbon::createFromTimestamp(
                    (int) $request->input('timestamp')
                )->format('Y-m-d H:i:s'),
            ]);

            DB::commit();
        } catch (Throwable $exception) {
            DB::rollBack();
            throw new BadRequestHttpException($exception->getMessage());
        }

        return $movement;
    }
}
