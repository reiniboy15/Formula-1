<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\RaceController;
use App\Http\Controllers\DriverController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
Route::get('/drivers', [DriverController::class, 'index'])->name('drivers.index');

Route::get('/races', [RaceController::class, 'index'])->name('race.index');

Route::get('/races/create', [RaceController::class, 'create'])->name('races.create');

Route::post('/races', [RaceController::class, 'store'])->name('races.store');

// Route::get('/completed', [RaceController::class, 'completed'])->name('races.completed');
// Route::get('races/completed', 'RaceController@showCompleted')->name('races.completed');
// Route::get('races/{race}/positions', 'RacePositionController@enterPositions')->name('races.positions.enter');

Route::put('races/{race}/complete', [RaceController::class, 'markAsCompleted'])->name('races.complete');

Route::get('/races/completed', [RaceController::class, 'completed'])->name('races.completed');

// Route::get('/races/{race}/enter-positions', [RaceController::class, 'enterPositions'])->name('enter.positions');
// Route::get('/enter-positions', [RaceController::class, 'enterPositions'])->name('enter.positions');


Route::get('/races/{race}/enter-positions', [RaceController::class, 'enterPositions'])->name('races.enterPositions');

// Route::post('/races/{race}/store-positions', [RaceController::class, 'storePositions'])->name('races.storePositions');

Route::post('/races/{race}/store-positions', [RaceController::class, 'storePositions'])->name('races.storePositions');


// Route::get('/races/finished', [RaceController::class, 'finished'])->name('races.finished');

// Route::get('/races/finished', [RaceController::class, 'viewFinishedRaces'])->name('races.finished');
Route::get('/races/finished', [RaceController::class, 'finishedRaces'])->name('races.finished');

 Route::get('/races/{race}/view', [RaceController::class, 'viewRace'])->name('races.view');
//Route::get('/races/{raceId}', [RaceController::class, 'viewRace'])->name('race.view');
// routes/web.php
//Route::get('/races/{raceId}', [RaceController::class, 'viewRace'])->name('races.view');


Route::get('/races/{race}/positions', [RaceController::class, 'viewPositions'])->name('races.showPositions');

Route::get('/drivers/sorted-by-points', [DriverController::class, 'sortedByPoints'])->name('drivers.sortedByPoints');

Route::get('/teams/sorted-by-points', [TeamController::class, 'sortedByPoints'])->name('teams.sortedByPoints');






