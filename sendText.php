<?php

require_once('twilioApp.inc');

$sendingPhNumber = "505-492-0999";
$errorPhNumber = "505-259-3798"; //Drew

$error = false;
$errorMsg = "ERROR:";

if( isset($_GET['phNumber']) && $_GET['phNumber'] ){
   $phNumber = $_GET['phNumber'];
   $errorMsg .= ' phNumber='.$phNumber;
} else {
   $error = true;
   $errorMsg .= ' phNumber missing.';
}

if( isset($_GET['action']) && $_GET['action'] ) {
   $errorMsg .= ' action='.$_GET['action'];
   /* switch on "action" */
   switch($_GET['action']) {
      /* switch based on action */
      case 'test':
         if( isset($_GET['fName']) && $_GET['fName'] ){
            $fName = $_GET['fName'];
            $errorMsg .= ' fName='.$fName;
         } else {
            $error = true;
            $errorMsg .= ' fName missing.';
         }
         
         if( isset($_GET['lName']) && $_GET['lName'] ){
            $lName = $_GET['lName'];
            $errorMsg .= ' lName='.$lName;
         } else {
            $error = true;
            $errorMsg .= ' lName missing.';
         }

         if( isset($_GET['address1']) && $_GET['address1'] ){
            $address1 = $_GET['address1'];
            $errorMsg .= ' address1='.$address1;
         } else {
            $error = true;
            $errorMsg .= ' address1 missing.';
         }

         if (!$error) {
            $msg = 'Hi '.$fName.' '.$lName.', this is just a test.  Your address1 is: '.$address1;
         }
         break;
      case 'variableMsg':
         if( isset($_GET['textMsg']) && $_GET['textMsg'] ){
            $textMsg = $_GET['textMsg'];
            $errorMsg .= ' textMsg='.$textMsg;
         } else {
            $error = true;
            $errorMsg .= ' textMsg missing.';
         }

         if (!$error) {
            $msg = $textMsg;
         }
         break;
      default:
         $error = true;
         $errorMsg .= ' invalid action specified: '.$_GET['action'];
   }
} else {
   $error = true;
   $errorMsg .= ' action missing.';
}


if ($error) {
   // When errors occur, send a text about the error here
   $sms = $client->account->sms_messages->create(
      $sendingPhNumber, // From this ph number
      $errorPhNumber, // recipient ph number
      $errorMsg
   );

   // Display a confirmation message on the screen (for GUI's only)
   print "ERROR:\n </br>";
   print "sent message: ".$sms->sid."\n </br>";
   print "sendingPhNumber: ".$sendingPhNumber."\n </br>";
   print "(recipient) errorPhNumber: ".$errorPhNumber."\n </br>";
   print "errorMsg: ".$errorMsg."\n </br>";
} else {
   // No error, email the client!
   $sms = $client->account->sms_messages->create(
      $sendingPhNumber, // From this ph number
      $phNumber, // recipient ph number
      $msg
   );

   // Display a confirmation message on the screen (for GUI's only)
   print "SUCCESS:\n </br>";
   print "sent message: ".$sms->sid."\n </br>";
   print "sendingPhNumber: ".$sendingPhNumber."\n </br>";
   print "(recipient) phNumber: ".$phNumber."\n </br>";
   print "msg: ".$msg."\n </br>";
}

?>
