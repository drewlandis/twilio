<?php

require_once("../twilioApp.inc");

$sendingPhNumber = "505-492-0999";
$To = "505-301-0694";

$Sender = $_POST['From'];
$Body = $_POST['Body'];

$msg = 'Sent by: '.$Sender.' Body: '.$Body;

$sms = $client->account->sms_messages->create(
   $sendingPhNumber, // From this ph number
   $To, // recipient ph number
   $msg
);

?>
