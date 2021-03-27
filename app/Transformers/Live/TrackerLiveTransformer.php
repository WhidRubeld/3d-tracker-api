<?php

namespace App\Transformers\Live;

use League\Fractal\TransformerAbstract;
use App\Models\Tracker;
use App\Transformers\TrackerMovementTransformer;

class TrackerLiveTransformer extends TransformerAbstract
{
    public function transform(Tracker $tracker): array
    {
        return [
            'id' => $tracker->id,
            'color_hex' => $tracker->color_hex,
            'movement' => fractal($tracker->movements()->first(), new TrackerMovementTransformer()),
        ];
    }
}
