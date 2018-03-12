<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
// use App\Cart;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Item;
use Illuminate\Support\Facades\Auth;
use App\Helper\Helper;
use Blockchain\Blockchain;
use App\Transactions;
use Illuminate\Support\Facades\File;

class CartController extends Controller
{

    var $secret = '_vpc_2018_dukes';

    //Add an item to the cart
    public function add_to_cart(Request $request)
    {
        $item = Item::find($request->id);
        // dd($item);
        /** Add Item To Cart */
        $cartItem = Cart::add([
            'id' => $item->id,
            'name' => $item->title,
            'qty' => 1,
            'price' => $item->price,
        ]);
        //Associate the Cart with Item
        Cart::associate($cartItem->rowId,'App\Item');
        Session::flash('success','Item added to cart');
        return redirect()->back();
    }

    //Shows our cart
    public function cart()
    {
        if(!Session::has('cart')){
            // return view('cart.cart')
            // ->with(Helper::getBasicData());
            Session::flash('info','You Don\'t have any item in Cart');
            return redirect()->route('home');
        }
        //It h
        //$oldCart = Session::get('cart');
        //$newCart = new Cart($oldCart);
        //return compact('newCart');
        // return view('shop.shopping-cart',['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
        return view('cart.cart')
        ->with('subtotal',Cart::subtotal())
        //->with('products',$newCart->items)
        ->with(Helper::getBasicDataForCart());
    }

    //clears our cart
    public function clearCart()
    {
        if(Session::has('cart')){
            //Session::forget('cart');//
            Cart::destroy();
        }
        Session::flash('success','Cart cleared');
        return redirect()->route('home');
    }

    //Checkout cart, depends on toggle,for Products or for Book(Affiliation)
    public function checkoutCart($toggle)
    {
        //User is authenticated
        if(Auth::check()){
            //1 is for prouducts, 2 is for book only
            if($toggle == 1){
                //TODO::Add code to process the payment and add order
                return view('cart.checkout')
                ->with(Helper::getBasicData());
            }else if($toggle == 2){
                //Call the Blockchain function - when we are buying a book
                $amount = 1;
                $this->process_order_bc($amount);
            }
        }
        else {
            return redirect()->route('signin');
        }
    }

    //blockchain receive payment function
    public function process_order_bc($amount)
    {
        /** This allows us to get a new key address related to our xpub account for customers */
        //Put your response address here :https://blockchain.info/address/YourReceivePaymentKey
        //Docs : https://github.com/blockchain/api-v1-client-php/blob/HEAD/docs/v2/receive.md
        //Using blockchain/blockchain packagist
        $blockchain = new Blockchain();
        //Order Id
        $orderId = uniqid();
        //Receiving
        $v2ApiKey = env('V2APIKEYJIB');
        //Receiving Account
        $xPub = env('XPUBJIB');
        //This where you want to be notified of your payment-A route in laravel
        $rootUrl = 'http://www.morecreditcardservices.net'; 
        //Callback Url
        $callbackUrl = $rootUrl . "/receive_payment?orderId=" . $orderId . "&secret=" . $this->secret;
        //Encode url
        $encUrl = urlencode($callbackUrl);
        //Gap Limit
        $gap_limit = 3; //Optional
      
        //Generate the Link to receive Payments
        $res =$blockchain->ReceiveV2->generate($v2ApiKey,$xPub,$callbackUrl,$gap_limit);
    
        //Get the receive address - which we can show to the public for scanning
        $address =  $res->getReceiveAddress();
        //Google api thing not working
        //echo '<div><img src="http://chart.googleapis.com/chart?chs=400x400&cht=qr&chl="' . $address . '"></div>';
        echo '<div><img src="https://blockchain.info/qr?data=' . $address  . '&size=200"></div>';
        echo '<br><div>Send Your Coins at : ' . $address . '</div>';
    }

    //This function is a callback for blockchain, it triggers, when we get the amount
    public function receive_payment()
    {
        if(request()->secret != $this->secret){
            die('Secret key doesn\'t match');
        }else{
            //Send the ok first, or else it will be stuck
            echo '*ok';
            //Now process your own stuff here
            $data = request()->all();
            $filename = 'databtc.txt';
            File::put(public_path() . '/' . $filename,$data);
            //Update the user as buying our book - Do check if he is paying full amount
            // $user = Auth::id();
            // $user->role = 2;
            // $user->book_purchased = true;
            // $user->save();
            // $trans = new Transactions();
            // $trans->value = request()->all();
            // $trans->transaction_hash = 'none';
            // $trans->confirmations = 'none';
            // $trans->order_id = 'none';
            // $trans->save();
        }
    }


    //Increase the item in Cart
    public function increase_item($id,$qty)
    {
        Cart::update($id,$qty + 1);
        return redirect()->back();
    }

    //decrease the Item in cart
    public function decrease_item($id,$qty)
    {
        Cart::update($id,$qty -1);
        return redirect()->back();
    }

    /** For Stripe */
    public function checkout(){
        if(!Session::has('cart')){
            return view('shop.shopping-cart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice; //Get the total price

        return view('shop.checkout',['total' => $total]);
    }
    public function postCheckout(Request $request){

        if(!Session::has('cart')){
            return redirect()->route('product.shoppingCart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        //Stripe secret key
        Stripe::setApiKey('sk_test_OEGDwlxnEnh73OawbZ6v9rhY');

        try {
            //Since we want the id of the charge, we will store it in $charge var
            $charge = Charge::create(array(
               "amount" => $cart->totalPrice * 100, //it charges in cents
               "currency" => "usd",
               "source" => $request->input('stripeToken'), // obtained with Stripe.js
               "description" => "Test Charge"
            ));
            //Save the order , since we are succesfully getting a charge
            $order = new Order();
            $order->cart = serialize($cart);    //PHP Function
            $order->address = $request->input('address');
            $order->name = $request->input('name');
            $order->payment_id = $charge->id;
            //Authenticate & save the orders related to user
            Auth::user()->orders()->save($order);


        } catch (\Exception $e){
            return redirect()->route('checkout')->with('error',$e->getMessage());
        }


        //Charge was succesfull, remove the cart & session
        Session::forget('cart');
        //Redirect to a proper route
        return redirect()->route('product.index')->with('success','Successfully purchased products!');
    }
}
