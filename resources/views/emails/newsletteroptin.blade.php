<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Email From MCCS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body style="margin: 0; padding: 0;">
        
    <table align="center" border="1" cellpadding="0" cellspacing="0" width="600">
        <tr>
            <td><img src="{{ asset('img/mccs-qr.jpg') }}" alt="MCCS LOGO"  style="display: block;" /></td>
        </tr>
        <tr>
            <td bgcolor="#ffffff" style="padding:40px 30px 40px 30px;">

            <table border="0" cellpadding="0" cellspacinig="0" width="100%">
                <tr>
                    <td bgcolor="#e95420" style="padding:10px 5px 10px 5px;font-size:20px;font-weight: bold;color:white;">Hi</td>
                </tr>
                <tr>
                    <td style="padding:10px 5px 10px 5px;text-align: justify;">
                        <p>You are reciving this email , since you subscribed to our newsletter from {{ $email }}</p>
    
                        <p>
                        If you agree to receive our newsletter in future, please follow the below mentioned link to Confirm your subscribtion
                        <a href="http://www.morecreditcardservices.com/newsletter/confirm/{{$email}}/1"><strong>CONFIRM</strong></a>
                        </p>
                    
                        <p>
                        If you have not subscribed to our Newsletter, please follow the below mentioned link to Unsubscribe from our newsletter listing
                        <a href="http://www.morecreditcardservices.com/newsletter/confirm/{{$email}}/0"><strong>UNSUBSCRIBE</strong></a>
                        </p>

                    </td>
                </tr>
                <tr>
                    <td>
                        Thank You,
                        <br> 
                        <strong>Darwin & Tarik Richards </strong>
                        <br>
                        <strong>More Credit Card Services®, LLC</strong>

                    </td>
                </tr>
            </table>


            </td>
        </tr>
        <tr>
            <td bgcolor="#e95420">
            
            <table>
                <tr>
                    <td style="padding:5px;color:white;text-align: center">Please add mailman@morecreditcardservices.com to your whitelist contacts, so that our future emails are not flagged as spam. All our future emails will be sent from mailman@morecreditcardservices.com only</td>
                </tr>
                <tr>
                    <td style="padding:5px;color:white;text-align: center;"><a href="http://www.morecreditcardservices.com/contactus" style="text-decoration-style: none;">Contact Us Directly</a></td>
                            
                </tr>
                <tr>
                    <td style="padding:5px;color:white;text-align: center;">Please do not reply, this is an auto generated email.</td>
                </tr>
            </table>

            </td>
        </tr>
        </table>


</body>


</html>