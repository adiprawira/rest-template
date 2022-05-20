<?php
session_start();
	 include_once "koneksi.php";

	class usr{}
	
	$nik = $_POST["nik"];

	
	
	$query = mysqli_query($con, "SELECT *FROM user WHERE username='$nik' ");
	
	$row = mysqli_fetch_array($query);
	
	if (!empty($row)){
		
		$response = new usr();
		$response->success = 1;
		$response->fullname = $row['fullname'];
		$response->nohp = $row['nohp'];
		$response->DIVISI = $row['DIVISI'];

	 	die(json_encode($response));
		
	} else { 
	 	$response = new usr();
	 	$response->success = 0;
		$response->message = "data tidak ditemukan";
	 	die(json_encode($response));
	}
	
	 mysqli_close($con);
?> 