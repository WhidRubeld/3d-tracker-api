<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\Channel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use App\Models\TrackerMovement;
use App\Models\Racer;
use App\Models\Flag;
use App\Transformers\TrackerMovementTransformer;
use Spatie\Fractal\Fractal;

class TrackerGeolocationAdded
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $race;
    public $racer;
    public $flag;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(TrackerMovement $movement)
    {
        $this->movement = $movement;

        $racer = Racer::where('tracker_id', (int) $movement->tracker_id)->first();

        if (!empty($racer)) {
            $this->racer = $racer;
            $this->race = $racer->race;
        } else {
            $flag = Flag::where('tracker_id', (int) $movement->tracker_id)->first();
            if (!empty($flag)) {
                $this->flag = $flag;
                $this->race = $flag->race;
            }
        }
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        if (!empty($this->race)) {
            return new Channel('race.' . $this->race->id);
        }
        return [];
    }

    public function broadcastAs()
    {
        return 'locate';
    }

    public function broadcastWith(): Fractal
    {
        return fractal($this->movement, new TrackerMovementTransformer());
    }
}
