<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Item;
use App\Order;
use App\User;
use App\OrderDetails;
use App\PendingTransaction;
use App\Transaction;
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
        return view('cart.cart')
        ->with('subtotal',Cart::subtotal())
        ->with(Helper::getBasicDataForCart());
    }

    //clears our cart
    public function clear_cart()
    {
        if(Session::has('cart')){
            Cart::destroy();
            Session::forget('cart');
        }
        Session::flash('success','Cart cleared');
        return redirect()->route('home');
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

    //Cart Product Checkout
    public function cart_order_product($option,$bitcoins)
    {
        $order = '';        //For Order
        $order_details =''; //FOr Order Details
        $user = '';         //For Authenticated Use
        $pen_transaction = ''; //Pending Transaction

        //Authenticate user
        if(Auth::check()){
            $user = Auth::user();
        }else {
            /** User Not Authenticated - Return him back to Singin Page */
            return redirect()->route('signin');
            //This takes us out of here
        }
        //Since we are logged in - Process the Order
        //This is an Product Order
        /** Get Taxes Details form Settings */
        $settings = Helper::cartTaxes();
        $fedtax = Cart::subtotal() * $settings->fed_tax; //Cart Subtotal * FED Tax from Settings
        $shipping = Cart::subtotal() * $settings->shipping_charges; //Cart Subtotal * Shipping Charges from Settings
        $total_usd = Cart::subtotal() + $fedtax + $shipping; //Cart _usd 
        /** Create Order */
        $order = new Order();
        $order->user_id = $user->id;
        $order->sub_total = Cart::subtotal();
        $order->tax = $fedtax;
        $order->shipping_charges = $shipping;
        $order->order_total_usd = $total_usd;
        $order->order_total_btc = $bitcoins;
        $order->save();
        // exit();
        /** Process Cart */
        foreach (Cart::content() as $purchase) {
            //Create OrderDetails
            $order_details =  OrderDetails::create([
                'order_id' => $order->id,
                'item_id' => $purchase->id,
                'item_name' => $purchase->name,
                'item_qty' => $purchase->qty,
                'item_price' => $purchase->price
            ]);
            //Add Item_purchased_count
            $item = Item::find($purchase->id);
            // $item->item_purchased_count += 1;
            $item->increment('item_purchased_count');
            $item->save();
        }
        // exit();
        /** Clear Cart  */
        Cart::destroy();
        Session::forget('cart');
        // exit();
        //Check option
        if($option == 3){
            /** Add Pending Transaction */
            $pen_transaction= PendingTransaction::create([
                'order_id' => $order->id,
                'value' => $order->order_total_btc,
                'transaction_hash' => ''
            ]);
            //We have a pending order
        } 
        if ($option == 2 || $option == 1){
            //Remove btc_address
            $order->btc_address = '';
            $order->save();
            //Add pending order
            /** Add Pending Transaction */
            $pen_transaction= PendingTransaction::create([
                'order_id' => $order->id,
                'usd' => $order->order_total_usd,
                
            ]);
            //We have a pending order
        }
        //All Done, Return Page
        // Session::flash('success','Order Placed');      
        // return view('cart.checkout')
        $html = view('cart.checkout')
        ->with('option',$option)
        ->with('total',$total_usd)
        ->with('order',$order)
        ->with(Helper::getBasicData())
        ->render();
        return response()->json($html);
    }

    //Cart Book Checkout
    public function cart_order_book($option,$bitcoins)
    {
        $order = '';        //For Order
        $order_details =''; //FOr Order Details
        $user = '';         //For Authenticated Use
        $total_usd = 50;    //For Book

        //Authenticate user
        if(Auth::check()){
            $user = Auth::user();
        }else {
            /** User Not Authenticated - Return him back to Singin Page */
            return redirect()->route('signin');
            //This takes us out of here
        }
        /** Create Order */
        $order = Order::create([
            'user_id' => $user->id,
            'sub_total' => $total_usd,
            'tax' => 0,
            'shipping_charges' => 0,
            'order_total_usd' => $total_usd,
            'order_total_btc' => $bitcoins
            //Status is 'Pending' as default
        ]);
        //Create OrderDetails
        $order_details = OrderDetails::create([
            'order_id' => $order->id,
            'item_id' => 0,
            'item_name' => 'Affiliate Crowdfunding',
            'item_qty' => 1,
            'item_price' => $total_usd
        ]);
        //Update User
        $user->book_optin = 1;
        // $user->book_purchased = true;
        $user->save();
        //Check option
        if($option == 3){
            /** Add Pending Transaction */
            $pen_transaction= PendingTransaction::create([
                'order_id' => $order->id,
                'value' => $order->order_total_btc,
                'transaction_hash' => ''
            ]);
            //We have a pending order
        } 
        if ($option == 2 || $option == 1){
            //Remove btc_address
            $order->btc_address = '';
            $order->save();
            //Add pending order
            /** Add Pending Transaction */
            $pen_transaction= PendingTransaction::create([
                'order_id' => $order->id,
                'usd' => $order->order_total_usd
            ]);
            //We have a pending order
        }
        // Session::flash('success','Order Placed');      
        // return view('cart.checkout')
        $html = view('cart.checkout')
        ->with('option',$option)
        ->with('total',$total_usd)
        ->with('order',$order)
        ->with(Helper::getBasicData())
        ->render();
        return response()->json($html);
    }

    //TODO:: work on it. Make it remove qr address if user changes bitcoin payment to usps or vpc - vice versa
    //Utlizied when user checks his/her orders
    public function paynow($orderid,$option)
    {
        if(Auth::check()){
            /** Get The User Id */
            $user_id = Auth::id();
            $order = Order::find($orderid);
            $total_usd = $order->order_total_usd;

            //  //Check option
            // if($option == 3){
            //     //We have bitcoin
            //     $this->process_order_bc($order->order_total_usd,$order->id);
            // }else if ($option == 2 || $option == 1){
            //     $order->btc_address = '';
            //     $order->save();
            // }

            /** Return to Ajax */
            $html = view('cart.checkout')
            // ->with('message',$message)
            ->with('option',$option)
            ->with('total',$total_usd)
            ->with('order',$order)
            ->with(Helper::getBasicData())
            ->render();
            return response()->json($html);
        }
        else {
             /** Return to Ajax */
             $html = view('users.signin')
             ->with(Helper::getBasicData())
             ->render();
             return response()->json($html);
        }
    }

    //blockchain receive payment function
    public function get_btc_address($orderid)
    {
        /** This allows us to get a new key address related to our xpub account for customers */
        //Put your response address here :https://blockchain.info/address/YourReceivePaymentKey
        //Docs : https://github.com/blockchain/api-v1-client-php/blob/HEAD/docs/v2/receive.md
        //Using blockchain/blockchain packagist
        $blockchain = new Blockchain();
        $rootUrl = 'http://www.morecreditcardservices.com'; 
        $v2ApiKey = env('V2APIKEYJIB'); //Receive Key
        $xPub = env('XPUBJIB'); //Xpub
        $order_id = $orderid;
        //This where you want to be notified of your payment-A route in laravel
        //Callback Url
        $callbackUrl = $rootUrl . "/receive_payment?order_id=" . $order_id . "&secret=" . $this->secret;
        //Encode url
        $encUrl = urlencode($callbackUrl);
        //Gap Limit
        $gap_limit = 3; //Optional
        //Generate the Link to receive Payments
        $result =$blockchain->ReceiveV2->generate($v2ApiKey,$xPub,$callbackUrl,$gap_limit);

        //return $result;
        //Get the receive address - which we can show to the public for scanning
        $address =  $result->getReceiveAddress();
        //Add QR Address to Order btc_address field
        $order = Order::find($orderid);
        $order->btc_address = $address;
        $order->save();

        /** Return to Ajax */
        // $html = view('cart.checkout')
        // // ->with('message',$message)
        // ->with('option',$option)
        // ->with('total',$total_usd)
        // ->with('order',$order)
        // ->with(Helper::getBasicData())
        // ->render();
        return response()->json($order);
    }

    //This function is a callback for blockchain, it triggers, when we get the amount
    public function receive_payment()
    {
        //Get Information
        $order_id = request()->order_id;
        $transaction_hash  = request()->transaction_hash;
        $value_in_btc = request()->value / 100000000 ; //Convert from satoshi to usd
        $confirmation = request()->confirmations;
        $secret = request()->secret;

        if($secret != $this->secret){
            die('Secret key doesn\'t match');
        }
            
        //Get Order
        $order = Order::find($order_id);
        $btc = $order->order_total_btc; //Amount in btc hold up in order

        if($btc >= $value_in_btc){
            //We have exact amount
            //Check confirmation and process 
            if($confirmation >= 3){
                //Add to Transaction
                Transaction::create([
                    'transaction_hash' => $transaction_hash,
                    'value' => $value_in_btc,
                    'order_id' => $order_id
                ]);
                //Find and delete the pending transaction
                $pen_transaction = PendingTransaction::where("order_id",$order_id);
                $pen_transaction->delete();
            }
        }else{
            //Check confirmation and process 
            if($confirmation >= 3){
                //Add to Transaction
                Transaction::create([
                    'transaction_hash' => $transaction_hash,
                    'value' => $value_in_btc,
                    'order_id' => $order_id
                ]);
                //Don't Delete Pending
                $pen_transaction = PendingTransaction::where("order_id",$order_id);
                $pen_transaction->delete();
                //Create New Pending for Remaining amount
                $diff = $btc - $value_in_btc;
                $pen_transaction= PendingTransaction::create([
                    'order_id' => $order->id,
                    'value' => $diff,
                    'transaction_hash' => ''
                ]);
            }
        }
        //Send the ok first, or else it will be stuck
        echo '*ok';
        //Now process your own stuff here
        // $data = request()->all();
        // $filename = 'databtc.txt';
        // File::put(public_path() . '/' . $filename,$data);
        /** From Call back we get
         * $secret = 
         * $orderid =
         * $transaction_hash =
         * $value_in_satoshi = value / 100000000
         */
    }
    ////////////////////////////////////////////////////////////////////
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
