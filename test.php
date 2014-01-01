<?php

require_once("appConstants.inc");
require_once(BASE_FILE_PATH.'twilio/AppData.inc');

//$conId = addContactEmail('5051234567','test@gmail.com');
//print $conId;

$conDat = loadContact();
print_r($conDat);


?>
