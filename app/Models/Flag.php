<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Flag extends Model
{
    use HasFactory;

    public const STAFF_ROLE = 'staff';
    public const REFEREE_ROLE = 'referee';

    public const ROLES = [
        self::STAFF_ROLE,
        self::REFEREE_ROLE,
    ];

    public const START_TYPE = 'start';
    public const FINISH_TYPE = 'finish';
    public const LOOP_TYPE = 'loop';

    public const TYPES = [
        self::START_TYPE,
        self::FINISH_TYPE,
        self::LOOP_TYPE,
    ];

    protected $table = 'flags';

    protected $fillable = [
        'race_id', 'tracker_id', 'label', 'role', 'type',
    ];

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
