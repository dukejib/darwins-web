<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Helper;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Carousel;

class CarouselController extends Controller
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
        return view('admin.carousel.index')
        ->with('online_user_count',Helper::getOnlineUsersCount())
        ->with('carousels',Carousel::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.carousel.create')
        ->with('online_user_count',Helper::getOnlineUsersCount());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /** Validate the Input */
        $this->validate($request,[
            'image' => 'required|image|max:1024'
        ]);
        /** Get New File */
        $image = $request->image;
        /** Setup New File Name */
        $image_new_name = time(). $image->getClientOriginalName();
        /** Move the File to required directory with new Name */
        $image->move('img/carousel/',$image_new_name);
         
        /** Do we have to show the headings */
        $checked = 0;
        if(request()->has('show_headings')) 
        { 
            $checked = 1;
        } 
        Carousel::create([
            'heading' => $request->heading,
            'body' => $request->body,
            'show_headings' => $checked, 
            'image' => 'img/carousel/' .$image_new_name
        ]);
        //Send back the message
        Session::flash('success','Carousel updated');
        return redirect()->route('admin.carousel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.carousel.edit')
        ->with('online_user_count',Helper::getOnlineUsersCount())
        ->with('carousel',Carousel::find($id));
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
        /** Validate the Input */
        $this->validate($request,[
            'heading' => 'required',
            'body' => 'required'
        ]);
        /** Find The Required Row */
        $carousel = Carousel::find($id);
        /** If we have Image File, Save it and Delete old One */
        if($request->hasFile('new_image')){
            $this->validate($request,[
                'new_image' => 'image|max:1024'
            ]);
            /** Get New File */
            $image = $request->new_image;
            /** Get Old File Name for Delete */
            $image_old = $carousel->image;
            /** Setup New File Name */
            $image_new_name = time(). $image->getClientOriginalName();
            /** Move the File to required directory with new Name */
            $image->move('img/carousel/',$image_new_name);
            /** Setup The New Name in Record */
            $carousel->image = 'img/carousel/'. $image_new_name;
            /** We are using accessor and getting full http path to file, so strip it */
            $basename = 'img/carousel/' . basename($image_old);
            /** Delete Old Image */
            if(file_exists($basename)){
                unlink($basename);
            }
            /** Save Data */
            $carousel->save();
        }
        /** Do we have to show the headings */
        $checked = 0;
        if(request()->has('show_headings')) 
        { 
            $checked = 1;
        } 
        /** Update the data of Carousel */
        $carousel->heading = $request->heading;
        $carousel->body = $request->body;
        $carousel->show_headings = $checked;
        $carousel->save();
        //Send back the message
        Session::flash('success','Carousel updated');
        return redirect()->route('admin.carousel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carousel = Carousel::find($id);
        $image = $carousel->image;

        $basename ='img/carousel/' . basename($image);
        //Delete the file from disk
        if(file_exists($basename)){
            unlink($basename);
        }
        //With softDeletes, this is the way to permanently delete a record
        $carousel->delete();
        Session::flash('success','Product deleted permanently');
        return redirect()->back();
    }
}
