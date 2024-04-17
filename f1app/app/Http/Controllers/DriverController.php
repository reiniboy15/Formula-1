<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::all();
        return view('drivers.drivers', ['drivers' => $drivers]);
    }

    public function sortedByPoints()
{
    $drivers = Driver::orderBy('total_points', 'desc')->get();
    return view('drivers.sorted_by_points', ['drivers' => $drivers]);
}

}
