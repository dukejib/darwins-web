<?php

namespace App\Http\Controllers;

use App\GlobalCategory;
use App\SubCategory;
use App\LocalCategory;
use App\Service;
use App\Setting;
use App\NewsLetter;
use App\User;
use App\Photo;
use DB;
use Kim\Activity\Activity;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Helper\Helper;
use App\WebBanner;
use App\Order;


class AdminController extends Controller
{

    //Force all routes/methods to use middleware 'admin' for secrutiy
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function dashboard()
    {
        
        return view('admin.dashboard')
            ->with('online_user_count',Helper::getOnlineUsersCount())
            ->with(Helper::getElementsCount());
    }

    public function newsLetters()
    {
        return view('admin.newsletter.index')
        ->with('online_user_count',Helper::getOnlineUsersCount())
        ->with('newsLetters',NewsLetter::orderBy('created_at','desc')->get());
    }

    public function editNewsLetter($id)
    {
        return view('admin.newsletter.edit')
        ->with('online_user_count',Helper::getOnlineUsersCount())
        ->with('subs',NewsLetter::find($id));
    }

    public function updateNewsLetter(Request $request, $id)
    {
        $this->validate($request,[
            'email' => 'required|unique:newsletters|email'
        ]);
        $subs = NewsLetter::find($id);
        $subs->email = $request->email;
        Session::flash('success','Email updated successfully');
        return redirect()->back();
    }

    public function deleteNewsLetter($id)
    {
        $sub = NewsLetter::find($id);
        $sub->delete();
        Session::flash('success','Subscription deleted');
        return redirect()->back();
    }

    public function affiliates()
    {
        //$affiliates = User::where('role','=',2)->get(); //2-Affiliate
        return view('admin.users.affiliates')
        ->with('online_user_count',Helper::getOnlineUsersCount())
        ->with('affiliates',User::with(['orders','orders.order_details'])->where('role','=',2)->get());
    }

    public function customers()
    {
        //$customers = User::where('role','=',1)->get(); //1-customer
        return view('admin.users.customers')
        ->with('online_user_count',Helper::getOnlineUsersCount())
        ->with('customers',User::with(['orders','orders.order_details'])->where('role','=',1)->get());
    }

    public function store_photo(Request $request)
    {
        //We need image of max size 1024 Kb
        $this->validate($request,[
            'image' => 'required|image|max:1024'
        ]);
        
        $image = $request->image;
        $new_image = time() . $image->getClientOriginalName();
        $image->move('img/photos/',$new_image);

        Photo::create([
            'image' => $new_image
        ]);

        Session::flash('success','Photo added');
        return redirect()->back();
    }

    public function destroy_photo($id)
    {
        $photo = Photo::find($id);
        if(file_exists(public_path() .  '/img/photos/' . $photo->image)){
            unlink(public_path(). '/img/photos/' . $photo->image);
            $photo->delete();
        }
        Session::flash('success','Photo deleted');
        return redirect()->back();
    }

    public function photos()
    {
        $photos = DB::table('photos')->orderBy('created_at','desc')->paginate(5);
        return view('admin.photos.index')
        ->with('online_user_count',Helper::getOnlineUsersCount())
        ->with('photos',$photos);
    }

    public function web_banners()
    {
        $web_banners = DB::table('web_banners')->get();
        return view('admin.web_banners.index')
        ->with('online_user_count',Helper::getOnlineUsersCount())
        ->with('web_banners',$web_banners);
    }

    public function web_banner_edit($id)
    {
        return view('admin.web_banners.edit')
        ->with('online_user_count',Helper::getOnlineUsersCount())
        ->with('web_banner',WebBanner::find($id));
    }

    public function web_banner_publish($id)
    {
        $banner = WebBanner::find($id);
        $banner->published = true;
        $banner->save();

        Session::flash('success','Banner Published');
        return redirect()->back();

    }
    
    public function web_banner_update(Request $request)
    {
         //We need image of max size 256 Kb
         $this->validate($request,[
            'image' => 'required|image|max:256'
        ]);
        
        $image = $request->image;
        $new_image = time() . $image->getClientOriginalName();
        $image->move('img/web_banners/',$new_image);

        $web_banner = WebBanner::find($request->id);

        /** IF there is old file, then delete it */
        if( !is_null($web_banner->image)){
            unlink('img/web_banners/' . $web_banner->image);
        }
        //Now proceed
        $web_banner->image = $new_image;
        // $web_banner->link = '/img/web_banners/' . $new_image;
        $web_banner->save();

        Session::flash('success','Banner saved');
        return redirect()->route('admin.web_banner.index');
    }

    /** ORDER CRUD FOR ADMIN PANEL */
    /** Frontend Order Handling CartController.php */
    public function orders()
    {
        return view('admin.orders.index')
        ->with('online_user_count',Helper::getOnlineUsersCount())
        ->with('orders',Order::orderBy('created_at','asc')->with('order_details')->get());
    }
}
