
<?php

$host = "localhost";
$db_user = "alicheaib";
$db_password = "alicheaib1";
$db_name = "security server";

$con = new mysqli($host,$db_user,$db_password,$db_name);

if($con)
{
	echo "Connection Success we are connected to $db_name";
}
else
{
	echo "Connection Failed";
} 

?>

