<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Testimonial;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\Http\Requests;

class TestimonyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('testimonials')
        ->with('testimonials',Testimonial::where('approved',true)->paginate(3))
        ->with(Helper::getBasicData());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'username' => 'required',
            'email' => 'required|email',
            'comment' => 'required',
            'rateus' => 'required'
        ]);
        //Save Testimonry
        $testimony = Testimonial::create([
            'username' => $request->username,
            'email' => $request->email,
            'testimony' => $request->comment,
            'rating' => $request->rateus
        ]);
        
        Session::flash('success','Your comment is save for moderation');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
