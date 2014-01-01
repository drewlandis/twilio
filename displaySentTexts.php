<?php

require_once('path/to/twilio-php/Services/Twilio.php');
?>
   <style>
      table, td, tr {
         border:1px solid black;
         padding:2px;
         border-collapse:collapse;
      }
   </style>
<?php

// set your AccountSid and AuthToken from www.twilio.com/user/account
$AccountSid = "AC0f578a5f52240e5aec741182dc67b08c";
$AuthToken = "7ceda0ff6aafb3604ccff43bcaca716f";
$client = new Services_Twilio($AccountSid, $AuthToken);

$messages = $client->account->messages->getIterator(0, 50, array()); 
//                                             page:0  pageSize:50  ?????

$i=0;
print '<table>';
foreach ($messages as $message) { 
   ?>
   <tr>
      <td><?php print $i++; ?></td>
      <td width="250px"><?php print $message->date_sent; ?></td>
      <td><?php print $message->direction; ?></td>
      <td><?php print $message->body; ?></td>
   </tr>
   <?php
}
print '</table>';


?>
