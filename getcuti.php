<?php
session_start();
	 include_once "koneksi.php";

	class usr{}
	
	$username = $_POST["username"];

	
	$query = mysqli_query($con, "SELECT *FROM cuti WHERE username='$username' ORDER BY tgl_pengajuan DESC ");
	
	$row = mysqli_fetch_array($query);
	
	if (!empty($row)){
		
		$response = new usr();
		$response->success = 1;
		$response->username = $row['username'];
		$response->tgl_awal = $row['tgl_awal'];
        $response->tgl_akhir = $row['tgl_akhir'];
        $response->jenis_cuti = $row['jenis_cuti'];
		$response->status = $row['status'];
		$response->lama_cuti = $row['lama_cuti'];
		$response->tahun = $row['tahun'];

	 	die(json_encode($response));
		
	} else { 
	 	$response = new usr();
	 	$response->success = 0;
		$response->message = "Belum ada pengajuan cuti";
	 	die(json_encode($response));
	}
	
	 mysqli_close($con);
?> 