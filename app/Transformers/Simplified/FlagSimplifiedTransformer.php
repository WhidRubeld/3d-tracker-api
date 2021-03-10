<?php

namespace App\Transformers\Simplified;

use League\Fractal\TransformerAbstract;
use App\Models\Flag;

class FlagSimplifiedTransformer extends TransformerAbstract
{
    public function transform(Flag $flag): array
    {
        return [
            'id' => $flag->id,
            'label' => $flag->label,
            'type' => $flag->type,
            'role' => $flag->role,
        ];
    }
}
