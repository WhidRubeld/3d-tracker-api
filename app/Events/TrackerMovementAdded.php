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

class TrackerMovementAdded
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $race;
    public $movement;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(TrackerMovement $movement)
    {
        $this->movement = $movement;

        $racer = Racer::where('tracker_id', $movement->tracker_id)->first();
        if (!empty($racer)) {
            $this->race = $racer->race;
        } else {
            $flag = Flag::where('tracker_id', $movement->tracker_id)->first();
            $this->race = $flag->race;
        }
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('race.' . $this->race->id);
    }

    public function broadcastAs()
    {
        return 'new-position';
    }

    public function broadcastWhen()
    {
        if ($this->movement->tracker->last_movement->id === $this->movement->id) {
            return true;
        }

        return false;
    }

    public function broadcastWith(): Fractal
    {
        return fractal($this->movement, new TrackerMovementTransformer());
    }
}
