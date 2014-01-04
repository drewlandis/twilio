<?php

require_once("../twilioApp.inc");
require_once("../AppData.inc");

$sendingPhNumber = "505-492-0777";

// this is the clients phone number
$From = $_REQUEST['From'];

// the body of this text _should_ contain a name
$name = $_REQUEST['Body'];

// verify an email is present...
if (!$name) {
   $msg = "ERROR: could not find a name in text message body.\n".
          "file: ".__FILE__." line: ".__LINE__."\n".
          "_REQUEST['From']: ".$_REQUEST['From']."\n".
          "_REQUEST['Body']: ".$_REQUEST['Body'];
   logMessage($msg);
   mailError($msg);
   exit;
}

// format text message and respond to client
$msg = "Thanks for the text $name!  Someone from my team will contact you as soon as possible about this listing.";
$sms = $client->account->sms_messages->create(
   $sendingPhNumber, // From this ph number
   $From, // recipient ph number
   $msg
);

// add clients information to infusionsoft
$contactId = addContactName($From,$name);

// add client to infusionsoft follow-up sequence
$seqId = 36; // leadBasedPaint
$rs = addToFollowUpSequence($contactId,$seqId);

// This section sends the email.
$to = ADMIN_EMAIL;
$subject = "Twilio Person to contact ASAP";
$message = "name: $name\n";
$message.= "number: $From";
mail($to, $subject, $message);

?>
