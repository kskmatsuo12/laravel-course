<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
 
    protected $commands = [
        Commands\SendMail::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        //hourlyは１時間ごと
        // $schedule->command('send:mail')->hourly();
        //everiminutesは１分ごと
        $schedule->command('send:mail')->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
