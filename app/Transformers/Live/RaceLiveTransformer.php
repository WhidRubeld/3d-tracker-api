<?php

namespace App\Transformers\Live;

use League\Fractal\TransformerAbstract;
use App\Models\Race;
use App\Transformers\LocationTransformer;

class RaceLiveTransformer extends TransformerAbstract
{
    public function transform(Race $raceLive): array
    {
        return [
            'id' => $raceLive->id,
            'title' => $raceLive->title,
            'racers' => fractal($raceLive->racers, new RacerLiveTransformer()),
            'flags' => fractal($raceLive->flags, new FlagLiveTransformer()),
            'location' => fractal($raceLive->location, new LocationTransformer()),
            'duration' => $raceLive->duration,
            'started_at' => $raceLive->started_at,
        ];
    }
}
