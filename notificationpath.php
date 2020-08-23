<?php
$con = mysqli_connect( 'localhost', 'alicheaib', 'alicheaib1', 'security server' );
// Check connection
if ( mysqli_connect_errno() )
 {
    echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
}
# code...
$sql = "SELECT `user`.`id`, `police_village`.`police id`
    FROM `user`
        , `police village`
    WHERE `user`.`village` = `police_village`.`village_name` ;";
if ( !empty( $result ) ) {
    if ( $result = mysqli_query( $con, $sql ) )
 {
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