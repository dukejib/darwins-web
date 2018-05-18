<?php

use Illuminate\Database\Seeder;
use App\Item;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Delete All Rows if exists */
        Item::truncate();

        $img = '/img/products/img_place_holder_product.png';
        $feat = 'Featured';
        $pop = 'Popular';
        $lat = 'Latest';
        $desc = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nulla felis, pellentesque ac neque congue, varius efficitur est. Donec a tortor ut mauris consectetur convallis at vitae ipsum. Sed aliquet ligula dolor, a bibendum nisl ornare ac. Suspendisse non justo eget orci eleifend iaculis non vitae ligula. Etiam ultrices placerat urna, sed iaculis ex pulvinar non. Aliquam in augue metus. Sed finibus arcu et nulla auctor, vitae tincidunt nisi malesuada. Nullam quis massa in purus blandit elementum lacinia et quam. Proin tempus mattis diam. Proin lacinia aliquam risus eget viverra. Maecenas pharetra urna vel finibus pretium.
        
        Aenean quis aliquet elit. Nulla rhoncus, ligula vel aliquam porta, lectus augue euismod risus, et posuere odio nulla eu purus. Nam nisl est, vestibulum id sagittis non, bibendum sed orci. Sed a commodo nisi. Nam ut justo eu mi efficitur hendrerit. Curabitur nec ligula erat. Nulla sed dictum tellus. Aliquam erat volutpat. Sed malesuada magna eu elementum feugiat. Pellentesque pulvinar diam et dolor egestas aliquet. Proin in iaculis erat, non viverra mauris. Morbi nec efficitur dui. Aliquam eget leo vel nisl commodo aliquet a rhoncus orci. In ac libero non tortor viverra sagittis. Quisque odio orci, scelerisque eget viverra eget, pretium venenatis sapien.
        
        Aenean finibus vel libero ut mollis. In interdum viverra dignissim. Fusce ullamcorper maximus urna nec consectetur. Vestibulum rutrum dui a tempus posuere. Pellentesque finibus id sapien vehicula auctor. Duis fermentum pulvinar enim, sed tincidunt quam ultrices non. Nam vitae venenatis nisl. Morbi non metus bibendum, volutpat urna id, venenatis quam. Nulla eu metus eget urna rutrum viverra dignissim sit amet ipsum. Duis blandit cursus eleifend.
        
        Curabitur nec nisi tempor, accumsan ante nec, dignissim risus. Nullam consequat mauris id lorem dapibus molestie sed tristique mauris. Nunc malesuada arcu feugiat tellus tincidunt, at luctus nulla pellentesque. Nam ultricies libero ut nulla dictum, eget laoreet nunc rhoncus. Vivamus convallis urna sit amet elementum vehicula. Aenean nec mi ut lacus fringilla efficitur. Quisque facilisis libero blandit consectetur lobortis. Etiam elit neque, posuere non lacinia dignissim, rutrum quis massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ultrices leo et turpis luctus lobortis.
        
        Etiam sagittis imperdiet magna, a bibendum purus porttitor sit amet. Praesent eget magna eget risus porta tempor. Proin diam justo, volutpat id lobortis sed, pharetra non urna. Vestibulum eu turpis eu lectus rutrum ullamcorper eget vitae urna. Curabitur condimentum ex dui, sit amet ultrices libero rutrum at. Donec fringilla massa tellus, blandit facilisis justo tempus quis. Ut tempus dictum eros, non tincidunt nisi varius non. Maecenas fermentum tristique ipsum eget dignissim. Vestibulum placerat urna in lectus fermentum feugiat. Morbi viverra erat sit amet quam rhoncus, vitae volutpat turpis blandit. Donec et sollicitudin mi, vel blandit risus. Quisque dignissim, turpis eu facilisis faucibus, arcu ante interdum turpis, eu auctor enim libero gravida turpis. Sed auctor ante volutpat, facilisis orci non, tempor libero. Vestibulum finibus ligula mi, vel cursus lorem pulvinar aliquet. Quisque fringilla diam sapien, vitae vestibulum justo posuere ut. Ut ornare ex at libero maximus facilisis.';

        //1- Appartments 
        for ($i=0; $i < 3; $i++) { 
            $j = $i+1;
            $new_name = $j . ' Product';
            Item::create(['title' =>  $new_name,'description' => $desc,'local_category_id' => 3,'slot' => $feat,'slug' => str_slug($new_name),'image' => $img, 'price' => rand(10,100) ]);
        }

        for ($i=0; $i < 2; $i++) { 
            $j = $i+1;
            $new_name = $j . ' Product';
            Item::create(['title' =>  $new_name,'description' => $desc,'local_category_id' => 3,'slot' => 'Normal','slug' => str_slug($new_name),'image' => $img, 'price' => rand(10,100) ]);
        }

        for ($i=0; $i < 3; $i++) { 
            $j = $i+1;
            $new_name = $j . ' Product';
            Item::create(['title' =>  $new_name,'description' => $desc,'local_category_id' => 3,'slot' => $lat,'slug' => str_slug($new_name),'image' => $img , 'price' => rand(10,100)]);
        }

        for ($i=0; $i < 2; $i++) { 
            $j = $i+1;
            $new_name = $j . ' Product';
            Item::create(['title' =>  $new_name,'description' => $desc,'local_category_id' => 3,'slot' => 'Normal','slug' => str_slug($new_name),'image' => $img, 'price' => rand(10,100) ]);
        }

        for ($i=0; $i < 3; $i++) { 
            $j = $i+1;
            $new_name = $j . ' Product';
            Item::create(['title' =>  $new_name,'description' => $desc,'local_category_id' => 3,'slot' => $pop,'slug' => str_slug($new_name),'image' => $img , 'price' => rand(10,100)]);
        }

        for ($i=0; $i < 2; $i++) { 
            $j = $i+1;
            $new_name = $j . ' Product';
            Item::create(['title' =>  $new_name,'description' => $desc,'local_category_id' => 3,'slot' => 'Normal','slug' => str_slug($new_name),'image' => $img, 'price' => rand(10,100) ]);
        }


        $this->command->info('Products Seeded');
    }
}
