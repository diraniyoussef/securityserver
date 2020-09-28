<?php
require_once 'conc.php';

$sql = 'SELECT * FROM `village`;';

if ( $result = mysqli_query( $con, $sql ) )
{
    if ( !$result ) {
        die( 'query failed' );
    }
    //$resultCheck = mysqli_num_rows( $result );
    $village_array = array();
    while( $row = mysqli_fetch_assoc( $result ) )
        $village_array[] = $row;

    echo( json_encode( $village_array ) );

    // Free result set
    mysqli_free_result( $result );
}

mysqli_close( $con );

?>