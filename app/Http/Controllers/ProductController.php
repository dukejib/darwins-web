<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Helper\Helper;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.index')
        ->with('online_user_count',Helper::getOnlineUsersCount())
        ->with(Helper::dataForAdminPages());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create')
        ->with('online_user_count',Helper::getOnlineUsersCount())
        ->with(Helper::dataForAdminPages());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $this->validate($request,[
            'title' => 'required|min:4',
            'description' => 'required',
            'price' => 'required',
            'local_category_id' => 'required',
            'slot' => 'required',
            'image' => 'required|image|max:1024'
        ]);
        //Get The file
        $image = $request->image;
        //Actual Name is now this
        $image_new_name = time() . $image->getClientOriginalName();
        //Move the file to required Directory
        $image->move('img/products/',$image_new_name);
        //Save the data
        $product = new Item();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        // $product->discontinued = false;
        $product->local_category_id = $request->local_category_id;
        $product->slot = $request->slot;
        $product->image = 'img/products/' . $image_new_name;
        $product->slug = str_slug($request->title);
        $product->save();

        Session::flash('success','Product created');
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.products.show')
        ->with('online_user_count',Helper::getOnlineUsersCount())
        ->with('product',Item::find($id))
        ->with(Helper::dataForAdminPages());
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.products.edit')
        ->with('online_user_count',Helper::getOnlineUsersCount())
        ->with('product',Item::find($id))
        ->with(Helper::dataForAdminPages());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required|min:4',
            'description' => 'required',
            'price' => 'required',
            'local_category_id' => 'required',
        ]);

        //Now Get the Product ID and update it
        $product = Item::find($id);

        //Upload new file
        if($request->hasFile('image')){
            $this->validate($request,[
                'image' => 'image|max:1024'
            ]);
            ///Delete old file
            $oldImage = $product->image;
            //Get the file
            $image = $request->image;
            //The Actual name is now this
            $image_new_name =  time() . $image->getClientOriginalName();
            //Save the file in required directory
            $image->move('img/products/',$image_new_name);
            //Set the name for new Image
            $product->image ='img/products/'. $image_new_name;
            //We are using accessor and getting full http path to file, so strip it
            $basename ='img/products/' . basename($oldImage);
            //Delete the file from disk
            if(file_exists($basename)){
                if($basename != 'img/products/img_place_holder_product.png'){
                    unlink($basename);
                }
            }
            // Deleted
            $product->save();
        }

        //Now Save the Product
        $product->title = $request['title'];
        $product->description = $request['description'];
        $product->price = $request['price'];
        // $product->active = $request['active'];
        $product->local_category_id = $request['local_category_id'];
        $product->slot = $request['slot'];
        $product->slug = str_slug($request->title);
        $product->save();

        Session::flash('success','Product updated');
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {    
        $product = Item::find($id);
        $image = $product->image;

        $basename ='img/products/' . basename($image);
        //Delete the file from disk
        if(file_exists($basename)){
            if($basename != 'img/products/img_place_holder_product.png'){
                unlink($basename);
            }
        }
        $product->delete();

        Session::flash('success','Product Deleted');
        return redirect()->back();
    }
}
