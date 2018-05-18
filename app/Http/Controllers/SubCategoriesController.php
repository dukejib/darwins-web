<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GlobalCategory;
use App\Http\Requests;
use App\SubCategory;
use App\Helper\Helper;
use Illuminate\Support\Facades\Session;

class SubCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return SubCategory::all();
        return view('admin.categories.sub.index')
        ->with('online_user_count',Helper::getOnlineUsersCount())
        ->with('categories',SubCategory::orderBy('global_category_id','asc')->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.sub.create')
        ->with('online_user_count',Helper::getOnlineUsersCount())
        ->with('global_categories',GlobalCategory::orderBy('title','asc')->where('active',1)->get());
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
            'global_category_id' => 'required',
            'title' => 'required',
        ]);
      
        SubCategory::create([
            'title' => $request->title,
            'global_category_id' => $request->global_category_id,
            'slug' => str_slug($request->title)
        ]);

        Session::flash('success','Sub Category created');
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
        return view('admin.categories.sub.edit')
        ->with('online_user_count',Helper::getOnlineUsersCount())
        ->with('sub_category',SubCategory::find($id))
        ->with('global_categories',GlobalCategory::orderBy('title','asc')->where('active',1)->get());
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
            'global_category_id' => 'required',
            'title' => 'required',
        ]);
        
        $checked = 0;
        if(request()->has('active')) 
        { 
            $checked = 1;
        }

        $sub_category = SubCategory::find($id);
        $sub_category->title = $request->title; 
        $sub_category->global_category_id = $request->global_category_id;
        $sub_category->active = $checked;
        $sub_category->slug = str_slug($request->title);
        $sub_category->save();

        Session::flash('success','Sub Category udpated');
        return redirect()->route('admin.sub.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub = SubCategory::find($id);
        //if the category has Sub categories attached, do not delete
        if(count($sub->local_categories)>0){
            Session::flash('danger','This sub Category has local Category, Delete it first');
            return redirect()->route('admin.sub.index');
        }
        $sub->delete();

        // SubCategory::destroy($id);

        Session::flash('success','Sub Category deleted');
        return redirect()->route('admin.sub.index');
    }
}
