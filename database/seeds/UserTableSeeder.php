<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profile;
use App\Helper\Helper;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Delete All Rows if exists */
        User::truncate();
        /** Create New User */
        $admin = User::create([
            'first_name' => 'Main',
            'last_name' => 'Admin',
            'email' => 'admin@morecreditcardservices.com',
            'password' => bcrypt('_mccs2018_'),
            'role' => 99,    //Administrator
            'affiliate_id' => 1,
            'referred_by' => 0
        ]);
        $this->command->info('Admin Created');
        Profile::create([
            'user_id' => $admin->id,
        ]);
        $this->command->info('Admin Profile Created');

        /** Create New User */
        $user1 = User::create([
            'first_name' => 'Normal',
            'last_name' => 'Norman',
            'email' => 'normal@morecreditcardservices.com',
            'password' => bcrypt('_mccs2018_'),
            'role' => 1, //Customer
            'affiliate_id' => Helper::getUniqueAffiliateId(),
            'referred_by' => 1 //By Admin
        ]);
        $this->command->info('Normal User Created');
        Profile::create([
            'user_id' => $user1->id,
        ]);
        $this->command->info('Normal Profile Created');

        /** Create New User */
        $user2 = User::create([
            'first_name' => 'Normal2',
            'last_name' => 'Norman2',
            'email' => 'normal2@morecreditcardservices.com',
            'password' => bcrypt('_mccs2018_'),
            'role' => 1, //Customer
            'affiliate_id' => Helper::getUniqueAffiliateId(),
            'referred_by' => 1 //By Admin
        ]);
        $this->command->info('Normal2 User Created');
        Profile::create([
            'user_id' => $user2->id,
        ]);
        $this->command->info('Normal2 Profile Created');

            /** Create New User */
        $user3 = User::create([
            'first_name' => 'Normal3',
            'last_name' => 'Norman3',
            'email' => 'normal3@morecreditcardservices.com',
            'password' => bcrypt('_mccs2018_'),
            'role' => 1, //Customer
            'affiliate_id' => Helper::getUniqueAffiliateId(),
            'referred_by' => 2 //By Admin
        ]);
        $this->command->info('Normal3 User Created');
        Profile::create([
            'user_id' => $user3->id,
        ]);
        $this->command->info('Normal3 Profile Created');
        
        /** Create New User */
        $user4 = User::create([
            'first_name' => 'Normal4',
            'last_name' => 'Norman4',
            'email' => 'normal4@morecreditcardservices.com',
            'password' => bcrypt('_mccs2018_'),
            'role' => 1, //Customer
            'affiliate_id' => Helper::getUniqueAffiliateId(),
            'referred_by' => 1 //By Admin
        ]);
        $this->command->info('Normal2 User Created');
        Profile::create([
            'user_id' => $user4->id,
        ]);
        $this->command->info('Normal2 Profile Created');
    }
}
