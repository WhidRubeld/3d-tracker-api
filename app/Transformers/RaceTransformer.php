<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Race;

class RaceTransformer extends TransformerAbstract
{
    public function transform(Race $race): array
    {
        return [
            'id' => $race->id,
            'title' => $race->title,
            'racers' => fractal($race->racers, new RacerTransformer()),
            'flags' => fractal($race->flags, new FlagTransformer()),
            'location' => fractal($race->location, new LocationTransformer()),
            'duration' => $race->duration,
            'started_at' => $race->started_at,
        ];
    }
}
