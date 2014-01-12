<?php
    header("content-type: text/xml");
    echo('<?xml version="1.0" encoding="UTF-8"?>');

    $email = 'templetonabq@gmail.com';
?>
<Response>
    <Say>Hello. Thanks for calling the templeton team at keller williams realty. Your call is very important to us, please leave a message and we will get back to you as soon as possible!</Say>
    <Record transcribe="true" transcribeCallback="<?php
        echo "transcribed.php?email=".urlencode($email); ?>"
        action="goodbye.php" maxLength="30" />
</Response>
