<?php

namespace App\Transformers\Live;

use League\Fractal\TransformerAbstract;
use App\Models\Flag;

class FlagLiveTransformer extends TransformerAbstract
{
    public function transform(Flag $flag): array
    {
        return [
            'id' => $flag->id,
            'race_id' => $flag->race_id,
            'tracker' => fractal($flag->tracker, new TrackerLiveTransformer()),
            'label' => $flag->label,
            'type' => $flag->type,
            'role' => $flag->role,
        ];
    }
}
