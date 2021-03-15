<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrackerMovement;
use App\Models\Tracker;
use App\Transformers\Live\TrackerLiveTransformer;
use Spatie\Fractal\Fractal;
use Carbon\Carbon;

class TraccarAppController
{
    public function __invoke(Tracker $tracker, Request $request): Fractal
    {
        $tracker = Tracker::where('id', (int) $request->input('id'))->first();

        if (empty($tracker)) {
            return response()->json(['error' => 'Tracker not found'], 404);
        }

        TrackerMovement::create([
            'tracker_id' => $tracker->id,
            'latitude' => (float) $request->input('lat'),
            'longitude' => (float) $request->input('lon'),
            'altitude' => (float) $request->input('altitude'),
            'battery' => (int) $request->input('batt'),
            'bearing' => (float) $request->input('bearing'),
            'speed' => (float) $request->input('speed'),
            'generated_at' => Carbon::createFromTimestamp((string) $request->input('timestamp'))->format('Y-m-d H:i:s'),

        ]);

        return fractal($tracker->refresh(), new TrackerLiveTransformer());
    }
}
