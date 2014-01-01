<?php

require_once("app.inc");

// complete list of DB field names: http://help.infusionsoft.com/developers/tables/contact
$conDat = array('FirstName' => 'Foo',
                'LastName'  => 'Baz',
                'Email'     => 'JDoe@email.com',
                'Phone1'    => '5051234567');

$conId = $app->addCon($conDat);

print "</br>\n";
print_r($conId);
print "</br>\n";

?>
