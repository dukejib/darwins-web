<?php

use Illuminate\Database\Seeder;
use App\GlobalCategory;

class GlobalCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Delete All Rows if exists */
        GlobalCategory::truncate();

        GlobalCategory::create(['title' => 'Products','slug' => str_slug('Products')]);
        GlobalCategory::create(['title' => 'Services','slug' => str_slug('Services')]);
        // GlobalCategory::create(['title' => 'Antique', 'slug' => str_slug('Antique')]);
        // GlobalCategory::create(['title' => 'Art', 'slug' => str_slug('Art'),'active'=> 0]);
        // GlobalCategory::create(['title' => 'Automotive', 'slug' => str_slug('Automotive')]);
        // GlobalCategory::create(['title' => 'Beauty & Frangrances', 'slug' => str_slug('Beauty & Frangrances'),'active'=> 0]);
        // GlobalCategory::create(['title' => 'Books & Magazines', 'slug' => str_slug('Books & Magazines')]);
        // GlobalCategory::create(['title' => 'Business & Industrial', 'slug' => str_slug('Business & Industrial')]);
        // GlobalCategory::create(['title' => 'Camera & Photo', 'slug' => str_slug('Camera & Photo')]);
        // GlobalCategory::create(['title' => 'Cell Phones, PDAs & Accesories', 'slug' => str_slug('Cell Phones, PDAs & Accesories')]);
        // GlobalCategory::create(['title' => 'Clothing & Shoes', 'slug' => str_slug('Clothing & Shoes'),'active'=> 0]);
        // GlobalCategory::create(['title' => 'Collectibles', 'slug' => str_slug('Collectibles')]);
        // GlobalCategory::create(['title' => 'Computers & Networking', 'slug' => str_slug('Computers & Networking')]);
        // GlobalCategory::create(['title' => 'Crafts', 'slug' => str_slug('Crafts')]);
        // GlobalCategory::create(['title' => 'Electronics', 'slug' => str_slug('Electronics'),'active'=> 0]);
        // GlobalCategory::create(['title' => 'Entertainment Memorabilia', 'slug' => str_slug('Entertainment Memorabilia')]);
        // GlobalCategory::create(['title' => 'Flowers & Gifts', 'slug' => str_slug('Flowers & Gifts')]);
        // GlobalCategory::create(['title' => 'Glass & Pottery', 'slug' => str_slug('Glass & Pottery'),'active'=> 0]);
        // GlobalCategory::create(['title' => 'Health & Personal Care', 'slug' => str_slug('Health & Personal Care')]);
        // GlobalCategory::create(['title' => 'Home & Garden', 'slug' => str_slug('Home & Garden')]);
        // GlobalCategory::create(['title' => 'Jewelry & Watches', 'slug' => str_slug('Jewelry & Watches')]);
        // GlobalCategory::create(['title' => 'Miscellaneous', 'slug' => str_slug('Miscellaneous'),'active'=> 0]);
        // GlobalCategory::create(['title' => 'Movies & DVDs', 'slug' => str_slug('Movies & DVDs')]);
        // GlobalCategory::create(['title' => 'Music', 'slug' => str_slug('Music')]);
        // GlobalCategory::create(['title' => 'Office Supplies', 'slug' => str_slug('Office Supplies'),'active'=> 0]);
        // GlobalCategory::create(['title' => 'Real Estate', 'slug' => str_slug('Real Estate')]);
        // GlobalCategory::create(['title' => 'Services', 'slug' => str_slug('Services')]);
        // GlobalCategory::create(['title' => 'Sex Stuff', 'slug' => str_slug('Sex Stuff')]);
        // GlobalCategory::create(['title' => 'Sports & Outdoors', 'slug' => str_slug('Sports & Outdoors')]);
        // GlobalCategory::create(['title' => 'Sports Memorabilia', 'slug' => str_slug('Sports Memorabilia')]);
        // GlobalCategory::create(['title' => 'Tools & Hardwares', 'slug' => str_slug('Tools & Hardwares')]);
        // GlobalCategory::create(['title' => 'Toys, Games & Hobbies', 'slug' => str_slug('Toys, Games & Hobbies')]);
        // GlobalCategory::create(['title' => 'Video Games', 'slug' => str_slug('Video Games')]);

        $this->command->info('Global Categories Seeded');
    }
}
