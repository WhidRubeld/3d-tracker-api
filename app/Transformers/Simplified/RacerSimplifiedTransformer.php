<?php

namespace App\Transformers\Simplified;

use League\Fractal\TransformerAbstract;
use App\Models\Racer;

class RacerSimplifiedTransformer extends TransformerAbstract
{
    public function transform(Racer $racer): array
    {
        return [
            'id' => $racer->id,
            'name' => $racer->name,
        ];
    }
}
