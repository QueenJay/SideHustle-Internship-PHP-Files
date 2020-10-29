<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "test" ;

//creating using PDO
try{
    $con = new PDO ("mysql:host=$serverName;dbname=$dbName" , $userName, $password);
    
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "PDO Cmnnection Successful" ;
}

catch (PDOException $e){
    echo "Error in PDO connection ".$e->getMessage();
}





?>