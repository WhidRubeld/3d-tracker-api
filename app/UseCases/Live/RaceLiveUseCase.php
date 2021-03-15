<?php

namespace App\UseCases\Live;

use App\Models\Race;
use App\Http\Requests\RaceLiveRequest;

class RaceLiveUseCase
{
    public function __invoke(Race $race, RaceLiveRequest $request): ?Race
    {
        if (!empty($seconds = $request->input('seconds'))) {
            $requestedLiveDatetime = date('Y-m-d H:i:s', strtotime($race->started_at) + $seconds);

            foreach ($race->tracked_objects as $trackedObject) {
                $trackedObject->tracker->requested_live_datetime = $requestedLiveDatetime;
            }
        }

        return $race;
    }
}
