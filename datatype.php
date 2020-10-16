<?php

    //***********  PHP Datatypes ****************

    $string = "words or letters of the alphabet";
    $integer = 3;
    $float = 123.678;
    $boolean = true;
    $booleanFalse = false;
    $array = array("David", "shegun", "Amaka", "Purple");
    /* Others
        $objects
        $null
        $reasource
        */


    echo "<h1>String Data type</h1>";
    $name = "lanre ";
    $surname = "Smith";
    echo $name;


    //Integer are whole numbers
    echo "<h1>Integer Data type</h1>";
    $age = 12;
    echo $age;

    //float are decimal numbers
    echo "<h1>Float Data type</h1>";
    $number = 123.893;
    echo $number;

    /*Concartenation in php. Note that you don't concatenate with '+' as 
     PHP tends to add up to string therefore leading to error */
    echo "<h1>Concartenation</h1>";
    echo $name.$surname;


    //Addition in php
    echo "<h1>Addition</h1>";
    $num = $age + $number;
    echo "$age + $number = ".$num;

?>