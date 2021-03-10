<?php

namespace App\Transformers\Live;

use League\Fractal\TransformerAbstract;
use App\Models\Racer;

class RacerLiveTransformer extends TransformerAbstract
{
    public function transform(Racer $racer): array
    {
        return [
            'id' => $racer->id,
            'race_id' => $racer->race_id,
            'tracker' => fractal($racer->tracker, new TrackerLiveTransformer()),
            'name' => $racer->name,
        ];
    }
}
