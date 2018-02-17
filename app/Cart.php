<?php

namespace App;

class Cart
{
    /** The shopping cart will persist in Session
     *  so that user can navigate everywhere.
     * It has advantage for anonymous user as well, so that
     * they can select items and later on sign in/ or signup
     * We access this cart every time, and add new items to it every time
     */
    public $items = null; //It holds, individual items / Group of Products
    public $totalQuantity = 0;  //cart Level Total Quantity (Includes all $items)
    public $totalPrice = 0; //cart Level Total Price (Sum of All in $items)

    public function __construct($oldCart){
        //First time, we don't have any cart
        //Thats why field is set to null
        if($oldCart)
        {
            //We already have cart item
            $this->items = $oldCart->items;
            $this->totalQuantity = $oldCart->totalQuantity;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function addNewItem($item,$id)
    {
        //Let's store the passed $item. Qty & Price is initially set to 0
        //This is an associative Array
        $storedItem  = ['qty' => 0 , 'price' => $item->price, 'item' => $item];
        //Now we will check if we already have the information of newly added item in our
        //existing $items filed. if we have it, we will fetch the info from there, instead
        //of contacting the database.
        if($this->items)
        {
            //check if we are adding same to the cart by $id
            if(array_key_exists($id,$this->items))
            {
                //The key exists.Let's fetch the data and store it
                $storedItem = $this->items[$id];
            }
        }
        //Now add the Price & Quantity to the $items
        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQuantity++;
        $this->totalPrice += $item->price;
    }

    public function reduceByOne($id){

        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['price'];

        if($this->items[$id]['qty'] <= 0){
            unset($this->items[$id]);        //Php function - read it online
        }
    }

    public function removeItem($id){

        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }
}
