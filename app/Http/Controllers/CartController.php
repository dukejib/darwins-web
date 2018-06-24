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
use App\CompletedTransaction;
use Illuminate\Support\Facades\Auth;
use App\Helper\Helper;
use Illuminate\Support\Facades\File;
use Mockery\Exception;
 

class CartController extends Controller
{
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

    //This shows error. mostly used in javascript
    public function error($info)
    {
        return view('error')
        ->with(Helper::getBasicData())
        ->with('info',$info);
    }

    //This shows Thanks YOu page . mostly used in javascript
    public function info($address,$orderid)
    {
        $order = Order::where('id',$orderid)->first();
        return view('info')
        ->with(Helper::getBasicData())
        ->with('order',$order);
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
            return  response()->json(route('signin'));
        }
        //Since we are logged in - Process the Order

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
        /** Clear Cart  */
        Cart::destroy();
        Session::forget('cart');
        /** Add Pending Transaction */
        $p = PendingTransaction::create([
            'order_id' => $order->id,
            'value_in_usd' => $order->order_total_usd,
            'value_in_btc' => $order->order_total_btc
        ]);
        
        switch ($option) {
            case '1':
                return  response()->json(route('cart.checkout.vpc',['orderid' => $order->id]));
                break;
            
            case '2':
                return  response()->json(route('cart.checkout.usps',['orderid' => $order->id]));
                break;
                
            case '3':
                return  response()->json(route('cart.checkout.btc',['orderid' => $order->id]));
                break;

            default:
                # code...
                break;
        }
    }

    //Cart Book Checkout
    public function cart_order_book($option,$bitcoins)
    {
        $order = '';        //For Order
        $order_details =''; //FOr Order Details
        $user = '';         //For Authenticated Use
        $total_usd = 50;    //For Book TODO: change this to 50
        $html = '';     //For Page Exit

        //Authenticate user
        if(Auth::check()){
            $user = Auth::user();
        }else {
            return  response()->json(route('signin'));
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
        //TODO::Update User
        $user->book_optin = 1;
        $user->book_purchased = true;
        $user->save();
         /** Add Pending Transaction */
        $pen_transaction= PendingTransaction::create([
            'order_id' => $order->id,
            'value_in_usd' => $order->order_total_usd,
            'value_in_btc' => $order->order_total_btc
        ]);
        //Check option
        switch ($option) {
            case '1':
                return  response()->json(route('cart.checkout.vpc',['orderid' => $order->id]));
                break;
            
            case '2':
                return  response()->json(route('cart.checkout.usps',['orderid' => $order->id]));
                break;
                
            case '3':
                return  response()->json(route('cart.checkout.btc',['orderid' => $order->id]));
                break;

            default:
                # code...
                break;
        }
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
