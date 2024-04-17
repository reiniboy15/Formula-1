<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('teams.index', ['teams' => $teams]);
    }

    public function sortedByPoints()
{
    $teams = Team::orderBy('total_points', 'desc')->get();
    return view('teams.sorted_by_points', ['teams' => $teams]);
}

}
