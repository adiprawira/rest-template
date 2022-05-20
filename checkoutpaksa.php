<?php

include_once "koneksi.php";

session_start();
class usr{}

date_default_timezone_set('Asia/Jakarta');
$tanggal = $_POST["tanggal"];
$checkout = date('H:i', time());
$outlet = $_POST["outlet"];
$jam = $_POST["jam"];
$status = 'Tidak Checkout';
$sales = $_POST["sales"];

		$query = mysqli_query($con, "UPDATE visit SET checkout = '".$checkout."', status= 'Tidak Checkout' WHERE tanggal='".$tanggal."' AND outlet='".$outlet."' AND checkin='".$jam."' AND sales='".$sales."'");
		$query1 = mysqli_query($con, "UPDATE rekap SET checkout = '".$checkout."', status= 'Tidak Checkout', toko='null' WHERE tanggal='".$tanggal."' AND outlet='".$outlet."' AND checkin='".$jam."' AND karyawan='".$sales."'");		
		if ($query) {
			$response = new usr();
			$response->success = 1;
			$response->message = "Berhasil Check Out Paksa. Hubungi Administrator.";
			die(json_encode($response));
		} else { 
			$response = new usr();
			$response->success = 0;
			$response->message = "Error simpan Data";
			die(json_encode($response)); 
		}	
	
	 mysqli_close($con);
?>