<?php

require_once("appConstants.inc");
require_once(BASE_FILE_PATH."/infusionsoft/PHP-iSDK/src/isdk.php");

$app = new iSDK;

// set connectionName
$app->cfgCon("findSantaFeHomes");

// enable logging (0 is off, 1 is on)
$app->enableLogging(1);

// set log file location
$app->setLog(BASE_FILE_PATH.'/twilio/apilog.csv');

?>
