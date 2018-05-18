<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Helper;
use App\Http\Requests;
use App\Item;
use Illuminate\Support\Facades\Session;

class ServiceController extends Controller
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
        //Use getAdminData() Helper to get specific paginated product data
        return view('admin.services.index')
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
        return view('admin.services.create')
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
            'local_category_id' => 'required',
            'slot' => 'required',
            'image' => 'required|image|max:1024'
        ]);
        //Get The file
        $image = $request->image;
        //Actual Name is now this
        $image_new_name = time() . $image->getClientOriginalName();
        //Move the file to required Directory
        $image->move('img/services/',$image_new_name);
        //Save the data
        $product = new Item();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->product = 0;
        // $product->discontinued = false;
        $product->local_category_id = $request->local_category_id;
        $product->slot = $request->slot;
        $product->image = 'img/services/' . $image_new_name;
        $product->slug = str_slug($request->title);
        $product->save();

        Session::flash('success','Service created');
        return redirect()->route('admin.service.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.services.show')
        ->with('online_user_count',Helper::getOnlineUsersCount())
        ->with('service',Item::find($id))
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
        return view('admin.services.edit')
        ->with('online_user_count',Helper::getOnlineUsersCount())
        ->with('service',Item::find($id))
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
            $image->move('img/services/',$image_new_name);
            //Set the name for new Image
            $product->image ='img/services/'. $image_new_name;
            //We are using accessor and getting full http path to file, so strip it
            $basename ='img/services/' . basename($oldImage);
            //Delete the file from disk
            if(file_exists($basename)){
                if($basename != 'img/services/img_place_holder_service.png'){
                    unlink($basename);
                }
            }
            // Deleted
            $product->save();
        }

        //Now Save the Product
        $product->title = $request['title'];
        $product->description = $request['description'];
        // $product->active = $request['active'];
        $product->local_category_id = $request['local_category_id'];
        $product->slot = $request['slot'];
        $product->slug = str_slug($request->title);
        $product->save();

        Session::flash('success','Service updated');
        return redirect()->route('admin.service.index');
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
        $basename ='img/services/' . basename($image);
        //Delete the file from disk
        if(file_exists($basename)){
            if($basename != 'img/services/img_place_holder_service.png'){
                unlink($basename);
            }
        }
        $product->delete();

        Session::flash('success','Service Deleted');
        return redirect()->back();
    }
}
