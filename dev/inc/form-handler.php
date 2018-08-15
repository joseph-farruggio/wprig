<?php

// add_action( 'wp_ajax_send_email', 'callback_send_email' );
// add_action( 'wp_ajax_nopriv_send_email', 'callback_send_email' );

// function callback_send_email(){
//         $name = $_REQUEST['name'];
//         $email = $_REQUEST['email'];
//         $website = $_REQUEST['website'];
//         $message= $_REQUEST['message'];
//         $subject = $_REQUEST['subject'];
//         $email_body = "The following prospectus has contacted you.<br>".
//         "Name: $name. <br>".
//         "Email: $email. <br>".
//         "Website: $website. <br>".
//         "Message: $message. <br>";
//         $to = "joey@josephallendesign.com";
//         $headers  = "MIME-Version: 1.0" . "\r\n";
//         $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
//         $headers .= "From: $name <$email> \r\n";
//         $headers .= "Reply-To: $email \r\n";
//         $mail = mail($to,$subject,$email_body,$headers);
//         if($mail){
//                 echo "Email Sent Successfully";
//         }
// }


//user posted variables
$name = strip_tags($_POST['name']);
$email = strip_tags($_POST['email']);
$website = strip_tags($_POST['website']);
$subject = strip_tags($_POST['subject']);
$message = strip_tags($_POST['message']);

//php mailer variables
$to = 'joey.farruggio@bizrocket.net';
$body = '
<html>
<body>
<b>Biz Rocket Contact Form</b>

<br /><br />
        <b>Contact Details:</b><br />
        Name: '.$name.'<br />
        Email: '.$email.'<br />
        Website: '.$website.'<br />
        Message: '.$message.'<br /><br />
</body>
</html>
            ';
$headers = 'Content-Type: text/html; charset=UTF-8';
$headers .= 'From: Joey <joey@josephallendesign.com>';

// send email
mail( $to, $subject, $body, $headers );

?>