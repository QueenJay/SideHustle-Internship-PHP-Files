<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "test" ;

//creating onnection

$con = mysqli_connect ($serverName, $userName, $password, $dbName);

if(mysqli_connect_errno()){
    echo "Failed to connect!";
    exit();
}

echo "Connection success!" ;


?>