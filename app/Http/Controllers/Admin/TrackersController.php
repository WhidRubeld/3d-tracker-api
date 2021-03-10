<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Transformers\SuccessTransformer;
use Illuminate\Support\Facades\Hash;
use App\Models\Tracker;
use App\Http\Requests\CreateTrackerRequest;
use App\Http\Requests\UpdateTrackerRequest;
use App\Transformers\TrackerTransformer;
use Spatie\Fractal\Fractal;

class TrackersController extends Controller
{
    public function index(): Fractal
    {
        return fractal(Tracker::all(), new TrackerTransformer());
    }

    public function store(CreateTrackerRequest $request): Fractal
    {
        $trackerInfo = $request->except(['password']);
        $trackerInfo['password'] = Hash::make($request->input('password'));

        return fractal(Tracker::create($trackerInfo), new TrackerTransformer());
    }

    public function show(Tracker $tracker): Fractal
    {
        return fractal($tracker, new TrackerTransformer());
    }

    public function update(Tracker $tracker, UpdateTrackerRequest $request): Fractal
    {
        $trackerInfo = $request->except(['password']);
        $trackerInfo['password'] = Hash::make($request->input('password'));
        $tracker->update($trackerInfo);

        return fractal($tracker, new TrackerTransformer());
    }

    public function destroy(Tracker $tracker): Fractal
    {
        return fractal($tracker->delete(), new SuccessTransformer());
    }
}
