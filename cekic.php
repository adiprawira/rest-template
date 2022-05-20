<?php
session_start();
	 include_once "koneksi.php";

	class usr{}
	
	$nama = $_POST["nama"];

	
	
	$query = mysqli_query($con, "SELECT *FROM izin_cuti WHERE nama='$nama' ");
	
	$row = mysqli_fetch_array($query);
	
	if (!empty($row)){
		
		$response = new usr();
		$response->success = 1;
		$response->nama = $row['nama'];
		$response->kuota_izin = $row['kuota_izin'];
	 	die(json_encode($response));
		
	} else { 
	 	$response = new usr();
	 	$response->success = 0;
		$response->message = "data  jenis cuti tidak ditemukan";
	 	die(json_encode($response));
	}
	
	 mysqli_close($con);
?> 