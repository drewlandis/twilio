<?php

require_once("app.inc");

$cid = 36;

// complete list of DB field names: http://help.infusionsoft.com/developers/tables/contact
$returnFields = array('Email', 'FirstName', 'LastName');
$conDat = $app->loadCon($cid, $returnFields);

echo "<pre>\n";
print_r($conDat);
echo "</pre>\n";

?>
