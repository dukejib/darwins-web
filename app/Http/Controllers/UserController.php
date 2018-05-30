<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use App\Helper\Helper;
use App\OrderDetails;
use App\Order;
use App\Group;
use App\GroupUser;
use App\Helper\Email;
use App\WebBanner;

use Cookie;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use Illuminate\Foundation\Auth\ThrottlesLogins; /** Needed for Login Throttling */
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use PhpParser\Node\Stmt\GroupUse;
use Illuminate\Mail\Message;

class UserController extends Controller
{
    /** Needed for Login Throttling */
    use AuthenticatesAndRegistersUsers,ThrottlesLogins;
    /** Needed for Login Throttling */
    protected $maxLoginAttempts=3;
    protected $lockoutTime=3600;

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
            //TODO::Change '1' to Something Else
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
            // 'email' => 'required|email_domain:' . $request['email'] . '|max:255|unique:users',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
        ]);
       
        /** Validation is done, now create & save the User */
        $user = new User();
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->affiliate_id = Helper::getUniqueAffiliateId();
        $user->role = 1;
        $user->referred_by = $ref_code;
        $user->save();

        /** Send Email */
        $this->sendWelcomeEmailToNewUser($user);
        
         /** Forget the Session */
        if($request->session()->has('affiliate_id')){
            $request->session()->forget('affiliate_id');
        }
        /** Save the Profile */
        Profile::create([
            'user_id' => $user->id,
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
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }
        /** Validate the input */
        $validation = $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);

        /** Validation is done, now login user */
        //else to user profile
        $check = Auth::attempt(['email' => $request['email'],'password' => $request['password']]);
        
        if($check){
          
            $user = Auth::user();
            $this->clearLoginAttempts($request);
            if ($user->role == 1 || $user->role == 2)
            {
                if(Session::has('cart')){
                    return redirect()->route('cart');
                }
                return redirect()->intended();
            } elseif($user->role == 99) {
                return redirect()->route('dashboard');
            }

        }else{
            $this->incrementLoginAttempts($request);
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

    public function checkout_vpc($orderid)
    {   
        $order = Order::find($orderid);
        return view('cart.checkout_vpc')
        ->with('total',$order->order_total_usd)
        ->with('orderid',$order->id)
        ->with(Helper::getBasicData());
    }

    public function checkout_usps($orderid)
    {
        $order = Order::find($orderid);
        return view('cart.checkout_usps')
        ->with('total',$order->order_total_usd)
        ->with(Helper::getBasicData());
    }

    public function checkout_btc($orderid)
    {
        $order = Order::find($orderid);
        return view('cart.checkout_bitcoins')
        ->with('orderid',$order->id)
        ->with(Helper::getBasicData());
    }

    public function user_affiliate($id)
    {
        $user = User::find($id);
        $user->role = 2;
        $user->book_purchased = true;
        $user->save();

        return response()->json(['reply'=> 'User Affiliated']);
    }

    public function user_delete($id)
    {
        $user = User::find($id);
        $orders = Order::where('user_id',$id)->get();
        //Delete OrderDetails
        foreach($orders as $order){
            OrderDetails::where('order_id',$order->id)->delete();
        }
        //Delete Orders
        foreach($orders as $order){
            Order::where('user_id',$order->user_id)->delete();
        }
        //Delete User
        $user->delete();

        return response()->json(['reply'=> 'Customer/Affiliate Deleted']);
        // Session::flash('success','User is not Affiliated anymore');
        // return redirect()->back();
    }

    /** Profile Related Information */
    public function user_profile()
    {
        return view('users.profile')
        ->with('user',Auth::user())
        ->with('profile',Auth::user()->profile)
        ->with(Helper::getBasicData());
    }

    public function user_referals()
    {
        return view('users.referal')
        ->with('user',Auth::user())
        ->with('profile',Auth::user()->profile)
        ->with(Helper::getBasicData());
    }

    public function user_orders()
    {
        return view('users.orders')
        ->with('user',Auth::user())
        ->with('profile',Auth::user()->profile)
        ->with('orders',Order::where('user_id',Auth::id())->with('order_details')->get())
        ->with(Helper::getBasicData());
    }
  
    public function user_banners()
    {
        return view('users.web_banners')
        ->with('user',Auth::user())
        ->with('banners',WebBanner::where('published',1)->get())
        ->with(Helper::getBasicData());
    }

    /** Update Basic Data */
    public function user_basic(Request $request)
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
        return redirect()->back()->withInput(['tab' => 'basic']);
    }
    /** Update password */
    public function user_password(Request $request)
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
        return redirect()->back()->withInput(['tab' => 'account']);
    }
    /** Update Contact Data */
    public function user_contact(Request $request)
    {
        /** Validate the Input */
        $this->validate($request,[
            'primary_contact_no' => 'required|numeric',
            'secondary_contact_no' => 'numeric',
            'address' => 'required',
            'address_continued' => 'required',
            'city' => 'required',
            'country' => 'required',
            'state' => 'required',
            'business_name' => 'required',
            'email_address' => 'email'
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
        $user->profile->business_name= $request->business_name;
        $user->profile->state = $request->state;
        $user->profile->email_address = $request->email_address;
        $user->profile->save();
        /** Send Email  */
        $this->sendContactProfileChangeEmail($user);

        Session::flash('success','Contact Information updated');
        return redirect()->back()->withInput(['tab' => 'contact']);
    }
    /** Customr wants to buy our book and become affiliate */
    public function become_affiliate()
    {
        return view('users.buybook') 
        ->with(Helper::getBasicData());
    }
    /** Create Group */
    public function create_group(Request $request)
    {
        $this->validate($request,[
            'group_title' => 'required|min:5'
        ]);
        //Get the Authenticated user
        $user = Auth::user();
        //Create Group
        $group = Group::create([
            'user_id' => $user->id,
            'group_title' => request()->group_title
        ]);
        //Create Group_users
        // $group->users()->attach($user->id);

        Session::flash('success','Group created');
        return redirect()->back()->withInput(['tab' => 'groups']);
    }

    public function user_groups()
    {
        return view('users.groups')
        ->with('user',Auth::user())
        ->with('groups',Auth::user()->groups)
        ->with(Helper::getBasicData());
    }

    public function add_to_group()
    {
        //Errors start at 31
        //Confirms 10
        $user_id = request()->user_id;
        $group_id = request()->group_id;

        //If no group select then raise error
        if($group_id <= 0){
            return 31; // No Group Selected
        }
        //If no one selected, raise erro
        if($user_id == 0 || $user_id == ''){
            return 32; //No User Selected
        }
        
        //Now check GroupUser if exists or not
        $gu = GroupUser::where('group_id',$group_id)->get();
        //
        if($gu->count()){
            //GroupUsers exist 
            //Check if the group has 5 members or not
            if(count($gu)>=6 ){
            return 33; //Group is full
            }
            //Find This mate
            $mate = GroupUser::where('user_id','=',$user_id)->where('group_id','=',$group_id)->first();
            if(count($mate)>=1){
                return 34; //User Alerady in group
            }
            //No user is not in group, add him
            GroupUser::create([
                'group_id' => $group_id,
                'user_id' => $user_id //Since authenticated user can add only
            ]);
            return 10;

        }else{
            //GroupUsers doesn't exist - Create new one
            //Add the Owner first Time Only
            GroupUser::create([
                'group_id' => $group_id,
                'user_id' => Auth::id(), //Since authenticated user can add only
                'role_in_group' => 'owner'
            ]);
            //Now Add User
            GroupUser::create([
                'group_id' => $group_id,
                'user_id' => $user_id //Since authenticated user can add only
            ]);
            return 10; // User added to group
        }
        
    }

    public function remove_from_group()
    {
        //Make it Post
    }
  
    /** Email Notifications */
    public function sendWelcomeEmailToNewUser(User $user)
    {
        $title = 'Welcome';
        $name = $user->first_name . ' ' . $user->last_name;
        $email = $user->email;
        //Send Email in Queue
        \Mail::queue('emails.welcome',['title' => $title , 'name' => $name] ,function ($message) use($title,$email,$name) {
            $message->to($email,$name);
            $message->subject('Welcome');
        });
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
