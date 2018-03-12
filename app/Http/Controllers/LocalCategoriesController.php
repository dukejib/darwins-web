<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LocalCategory;
use App\GlobalCategory;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use App\SubCategory;

class LocalCategoriesController extends Controller
{
    /** This LocalCategoriesController is guarded by admin middleware */
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
        return view('admin.categories.local.index')
            ->with('local_categories',LocalCategory::orderBy('sub_category_id','asc')->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.local.create')
            ->with('sub_categories',SubCategory::where('active',1)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate the Input
        $this->validate($request,[
            'title' => 'required',
            'sub_category_id' => 'required'
        ]);
        //Create the LocalCategory & Save it
        LocalCategory::create([
            'title' => $request->title,
            'sub_category_id' => $request->sub_category_id,
            'slug' => str_slug($request->title)
        ]);
        //Send back the message
        Session::flash('success','Local category created');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.categories.local.edit')
            ->with('local_category',LocalCategory::find($id))
            ->with('sub_categories',SubCategory::where('active',1)->get());
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
        //Validate the Input
        $this->validate($request,[
            'title' => 'required',
            'sub_category_id' => 'required'
        ]);
        //Validate if Checkbox for Active is checked
        $checked = 0;
        if(request()->has('active')) 
        { 
            $checked = 1;
        }
        //Get the LocalCategory & Update it
        $local = LocalCategory::find($id);
        $local->title = $request->title;
        $local->sub_category_id = $request->sub_category_id;
        $local->slug = str_slug($request->title);
        $local->active = $checked;
        $local->save();
        //Send back the message
        Session::flash('success','Local category updated');
        return redirect()->route('admin.local.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        LocalCategory::destroy($id);
        //Send back the message
        Session::flash('success','Local category deleted');
        return redirect()->route('admin.local.index');
        //TODO:: Make sure this isn't deleted if attached to product or service
    }
}
