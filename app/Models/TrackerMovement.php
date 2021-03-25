<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

use App\Events\TrackerGeolocationAdded;

class TrackerMovement extends Model
{
    use HasFactory;

    protected $table = 'tracker_movements';

    protected $dispatchesEvents = [
        'created' => TrackerGeolocationAdded::class,
    ];

    protected $fillable = [
        'tracker_id', 'latitude', 'longitude', 'altitude',
        'battery', 'bearing', 'speed', 'generated_at'
    ];

    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
        'altitude' => 'float',
        'battery' => 'int',
        'bearing' => 'float',
        'speed' => 'float',
    ];

    protected $dateFormat = 'Y-m-d H:i:s';

    public function tracker(): HasOne
    {
        return $this->hasOne(Tracker::class, 'id', 'tracker_id');
    }
}
