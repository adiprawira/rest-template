<?php
session_start();
	 include_once "koneksi.php";

	class usr{}
	
	 $username = $_POST["username"];
	 $password = md5($_POST["password"]);
	
	if ((empty($username)) || (empty($password))) { 
		
		$response = new usr();
		$response->success = 0;
		$response->message = "Kolom tidak boleh kosong"; 
		die(json_encode($response));
	 }
	
	$query = mysqli_query($con, "SELECT * FROM user WHERE username='$username' AND password='$password' AND status='1'");
	
	$row = mysqli_fetch_array($query);
	
	if (!empty($row)){
		$_SESSION['username'] = $row['username'];
		$_SESSION['id'] 	= $row['id'];
		$response = new usr();
		$response->success = 1;
		$response->message = "Selamat datang ".$row['username'];
		$response->id = $row['id'];
		$response->username = $row['username'];

	 	die(json_encode($response));
		
	} else { 
	 	$response = new usr();
	 	$response->success = 0;
		$response->message = "Username atau password salah";
	 	die(json_encode($response));
	}
	
	 mysqli_close($con);
?> 