<?php

use Illuminate\Database\Seeder;
use App\Testimonial;

class TestimonyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Testimonial::truncate();

        Testimonial::create([
            'username' => 'Jim Fletcher',
            'email' => 'jfletcher@yahoo.com',
            'rating' => 4,
            'testimony' => 'In my opinion, you guys are doing a great work. Keep it up.I am ready to ask my friends and family to come up to this website and signup. This is the best thing which i have done and my business is booming.',
            'approved' => true
        ]);

        Testimonial::create([
            'username' => 'Boris Makahalovich',
            'email' => 'boris_mak_lith@gmail.com',
            'rating' => 5,
            'testimony' => 'Lorem Ipsum Doresm Lorem Ipsum Doresm Lorem Ipsum Doresm Lorem Ipsum Doresm Lorem Ipsum Doresm Lorem Ipsum Doresm Lorem Ipsum Doresm Lorem Ipsum Doresm Lorem Ipsum Doresm Lorem Ipsum Doresm Lorem Ipsum Doresm',
            'approved' => true
        ]);

        Testimonial::create([
            'username' => 'Brian Straits',
            'email' => 'brastrat@protonmail.com',
            'rating' => 3,
            'testimony' => 'Lorem Ipsum Doresm Lorem Ipsum Doresm Lorem Ipsum Doresm Lorem Ipsum Doresm Lorem Ipsum Doresm Lorem Ipsum Doresm Lorem Ipsum Doresm Lorem Ipsum Doresm Lorem Ipsum Doresm Lorem Ipsum Doresm Lorem Ipsum Doresm',
            'approved' => true
        ]);

    }
}
