<?php 
    $db_localhost = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "newosms";
    $db_port = 3306;
    $conn = new mysqli($db_localhost, $db_user, $db_password, $db_name, $db_port);
    if($conn->connect_error) {
        die("Connection Failed");
    }
    //  else {
    //     echo "connected";
    // }
    // $conn = mysqli_connect("localhost", "root", "", "newosms") or die("Connection failed");
?>