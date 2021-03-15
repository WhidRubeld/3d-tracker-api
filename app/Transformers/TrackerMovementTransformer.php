<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\TrackerMovement;

class TrackerMovementTransformer extends TransformerAbstract
{
    public function transform(TrackerMovement $movement): array
    {
        return [
            'latitude' => $movement->latitude,
            'longitude' => $movement->longitude,
            'altitude' => $movement->altitude,
            'bearing' => $movement->bearing,
            'speed' => $movement->speed,
            'battery' => $movement->battery,
            'generated_at' => $movement->generated_at,
            'created_at' => $movement->created_at->toDatetimeString(),
        ];
    }
}
