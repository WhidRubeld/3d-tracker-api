<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Racer;

class RacerTransformer extends TransformerAbstract
{
    public function transform(Racer $racer): array
    {
        return [
            'id' => $racer->id,
            'race_id' => $racer->race_id,
            'tracker' => fractal($racer->tracker, new TrackerTransformer()),
            'avatar_url' => $racer->avatar_file->url ?? null,
            'name' => $racer->name,
            'captain' => $racer->captain,
            'vehicle' => $racer->vehicle,
        ];
    }
}
