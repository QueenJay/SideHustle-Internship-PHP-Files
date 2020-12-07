<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "shopclassy" ;

// function getConnection($serverName, $dbName, $userName , $password){
//     $conn = new PDO ("mysql:host=$serverName;dbname=$dbName" , $userName, $password);
//     return $conn;
// }
        
$conn = new PDO ("mysql:host=$serverName;dbname=$dbName" , $userName, $password);
        
    
 
?>


