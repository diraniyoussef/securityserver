
<?php
require "conc.php";
if( isset($_POST['fullname']) && isset($_POST['phone']) && isset($_POST['village']) && isset( $_POST['phone'] ))
{
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$fullname = $_POST['fullname'];
		$phone = $_POST['phone'];
		$village=$_POST['village'];
		$password= $_POST['password'];
		if(empty($fullname)&&empty($phone)&&empty($password))
		{
			echo"fullname and phone is empty";
		}
		else{
				if (!empty($phone)) {
					
					# code...
					
					$sql = "SELECT * FROM `user` WHERE `phone`= '$phone'";
					echo"$fullname, $phone";
				}
			}
	}	
	$result = mysqli_query($con, $sql);
	if (!$result) {
		die("query failed");
	
	}
	$resultCheck=mysqli_num_rows($result);
	$response = array();

	if(mysqli_num_rows($result) > 0)
	{
		$code = "reg_failed";
		$message = "User already exist...";
		array_push($response, array("code" =>$code, "message"=>$message));
		echo json_encode($response);
	}
	else
	{	
		echo "result is empty";
		
		$sql = "INSERT INTO `user`(`full_name`, `phone`, `village`, `password`) VALUES ('$fullname','$phone','$village','$password')";
	
		$result = mysqli_query($con,$sql);
	
		if ( !$result ) {
			die( 'insert query failed' );
		} else {
			$code = "reg_success";
			$message = "User registered. Now you can login...";
			// Warning is from line 36 an37
			array_push($response, array("code" =>$code, "message"=>$message));
			echo json_encode($response);
		}
		
	}
} 
else {
	echo "please enter both name and phone.";
}

mysqli_close($con);

?>