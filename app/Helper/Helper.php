<?php

namespace App\Helper;

use App\GlobalCategory;
use App\SubCategory;
use App\LocalCategory;

use App\Setting;
use App\Item;
use App\Carousel;
use App\NewsLetter;
use App\Article;
use App\User;
use App\WebBanner;

use DB;
use App\Order;

/** This Class Has functions to Help out Project */
class Helper {

    public static function getBasicDataForCart()
    {
        /** create the Menu System */
        $local = LocalCategory::where('active',1)->get();
        $sub = SubCategory::where('active',1)->get();
        $global = GlobalCategory::where('active',1)->get();

        //Hold Only Those Sub Categories, which have any Local Category
        $sub_categories  = array();  
        foreach($sub as $s):
            if(count($s->local_categories)>0){
                array_push($sub_categories,$s);
            }
        endforeach;
        //Size of $sub_categories array
        $sub_size = count($sub_categories); 
  
        //Hold Only those Global Categories, which have any sub category
        $global_categories = array(); 
        foreach($global as $g):
            for ($i=0; $i < $sub_size; $i++) { 
                if($sub_categories[$i]->global_category_id == $g->id){
                    // array_push($global_categories,$g);
                    if(!in_array($g,$global_categories)){
                        array_push($global_categories,$g); //If it's already not in array, then add it
                    }
                }
            }
        endforeach;

        //Hold on to those Local Categories, which have sub categories
        $local_categories = array(); 
        foreach($local as $l):
            for ($i=0; $i < $sub_size; $i++) { 
                if($l->sub_category->id == $sub_categories[$i]->id){
                    //Only add Local category with corresponding Sub categories
                    array_push($local_categories,$l);
                }
            }
        endforeach;
        
        /** Settings for the system */
        $settings = Setting::first();

        /** Carousel Data */
        $carousel = Carousel::paginate(10);

        return compact(
            'global_categories',
            'sub_categories',
            'local_categories',
            'settings',
            'carousel');
    }

    public static function getBasicData()
    {
        /** create the Menu System */
        $local = LocalCategory::where('active',1)->get();
        $sub = SubCategory::where('active',1)->get();
        $global = GlobalCategory::where('active',1)->get();

        //Hold Only Those Sub Categories, which have any Local Category
        $sub_categories  = array();  
        foreach($sub as $s):
            if(count($s->local_categories)>0){
                array_push($sub_categories,$s);
            }
        endforeach;
        //Size of $sub_categories array
        $sub_size = count($sub_categories); 
  
        //Hold Only those Global Categories, which have any sub category
        $global_categories = array(); 
        foreach($global as $g):
            for ($i=0; $i < $sub_size; $i++) { 
                if($sub_categories[$i]->global_category_id == $g->id){
                    // array_push($global_categories,$g);
                    if(!in_array($g,$global_categories)){
                        array_push($global_categories,$g); //If it's already not in array, then add it
                    }
                }
            }
        endforeach;

        //Hold on to those Local Categories, which have sub categories
        $local_categories = array(); 
        foreach($local as $l):
            for ($i=0; $i < $sub_size; $i++) { 
                if($l->sub_category->id == $sub_categories[$i]->id){
                    //Only add Local category with corresponding Sub categories
                    array_push($local_categories,$l);
                }
            }
        endforeach;
        
        /** Settings for the system */
        $settings = Setting::first();

        /** Carousel Data */
        $carousel = Carousel::all();

        /** Product Array */
        $products = Item::where('product',1)->orderBy('created_at','desc')->get();

        /** Service Array */
        $services = Item::where('product',0)->orderBy('created_at','desc')->get();

        /** Articles */
        $articles = DB::table('articles')->where('published',1)->orderBy('created_at','desc')->paginate(10);

        return compact(
            'global_categories',
            'sub_categories',
            'local_categories',
            'settings',
            'products',
            'services',
            'articles',
            'carousel');
    }

    public static function dataForAdminPages()
    {
          /** create the Menu System */
        $local = LocalCategory::where('active',1)->get();
        $sub = SubCategory::where('active',1)->get();
        $global = GlobalCategory::where('active',1)->get();

        //Hold Only Those Sub Categories, which have any Local Category
        $sub_categories  = array();  
        foreach($sub as $s):
            if(count($s->local_categories)>0){
                array_push($sub_categories,$s);
            }
        endforeach;
        //Size of $sub_categories array
        $sub_size = count($sub_categories); 
  
        //Hold Only those Global Categories, which have any sub category
        $global_categories = array(); 
        foreach($global as $g):
            for ($i=0; $i < $sub_size; $i++) { 
                if($sub_categories[$i]->global_category_id == $g->id){
                    // array_push($global_categories,$g);
                    if(!in_array($g,$global_categories)){
                        array_push($global_categories,$g); //If it's already not in array, then add it
                    }
                }
            }
        endforeach;

        //Hold on to those Local Categories, which have sub categories
        $local_categories = array(); 
        foreach($local as $l):
            for ($i=0; $i < $sub_size; $i++) { 
                if($l->sub_category->id == $sub_categories[$i]->id){
                    //Only add Local category with corresponding Sub categories
                    array_push($local_categories,$l);
                }
            }
        endforeach;
        
        /** Settings for the system */
        // $settings = Setting::first();

        /** Carousel Data */
        // $carousel = Carousel::paginate(10);

        /** Product Array */
        // $products = Product::orderBy('created_at','desc')->get();
        $products = DB::table('items')->where('product',1)->orderBy('created_at','desc')->get();
        $services = DB::table('items')->where('product',0)->orderBy('created_at','desc')->get();
        $articles = DB::table('articles')->orderBy('created_at','desc')->get();
        
        return compact(
            'global_categories',
            'sub_categories',
            'local_categories',
            'settings',
            'products',
            'services',
            'articles',
            'carousel');
    }

    public static function getElementsCount()
    {
        $global_categories = GlobalCategory::all()->count();
        $sub_categories = SubCategory::all()->count();
        $local_categories = LocalCategory::all()->count();
        $subscriptions = NewsLetter::all()->count();
        $customers = User::where('role','=',1)->get()->count();
        $affiliations = User::where('role','=',2)->get()->count();
        $articles = Article::all()->count();
        $web_banners = WebBanner::all()->count();
        $pending_orders = Order::where('delivery_status','=',1)->get()->count();

        return compact(
            'global_categories',
            'sub_categories',
            'local_categories',
            'subscriptions',
            'customers',
            'affiliations',
            'articles',
            'web_banners',
            'pending_orders'
        );
    }

    public static function getUniqueAffiliateId(){
        return 'MCCS' . uniqid();
    }

    public static function cartTaxes()
    {
           /** Settings for the system */
           $settings = Setting::first();
           return $settings;
    }

}