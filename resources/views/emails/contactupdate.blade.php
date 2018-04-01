<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>{{ $title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin:0; padding:10px 0 0 0;" bgcolor="#F8F8F8">
    <h4>Hi {{ $name }}</h4>
    <p><strong>Your Contact Information has been updated in our Database</strong></p>
    
    <table>
        <thead>
            <tr>
                <th>Primary Contact</th>
                <th>Secondary Contact</th>
                <th>Postal Code</th>
                <th>Address</th>
                <th>Address Continued</th>
                <th>City</th>
                <th>Country</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $primary_contact_no  }}</td>
                <td>{{ $secondary_contact_no }}</td>
                <td>{{ $postal_code }}</td>
                <td>{{ $address }}</td>
                <td>{{ $address_continued }}</td>
                <td>{{ $city }}</td>
                <td>{{ $country }}</td> 
            </tr>
        </tbody>
    </table>
    
    <p> 
    <strong>
    D.Richards & Team.
    </strong>
   </p>
    
   <hr>
    <p>Please add mailman@morecreditcardservices.com to your whitelist contacts, so that our future emails are not flagged as spam. All our future emails will be sent from mailman@morecreditcardservices.com only</p>
    <p>To contact us directly, you can visit our
    <a href="http://www.morecreditcardservices.com/contactus">Contact Us</a>
    page
    </p>
    <p>Please do not reply, this is an auto generated email.</p>

</body>
</html>