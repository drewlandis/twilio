<?php

require_once('twilioApp.inc');
?>
   <style>
      table, td, tr {
         border:1px solid black;
         padding:2px;
         border-collapse:collapse;
      }
   </style>
<?php

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
