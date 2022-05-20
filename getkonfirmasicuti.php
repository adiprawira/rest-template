<?php
session_start();
	 include_once "koneksi.php";

	class usr{}
	
	$fullname = $_POST["fullname"];

	
	$query = mysqli_query($con, "SELECT *FROM cuti WHERE fullname='$fullname' AND kadiv_acc='0' ORDER BY tgl_pengajuan DESC ");
	
	$row = mysqli_fetch_array($query);
	
	if (!empty($row)){
		
		$response = new usr();
		$response->success = 1;
		$response->fullname = $row['fullname'];
		$response->tgl_pengajuan = $row['tgl_pengajuan'];
		$response->tgl_awal = $row['tgl_awal'];
        $response->tgl_akhir = $row['tgl_akhir'];
        $response->jenis_cuti = $row['jenis_cuti'];
		$response->status = $row['status'];
		$response->lama_cuti = $row['lama_cuti'];
		$response->keterangan = $row['keterangan'];

	 	die(json_encode($response));
		
	} else { 
	 	$response = new usr();
	 	$response->success = 0;
		$response->message = "";
	 	die(json_encode($response));
	}
	
	 mysqli_close($con);
?> 