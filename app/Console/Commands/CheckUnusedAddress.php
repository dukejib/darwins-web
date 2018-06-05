<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\UnusedAddress;
use Carbon\Carbon;

class CheckUnusedAddress extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'address:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'After every 5 minutes, this command checks to see if we have an bitcoin address, which is over the 15 minutes time limit using updated_at time mark and makes it unused if any';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //Ensure carbon is using the exact time as our
        date_default_timezone_set('Asia/Karachi');
        $u = UnusedAddress::all();
        // $address_over_15_minutes = [];
        $time = Carbon::now();
        // array_push($address_over_15_minutes,$time);
        foreach ($u as $i){
            
            $f = $i->updated_at;
            $d = $time->diffInMinutes($f);
            if($d >= 15){
                $i->in_use = 0;
                $i->order_id = 0;
                $i->save();
            }   
        }
        echo 'All unused addresses with time limit over 15 are reset';
    }
}
