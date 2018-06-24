<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Blockchain\Blockchain;
use Illuminate\Support\Facades\File;
use App\Order;
use App\Transaction;
use App\PendingTransaction;
use App\Http\Requests;
use App\UnusedAddress;
use App\CompletedTransaction;
use App\Setting;

class BitcoinController extends Controller
{
    //TODO: ensure to change the unused_address after 15 minutes or else problesm

    var $secret = '_vpc_2018_dukes';
    var $my_website_root = 'http://www.morecreditcardservices.com'; 
    var $blockchain_receive_root = 'https://api.blockchain.info/v2/receive?';
    var $blockchain_root = "https://blockchain.info/";

    //Check Gap
    public function get_gap()
    {
        $blockchain = new Blockchain;
        $gap_int = $blockchain->ReceiveV2->checkAddressGap(env('V2APIKEYJIB'), env('XPUBJIB'));
        return $gap_int;
    }

    //blockchain receive payment function
    public function get_btc_address($orderid)
    {
        try{
            //Docs : https://github.com/blockchain/api-v1-client-php/blob/HEAD/docs/v2/receive.md
            //Using blockchain/blockchain packagist
            $blockchain = new Blockchain();
            $setting = Setting::first();

            $v2ApiKey =$setting->v2apikey; //Receive Key
            $xPub = $setting->xpub1;  //Xpub
            $unique_id = uniqid();  //To reference the Address
            //Callback Url
            $callbackUrl = $this->my_website_root . "/receive_payment?unique_id=" . $unique_id . "&secret=" . $this->secret;
            //Encode url
            $encUrl = urlencode($callbackUrl);
            //Gap Limit
            $gap_limit = 3; //Optional
            /** Check if we have an unused address in record */
            $unused_address = UnusedAddress::where('in_use',0)->first(); 
            if($unused_address){
                //Ensure, we aren't giving this to any one and keep the order it with it
                $unused_address->in_use = 1;
                $unused_address->order_id = $orderid; //Associate this address with order id
                $unused_address->save();
                return response()->json($unused_address->address);
            }else {
                //Generate the Link to receive Payments
                $result =$blockchain->ReceiveV2->generate($v2ApiKey,$xPub,$callbackUrl,$gap_limit);
                $address = $result->getReceiveAddress();
                $address = $result->getIndex();
                //Create a new Unused Address
                $unused_address = UnusedAddress::create([
                    'uid' => $unique_id,
                    'address' => $result->getReceiveAddress(),
                    'index' =>  $result->getIndex(),
                    'in_use' => 1,               //Since we are using it for an order
                    'order_id' => $orderid      //Ensure we are putting order it
                ]);
                //TODO:This is working and sending us the addres.. ensure xpub problem is not happening
                return response()->json($unused_address->address);
            }

        }catch (Exception $e){
            return response()->json($e->getMessage());
        }
    }
 
    //This function is a callback for blockchain, it triggers, when we get the amount
    public function receive_payment()
    {
        //Our Secret doesn't match - So Get Back
        if(request()->secret != $this->secret){
            die('Secret key doesn\'t match');
        }
        //Blockchain.info returns the following information when a user sends us the money
        $unique_id = request()->unique_id;  //This is a unique id, which lets us distinguish qr address, when they are unpaid
        $value_in_satoshi = request()->value;   //Satioshi Value (This is what we actually get)
        $value_in_btc = request()->value / 100000000 ; //Convert from satoshi to usd
        $address = request()->address;  //This is QR COde Address
        $transaction_hash  = request()->transaction_hash;   //Transaction hash for record keeping
        $confirmation = request()->confirmations;   //#of confirmations - Right now we are using 0 as Confirmation
       
        //Save it to ensure we are getting something on vps server
        $data = 'UniqueId : ' . $unique_id . ' Satoshi-Value : ' . $value_in_satoshi . ' Btc-Value : ' . $value_in_btc . ' QR-Address : ' . $address . ' Hash : ' . $transaction_hash . ' Confirmation : ' . $confirmation;
        
        //Save to file - or to database
        $filename = 'btc_payment_callback.txt';
        File::put(public_path() . '/' . $filename,$data);
        //Send the ok first, or else it will be stuck
        echo '*ok';

        //Check pending order , check btc amount and decided course of action
        $ua = UnusedAddress::where("uid",$unique_id)->first();
        $pt = PendingTransaction::where("order_id",$ua->order_id)->first();
 
        if($value_in_btc >= $pt->value_in_btc){
            //We have exact amount
            //Add to Transaction
            $ct = new CompletedTransaction();
            $ct->unique_id = $unique_id;
            $ct->satoshi_value = $value_in_satoshi;
            $ct->amount_in_btc = $value_in_btc;
            $ct->qr_address = $address;
            $ct->transaction_hash = $transaction_hash;
            $ct->confirmation = $confirmation;
            $ct->order_id = $ua->order_id;
            $ct->payment_mode = 3;
            $ct->save();
            //Delete the pending transaction
            $pt->delete();
            //Update Orders
            $order = Order::where('id',$ua->order_id)->first();
            $order->status = 1; //Transaction completed
            $order->save();

        }else{
            //We don't have the exact amount, so create a Half COmplete transaction , and keep the pending 
            //Add to Transaction
            $ct = new CompletedTransaction();
            $ct->unique_id = $unique_id;
            $ct->satoshi_value = $value_in_satoshi;
            $ct->amount_in_btc = $value_in_btc;
            $ct->qr_address = $address;
            $ct->transaction_hash = $transaction_hash;
            $ct->confirmation = $confirmation;
            $ct->order_id = $ua->order_id;
            $ct->payment_mode = 3;
            $ct->save();
            //Don't Delete Pending
            $btc = $pt->value_in_btc - $value_in_btc;
            $pt->value_in_btc = $btc;
            $pt->save();
         }
        //last step, delete the unused address and send "*ok"
        $ua->delete();
        
    }

    //User was late, so Remove address and ask him/her to pay later from oerders
    public function time_up($address)
    {
        $u  = UnusedAddress::where('address',$address)->first();
        $u->order_id = '';
        $u->in_use = 0;
        $u->save();
        return response()->json(route('error',['info' => 'Sorry, You payment was late. Please Check the payment options at your "Orders" page']));
    }

    //Thank the user upon getting the payment
    public function thank_you($address,$orderid)
    {
        return response()->json(route('info',['address' => $address,'orderid' => $orderid]));
    }
}
