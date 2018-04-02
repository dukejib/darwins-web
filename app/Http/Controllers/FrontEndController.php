<?php

namespace App\Http\Controllers;

use App\NewsLetter;
use App\Article;
use App\Setting;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helper\Helper;
use App\Item;

class FrontEndController extends Controller
{

    public function index()
    {
        return view('index')
            ->with(Helper::getBasicData());
    }

    public function updates()
    {
        return view('updates');
    }

    public function drop_down($id)
    {
       
        return view('itemslist')
        ->with(Helper::getBasicData())
        ->with('featured',Item::where('local_category_id',$id)->where('slot','Featured')->get())
        ->with('latest',Item::where('local_category_id',$id)->where('slot','Latest')->get())
        ->with('popular',Item::where('local_category_id',$id)->where('slot','Popular')->get());
        
    }

    public function get_item($id)
    {
        $item = Item::find($id);
        return view('item')
            ->with('item',$item)
            ->with(Helper::getBasicData());
    }

    public function aboutUs()
    {
        return view('aboutus')
        ->with(Helper::getBasicData());
    }

    public function aboutBusiness()
    {

        return view('aboutbusiness')
        ->with(Helper::getBasicData());
    }

    public function aboutTheApp()
    {
        return view('aboutapp')
        ->with(Helper::getBasicData());
    }

    public function howItWorks()
    {
        return view('howitworks')
        ->with(Helper::getBasicData());
    }

    public function originsOfQR()
    {
        return view('originqr')
        ->with(Helper::getBasicData());
    }

    public function termsOfService()
    {
        return view('termsofservice')
        ->with(Helper::getBasicData());
    }
    
    /** Necessary to upload & read PDF file */
    public function tos_getpdf()
    {
        $s = Setting::first();
        $path = public_path() . '/files/' . $s->tos_filename;
        $h = ['Content-Type' => 'application/pdf'];
        return response()->file($path,$h);
    }

    public function affiliates()
    {
        return view('affiliates')
        ->with(Helper::getBasicData());
    }

    public function privacyPolicy()
    {
        return view('privacypolicy')
        ->with(Helper::getBasicData());
    }

    public function newsLetter()
    {
        return view('newsletter')
        ->with('option',1)
        ->with('message','') //This is used in confirmNewsLetter() function
        ->with(Helper::getBasicData());
    }

    public function postNewsLetter(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|unique:newsletters|email'
        ]);

        $news = NewsLetter::create([
            'email' => $request->email
        ]);
        /** Send Email to User about Newsletter Confirmation */
        $this->sendNewsLetterConfirmation($news->email);
        Session::flash('success','Subscribed successfully to Newsletter');
        return redirect()->route('newsLetter');
    }

    /** Confirms the Newsletter Subscription */
    public function confirmNewsLetter($email,$confirm){
        $nl = new NewsLetter();
        $data = NewsLetter::where('email',$email)->firstOrFail(); //TODO::this is making last else fail
        //return $data->id;
        /** Check to see if we have data */
        if(count($data)>0){
            //Check confirm
            if($confirm == 1){
                //copy data to newsletter object
                $data->confirmed = true;
                $data->save();
                return view('newsletter')
                ->with('option',2)
                ->with('message','Thank you for subscibing to our Newsletter')
                ->with(Helper::getBasicData());
            }
            else if ($confirm == 0)
            {
                //copy data to newsletter object
                $data->confirmed = false;
                $data->save();
                return view('newsletter')
                ->with('option',2)
                ->with('message','We have removed your email address form our Database')
                ->with(Helper::getBasicData());
            }
        }
        else 
        {
            return view('newsletter')
            ->with('option',2)
            ->with('message','Sorry we do not have your email address in our Database')
            ->with(Helper::getBasicData());
        }
    }

    public function article($id)
    {
        return view('article')
        ->with('article',Article::find($id))
        ->with(Helper::getBasicData());
    }
    public function contactus()
    {
        return view('contactus')
        ->with(Helper::getBasicData());
    }

    public function storeContactUs(Request $request)
    {
        //dd($request->all());
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $secret = env('NOCAPTCHA_SECRET');
        $verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        //dd($verify);
        $response = json_decode($verify);

        if($response->success){
            /** Send Email */
            $this->sendContactUsEmail($request);
            Session::flash('success','Email Sent');
            return redirect()->route('contactus');
        }else {
            Session::flash('info','You must veryify that you aren\'t a Robot');
            return redirect()->back();
        }
        
    }

    public function sendNewsLetterConfirmation($e)
    {
        $title = 'Hi';
        $name = $e;
        $email = $e;
        //Send Email in Queue
        \Mail::queue('emails.newsletteroptin',['title' => $title , 'name' => $name ,'email' => $email] ,function ($message) use($title,$email,$name) {
            $message->to($email,$name);
            $message->subject($title);
        });
    }

    public function sendContactUsEmail(Request $request)
    {
        $title = 'Hi';
        $name = $request->name;
        $email = $request->email;
        $message = $request->message;
        $subject = $request->subject;
        //Send Email in Queue
        
        \Mail::raw($message, function ($message) use ($email,$name,$subject) {
            $message->from($email, $name);    
            $message->to('mailman@morecreditcardservices.com', 'Mail Man');
            $message->subject($subject);
        });
        
    }
}
