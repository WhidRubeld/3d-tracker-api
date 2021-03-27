<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Tracker;

class TrackerTransformer extends TransformerAbstract
{
    public function transform(Tracker $tracker): array
    {
        return [
            'id' => $tracker->id,
            'movements' => fractal($tracker->movements, new TrackerMovementTransformer()),
            'color_hex' => $tracker->color_hex,
        ];
    }
}
