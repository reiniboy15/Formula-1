<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MarkRacesAsCompleted extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:mark-races-as-completed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = now()->toDateString();

        // Find races where the date has passed and status is still 'scheduled'
        $racesToUpdate = Race::where('date', '<', $today)
                             ->where('status', 'scheduled')
                             ->get();

        // Update status to 'completed' for each race
        foreach ($racesToUpdate as $race) {
            $race->update(['status' => 'completed']);

            // Optionally, move completed races to the completed_races table
            // $race->moveToCompletedRaces();
        }

        $this->info(count($racesToUpdate) . ' races marked as completed.');
    }
}
