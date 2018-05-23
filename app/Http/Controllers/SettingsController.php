<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Helper\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Http\Requests;

class SettingsController extends Controller
{
    //Force all routes/methods to use middleware 'admin' for secrutiy
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.settings.index')
        ->with('online_user_count',Helper::getOnlineUsersCount())
        ->with('settings',Setting::first());
    }

    public function update()
    {
        $this->validate(request(),[
            'site_name' => 'required',
            'address_line1' => 'required',
            'contact_line1' => 'required',
            'contact_email' => 'required|email',
        ]);
        $settings =  Setting::first();
        $settings->site_name = request()->site_name;
        $settings->address_line1 = request()->address_line1;
        $settings->address_line2 = request()->address_line2;
        $settings->address_line3 = request()->address_line3;
        $settings->contact_line1 = request()->contact_line1;
        $settings->contact_line2 = request()->contact_line2;
        $settings->contact_mobile = request()->contact_mobile;
        $settings->contact_email = request()->contact_email;
        $settings->carousel_time = request()->carousel_time;
        $settings->save();

        Session::flash('success','Settings Updated');
        return redirect()->back();
    }

    public function show_tos()
    {
        return view('admin.settings.tos')
        ->with('online_user_count',Helper::getOnlineUsersCount());
    }

    public function update_tos()
    {
        $this->validate(request(),[
            'file' => 'required|mimes:pdf|max:10000'
        ]);
        $settings = Setting::first();

        $file = request()->file;
        $pdf = time() . $file->getClientOriginalName();
        $file->move('files/',$pdf);
        $basename = 'files/' . basename($settings->tos_filename);
       //Delete the file from disk
       if(file_exists($basename)){
        unlink($basename);
        }
        $settings->tos_filename = $pdf;
        $settings->save();

        Session::flash('success','Terms of Services Updated');
        return redirect()->back();
    }

    public function show_brochure()
    {
        return view('admin.settings.brochure')
        ->with('online_user_count',Helper::getOnlineUsersCount());
    }

    public function update_brochure()
    {
        $this->validate(request(),[
            'file' => 'required|mimes:pdf|max:10000'
        ]);
        $settings = Setting::first();

        $file = request()->file;
        $pdf = time() . $file->getClientOriginalName();
        $file->move('files/',$pdf);
        
        //IF it's null, don't delete file
        if (!$settings->brochure_filename == null){
            $basename = 'files/' . basename($settings->brochure_filename);
            //Delete the file from disk
             if(file_exists($basename)){
                 unlink($basename);
             }
        }
        
        $settings->brochure_filename = $pdf;
        $settings->save();

        Session::flash('success','Brochure Updated');
        return redirect()->back();
    }


    public function datafile()
    {
        return view('admin.settings.datafile')
        ->with('online_user_count',Helper::getOnlineUsersCount())
        ->with('settings',Setting::first());
    }

    public function datafile_update()
    {
        $this->validate(request(),[
            'file' => 'required|max:76800'
        ]);
        $settings = Setting::first();

        $file = request()->file;
        $pdf = time() . $file->getClientOriginalName();
        $file->move('files/',$pdf);
        if($settings->datafile != null){
            $basename = 'files/' . basename($settings->datafile);
            unlink($basename);
        }
        $settings->datafile = $pdf;
        $settings->save();

        Session::flash('success','Datafile  updated');
        return redirect()->back();
    }

    public function app_statement()
    {
        return view('admin.settings.app')
        ->with('online_user_count',Helper::getOnlineUsersCount())
        ->with('settings',Setting::first());
    }

    public function app_update()
    {
        $this->validate(request(),[
            'app' => 'required'
        ]);
        $settings =  Setting::first();
        $settings->app_statement = request()->app;
        $settings->save();

        Session::flash('success','App statement Updated');
        return redirect()->back();
    }

    public function refill_statement()
    {
        return view('admin.settings.refill')
        ->with('online_user_count',Helper::getOnlineUsersCount())
        ->with('settings',Setting::first());
    }

    public function refill_update()
    {
        $this->validate(request(),[
            'refill' => 'required'
        ]);
        $settings =  Setting::first();
        $settings->refill_statement = request()->refill;
        $settings->save();

        Session::flash('success','Refill statement Updated');
        return redirect()->back();
    }
}
