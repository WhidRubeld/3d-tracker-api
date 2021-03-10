<?php

namespace App\UseCases\Races;

use Illuminate\Support\Facades\DB;
use App\Models\Race;
use App\Http\Requests\UpdateRaceRequest;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Throwable;

class UpdateRaceUseCase
{
    public function __invoke(Race $race, UpdateRaceRequest $request): Race
    {
        try {
            DB::beginTransaction();


            if ($request->has(['location_name', 'location_latitude', 'location_longitude', 'location_zoom_index'])) {
                $race->location->update([
                    'name' => $request->input('location_name'),
                    'description' => $request->input('location_description') ?? null,
                    'latitude' => $request->input('location_latitude'),
                    'longitude' => $request->input('location_longitude'),
                    'zoom_index' => $request->input('location_zoom_index'),
                ]);
            }

            $race->update($request->validated());

            DB::commit();
        } catch (Throwable $exception) {
            DB::rollBack();
            throw new BadRequestHttpException($exception->getMessage());
        }

        return $race;
    }
}
