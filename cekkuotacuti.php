<?php
session_start();
	 include_once "koneksi.php";

	class usr{}
	
	$username = $_POST["username"];
	$tahun = $_POST["tahun"];
	$jenis_cuti = $_POST["jenis_cuti"];
	
	// COALESCE digunakan untuk mengembalikan nilai null ke 0 apabila data tidak ditemukan
	$query = mysqli_query($con, "SELECT COALESCE(SUM(lama_cuti),0) AS kuota FROM cuti WHERE username='$username' AND tahun='$tahun'AND jenis_cuti='$jenis_cuti' AND hrd_acc='1'");
	
	$row = mysqli_fetch_array($query);
	
	if (!empty($row)){
		
		$response = new usr();
		$response->success = 1;
		$response->kuota = $row['kuota'];

	 	die(json_encode($response));
		
	} else { 
	 	$response = new usr();
	 	$response->success = 0;
		$response->message = "data  divisi/jabatan ditemukan";
	 	die(json_encode($response));
	}
	
	 mysqli_close($con);
?> 