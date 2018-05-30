<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Blockchain\Blockchain;
use App\Order;
use App\Transaction;
use App\PendingTransaction;
use App\Http\Requests;

class BitcoinController extends Controller
{
    var $secret = '_vpc_2018_dukes';

    public function get_response($orderid){

        try{
            $response = 'We Got Something';
            return response()->json($response);
        }catch (Exception $e){
            // $respose = ['failure',99];
            return response()->json($e->getMessage());
        }
        //return response()->json($order);
    }

    //Check Gap
    public function get_gap()
    {
        $blockchain = new Blockchain;
        $d = $gap_int = $blockchain->ReceiveV2->checkAddressGap(env('V2APIKEYJIB'), env('XPUBJIB'));
        return $d;
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
 
         try{
             //Generate the Link to receive Payments
             $result =$blockchain->ReceiveV2->generate($v2ApiKey,$xPub,$callbackUrl,$gap_limit);
 
             //return $result;
             //Get the receive address - which we can show to the public for scanning
             $address =  $result->getReceiveAddress();
             //Add QR Address to Order btc_address field
             $order = Order::find($orderid);
             $order->btc_address = $address;
             $order->save();
             //TODO:This is working and sending us the addres.. ensure xpub problem is not happening
             return response()->json($order->btc_address);
         }catch (Exception $e){
             return response()->json($e->getMessage());
         }
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
}
