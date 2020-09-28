<?php
require_once 'conc.php';

if(  isset($_POST['village']))
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
		$village=$_POST['village'];
		if(empty($village))
		{
			echo"village is empty";
		}
		else{
				if (!empty($village)) {
					
				# code...
                    $sql = "SELECT `user`.`id`, `police_village`.`police_id`
                    FROM `user`
                        , `police_village`
                    WHERE `user`.`village` = '$village'AND`police_village`.`village_name`= '$village' ;";

				}
			}
	}	

    if ( $result = mysqli_query( $con, $sql ) )
    {	if (!$result) {
		die("query failed");
	
        }
        $resultCheck=mysqli_num_rows($result);
        $emparray = array();
        while( $row = mysqli_fetch_assoc( $result ) )
        $emparray[] = $row;

        echo( json_encode( $emparray ) );

        // Free result set
        mysqli_free_result( $result );
    }
}

mysqli_close( $con );

?>