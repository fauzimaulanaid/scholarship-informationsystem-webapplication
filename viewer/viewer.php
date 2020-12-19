<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="../img/sing.png">
        <link rel="stylesheet" href="../css/app3.css" />

        <title>Viewer Home Page</title>
    </head>

    <body>
    <?php 
        session_start();
    
        // cek apakah yang mengakses halaman ini sudah login
        if($_SESSION['userrole']==""){
            header("location:../index.php?message=loginfirst");
        }
        if($_SESSION['userrole']=="admin"){
            header("location:../viewer/view.php?message=notviewer");
        }

    ?>
    <?php

        
        //Create the connection string
        include ("../db_connect.php");

        $a = $_SESSION['username'];

        //Create the query string to read data
        $query = "SELECT * from user where username='$a'";

        $result = mysqli_query($con, $query);

        if(!$result){
            die("*** Fail to fetch the data <br/> Error Message"
            .mysqli_error($con));
        };

        while ($row = mysqli_fetch_assoc($result)){
            $name = $row["fullname"]; 
        }

    ?>
        <div class="card">
        <img src="../img/sing.png" width="200">
        <h1>Hi! <?php echo $name ?><br> Welcome to Fauzi Scholarship Website <br/> as a <?php echo $_SESSION['userrole']; ?></h1>

        
            <a href="view.php">List of Participant</a>
            <br/>
            <br/>
            <a href="../logout.php">Logout</a>
            <br/>
            <br/>

    </body>
    <footer>
        Copyright &copy; 2020 Muhammad Fauzi Maulana. All rights reserved.
    </footer>
        </div>

</html>