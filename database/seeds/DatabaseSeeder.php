<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(SettingTableSeeder::class);
        $this->call(GlobalCategoriesTableSeeder::class);
        $this->call(SubCategoriesTableSeeder::class);
        $this->call(LocalCategoriesTableSeeder::class);
        $this->call(CarouselTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(ServiceTableSeeder::class);
        $this->call(WebBannerTableSeeder::class);
    }

}

