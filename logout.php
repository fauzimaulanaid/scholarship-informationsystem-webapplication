<?php 
// mengaktifkan session php
session_start();
 
// menghapus semua session
session_destroy();

// define('LOG','log.txt');
// function write_log($log){  
//  date_default_timezone_set('Asia/Jakarta');
// 	$user = $_SESSION['username'];
// 	$time = @date('[Y-d-m:H:i:s]');
// 	$op=$time.' '.'Action for '.$user.' '.$log."\n".PHP_EOL;
// 	$fp = @fopen(LOG, 'a');
// 	$write = @fwrite($fp, $op);
// 	@fclose($fp);
// }
// if(!session_destroy()){
// 	write_log("logout success");
// }else{
// 	write_log("logout fail");
// }
    date_default_timezone_set('Asia/Jakarta');
    $user = $_SESSION['username'];
    $role = $_SESSION['userrole'];
    $time = @date('d-m-Y | H:i:s');
    $activity = "";
    if(!session_destroy()){
        $activity = "logout success";
    }else{
        $activity = "logot failed";
    }

	//1. Connect to the database
	include ("db_connect.php");
	//3. Save the data using the query
	$query = "
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
	$status = mysqli_query($con, $query);

	if(!$status){
		die("</br> *** Fail to save the data </br> ERROR;"
		.mysqli_error($con));
	}

	include ("db_disconnect.php");
 
// mengalihkan halaman ke halaman login
header("location:index.php");
?>