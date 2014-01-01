<?php


require_once("appConstants.inc");

function addContactEmail($phNumber, $eMail) {
   require_once(BASE_FILE_PATH."twilio/infusionsoftApp.inc");

   // complete list of DB field names: http://help.infusionsoft.com/developers/tables/contact
   $conDat = array('FirstName' => 'Foo baz',
                   'Phone1'    => $phNumber,
                   'Email'     => $eMail);

   $conId = $app->addCon($conDat);

   return $conId;
}

function addContactName($phNumber, $name) {
   require_once(BASE_FILE_PATH."twilio/infusionsoftApp.inc");

   // complete list of DB field names: http://help.infusionsoft.com/developers/tables/contact
   $conDat = array('FirstName' => $name,
                   'Phone1'    => $phNumber);

   $conId = $app->addCon($conDat);

   return $conId;
}

function loadContact() {
   require_once(BASE_FILE_PATH."twilio/infusionsoftApp.inc");

   // complete list of DB field names: http://help.infusionsoft.com/developers/tables/contact
   
   $cid = 36;
   $returnFields = array('Email', 'FirstName', 'LastName');
   $conDat = $app->loadCon($cid, $returnFields);

   return $conDat;
}

?>
