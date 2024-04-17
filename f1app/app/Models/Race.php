<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $primaryKey = 'race_id';

    public function racePositions()
    {
        return $this->hasMany(RacePosition::class);
    }
}
