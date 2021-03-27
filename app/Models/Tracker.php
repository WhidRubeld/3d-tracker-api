<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tracker extends Model
{
    use HasFactory;

    protected $table = 'trackers';

    protected $fillable = ['color_hex'];

    public $timestamps = false;

    public function movements(): HasMany
    {
        return $this->hasMany(TrackerMovement::class, 'tracker_id', 'id')->orderBy('generated_at', 'desc');
    }
}
