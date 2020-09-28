
<?php
include 'conc.php';
/*
echo "inside login.php where the database user is $db_user\n";
if( empty($con) ) {
    echo "\$con is empty\n";
} else {
    echo "\$con is Not empty\n";
}
//$con = mysqli_connect( 'localhost', 'root', '', 'security_db' );
*/
if ( isset( $_POST['fullname'] ) && isset( $_POST['phone'] ) && isset( $_POST['password'] ) )
{
    if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        $fullname = $_POST['fullname'];
        $phone = $_POST['phone'];
        $password= $_POST['password'];
        if ( empty( $fullname ) || empty( $phone ) || empty( $password ) )
        {
            echo 'Either fullname, phone, or password is empty';
        } else {
            $sql = "SELECT * FROM `user` WHERE `password`= '$password' AND `phone`='$phone'";
            echo "User info are : $fullname, $phone, $password\n";
        }
    }

    $result = mysqli_query( $con, $sql );
    if ( !$result ) {
        echo "query didn't work, so killing.\n";
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