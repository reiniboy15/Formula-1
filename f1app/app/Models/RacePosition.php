<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RacePosition extends Model
{
    protected $fillable = ['position', 'driver_id', 'race_id'];
 

    public function race()
    {
        return $this->belongsTo(Race::class);
    }

    public function driver()
{
    return $this->belongsTo(Driver::class, 'driver_id');
}

}
