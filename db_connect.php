<?php
    //000webhost
    // $server = "localhost";
    // $username = "id13152479_fauzimaulana";
    // $password = "#Fm1521221712";
    // $database = "id13152479_scholarship";

    //xampp
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "scholarship";

                
    $con = mysqli_connect($server, $username, $password, $database);

        
    if(!$con){
        die("</br>*** Cannot connect to the server"
        . "</br>"
        . "Error message: "
        . mysqli_connect_error());
        }

?>