<?php
session_start();
	 include_once "koneksi.php";

	class usr{}
	
	$tanggal = $_POST["tanggal"];
	$sales = $_POST["sales"];
	$checkin = date('H:i', time());
	$outlet = $_POST["outlet"];
	$toko = $_POST["toko"];
	$longi = $_POST["longi"];
	$latti = $_POST["latti"];
	$status = $_POST["status"];
	$divisi = $_POST["divisi"];
	$jabatan = $_POST["jabatan"];
	// if ((empty($username)) || (empty($password))) { 
		
	// 	$response = new usr();
	// 	$response->success = 0;
	// 	$response->message = "Kolom tidak boleh kosong"; 
	// 	die(json_encode($response));
	//  }
	
	$query = mysqli_query($con, "SELECT * FROM visit WHERE tanggal='$tanggal' AND sales='$sales'");
	
	$row = mysqli_fetch_array($query);
	
	if (!empty($row)){
		$response = new usr();
		$response->success = 1;
		$response->message = "Absensi sudah Ada !!! " ;

	 	die(json_encode($response));
		
	} else { 
	
		$query2 = mysqli_query($con, "INSERT INTO visit (id,sales,tanggal,checkin,checkout,outlet,toko,longi,latti,status,divisi,jabatan) VALUES(0,'".$sales."','".$tanggal."',0,0,'-','-', '".$longi."', '".$latti."','".$status."','".$divisi."','".$jabatan."')");		
		if ($query2) {
			$response = new usr();
			$response->success = 2;
			$response->message = "Data berhasil di simpan.";
			die(json_encode($response));
		} else { 
			$response = new usr();
			$response->success = 0;
			$response->message = "Error simpan Data";
			die(json_encode($response)); 
		}	
	}
	
	 mysqli_close($con);
?> 