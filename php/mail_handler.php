<?php

/* Configuration */
/*your web-mail*/
$mailto  = 'your webmail here';


$name     	= strip_tags($_POST['first_name']);
$sub     	= strip_tags($_POST['sub']);
$email      = strip_tags($_POST['email']);
$comments   = strip_tags($_POST['message']);

$subject = "[Contact Form]";

// HTML for email to send submission details
$body = "
<br>
<p><b>Message</b>: $comments</p>
<p><b>Name</b>: $name <br>
<p><b>Subject</b>: $sub <br>
<b>Email</b>: $email<br>
";


// Success Message
$success = "Sent";
$error = "Failed";


$headers = "From: $name <$email> \r\n";
$headers .= "Reply-To: $email \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$headers2 = "From:" . $mailto;
$message = "<html><body>$body</body></html>";

if(empty($name) || empty($sub) || empty($email) || empty($comments) ){

    echo "Fill The Form Properly"; // message
    header("Location: http://home-page-link"); //go to home page
    die();
    
}

else {

    if (mail($mailto, $subject, $message, $headers)) {
        echo "$success"; // success
    } else {
        echo "$error"; // failure
    }
}

