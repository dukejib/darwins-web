<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use App\Order;
use App\Helper\Helper;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\NewsLetter;

class ProfileController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        // return $id;
        // return Auth::user()->profile;
        return view('users.profile')
            ->with('user',Auth::user())
            ->with('profile',Auth::user()->profile)
            ->with('orders',Order::where('user_id',$id)->get())
            ->with('newsletter',NewsLetter::where('email',Auth::user()->email))
            ->with(Helper::getBasicData());
    }
 
    public function basic(Request $request)
    {
        /** Validate the Input */
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            // 'email' => 'required|email',
        ]);
        /** Find the Authenticated User */
        $user = Auth::user();
        /** Save new data to the User table */
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        // $user->email = $request->email;
        $user->save();
        //Send Email to the User
        $this->sendBasicProfileChangeEmail($user); 
        //
        Session::flash('success','Basic Information updated');
        return redirect()->back();
    }

    public function account(Request $request)
    {
        /** Validate the Input */
        $this->validate($request,[
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);
    
        /** Find the Authenticated User */
        $user = Auth::user();
        /** Save new data to the User table */
        $user->password = bcrypt($request->password);
        $user->save();
        /** Save the data of User Profile */
        $this->sendAccountProfileChangeEmail($user,$request['password']);
        //
        Session::flash('success','Account updated');
        return redirect()->back();
    }

    public function contact(Request $request)
    {
        /** Validate the Input */
        $this->validate($request,[
            'primary_contact_no' => 'required|numeric',
            'secondary_contact_no' => 'numeric',
            'address' => 'required',
            'address_continued' => 'required',
            'city' => 'required',
            'country' => 'required'
        ]);
        /** Find the Authenticated User */
        $user = Auth::user();
        /** Save the data of User Profile */
        $user->profile->primary_contact_no = $request->primary_contact_no;
        $user->profile->secondary_contact_no = $request->secondary_contact_no;
        $user->profile->postal_code = $request->postal_code;
        $user->profile->address = $request->address;
        $user->profile->address_continued = $request->address_continued;
        $user->profile->city = $request->city;
        $user->profile->country = $request->country;
        $user->profile->save();
        /** Send Email  */
        $this->sendContactProfileChangeEmail($user);

        Session::flash('success','Contact Information updated');
        return redirect()->back();
    }

    public function become_affiliate()
    {
        return view('users.buybook')
        ->with(Helper::getBasicData());
    }

    public function sendBasicProfileChangeEmail(User $user)
    {
        $title = 'Basic Info Update Notification';
        $name = $user->first_name . ' ' . $user->last_name;
        $email = $user->email;
        //Send Email in Queue
        \Mail::queue('emails.basicupdated',['title' => $title , 'name' => $name,'first' => $user->first_name, 'last' => $user->last_name] ,function ($message) use($title,$email,$name) {
            $message->to($email,$name);
            $message->subject($title);
        });
    }

    public function sendAccountProfileChangeEmail(User $user,$password)
    {
        $title = 'Password Update Notification';
        $name = $user->first_name . ' ' . $user->last_name;
        $email = $user->email;

        //Send Email in Queue
        \Mail::queue('emails.accountupdate',['title' => $title , 'name' => $name, 'password' => $password] ,function ($message) use($title,$email,$name,$password) {
            $message->to($email,$name);
            $message->subject($title);
        });
    }

    public function sendContactProfileChangeEmail(User $user)
    {
        $title = 'Contact Update Notification';
        $name = $user->first_name . ' ' . $user->last_name;
        $email = $user->email;
        $data = [
            'title' => $title,
            'name' => $name,
            'primary_contact_no' => $user->profile->primary_contact_no ,
            'secondary_contact_no' => $user->profile->secondary_contact_no,
            'postal_code' => $user->profile->postal_code,
            'address' => $user->profile->address,
            'address_continued' => $user->profile->address_continued,
            'city' => $user->profile->city,
            'country' => $user->profile->country,
        ];
        //Send Email in Queue
        \Mail::queue('emails.contactupdate',$data ,function ($message) use($title,$email,$name) {
            $message->to($email,$name);
            $message->subject($title);
        });     
    }
}
