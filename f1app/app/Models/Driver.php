<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = ['driver_id','name', 'surname', 'nationality', 'date_of_birth', 'team_id', 'total_points', 'profile_picture'];
    protected $primaryKey = 'driver_id';
    public $timestamps = false;

    // Define the relationship with the Team model
    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function racePositions()
    {
        return $this->hasMany(RacePosition::class, 'driver_id');
    }

    public function driver()
{
    return $this->hasManyThrough(Driver::class, RacePosition::class);
}

}
