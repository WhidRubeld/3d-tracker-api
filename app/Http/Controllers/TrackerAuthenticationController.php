<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Hash;
use App\Models\Flag;
use App\Models\Racer;
use App\Models\Tracker;
use App\Http\Requests\TrackerAuthenticationRequest;
use App\Transformers\Live\FlagLiveTransformer;
use App\Transformers\Live\RacerLiveTransformer;
use App\Transformers\RaceTransformer;

class TrackerAuthenticationController extends Controller
{
    public function __invoke(
        Tracker $tracker,
        TrackerAuthenticationRequest $request
    ): array {
        if (!Hash::check($request->input('password'), $tracker->password)) {
            throw new AuthenticationException('Wrong credentials provided.');
        }

        // TODO: REFACTOR THE FOLLOWING CODE LINES

        if (!empty($racer = Racer::where('tracker_id', $tracker->id)->first())) {
            $type = 'racer';
            $model = fractal($racer, new RacerLiveTransformer());
        }

        if (!empty($flag = Flag::where('tracker_id', $tracker->id)->first())) {
            $type = 'flag';
            $model = fractal($flag, new FlagLiveTransformer());
        }

        return [
            'race' => isset($model->race) ? new RaceTransformer() : null,
            'type' => $type ?? null,
            'model' => $model ?? null,
        ];
    }
}
