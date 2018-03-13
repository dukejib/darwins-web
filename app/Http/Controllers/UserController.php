<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use App\Helper\Helper;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use Cookie;
use App\Helper\Email;

class UserController extends Controller
{
    public function getUserSignUp()
    {
        $affiliate_id = 1;
        if(Session::has('affiliate_id'))
            {
                $affiliate_id = Session::get('affiliate_id');
            }
        
        return view('users.signup')
            ->with(Helper::getBasicData())
            ->withCookie( cookie()->forever( 'affiliate_id', $affiliate_id ));
    }

    public function getRefferal()
    {
        // $i = request('refferal');
        // $user = User::where( 'affiliate_id', $referral )->first();
        if(is_null(User::where('affiliate_id',request('refferal'))))
        {
            Session::put('affiliate_id',1);
        }
        else
        {
            Session::put('affiliate_id',request('refferal'));
        }
        return redirect()->route('signup');
        // return ( is_null( User::where( 'affiliate_id', request('referral') )->first() ) )
        // ? redirect()->route('signup')
        // : redirect()->route('signup')->withCookie( cookie()->forever( 'affiliate_id', $user->affiliate_id ) );
    }

    public function postUserSignUp(Request $request)
    {
        /** Check referal code and set to 1, if not found */
        $ref_code = $request->affiliate_id;
        if(empty($ref_code)){
            $ref_code = 1;
        }
        /** If its one, use signed up by himself, else reffered */
        if($ref_code !== 1){
            $user = User::where('affiliate_id',$request->affiliate_id)->first();
            if(is_null($user)){
                Session::flash('info','Refferal code doesn\'t exists in system');
                return redirect()->back();
            }
            // Save the Code for later use
            $ref_code = $user->affiliate_id;
        }
        
        /** Validate the input */
        $this->validate($request,[
            'first_name' => 'required|min:2|max:80',
            'last_name' => 'required|min:2|max:80',
            'email' => 'required|email_domain:' . $request['email'] . '|max:255|unique:users',
            'password' => 'required|min:4|confirmed',
            'password_confirmation' => 'required|min:4',
        ]);
       
        /** Validation is done, now create & save the User */
        $user = new User();
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->affiliate_id = Helper::getUniqueAffiliateId();
        $user->referred_by = $ref_code;
        $user->save();

        /** Send Email */
        $title = 'Welcome';
        $email = $request['email'];
        $name = $request['first_name'] . ' ' . $request['last_name'];

        \Mail::send('admin.emails.welcome', ['title' => $title , 'name' => $name], function ($message) use($title,$email,$name) {
            $message->to($email,$name);
        //    $message->cc('john@johndoe.com', 'John Doe');
        //    $message->bcc('john@johndoe.com', 'John Doe');
        //    $message->replyTo('john@johndoe.com', 'John Doe');
            $message->subject($title);
        });
        
         /** Forget the Session */
        if($request->session()->has('affiliate_id')){
            $request->session()->forget('affiliate_id');
        }

        Profile::create([
            'user_id' => $user->id,
            'avatar' => 'img/avatars/avatar.png',
        ]);

        /** User must Sign in */
        Auth::login($user);

        Session::flash('success','Welcome to More Credit Card Services');
        /** Now , redirect the user to Index/Profile etc page for customer/affiliate */
        return redirect()->route('user.profile')
            ->with('user',Auth::user());
    }

    public function getUserSignIn()
    {
        return view('users.signin')
        ->with(Helper::getBasicData());
    }

    public function postUserSignIn(Request $request)
    {
        /** Validate the input */
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);

        /** Validation is done, now login user */
        //else to user profile
        $check = Auth::attempt(['email' => $request['email'],'password' => $request['password']]);

        if($check){
            $user = Auth::user();
            if ($user->role == 1 || $user->role == 2){
                if(Session::has('cart')){
                    return redirect()->route('cart');
                }
                return redirect()->intended();
            }elseif($user->role == 99) {
                return redirect()->route('dashboard');
            }
        }else{
            $errors = new MessageBag(['password' => ['Email and/or Password is invalid']]);
            return redirect()->back()->withErrors($errors);
        }

    }

    public function getUserSignOut()
    {
        if(Auth::check()){
            Auth::logout();
            if(Session::has('cart')){
                Session::forget('cart');
            }
            return redirect()->route('home');
        }
    }
}
