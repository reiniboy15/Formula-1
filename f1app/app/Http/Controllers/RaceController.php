<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Race;
use App\Models\Driver;
use App\Models\RacePosition;
use Illuminate\Support\Facades\DB;

class RaceController extends Controller
{

    public function index()
    {
        
        $upcomingRaces = Race::where('status', 'scheduled')->get();
        return view('races.races', ['races' => $upcomingRaces]);
    }


    public function create()
    {
        return view('races.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'round_number' => 'required|string|max:50',
        ]);

        $race = new Race();
        $race->name = $request->name;
        $race->date = $request->date;
        $race->location = $request->location;
        $race->round_number = $request->round_number;


        $race->save();

        return redirect()->route('race.index');
    }

    public function showCompleted()
    {
        $completedRaces = Race::where('status', 'completed')->get();
    
        return view('races.completed', compact('completedRaces'));
    }

    public function markAsCompleted($race_id)
    {
        $race = Race::findOrFail($race_id);
        $race->status = 'completed';
        $race->save();
    
        return redirect()->route('races.completed');
    }

    public function completed()
    {
        $completedRaces = Race::where('status', 'completed')->get();
        return view('races.completed', ['completedRaces' => $completedRaces]);
    }

    public function enterPositions(Race $race)
    {
        
        $drivers = Driver::all();
        return view('races.enter_positions', ['race' => $race, 'drivers' => $drivers]);   
    }

    
//     public function enterPositions(Race $race)
// {

//     $race->load('drivers');

//     return view('enter_positions', ['race' => $race]);
// }

    // public function storePositions(Request $request)
    // {

    //     foreach ($request->all() as $key => $value) {
    //         if (strpos($key, 'driver_') === 0) {
    //             $driverId = substr($key, strlen('driver_'));

    //         }
    // }

    //     return redirect()->route('races.completed');
    // }


// public function storePositions($race_id)
// {
//     // Validate and store the positions in the database
//     $race = Race::findOrFail($race_id);
//     $race->status = 'finished';
//     $race->save();

//     return redirect()->route('races.finished');
// }
//############################################THIS WORKS########################################################
// public function storePositions(Request $request, Race $race)
// {
    
//     DB::beginTransaction();

//     foreach ($request->all() as $key => $value) {
//         if (strpos($key, 'driver_') === 0) {
//             $driverId = substr($key, strlen('driver_'));

//             RacePosition::create([
//                 'race_id' => $race->race_id,
//                 'driver_id' => $driverId,
//                 'position' => $value,
//             ]);
//         }
//     }

//     $race->status = 'finished';
//     $race->save();

//     DB::commit();

//     return redirect()->route('races.finished');
// }

public function storePositions(Request $request, Race $race)
{
    DB::beginTransaction();

    foreach ($request->all() as $key => $value) {
        if (strpos($key, 'driver_') === 0) {
            $driverId = substr($key, strlen('driver_'));

            RacePosition::create([
                'race_id' => $race->race_id,
                'driver_id' => $driverId,
                'position' => $value,
            ]);

            $driver = Driver::findOrFail($driverId);
            $points = $this->calculatePoints($value);
            $driver->total_points += $points;
            $driver->save();


            $team = $driver->team;
            $team->total_points += $points;
            $team->save();
        }
    }

    $race->status = 'finished';
    $race->save();


    DB::commit();

    return redirect()->route('races.finished');
}

private function calculatePoints($position)
{
    switch ($position) {
        case 1:
            return 25;
        case 2:
            return 18;
        case 3:
            return 15;
        case 4:
            return 12;
        case 5:
            return 10;
        case 6:
            return 8;
        case 7:
            return 6;
        case 8:
            return 4;
        case 9:
            return 2;
        case 10:
            return 1;
        default:
            return 0;
    }
}

//#################################################CODE ABOVE WORKS############################

    public function finished()
    {
        $finishedRaces = Race::where('status', 'finished')->get();
        return view('races.finished', ['finishedRaces' => $finishedRaces]);
    }

    public function finishedRaces()
{
    $finishedRaces = Race::where('status', 'finished')->get();
    return view('races.finished', ['finishedRaces' => $finishedRaces]);
}
//#####################################################################################################################
public function viewRace($raceId)
{
    $race = Race::findOrFail($raceId);

    $racePositions = RacePosition::with('driver')
        ->where('race_id', $raceId) 
        ->orderBy('position')
        ->get();

    return view('races.view', compact('race', 'racePositions'));
}
//####################################################################################################################
public function viewPositions(Race $race)
{
    $positions = $race->positions()->orderBy('position')->get();
    
    return view('races.positions', ['race' => $race, 'positions' => $positions]);
}




}
