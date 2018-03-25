<?php

use Illuminate\Database\Seeder;
use App\LocalCategory;
use App\Http\Controllers\LocalCategoriesController;

class LocalCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Delete All Rows if exists */
        LocalCategory::truncate();

        // 1- Rentals , 2 -Credit Cards , 3 -Money Grams
        LocalCategory::create(['title' => 'Appartments', 'slug' => str_slug('Appartments'),'sub_category_id' => 1 ]);
        LocalCategory::create(['title' => 'Super Cards', 'slug' => str_slug('Super Cards'),'sub_category_id' => 2 ]);
        LocalCategory::create(['title' => 'Fantasy', 'slug' => str_slug('Fantasy'),'sub_category_id' => 3 ]);
        $this->command->info('Local Categories Seeded');
    }
}
