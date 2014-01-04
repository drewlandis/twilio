<?php

require_once("../twilioApp.inc");
require_once("../AppData.inc");

$sendingPhNumber = "505-488-0090";

// this is the clients phone number
$From = $_REQUEST['From'];

// the body of this text _should_ contain numbers
$body = trim($_REQUEST['Body']);

// verify a text message body is present...
if (!$body) {
   $msg = "ERROR: blank text message body.\n".
          "file: ".__FILE__." line: ".__LINE__."\n".
          "_REQUEST['From']: ".$_REQUEST['From']."\n".
          "_REQUEST['Body']: ".$_REQUEST['Body'];
   logMessage($msg);
   mailError($msg);
   exit;
}

$error = false;

/* switch on "body" */
switch($body) {
   /* switch based on action */
   case '37373':
      $msg = 'It looks like you are checking out property XYZ, Here is some extra info about it...';
      break;
   case '46464':
      $msg = 'It looks like you are checking out property ABC, Here is some extra info about it...';
      break;
   default:
      $error = true;
      $msg = "sorry, I can't recognize the numbers that you sent, please try again.";
}

// respond to client via text message
$sms = $client->account->sms_messages->create(
   $sendingPhNumber, // From this ph number
   $From, // recipient ph number
   $msg
);

// if there is no error, add client's number to infusionsoft
if(!$error) {
   // add clients information to infusionsoft
   $name='twilio_'.$body;
   $contactId = addContactName($From,$name);

   // add client to infusionsoft follow-up sequence
   $seqId = 36; // leadBasedPaint
   $rs = addToFollowUpSequence($contactId,$seqId);
}


?>
