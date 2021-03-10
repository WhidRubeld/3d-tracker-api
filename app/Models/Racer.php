<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Racer extends Model
{
    use HasFactory;

    protected $table = 'racers';

    protected $fillable = ['race_id', 'tracker_id', 'name'];

    public $timestamps = false;

    public function race(): HasOne
    {
        return $this->hasOne(Race::class, 'id', 'race_id');
    }

    public function tracker(): HasOne
    {
        return $this->hasOne(Tracker::class, 'id', 'tracker_id');
    }
}
