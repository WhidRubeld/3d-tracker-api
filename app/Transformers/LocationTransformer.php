<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Location;

class LocationTransformer extends TransformerAbstract
{
    public function transform(Location $location): array
    {
        return [
            'id' => $location->id,
            'name' => $location->name,
            'latitude' => $location->latitude,
            'longitude' => $location->longitude,
            'zoom_index' => $location->zoom_index,
        ];
    }
}
