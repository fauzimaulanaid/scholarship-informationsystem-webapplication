<!DOCTYPE HTML>  
    <html>
        <head>
            <link rel="icon" type="image/ico" href="../img/sing.png" />
            <title>Validation Input Data - Fauzi Scholarship Website</title>
            <link rel="stylesheet" href="../css/app2.css" />
            
        </head>
    <body>  
    <?php 
        session_start();
    
        // cek apakah yang mengakses halaman ini sudah login
        if($_SESSION['userrole']==""){
            header("location:../index.php?message=loginfirst");
        }
        if($_SESSION['userrole']=="viewer"){
            header("location:../viewer/view.php?message=notadmin");
        }
    
    ?>
        <div class="card">

        <?php
            $nameErr = $emailErr = $genderErr = $webErr = $dateErr = $addErr = $phoneErr = $univErr = $sgErr  = "";
            $name = $email = $gender = $comment = $web = $date = $add = $phone = $univ = $sg = $action = "";


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

            if (empty($_POST["gender"])) {
                $genderErr = "*Gender is required";
            } else {
                $gender = $_POST["gender"];
            }
            
            if (empty($_POST["date"])) {
                $dateErr = "*Date of birth is required";
            } else {
                $date = $_POST["date"];
            }

            if (empty($_POST["add"])) {
                $addErr = "*Address is required";
            } else {
                $add = $_POST["add"];
            }

            if (empty($_POST["email"])) {
                $emailErr = "*Email is required";
            } else {
                // check if e-mail address is well-formed
                if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $emailErr = "*Invalid email format";
                } else{
                    $email = $_POST["email"];
                }
            }

            if (empty($_POST["phone"])) {
                $phoneErr = "*Phone number is required";
            } else {
                $phone_to_check = str_replace("-", "", $_POST["phone"]);
                $phone = $phone_to_check;
                
            }

            if (empty($_POST["univ"])) {
                $univErr = "*Your university name is required";
            } else {
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z ]*$/",$_POST["univ"])) {
                $univErr = "*Only letters and white space allowed (From Univerity Field)";
                }else{
                    $univ = $_POST["univ"];
                }
            }

            if (empty($_POST["web"])) {
                $web = "";
            } else {
                $web = $_POST["web"];
                // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
                if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$web)) {
                $webErr = "*Invalid URL (Your University's Website Field)";
                }
            }

            if (empty($_POST["sg"])) {
                $sgErr = "*University that you choose is required";
            } else {
                $sg = $_POST["sg"];
            }
                
            if (empty($nameErr) && empty($genderErr) && empty($dateErr) && empty($addErr) && empty($emailErr) && empty($phoneErr) && empty($univErr) 
            && empty($webErr) && empty($sgErr)){
                    echo "<h2>Your Input:</h2>";
                    echo ("Full Name : ");
                    echo $name;
                    echo "<br>";
                    echo "<br>";
                    echo ("Gender : ");
                    echo $gender;
                    echo "<br>";
                    echo "<br>";
                    echo ("Date of Birth : ");
                    echo $date;
                    echo "<br>";
                    echo "<br>";
                    echo ("Address : ");
                    echo $add;
                    echo "<br>";
                    echo "<br>";
                    echo ("Email : ");
                    echo $email;
                    echo "<br>";
                    echo "<br>";
                    echo ("Phone Number : ");
                    echo $phone;
                    echo "<br>";
                    echo "<br>";
                    echo ("From University : ");
                    echo $univ;
                    echo "<br>";
                    echo "<br>";
                    echo ("Your University's Website : ");
                    echo $web;
                    echo "<br>";
                    echo "<br>";
                    echo ("University That You Choose : ");
                    echo $sg;

                //1. Connect to the database

                include ("../db_connect.php");
                //3. Save the data using the query
                $query = "
                insert into participant(
                    full_name
                    ,gender
                    ,dob
                    ,p_address
                    ,email
                    ,phone
                    ,university
                    ,university_web
                    ,university_sg
                ) values (
                    '$name'
                    ,'$gender'
                    ,'$date'
                    ,'$add' 
                    ,'$email'   
                    ,'$phone'   
                    ,'$univ'   
                    ,'$web'   
                    ,'$sg'                  
                );
                ";
                
                //4. Execute the query and save the status in $query
                $status = mysqli_query($con, $query);

                //log
                date_default_timezone_set('Asia/Jakarta');
                $user = $_SESSION['username'];
                $role = $_SESSION['userrole'];
                $time = @date('d-m-Y | H:i:s');
                $activity = "created new participant data with name $name";
                //3. Save the data using the query
                $logquery = "
                insert into log_activity(
                    time_log
                    ,username
                    ,activity
                    ,userrole
                ) values (
                    '$time'
                    ,'$user'
                    ,'$activity'
                    ,'$role'                   
                );
                ";
            
                //4. Execute the query and save the status in $query
                mysqli_query($con, $logquery);

                if(!$status){
                    die("</br> *** Fail to save the data </br> ERROR;"
                    .mysqli_error($con));
                    ?>
                        <br/>
                        <a href="crud.php">Return to the crud menu</a>
                        <br/>
                        <br/>
                    <?php
                }else{

                ?>
                    <h2>Data has successfully saved</h2>
                    <br/>
                    <a href="crud.php">Return to crud Menu</a>
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
                if (!empty($genderErr)){
                    echo $genderErr;
                    echo "<br>";
                    echo "<br>";
                }

                if (!empty($dateErr)){
                    echo $dateErr;
                    echo "<br>";
                    echo "<br>";
                }
                if (!empty($addErr)){
                    echo $addErr;
                    echo "<br>";
                    echo "<br>";
                }
                if (!empty($emailErr)){
                    echo $emailErr;
                    echo "<br>";
                    echo "<br>";
                }
                if (!empty($phoneErr)){
                    echo $phoneErr;
                    echo "<br>";
                    echo "<br>";
                }
                if (!empty($univErr)){
                    echo $univErr;
                    echo "<br>";
                    echo "<br>";
                }
                if (!empty($webErr)){
                    echo $webErr;
                    echo "<br>";
                    echo "<br>";
                }
                if (!empty($sgErr)){
                    echo $sgErr;
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