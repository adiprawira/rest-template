<?php
session_start();
	 include_once "koneksi.php";

	class usr{}
	
	$divisi = $_POST["divisi"];

	
	$query = mysqli_query($con, "SELECT *FROM divisi WHERE divisi='$divisi' ");
	
	$row = mysqli_fetch_array($query);
	
	if (!empty($row)){
		
		$response = new usr();
		$response->success = 1;
		$response->divisi = $row['divisi'];
		$response->checkin = $row['checkin'];
		$response->checkout = $row['checkout'];

	 	die(json_encode($response));
		
	}
	//  else { 
	//  	$response = new usr();
	//  	$response->success = 0;
	// 	$response->message = "data  divisi/jabatan ditemukan";
	//  	die(json_encode($response));
	// }
	
	 mysqli_close($con);
?> 