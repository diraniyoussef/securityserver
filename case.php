<?php
$con = mysqli_connect( 'localhost', 'root', '', 'security_db' );
// Check connection
if ( mysqli_connect_errno() )
{
    echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
}


					
			
                    $sql = "SELECT * FROM `case`;";

			
		

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


mysqli_close( $con );

?>