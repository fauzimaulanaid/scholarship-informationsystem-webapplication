<?php
    //Create the connection string
    include ("../db_connect.php");

    //Create the query string to read data
    $query = "select * from log_activity";

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="../img/sing.png">
        <link rel="stylesheet" href="../css/log.css" />

        <title>User Activity Log - Fauzi Scholarship Website</title>
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
    <img src="../img/sing.png" width="200">
    <h1>Users Activity Log</h1><h1>Fauzi Scholarship Website</h1>
        <?php
            //Check the data
            $result = mysqli_query($con, $query);

            if(!$result){
                die("*** Fail to fetch the data <br/> Error Message"
                .mysqli_error($con));
            };
            
            if(mysqli_num_rows($result)==0){
                echo("There is no data to display");
                ?>
                <br/>
                <br/>
                <br>
                <a href="admin.php">Home</a>
                <a href="../logout.php">Logout</a>
                <br>
                <br>
                <footer>
                    Copyright &copy; 2020 Muhammad Fauzi Maulana. All rights reserved.
                </footer>
                <?php
            } else{
        ?>

        <table border="1" align="center">
            <thead>
            <tr>
                    <th>Date & Time</th>
                    <th>Username</th>
                    <th>Activity</th>
                    <th>User Role</th>
            </tr>
            </thead>

            <tbody>
                <?php
            
                while ($row = mysqli_fetch_assoc($result)){
                        
                ?>

                <tr>
                    <td><?= $row["time_log"] ?></td>
                    <td><?= $row["username"] ?></td>
                    <td><?= $row["activity"] ?></td>
                    <td><?= $row["userrole"] ?></td>
                </tr>

                <?php
                }

                ?>
            </tbody>



        </table>
                <br>
                <br>  
                <a href="admin.php">Home</a>
                <a href="deletelogall.php" onclick="return confirm('Are you sure you want to delete all activity log data?');">Clear All</a>
                <a href="../logout.php">Logout</a>
                <br>
                <br>
                <br>

    </body>
    
        <footer>
            Copyright &copy; 2020 Muhammad Fauzi Maulana. All rights reserved.
        </footer>
    
</div>
    <?php
            }
            include ("../db_disconnect.php");
        ?>



</html>