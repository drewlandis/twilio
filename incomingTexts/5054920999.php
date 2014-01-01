<?php

require_once("app.inc");

$sendingPhNumber = "505-492-0999";
$errorPhNumber = "505-259-3798"; //Drew

$error = false;
$errorMsg = 'ERROR:';

/*
see docs at: https://www.twilio.com/docs/api/twiml/sms/twilio_request
Possible POST fields:
AccountSid
MessageSid
Body
ToZip
ToCity
FromState
ToState
SmsSid
To
ToCountry
FromCountry
SmsMessageSid
ApiVersion
FromCity
SmsStatus
NumMedia
From
FromZip
*/

$From = $_POST['From'];
$Body = $_POST['Body'];

$msg = '$From: '.$From.' $Body: '.$Body;

if ($error) {
   // When errors occur, send a text about the error here
   $sms = $client->account->sms_messages->create(
      $sendingPhNumber, // From this ph number
      $errorPhNumber, // recipient ph number
      $errorMsg
   );

   // Display a confirmation message on the screen (for GUI's only)
   print "ERROR, sent message: ".$sms->sid."\n </br>";
   print "sendingPhNumber: ".$sendingPhNumber."\n </br>";
   print "(recipient) errorPhNumber: ".$errorPhNumber."\n </br>";
   print "errorMsg: ".$errorMsg."\n </br>";
} else {
   // No error, email the client!
   $sms = $client->account->sms_messages->create(
      $sendingPhNumber, // From this ph number
      $From, // recipient ph number
      $msg
   );

   // Display a confirmation message on the screen (for GUI's only)
   print "SUCCESS, sent message: ".$sms->sid."\n </br>";
   print "sendingPhNumber: ".$sendingPhNumber."\n </br>";
   print "(reply to this number - recipient) From: ".$From."\n </br>";
   print "msg: ".$msg."\n </br>";
}

?>
