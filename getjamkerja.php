<?php
session_start();
	 include_once "koneksi.php";

	class usr{}
	
	$username = $_POST["username"];
	$tgl      = date("Y-m-d");

	
	$query = mysqli_query($con, "SELECT *FROM rekap WHERE karyawan='$username' AND tanggal='$tgl' ");
	
	$row = mysqli_fetch_array($query);
	
	if (!empty($row)){
		$response = new usr();
		$response->success = 1;
		$response->checkin = $row['checkin'];
		$response->checkout = $row['checkout'];
		$response->toko = $row['toko'];

	 	die(json_encode($response));
		
	} 
	// else { 
	//  	$response = new usr();
	//  	$response->success = 0;
	// 	$response->message = "data tidak ditemukan";
	//  	die(json_encode($response));
	// }
	
	 mysqli_close($con);
?> 