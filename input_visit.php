<?php

include_once "koneksi.php";

session_start();
class usr{}

date_default_timezone_set('Asia/Jakarta');
$sales = $_POST["sales"];
$tanggal = $_POST["tanggal"];
$checkin = $_POST["jam"];
$outlet = $_POST["outlet"];
$toko = $_POST["toko"];
$longi = $_POST["longi"];
$latti = $_POST["latti"];


 if ((empty($sales))) {
		$response = new usr();
		$response->success = 0;
		$response->message = "Kolom username tidak boleh kosong";
		die(json_encode($response));
	} else if ((empty($outlet))) {
		$response = new usr();
		$response->success = 0;
	 	$response->message = "Silakan Scan QR Code untuk mendapatkan kode outlet";
		die(json_encode($response));
	} else if ((empty($longi))) {
		$response = new usr();
		$response->success = 0;
	 	$response->message = "Silakan hidupkan GPS untuk mendapatkan lokasi";
		die(json_encode($response));
	} else {
		$query = mysqli_query($con, "INSERT INTO visit (id,sales,tanggal,checkin,checkout,outlet,toko,longi,latti) VALUES(0,'".$sales."','".$tanggal."','".$checkin."',0,'".$outlet."','".$toko."', '".$longi."', '".$latti."')");		
		if ($query) {
			$response = new usr();
			$response->success = 1;
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