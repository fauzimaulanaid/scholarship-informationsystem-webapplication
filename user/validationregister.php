<!DOCTYPE HTML>  
    <html>
        <head>
            <link rel="icon" type="image/ico" href="../img/sing.png" />
            <title>Validation User Data - Fauzi Scholarship Website</title>
            <link rel="stylesheet" href="../css/app2.css" />
            
        </head>
    <body>  
        <div class="card">

        <?php
            //Create the connection string
            include ("../db_connect.php");
            $c = $_POST["username"];
            //Create the query string to read data
            $query = "select * from user where username='$c'";

            //Check the data
            $result = mysqli_query($con, $query);

            if(!$result){
                die("*** Fail to fetch the data <br/> Error Message"
                .mysqli_error($con));
            };
            $row = mysqli_fetch_assoc($result);
            $usr = $row["username"];

            $nameErr = $userrnameErr = $roleErr = $pwErr = "";
            $name  = $userrname = $role = $pw = "";


            if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($_POST["name"])) {
                $nameErr = "*Full name is required";
            } else {
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z ]*$/",$_POST["name"])) {
                $nameErr = "*Only letters and white space allowed (Full Name Field)";
                }else{
                    $name = $_POST["name"];
                }
            }

            if (empty($_POST["username"])) {
                $userrnameErr = "*Username is required";
            } else {
                // check if name only contains letters and whitespace
                if (!preg_match('/^[a-z0-9]{5,}$/', $_POST["username"])) {
                $userrnameErr = "*Only lowercase and number allowed and at least 5 char (Username Field)";
                }elseif($_POST["username"] == $usr){
                    $userrnameErr = "*Username is not available (already used)";
                }else{
                    $userrname = $_POST["username"];
                }
            }

            if (empty($_POST["userrole"])) {
                $roleErr = "*Role is required";
            } else {
                $role = $_POST["userrole"];
            }

            if (empty($_POST["password"])) {
                $pwErr = "*Password is required";
            } else {
                // check if name only contains letters and whitespace
                if (!preg_match('/.{6,}/', $_POST["password"])) {
                $pwErr = "*Invalid password (should be at least 6 char)";
                }else{
                    $pw = $_POST["password"];
                }
            }

            include ("../db_disconnect.php");
                
            if (empty($nameErr) && empty($userrnameErr) && empty($roleErr) && empty($pwErr)){
                    echo "<h2>Your Input:</h2>";
                    echo ("Full Name : ");
                    echo $name;
                    echo "<br>";
                    echo "<br>";
                    echo ("Username : ");
                    echo $userrname;
                    echo "<br>";
                    echo "<br>";
                    echo ("User Role : ");
                    echo $role;
                    echo "<br>";
                    echo "<br>";
                    echo ("Password : ");
                    echo $pw;

                //1. Connect to the database

                include ("../db_connect.php");
                //3. Save the data using the query
                $query = "
                insert into user(
                    fullname
                    ,username
                    ,userpassword
                    ,userrole
                ) values (
                    '$name'
                    ,'$userrname'
                    ,'$pw'
                    ,'$role'                  
                );
                ";
                
                //4. Execute the query and save the status in $query
                $status = mysqli_query($con, $query);

                if(!$status){
                    die("</br> *** Fail to cerate user account </br> ERROR;"
                    .mysqli_error($con));
                    ?>
                        <br/>
                        <a href="../index.php">Return to the login page</a>
                        <br/>
                        <br/>
                    <?php
                }else{

                ?>
                    <h2>User Account has successfully created</h2>
                    <br/>
                    <a href="../index.php">Return to the login page</a>
                    <br/>
                    <br/>
                    <footer>
                        Copyright &copy; 2020 Muhammad Fauzi Maulana. All rights reserved.
                    </footer>

                <?php
                }
                //Close database connection
                    include ("../db_disconnect.php");

                ?>


                    <?php
            }else{
                echo "<h2>ERROR</h2>";
                ?>
                <div class="error">
                <?php

                if (!empty($nameErr)){
                    echo $nameErr;
                    echo "<br>";
                    echo "<br>";
                }
                if (!empty($userrnameErr)){
                    echo $userrnameErr;
                    echo "<br>";
                    echo "<br>";
                }

                if (!empty($roleErr)){
                    echo $roleErr;
                    echo "<br>";
                    echo "<br>";
                }
                if (!empty($pwErr)){
                    echo $pwErr;
                    echo "<br>";
                    echo "<br>";
                }

                echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
                
                ?>
                </div>
                <?php
            }
            
        }

        ?>

    </body>

    </div>
</html>