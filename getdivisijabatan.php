<?php
session_start();
	 include_once "koneksi.php";

	class usr{}
	
	$username = $_POST["username"];

	
	$query = mysqli_query($con, "SELECT *FROM user WHERE username='$username' ");
	
	$row = mysqli_fetch_array($query);
	
	if (!empty($row)){
		
		$response = new usr();
		$response->success = 1;
		$response->fullname = $row['fullname'];
        	$response->email = $row['email'];
        	$response->nohp = $row['nohp'];
		$response->divisi = $row['DIVISI'];
		$response->lokasi = $row['LOKASI'];
		$response->jabatan = $row['JABATAN'];
	 	die(json_encode($response));
		
	} else { 
	 	$response = new usr();
	 	$response->success = 0;
		$response->message = "data  divisi/jabatan ditemukan";
	 	die(json_encode($response));
	}
	
	 mysqli_close($con);
?>
