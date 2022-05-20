<?php
session_start();
	 include_once "koneksi.php";

	class usr{}
	
	
	$query = mysqli_query($con, "SELECT *FROM limitgps ");
	
	$row = mysqli_fetch_array($query);
	
	if (!empty($row)){
		
		$response = new usr();
		$response->success = 1;
		$response->limit = $row['limit'];
		

	 	die(json_encode($response));
		
	} else { 
	 	$response = new usr();
	 	$response->success = 0;
		$response->message = "limit tidak ditemukan";
	 	die(json_encode($response));
	}
	
	 mysqli_close($con);
?> 