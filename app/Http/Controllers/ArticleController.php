<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Helper\Helper;
use App\Article;
use Illuminate\Support\Facades\Session;

class ArticleController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.articles.index')
            ->with(Helper::dataForAdminPages());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articles.create')
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
        $this->validate($request,[
            'title' => 'required',
            'article' => 'required',
            'synopsis' => 'required'
        ]);

        $art = Article::create([
            'title' => $request->title,
            'article' => $request->article,
            'synopsis' => $request->synopsis,
            'slug' => str_slug($request->title)
        ]);

        Session::flash('success','Article created');
        return redirect()->route('admin.article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.articles.show')
        ->with('article',Article::find($id))
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
        return view('admin.articles.edit')
        ->with('article',Article::find($id))   
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
            'title' => 'required',
            'article' => 'required',
            'synopsis' => 'required'
        ]);

        $art = Article::find($id);
        $art->title = $request->title;
        $art->article = $request->article;
        $art->synopsis = $request->synopsis;
        $art->slug = str_slug($request->title);
        $art->save();

        Session::flash('success','Article saved');
        return redirect()->route('admin.article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $art = Article::find($id);
        $art->delete();
        Session::flash('success','Article deleted');
        return redirect()->back();
    }

    public function publish($id)
    {
        $art = Article::find($id);
        $art->published = 1;
        $art->published_date = date('Y-m-d H:i:s');
        $art->save();
        
        Session::flash('success','Article published');
        return redirect()->back();
    }

    public function unpublish($id)
    {
        $art = Article::find($id);
        $art->published = 0;
        $art->published_date = 0;
        $art->save();
        
        Session::flash('success','Article unpublished');
        return redirect()->back();

    }
}
