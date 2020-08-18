<?php
$con = mysqli_connect( 'localhost', 'alicheaib', 'alicheaib1', 'security server' );
require 'conc.php';
if ( isset( $_POST['fullname'] ) && isset( $_POST['phone'] ) )
 {
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        $fullname = $_POST['fullname'];
        $phone = $_POST['phone'];
        if ( empty( $fullname ) && empty( $phone ) )
        {
            echo'fullname and phone is empty';
        } else {
            $sql = "SELECT * FROM `user` WHERE `fullname`= '$fullname' AND `phone`='$phone'";
            echo"$fullname,$phone";
        }
    }

    $result = mysqli_query( $con, $sql );
    if ( !$result ) {
        die( 'query failed' );

    }
    $resultCheck = mysqli_num_rows( $result );
    $response = array();

    if ( mysqli_num_rows( $result ) > 0 )
 {
        $row = mysqli_fetch_row( $result );
        $fullname = $row[0];

        $code = 'login_success';
        array_push( $response, array( 'code'=>$code, 'fullname'=>$fullname ) );
        echo json_encode( $response );

    } else {
        $code = 'login_failed';
        $message = 'Wrong Credentials.';
        // Warning is from line 32 an33
        array_push( $response, array( 'code'=>$code, 'message'=>$message ) );
        echo json_encode( $response );
    }
} else {
    echo 'please enter both name and phone.';
}

mysqli_close( $con );

?>