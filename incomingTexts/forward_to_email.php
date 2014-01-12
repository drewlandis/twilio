<?php

header('Content-type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8"?>';

/**
 * This section sends the email.
 */
$to = "landis.d@gmail.com";
$subject = "Message from ".$_POST['From']." received at ".$_POST['To'];
$message = "The body of the text message says: ".$_POST['Body'];
$headers = "From: templetonabq@gmail.com";
mail($to, $subject, $message, $headers);

?>
