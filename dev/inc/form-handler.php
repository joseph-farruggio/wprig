<?php

// Function for handling the contact form
function yourwebsite_contactform_init() {

// Enable any admin to run ajax_login() in AJAX and POST the form
add_action( 'wp_ajax_yourwebsite_contactform', 'yourwebsite_contactform_process' );

// Enable any user with no privileges to run ajax_login() in AJAX and POST the form
add_action( 'wp_ajax_nopriv_yourwebsite_contactform', 'yourwebsite_contactform_process' );
}

// Initiate the ajax enquiry form and add the validation javascript file
add_action( 'init', 'yourwebsite_contactform_init' );
add_action( 'wp_enqueue_scripts', 'yourwebsite_contactform_init' );

// Function to send the email using the email template
function yourwebsite_contactform_process() {

        echo "YO YOY YOYOY";
/**
 * Display errors
 */
if ( ! function_exists('debug_wpmail') ) :
	function debug_wpmail( $result = false ) {
		if ( $result )
			return;
		global $ts_mail_errors, $phpmailer;
		if ( ! isset($ts_mail_errors) )
			$ts_mail_errors = array();
		if ( isset($phpmailer) )
			$ts_mail_errors[] = $phpmailer->ErrorInfo;
		print_r('<pre>');
		print_r($ts_mail_errors);
		print_r('</pre>');
	}
endif;
/**
 * Usage
 */
$res = wp_mail($to, $subject, $message);
debug_wpmail($res); // Will print_r array of errors




check_ajax_referer( 'secure-nonce-name', 'security' );
$to = array('joey@josephallendesign.com');
// If you want to send to several emails just add to the array like below
// $to = array( 'your@emailaccount.com', 'another@emailaccount.com' );
$subject = trim( $_POST[ 'subject' ] );

// This is the way to transfer the form $_POST values to the email template
$postdata = http_build_query( $_POST );
$opts = array( 'http' =>
        array(
        'method' => 'POST',
        'header' => 'Content-type: application/x-www-form-urlencoded',
        'content' => $postdata
        )
);
$content = stream_context_create( $opts );

// Load the email template and create the email contentl
$message = file_get_contents( get_template_directory_uri() . '/inc/email-template.php', false, $content );

// Set the email header which contains the forms fullname and the email address
$headers = 'From: ' . trim( $_POST[ 'name' ] ) . ' <' . trim( $_POST[ 'email' ] ) . '>' . "\r\n";

// Now loop through the $to email accounts
// If you don't do this it will send the email as a group send (i.e. each email account will see all the other email accounts)
foreach ( $to as $email_address ) {
        wp_mail( $email_address, $subject, $message, $headers );
}

// return the value of 1 to show it has been successful
// The form needs to return this value to confirm the email has been sent
echo '1';
die();
}

// Set the default email type as html instead of text only
function yourwebsite_contactform_set_content_type(){
return "text/html";
}
add_filter( 'wp_mail_content_type','yourwebsite_contactform_set_content_type' );



// if ( ! isset( $_POST['name_of_nonce_field'] ) || ! wp_verify_nonce( $_POST['name_of_nonce_field'], 'name_of_my_action' ) ) {
//         print 'Sorry, your nonce did not verify.';
//         exit;
// } else {
//         if($_POST && isset($_POST['name'], $_POST['email'], $_POST['website'], $_POST['subject'], $_POST['message'])) {
//                 //user posted variables
//                 $name = strip_tags($_POST['name']);
//                 $email = strip_tags($_POST['email']);
//                 $website = strip_tags($_POST['website']);
//                 $subject = strip_tags($_POST['subject']);
//                 $message = strip_tags($_POST['message']);

//                 //php mailer variables
//                 $to = 'joey.farruggio@bizrocket.net';
//                 $body = '
//                 <html>
//                 <body>
//                 <b>Biz Rocket Contact Form</b>

//                 <br /><br />
//                         <b>Contact Details:</b><br />
//                         Name: '.$name.'<br />
//                         Email: '.$email.'<br />
//                         Website: '.$website.'<br />
//                         Message: '.$message.'<br /><br />
//                 </body>
//                 </html>
//                         ';
//                 $headers = 'Content-Type: text/html; charset=UTF-8';
//                 $headers .= 'From: '.$name.' <'.$email.'>';

//                 // send email
//                 mail( $to, $subject, $body, $headers );
//         }
// }