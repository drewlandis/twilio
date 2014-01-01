<?php

require_once("../../infusionsoft/PHP-iSDK/src/isdk.php");

$app = new iSDK;

// set connectionName
$app->cfgCon("findSantaFeHomes");

// enable logging (0 is off, 1 is on)
$app->enableLogging(1);

// set log file location
$app->setLog('apilog.csv');

?>
