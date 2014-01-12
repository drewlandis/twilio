<?php

require_once("appConstants.inc");
require_once(BASE_FILE_PATH."/twilio-php/Services/Twilio.php");
require_once(BASE_FILE_PATH."/../twilioAuthToken.inc");

// set your AccountSid and AuthToken from www.twilio.com/user/account
$client = new Services_Twilio($AccountSid, $AuthToken);


?>
