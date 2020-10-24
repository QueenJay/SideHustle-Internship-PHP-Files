<?php

// Generating passwords with usernames

function UsernamesWithPassword(){

    // === Users' Array ===
    $myUsers = ["Funke", "Blessin", "Alex", "Felix", "Danjuma"];


    // Creating a new array from myUsers using randomization
    foreach($myUsers as $index => $value){
        $ToAdd = rand(100, 999);
        if(strlen($value) < 6){ // when lenght of myUser < 6 add 3 random numbers to myUser 
            $finalUsername[$index]  = $value.$ToAdd;
        } 
        elseif(strlen($value) >= 6 && strlen($value) < 8){ // when length of username is greater than 6 and < 8 leave myUser
            $finalUsername[$index] = $value;
        } 
        else{// when myUser is > 8 echo
            echo "Username cannot be less than 6 or more than 8 characters";
            return;
        } 
    }

    // === Password array ===
    $Password = ["mjk", "hgt", "old", "plr", "yho"];

    
    
    // create new password by conncatenating old and random numbers
    foreach($Password as $index => $value){
        $ToAdd = rand(100, 999);
        $password = $value.$ToAdd.$value;
        $finalpasswords[$index] = $password;
    }
    
    // ===== Display Final username and password =====
    for ($i=0; $i < count($finalUsername); $i++) { 
        echo "<h2>username : {$finalUsername[$i]} <br/> password : {$finalpasswords[$i]}</h2>";
    }
    return;
}


UsernamesWithPassword();

?>