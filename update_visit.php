<?php

include_once "koneksi.php";

session_start();
class usr{}

date_default_timezone_set('Asia/Jakarta');
$tanggal = $_POST["tanggal"];
$checkin = date('H:i', time());
$checkout = $_POST["jam"];
$outlet = $_POST["outlet"];
$outletaktif = $_POST["outletaktif"];
$sales = $_POST["sales"];

//digunakan untuk mengembalikan nilai null untuk lokasi absen
$lokabsen ='null';
$lok=$lokabsen;

 if ((empty($outlet))) {
		$response = new usr();
		$response->success = 0;
	 	$response->message = "Silakan Scan QR Code untuk mendapatkan kode outlet";
		die(json_encode($response));
} else if ((empty($outletaktif)) || $outlet != $outletaktif) { 
	$response = new usr();
		$response->success = 0;
	 	$response->message = "Kode Outlet Anda Berbeda.";
		die(json_encode($response));
	} else {
		$query = mysqli_query($con, "UPDATE visit SET checkout='".$checkout."' WHERE tanggal='".$tanggal."' AND outlet='".$outlet."' AND sales='".$sales."'");
		$query1 = mysqli_query($con, "UPDATE rekap SET checkout='".$checkout."', toko='".$lok."' WHERE tanggal='".$tanggal."' AND karyawan='".$sales."'");		
		if ($query) {
			$response = new usr();
			$response->success = 1;
			$response->message = "Data berhasil di simpan";
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

<!-- </?php

include_once "koneksi.php";

session_start();
class usr{}

date_default_timezone_set('Asia/Jakarta');
$tanggal = $_POST["tanggal"];
$checkin = date('H:i', time());
$checkout = $_POST["jam"];
$outlet = $_POST["outlet"];
$outletaktif = $_POST["outletaktif"];
$sales = $_POST["sales"];

 if ((empty($outlet))) {
		$response = new usr();
		$response->success = 0;
	 	$response->message = "Silakan Scan QR Code untuk mendapatkan kode outlet";
		die(json_encode($response));
} else if ((empty($outletaktif)) || $outlet != $outletaktif) { 
	$response = new usr();
		$response->success = 0;
	 	$response->message = "Kode Outlet Anda Berbeda.";
		die(json_encode($response));
	} else {
		$query = mysqli_query($con, "UPDATE visit SET checkout='".$checkout."' WHERE tanggal='".$tanggal."' AND outlet='".$outlet."' AND sales='".$sales."'");	
		if ($query) {
			$response = new usr();
			$response->success = 1;
			$response->message = "Data berhasil di simpan";
			die(json_encode($response));
		} else { 
			$response = new usr();
			$response->success = 0;
			$response->message = "Error simpan Data";
			die(json_encode($response)); 
		}	
	}


	 mysqli_close($con);

?> -->