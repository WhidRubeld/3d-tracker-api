<?php

namespace App\UseCases\Races;

use Illuminate\Support\Facades\DB;
use App\Models\Location;
use App\Models\Race;
use App\Http\Requests\CreateRaceRequest;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Throwable;

class CreateRaceUseCase
{
    public function __invoke(CreateRaceRequest $request): Race
    {
        try {
            DB::beginTransaction();

            $location = Location::create([
                'name' => $request->input('location_name'),
                'description' => $request->input('location_description') ?? null,
                'latitude' => $request->input('location_latitude'),
                'longitude' => $request->input('location_longitude'),
                'zoom_index' => $request->input('location_zoom_index'),
            ]);

            $race = Race::create(
                array_merge($request->validated(), ['location_id' => $location->id])
            );

            DB::commit();
        } catch (Throwable $exception) {
            DB::rollBack();
            throw new BadRequestHttpException($exception->getMessage());
        }

        return $race;
    }
}
