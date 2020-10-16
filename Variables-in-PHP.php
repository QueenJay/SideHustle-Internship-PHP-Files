<?php

    //*********** This is a variable declaration ****************

    /*
        ======== Rules and regulation in variable declaration in PHP =============
        1) A variable must always start with a letter or an underscore.
        2) A variable name can only contain alpha-numeric character and underscore (A-z, 0-9 and _)
        3) Variable names are case sensitive
    */

    // 1
    $_underscore_variable = "John";
    $letterVariable = "john";


    //2
    $matric3 = "Sci/18/19/0101";

    //3
    $Age = 18;
    $age = 28;

    echo $Age; //how to echo a variable


    //*********** This is a constants declaration ****************
    define("pi", 3.14159);
    define("username", "lanresam");
    echo username; //how to call a constant


?>