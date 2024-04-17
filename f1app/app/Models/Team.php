<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public $timestamps = false;
    
    protected $primaryKey = 'team_id';
    public function drivers()
    {
        return $this->hasMany(Driver::class, 'team_id');
    }
}
