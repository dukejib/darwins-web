<?php

namespace App\Helper;

use App\User;

/** This Class Has functions to Help out Project */
class Email {

   public static function welcome_email($id){

    $user = User::find($id);

    $title = 'Welcome';
    $email = $user->email;
    $name = $user->first_name . ' ' . $user->last_name;

   Mail::send('admin.emails.welcome', ['title' => $title , 'name' => $name], function ($message) use($title,$email,$name) {
       $message->to($email,$name);
    //    $message->cc('john@johndoe.com', 'John Doe');
    //    $message->bcc('john@johndoe.com', 'John Doe');
    //    $message->replyTo('john@johndoe.com', 'John Doe');
       $message->subject($title);

        });
    }

}