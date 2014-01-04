<?php

require_once("../twilioApp.inc");
require_once("../AppData.inc");

$sendingPhNumber = "505-492-0999";

// this is the clients phone number
$From = $_REQUEST['From'];

// the body of this text _should_ contain an email address
preg_match('/\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b/i',$_REQUEST['Body'],$matches);
$email = $matches[0];

// verify an email is present...
if (!$email) {
   $msg = "ERROR: could not find email address in text message body.\n".
          "file: ".__FILE__." line: ".__LINE__."\n".
          "_REQUEST['From']: ".$_REQUEST['From']."\n".
          "_REQUEST['Body']: ".$_REQUEST['Body'];
   logMessage($msg);
   mailError($msg);

   // format text message and respond to client
   $msg = "sorry, we couldn't recognize the email address that you sent, please send it again.";
   $sms = $client->account->sms_messages->create(
      $sendingPhNumber, // From this ph number
      $From, // recipient ph number
      $msg
   );

   exit;
}

// ping email address to make sure that it is legit
// TODO: figure out if this is possible and/or how hard it is

// format text message and respond to client
$msg = 'Thanks for the text!  We just emailed information about this property to: '.$email;
$sms = $client->account->sms_messages->create(
   $sendingPhNumber, // From this ph number
   $From, // recipient ph number
   $msg
);

// add clients information to infusionsoft
$contactId = addContactEmail('Twilio',$From,$email);

// add client to infusionsoft follow-up sequence
$seqId = 36; // leadBasedPaint
$rs = addToFollowUpSequence($contactId,$seqId);

// This section sends the email.
$to = $email;
$subject = "Information about XYZ";
$message = "Hi, thanks for your text.  Here is information about the house that you just looked at:\n";
$message.= "\n";
$message.= "information goes here...\n";
$message.= "\n";
$message.= "-the templeton team\n";
$headers = "From: templetonabq@gmail.com";
mail($to, $subject, $message, $headers);

?>
