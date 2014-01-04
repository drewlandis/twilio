<?php


require_once("appConstants.inc");
require_once(BASE_FILE_PATH."/twilio/infusionsoftApp.inc");

function logMessage($msg) {
   $logFile=LOG_FILE_PATH;
   $email=ADMIN_EMAIL;
   exec("echo '[".date('Y-m-d H:i:s')."] $msg' >> ".$logFile);
   //mail("$email", "Error from DX download", $msg);
}

function mailError($msg) {
   mail(ADMIN_EMAIL, "InfusionSoftError", $msg);
}

function addContactEmail($fName, $phNumber, $eMail) {
   global $app;

   // complete list of DB field names: http://help.infusionsoft.com/developers/tables/contact
   $conDat = array('FirstName' => $fName,
                   'Phone1'    => $phNumber,
                   'Email'     => $eMail);

   $conId = $app->addCon($conDat);

   return $conId;
}

function addContactName($phNumber, $name) {
   global $app;

   // complete list of DB field names: http://help.infusionsoft.com/developers/tables/contact
   $conDat = array('FirstName' => $name,
                   'Phone1'    => $phNumber);

   $conId = $app->addCon($conDat);

   return $conId;
}

function addToFollowUpSequence($contactId, $seqId) {
   // Marketing > Legacy > Legacy > View Follow-up Sequences
   global $app;

   $rs = $app->campAssign($contactId, $seqId);

   return $rs;
}

function loadContact() {
   global $app;

   // complete list of DB field names: http://help.infusionsoft.com/developers/tables/contact
   
   $cid = 36;
   $returnFields = array('Email', 'FirstName', 'LastName');
   $conDat = $app->loadCon($cid, $returnFields);

   return $conDat;
}

?>
