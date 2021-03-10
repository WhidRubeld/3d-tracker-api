<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Collection;

class Race extends Model
{
    use HasFactory;

    protected $table = 'races';

    protected $fillable = [
        'location_id', 'title', 'started_at', 'duration'
    ];

    public $timestamps = false;

    public function location(): HasOne
    {
        return $this->hasOne(Location::class, 'id', 'location_id');
    }

    public function racers(): HasMany
    {
        return $this->hasMany(Racer::class, 'race_id', 'id');
    }

    public function flags(): HasMany
    {
        return $this->hasMany(Flag::class, 'race_id', 'id');
    }

    public function getTrackedObjectsAttribute(): Collection
    {
        return (new Collection())
            ->merge($this->racers)
            ->merge($this->flags);
    }
}
