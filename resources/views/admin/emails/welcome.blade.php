<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Email From MCCS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin:0; padding:10px 0 0 0;" bgcolor="#F8F8F8">
   <h4>Hi {{ $name }}</h4>
   <p><strong>Welcome</strong> to 
    <a href="http://www.morecreditcardservices.com" style="text-decoration:none">More Credit Card Services</a>
   </p>
    <p>
    <a href="{{ route('user.profile') }}" style="text-decoration:none">Checkout</a> your profile.
   </p>
    <a href="{{ route('affiliate.document') }}" style="text-decoration:none">Read</a> how becoming our affiliate is beneficial for you.
   <p>
   <p>
    <a href="{{ route('home') }}" style="text-decoration:none">Shop</a> products from our catalouge.
   </p>
    <strong>
    D.Richards & Team.
    </strong>
   </p>
</body>
</html>