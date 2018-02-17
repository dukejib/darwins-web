<?php

use Illuminate\Database\Seeder;
use App\WebBanner;

class WebBannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WebBanner::create([
            'title' => '468 x 60',
            'style' => 'Full Banner',
            'gif_weight' => '20KB',
            'flash_weight' => '30KB'
        ]);
        WebBanner::create([
            'title' => '728 x 90',
            'style' => 'Leaderboard',
            'gif_weight' => '25KB',
            'flash_weight' => '35KB'
        ]);
        WebBanner::create([
            'title' => '336 x 280',
            'style' => 'Square',
            'gif_weight' => '25KB',
            'flash_weight' => '35KB'
        ]);
        WebBanner::create([
            'title' => '300 x 250',
            'style' => 'Square',
            'gif_weight' => '25KB',
            'flash_weight' => '35KB'
        ]);
        WebBanner::create([
            'title' => '250 x 250',
            'style' => 'Square',
            'gif_weight' => '25KB',
            'flash_weight' => '35KB'
        ]);
        WebBanner::create([
            'title' => '160 x 600',
            'style' => 'Skyscraper',
            'gif_weight' => '20KB',
            'flash_weight' => '30KB'
        ]);
        WebBanner::create([
            'title' => '120 x 600',
            'style' => 'Skyscraper',
            'gif_weight' => '20KB',
            'flash_weight' => '30KB'
        ]);
        WebBanner::create([
            'title' => '120 x 240',
            'style' => 'Small Skyscraper',
            'gif_weight' => '20KB',
            'flash_weight' => '30KB'
        ]);
        WebBanner::create([
            'title' => '240 x 400',
            'style' => 'Fat Skyscraper',
            'gif_weight' => '25KB',
            'flash_weight' => '35KB'
        ]);
        WebBanner::create([
            'title' => '234 x 60',
            'style' => 'Half Banner',
            'gif_weight' => '15KB',
            'flash_weight' => '20KB'
        ]);
        WebBanner::create([
            'title' => '180 x 150',
            'style' => 'Rectangle',
            'gif_weight' => '15KB',
            'flash_weight' => '20KB'
        ]);
        WebBanner::create([
            'title' => '125 x 125',
            'style' => 'Square',
            'gif_weight' => '15KB',
            'flash_weight' => '20KB'
        ]);
        WebBanner::create([
            'title' => '120 x 90',
            'style' => 'Button',
            'gif_weight' => '10KB',
            'flash_weight' => '20KB'
        ]);
        WebBanner::create([
            'title' => '120 x 60',
            'style' => 'Button',
            'gif_weight' => '10KB',
            'flash_weight' => '20KB'
        ]);
        WebBanner::create([
            'title' => '88 x 31',
            'style' => 'Button',
            'gif_weight' => '10KB',
            'flash_weight' => '20KB'
        ]);
    }
}
