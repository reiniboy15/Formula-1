<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RacePositionController extends Controller
{
    public function enterPositions(Race $race) {
        return view('races.enter-positions', compact('race'));
    }
    //
}
