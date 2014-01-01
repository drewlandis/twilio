<?php

require_once("path/to/twilio-php/Services/Twilio.php");

// set your AccountSid and AuthToken from www.twilio.com/user/account
$AccountSid = "AC0f578a5f52240e5aec741182dc67b08c";
$AuthToken = "7ceda0ff6aafb3604ccff43bcaca716f";
$client = new Services_Twilio($AccountSid, $AuthToken);


?>
