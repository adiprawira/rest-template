<?php
session_start();
	 include_once "koneksi.php";

	class usr{}
	
	$divisi = $_POST["divisi"];
	$tahun = $_POST["tahun"];
	
	// COALESCE digunakan untuk mengembalikan nilai null ke 0 apabila data tidak ditemukan
	$query = mysqli_query($con, "SELECT COUNT(*) AS notif FROM cuti WHERE divisi='$divisi' AND tahun='$tahun' AND kadiv_acc='0'");
	
	$row = mysqli_fetch_array($query);
	
	if (!empty($row)){
		
		$response = new usr();
		$response->success = 1;
		$response->notif = $row['notif'];

	 	die(json_encode($response));
		
	} else { 
	 	$response = new usr();
	 	$response->success = 0;
		$response->message = "data  divisi/jabatan ditemukan";
	 	die(json_encode($response));
	}
	
	 mysqli_close($con);
?> 