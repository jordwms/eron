<?php
/*
*	The goal of this PHP file is:
* 	1. To collect form data and identify which form it comes from
*	2. Sanitize the form data
*	3. Email the sanitized data to a pre-specified address
*/
$clean_arr = sanitize();
mail_time( $clean_arr );

// Cleans the $_POST array values
function sanitize() {
	foreach($_POST as $key => $val) {
		$clean_arr[$key] = test_input($val);
	}
	return $clean_arr;

}

function mail_time($form_data) {
	$to = 'JordWms@Gmail.com';
	$subject = "Some dumb schmuck filled out all of our forms!";
	$message = "";
	$from = "someone@example.com";
	$headers = "From:".$from;
	foreach ($form_data as $key => $value) {
		$message.= "$key = $value\n";
	}

	// Returns true if it sends successfully
	// AJAX will use this to know if the user is signed up successfully
	$bool =  mail($to, $subject, $message, $headers);
	var_dump($bool);
	return $bool;
	// return print_r($message); die;

}

/*
*	Simple sanitization.
*	trim() cuts leading/trailing white space and line breaks
*	stripslashes() does what it says
*	htmlspecialchars() puts everything in harmless html special characters, 
*		suitable for email and web pages, but will keep hackers at bay
*/
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}