<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['userrole']==""){
    header("location:index.php?message=loginfirst");
}
if($_SESSION['userrole']=="viewer"){
    header("location:../viewer/view.php?message=notadmin");
}

// include database connection file
include ("../db_connect.php");

//logs
date_default_timezone_set('Asia/Jakarta');
$user = $_SESSION['username'];
$role = $_SESSION['userrole'];
$time = @date('d-m-Y | H:i:s');
$activity = "deleted all participant data";
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

// Delete user row from table based on given id
mysqli_query($con, "DELETE FROM participant");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:crud.php");

// echo ("$id");

include ("../db_disconnect.php");

?>