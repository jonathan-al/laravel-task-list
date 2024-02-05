<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Task;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('app:delete-task')->hourly();
        // $schedule->job(new DeleteTaskJob)->everyMinute();
        // $schedule->command('app:delete-task')->everyMinute();

        /* $schedule->call(function(){
            info("delete every minute");
            // Task::orderBy('id', 'desc')->first()->delete();
        })->everyMinute(); */

        $schedule->command('app:delete-task')->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
