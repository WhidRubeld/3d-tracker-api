<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\Channel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Queue\SerializesModels;

use App\Models\TrackerMovement;
use App\Models\Racer;
use App\Models\Flag;
use App\Transformers\TrackerMovementTransformer;

class TrackerMovementAdded implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $race;

    public $type;
    public $id;
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
            $this->type = 'racer';
            $this->id = $racer->id;
        } else {
            $flag = Flag::where('tracker_id', $movement->tracker_id)->first();
            $this->race = $flag->race;
            $this->type = 'flag';
            $this->id = $flag->id;
        }
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn(): String
    {
        return new Channel('race.' . $this->race->id);
    }

    public function broadcastAs(): String
    {
        return 'new-position';
    }

    public function broadcastWhen(): Bool
    {
        $last_movement = $this->movement->tracker->movements()->first();
        if ($last_movement->id === $this->movement->id) {
            return true;
        }

        return false;
    }

    public function broadcastWith(): array
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'movement' => fractal($this->movement, new TrackerMovementTransformer()),
        ];
    }
}
