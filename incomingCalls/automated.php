<?php
    header("content-type: text/xml");

    if (!isset($_REQUEST['email'])) {
        echo "Must specify email address";
        die;
    }
    echo('<?xml version="1.0" encoding="UTF-8"?>');
?>
<Response>
    <Say>Hello. This is a call from the Twilio voicemail transcription demo.
Please leave a voicemail after the beep, and remember to speak clearly.</Say>
    <Record transcribe="true" transcribeCallback="<?php
        echo "transcribed.php?email=".urlencode($_REQUEST['email']); ?>"
        action="goodbye.php" maxLength="30" />
</Response>
