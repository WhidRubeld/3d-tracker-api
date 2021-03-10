<?php

namespace App\Transformers\Simplified;

use League\Fractal\TransformerAbstract;
use App\Models\Race;

class RaceSimplifiedTransformer extends TransformerAbstract
{
    public function transform(Race $race): array
    {
        return [
            'id' => $race->id,
            'title' => $race->title,
            'cup_class' => $race->cup_class,
            'level' => $race->level,
            'started_at' => $race->started_at,
            'duration' => $race->duration,
            'racers' => fractal($race->racers, new RacerSimplifiedTransformer()),
            'flags' => fractal($race->flags, new FlagSimplifiedTransformer()),
        ];
    }
}
