<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GlobalCategory;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class GlobalCategoriesController extends Controller
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
        return view('admin.categories.global.index')
            ->with('categories',GlobalCategory::orderBy('title','asc')->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.global.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required'
        ]);

        GlobalCategory::create([
            'title' => $request->title,
            'slug' => str_slug($request->title)
        ]);

        Session::flash('success','Global category created');
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
        return view('admin.categories.global.edit')
            ->with('category',GlobalCategory::find($id));
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
            'title' => 'required'
        ]);

        $checked = 0;
        if(request()->has('active')) 
        { 
            $checked = 1;
        }

        // dd($checked);

        $c = GlobalCategory::find($id);
        $c->title = $request->title;
        $c->active = $checked;
        $c->slug = str_slug($request->title);
        $c->save();

        Session::flash('success','Global category updated');
        return redirect()->route('admin.global.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $global = GlobalCategory::find($id);
        //if the category has Sub categories attached, do not delete
        if(count($global->sub_categories)>0){
            Session::flash('danger','This Global Category has Sub Category, Delete it first');
            return redirect()->route('admin.global.index');
        }
        $global->delete();

        Session::flash('success','Global category deleted');
        return redirect()->route('admin.global.index');
    }
}
