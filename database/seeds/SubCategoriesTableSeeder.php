<?php

use Illuminate\Database\Seeder;
use App\SubCategory;

class SubCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubCategory::create(['title' => 'Rentals', 'slug' => str_slug('Rentals'),'global_category_id' => 2 ]);
        SubCategory::create(['title' => 'Credit Cards', 'slug' => str_slug('Credit Cards'),'global_category_id' => 2 ]);
        SubCategory::create(['title' => 'Books', 'slug' => str_slug('Books'),'global_category_id' => 1 ]);
       
        // SubCategory::create(['title' => 'Rentals', 'slug' => str_slug('Rentals'),'global_category_id' => 25 ]);
        // SubCategory::create(['title' => 'Credit Cards', 'slug' => str_slug('Credit Cards'),'global_category_id' => 25 ]);
        // SubCategory::create(['title' => 'Postal Money', 'slug' => str_slug('Postal Money'),'global_category_id' => 25 ]);

        // SubCategory::create(['title' => 'Architectural & Garden', 'slug' => str_slug('Architectural & Garden'),'global_category_id' => 1 ]);
        // SubCategory::create(['title' => 'Asian Antiques', 'slug' => str_slug('Asian Antiques'),'global_category_id' => 1 ]);
        // SubCategory::create(['title' => 'Books & Manuscripts', 'slug' => str_slug('Books & Manuscripts'),'global_category_id' => 1 ]);
        // SubCategory::create(['title' => 'Decorative', 'slug' => str_slug('Decorative'),'global_category_id' => 1 ]);
 
        // SubCategory::create(['title' => 'Motorcycles', 'slug' => str_slug('Motorcycles'),'global_category_id' => 3 ]);
        // SubCategory::create(['title' => 'Cars & SUVs', 'slug' => str_slug('Cars & SUVs'),'global_category_id' => 3 ]);
        // SubCategory::create(['title' => 'Tires', 'slug' => str_slug('Tires'),'global_category_id' => 3 ]);
        // SubCategory::create(['title' => 'Trucks & Vans', 'slug' => str_slug('Trucks & Vans'),'global_category_id' => 3 ]);    

        // SubCategory::create(['title' => 'Antiquarian & Collectables', 'slug' => str_slug('Antiquarian & Collectables'),'global_category_id' => 5 ]);  
        // SubCategory::create(['title' => 'Audio Books', 'slug' => str_slug('Audio Books'),'global_category_id' => 5 ]);
        // SubCategory::create(['title' => 'Childrens Books', 'slug' => str_slug('Childrens Books'),'global_category_id' => 5 ]);
        // SubCategory::create(['title' => 'Ficition', 'slug' => str_slug('Ficition'),'global_category_id' => 5 ]);

        // SubCategory::create(['title' => 'Construction', 'slug' => str_slug('Construction'),'global_category_id' => 6 ]);
        // SubCategory::create(['title' => 'Lab & Science', 'slug' => str_slug('Lab & Science'),'global_category_id' => 6 ]);
        // SubCategory::create(['title' => 'Medical & Dental', 'slug' => str_slug('Medical & Dental'),'global_category_id' => 6 ]);
        // SubCategory::create(['title' => 'Food Service & Retail', 'slug' => str_slug('Food Service & Retail'),'global_category_id' => 6 ]);

        // SubCategory::create(['title' => 'Camcorder Accesories', 'slug' => str_slug('Camcorder Accesories'),'global_category_id' => 7 ]);
        // SubCategory::create(['title' => 'Digital Cameras Accessories', 'slug' => str_slug('Digital Cameras Accessories'),'global_category_id' => 7 ]);
        // SubCategory::create(['title' => 'Flashes', 'slug' => str_slug('Flashes'),'global_category_id' => 7 ]);
        // SubCategory::create(['title' => 'Parts & Repairs', 'slug' => str_slug('Parts & Repairs'),'global_category_id' => 7 ]);

        // SubCategory::create(['title' => 'Batteries', 'slug' => str_slug('Batteries'),'global_category_id' => 8 ]);
        // SubCategory::create(['title' => 'Bluetooth Accessories', 'slug' => str_slug('Bluetooth Accessories'),'global_category_id' => 8 ]);
        // SubCategory::create(['title' => 'PDA Accessories', 'slug' => str_slug('PDA Accessories'),'global_category_id' => 8 ]);
        // SubCategory::create(['title' => 'Cables & Adapters', 'slug' => str_slug('Cables & Adapters'),'global_category_id' => 8 ]);

        // SubCategory::create(['title' => 'Advertising', 'slug' => str_slug('Advertising'),'global_category_id' => 10 ]);
        // SubCategory::create(['title' => 'Food & Beverage', 'slug' => str_slug('Food & Beverage'),'global_category_id' => 10 ]);
        // SubCategory::create(['title' => 'Arcahde , Jukeboxes & Pinball', 'slug' => str_slug('Arcahde , Jukeboxes & Pinball'),'global_category_id' => 10 ]);
        // SubCategory::create(['title' => 'Bottles, Jars, Jugs & Caps', 'slug' => str_slug('Bottles, Jars, Jugs & Caps'),'global_category_id' => 10 ]);

        // SubCategory::create(['title' => 'Blank Media', 'slug' => str_slug('Blank Media'),'global_category_id' => 11 ]);
        // SubCategory::create(['title' => 'Cable & Connectors', 'slug' => str_slug('Cable & Connectors'),'global_category_id' => 11 ]);
        // SubCategory::create(['title' => 'IPad , Tablet & eReaders', 'slug' => str_slug('IPad , Tablet & eReaders'),'global_category_id' => 11 ]);
        // SubCategory::create(['title' => 'Notebook Batteries', 'slug' => str_slug('Notebook Batteries'),'global_category_id' => 11 ]);

        // SubCategory::create(['title' => 'Art & Carft Supplies', 'slug' => str_slug('Art & Carft Supplies'),'global_category_id' => 12 ]);
        // SubCategory::create(['title' => 'Bead Art', 'slug' => str_slug('Bead Art'),'global_category_id' => 12 ]);
        // SubCategory::create(['title' => 'Candle & Soap Making', 'slug' => str_slug('Candle & Soap Making'),'global_category_id' => 12 ]);
        // SubCategory::create(['title' => 'Kids Crafts', 'slug' => str_slug('Kids Crafts'),'global_category_id' => 12 ]);

        // SubCategory::create(['title' => 'Autographs Original', 'slug' => str_slug('Autographs-Original'),'global_category_id' => 14 ]);
        // SubCategory::create(['title' => 'Autographs Reprints', 'slug' => str_slug('Autographs Reprints'),'global_category_id' => 14 ]);
        // SubCategory::create(['title' => 'Movies', 'slug' => str_slug('Movies'),'global_category_id' => 14 ]);
        // SubCategory::create(['title' => 'Photos', 'slug' => str_slug('Photos'),'global_category_id' => 14 ]);

        // SubCategory::create(['title' => 'Chocolate', 'slug' => str_slug('Chocolate'),'global_category_id' => 15 ]);
        // SubCategory::create(['title' => 'Gift Baskets', 'slug' => str_slug('Gift Baskets'),'global_category_id' => 15 ]);
        // SubCategory::create(['title' => 'Gits By Occasion', 'slug' => str_slug('Gits By Occasion'),'global_category_id' => 15 ]);
        // SubCategory::create(['title' => 'Wedding Supplies', 'slug' => str_slug('Wedding Supplies'),'global_category_id' => 15 ]);

        $this->command->info('Sub Categories Seeded');
    }
}
