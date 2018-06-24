<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Commands\Inspire::class,
        'App\Console\Commands\CheckUnusedAddress', //Use schdule to run it via crontab
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
         /** Send Email */
        
        // \Mail::raw('This is a Crontab Job', function ($message) {
        //     $message->to('dukejib@gmail.com', 'Ali Raja');
        //     $message->subject('Crontab Email');
        // });
        
        $schedule->command('address:check')->everyFiveMinutes();
        Log::info('All Unused address with time limit over 15 are reset');

    }
}
