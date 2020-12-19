<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'db_connect.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
 
if(empty($username) && empty($password)){
    header("location:index.php?message=requiredfield");
}

// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($con,"select * from user where username='$username' and userpassword='$password'");
// menghitung jumlah data yang ditemukan

$check = mysqli_num_rows($login);

//coba log

// define('LOG','log.txt');
// function write_log($log){  
// 	date_default_timezone_set('Asia/Jakarta');
// 	$user = $_POST['username'];
// 	$time = @date('[Y-d-m:H:i:s]');
// 	$op=$time.' '.'Action for '.$user.' '.$log."\n".PHP_EOL;
// 	$fp = @fopen(LOG, 'a');
// 	$write = @fwrite($fp, $op);
// 	@fclose($fp);
// }
// if($login){
// 	write_log("login success");
// }else{
// 	write_log("login fail");
// }
function loguser($role){
	include 'db_connect.php';
	date_default_timezone_set('Asia/Jakarta');
	$user = $_POST['username'];
	$time = @date('d-m-Y | H:i:s');

	$activity = "login success";
	// if($login){
	// 	$activity = "login success";
	// }else{
	// 	$activity = "login failed";
	// }


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
}



 
// check$check apakah username dan password di temukan pada database
if($check > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// check$check jika user login sebagai admin
	if($data['userrole']=="administrator"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['userrole'] = "administrator";
		loguser($_SESSION['userrole']);
		// alihkan ke halaman dashboard admin
		header("location:admin/admin.php");
 
	// check$check jika user login sebagai pegawai
	}else if($data['userrole']=="viewer"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['userrole'] = "viewer";
		loguser($_SESSION['userrole']);
		// alihkan ke halaman dashboard pegawai
		header("location:viewer/viewer.php");
 
	}else{
 
		// alihkan ke halaman login kembali
		header("location:index.php?message=loginerror");
	}	
}else{
	header("location:index.php?message=loginerror");
}
 
?>