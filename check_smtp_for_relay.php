<?php
/**
* https://github.com/BeLove/pentest-tools
* @sergeybelove
*
**/

require_once ('Mail.php'); // PEAR Mail package

$recipients = 'sergeybelove@gmail.com'; //CHANGE

$headers['From']    = 'admin@victim.com'; //CHANGE
$headers['To']      = $recipients; //CHANGE
$headers['Subject'] = 'Test subj';

$body = 'Test message';

// Define SMTP Parameters

$params['host'] = 'XXX.YYY'; // change
$params['port'] = '143';
$params['auth'] = false;
$params['localhost'] = "hacker.com";
//$params['username'] = 'USERNAME'; //CHANGE
//$params['password'] = 'PASSWORD'; //CHANGE

/* The following option enables SMTP debugging and will print the SMTP 
conversation to the page, it will only help with authentication issues,
if PEAR::Mail is not installed you won't get this far. */

$params['debug'] = 'true';

// Create the mail object using the Mail::factory method

$mail_object =& Mail::factory('smtp', $params);

// Print the parameters you are using to the page

foreach ($params as $p){
        echo "$p\n";
}

// Send the message

$mail_object->send($recipients, $headers, $body);
if (PEAR::isError($mail_object)) { 
    echo $mail->getMessage();
}
?> 