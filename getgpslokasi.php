<?php
session_start();
	 include_once "koneksi.php";

	class usr{}
	
	$kode_outlet = $_POST["kode_outlet"];

	
	
	$query = mysqli_query($con, "SELECT *FROM outlet WHERE kode_outlet='$kode_outlet' ");
	
	$row = mysqli_fetch_array($query);
	
	if (!empty($row)){
		
		$response = new usr();
		$response->success = 1;
		$response->longi = $row['longi'];
		$response->latti = $row['latti'];

	 	die(json_encode($response));
		
	} else { 
	 	$response = new usr();
	 	$response->success = 0;
		$response->message = "limit tidak ditemukan";
	 	die(json_encode($response));
	}
	
	 mysqli_close($con);
?> 