<?php
    //  *************** Numeric Arrays  ***************
    echo "<h1>Numeric Arrays</h1>";
    $name1 = "David";
    $name2 = "Dele";
    $name3= "Shade";
    $name4 = "Olamide";


    //declearing arrays
    $AfricanCountries = array("Ethiopia", "Tanzania", "Uganda", "Mozambique", "Sudan");

    echo "The 1st item in our array is: ".$AfricanCountries[0]."<br/>";
    echo "The 2nd item in our array is: ".$AfricanCountries[1]."<br/>";
    echo "The 3rd item in our array is: ".$AfricanCountries[2]."<br/>";
    echo "The 4th item in our array is: ".$AfricanCountries[3]."<br/>";
    echo "The 5th item in our array is: ".$AfricanCountries[4]."<br/>";


    // Changing arra value using index.
    // $Usernames[4] = "Rose";
    // echo $Usernames[4];







    //  *************** Associative Arrays  ***************
    echo "<h1>Associative Arrays</h1>";

    $CountryCapital = array(
                        "$AfricanCountries[0]" => "Addis Ababa",
                        "$AfricanCountries[1]" => "Dodoma",
                        "$AfricanCountries[2]" => "Kampala",
                        "$AfricanCountries[3]" => "@#Maputo"
                    );

    echo "$AfricanCountries[3]'s Capital is <strong>".$CountryCapital["$AfricanCountries[3]"]."</strong>";

    // in associative array; strings or variables can be used as the key while values can be string or numerical form







    //  *************** Multi-dimensional Arrays  ***************
    echo "<h1>Multi-dimensional Arrays</h1>";
    
    $ContiCountry = array(
                            //Europian Countries
                            "Europe"    =>  array("Belarus", "Russia", "Monaco"),
                            //Asian Countries
                            "Asia"      =>  array("Thailand", "Japan", "Kuwait"),
                            //Australian COuntries
                            "Australia"     =>  array("Samoa", "Vanuatu", "Palau")
    );



    // echo $oniline_store["Cars"][2];

    // Users ordering items from different categories.
    echo "$AfricanCountries[3] Ignores <strong>".($ContiCountry["Europe"][1])."</strong><br/>";
    echo ($ContiCountry["Europe"][1])." added to <strong>Colonized list</strong>";


?>