/** Readme.md **/
E-Commerce Website Project for a Client.

The project uses the following repositories;

"blockchain/blockchain": "^1.4", //Blockchain Bitcoin Wallets/ Payment Receive
"gloudemans/shoppingcart": "^2.4" //Shopping Cart 
"kim/activity": "^1.1"  //For Session Handling (Online Users Etc)

on the backend, to support blockchain, Node.js is utilized on VPS Server

/** NOTES **/
all email uses hardcoded urls, change in future updates


/** Task Scheduler **/
CheckUnusedAddress command monitors and makes unused qr addres after they exceed the limit of 15 minutes (Defind in checkout_bitcoin.blade.php for QR Code) - COmmand is registred in Console/kernel.php and then run through crontab at server.
--
Using Centos7 Crontab to execute Task Scheduler

by 
Duke
