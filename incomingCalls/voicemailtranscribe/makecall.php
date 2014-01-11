<?php

require_once("../../twilioApp.inc");

/* Outgoing Caller ID you have previously validated with Twilio */
$CallerID = '+15054880090';

/* Validate request */
if (!isset($_REQUEST['number'])) {
   $err = urlencode("Must specify phone number");
   header("Location: .?msg=$err");
   die;
}

if (!isset($_REQUEST['email'])) {
   $err = urlencode("Must specify email address");
   header("Location: .?msg=$err");
   die;
}

if (!preg_match('/^[a-z0-9_.-]+@([a-z0-9_-]+\.)+[a-z0-9_-]{2,4}$/i', $_REQUEST['email'])) {
   $err = urlencode("Invalid email address");
   header("Location: .?msg=$err");
   die;
}

$url = BASE_URL_PATH."/twilio/incomingCalls/voicemailtranscribe/makerecording.php?email="
   . urlencode($_REQUEST['email']);

/* make Twilio REST request to initiate outgoing call */
try {

   $call = $client->account->calls
      ->create($CallerID, $_REQUEST['number'], $url);

   /* redirect back to the main page with CallSid */
   $msg = urlencode("Calling... ".$_REQUEST['number']);
   header("Location: .?msg=$msg&CallSid=" . $call->sid);

} catch(Exception $e) {

   $err = urlencode($e->getMessage());
   header("Location: .?msg=$err");
   die;

}

?>
