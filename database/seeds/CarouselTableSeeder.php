<?php

use Illuminate\Database\Seeder;
use App\Carousel;

class CarouselTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Delete All Rows if exists */
        Carousel::truncate();
        
        Carousel::create([
            'heading' => 'Heading 1',
            'body' => 'Body of Heading 1',
            'image' => 'img/carousel/1.jpg'
        ]);

        Carousel::create([
            'heading' => 'Heading 2',
            'body' => 'Body of Heading 2',
            'image' => 'img/carousel/2.jpg'
        ]);

        Carousel::create([
            'heading' => 'Heading 3',
            'body' => 'Body of Heading 3',
            'image' => 'img/carousel/3.jpg'
        ]);

        Carousel::create([
            'heading' => 'Heading 4',
            'body' => 'Body of Heading 4',
            'image' => 'img/carousel/4.jpg'
        ]);

        Carousel::create([
            'heading' => 'Heading 5',
            'body' => 'Body of Heading 5',
            'image' => 'img/carousel/5.jpg'
        ]);

        Carousel::create([
            'heading' => 'Heading 6',
            'body' => 'Body of Heading 6',
            'image' => 'img/carousel/6.jpg'
        ]);

        Carousel::create([
            'heading' => 'Heading 7',
            'body' => 'Body of Heading 7',
            'image' => 'img/carousel/7.jpg'
        ]);

        Carousel::create([
            'heading' => 'Heading 8',
            'body' => 'Body of Heading 8',
            'image' => 'img/carousel/8.jpg'
        ]);

        $this->command->info('8 Carousel Images created.');
    }
}
