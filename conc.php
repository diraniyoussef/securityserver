
<?php
$host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "security_db";

$con = new mysqli($host, $db_user, $db_password, $db_name);

if($con)
{
	echo "Connection Success we are connected to $db_name\n";
}
else
{
	echo "Connection Failed";
} 

?>

