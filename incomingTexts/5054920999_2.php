<?php
   header("content-type: text/xml");
   echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

$From = $_POST['From'];
$Body = $_POST['Body'];

$msg = '$From: '.$From.' $Body: '.$Body;

?>
<Response>
   <Message>Hello, Mobile Monkey <?php echo $msg; ?></Message>
</Response>
