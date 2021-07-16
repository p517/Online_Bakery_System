<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "online_bakery_system";
    // session_start();
    $conn = mysqli_connect($server, $username, $password, $database);
    if(!$conn)
    {
        die("Error".mysqli_connect());
        // echo "Success!";
    }
    // else {
        
    // }
?>
