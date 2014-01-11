<?php
//Sample Database Connection Syntax for PHP and MySQL.

//Connect To Database

require_once('../../twilioApp.inc');

$hostname=$db_host;
$username=$db_user;
$password=$db_passwd;
$dbname=$db_name;
$usertable="test_table";
$yourfield = "f_name";

mysql_connect($hostname,$username,$password) or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.'),history.go(-1)</script></html>");
mysql_select_db($dbname);

# Check If Record Exists

$query = "SELECT * FROM $usertable";

$result = mysql_query($query);

print '<pre>';
print_r(mysql_fetch_array($result));
print '</pre>';

print '</br>';
print '</br>';
print '</br>';
print '</br>';

if($result) {
   while($row = mysql_fetch_array($result)) {
      $name = $row["$yourfield"];
      echo "Name: ".$name."<br>";
   }
}

?> 
