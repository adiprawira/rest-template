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
$limitgps = $_POST["limitgps"];
$differencegps = $_POST["differencegps"];
$divisi = $_POST["divisi"];
$jabatan = $_POST["jabatan"];

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
		$query2 = mysqli_query($con,"SELECT * FROM visit WHERE tanggal='$tanggal' AND sales='$sales'");
		$row = mysqli_fetch_array($query2);

		if(!empty($row)){
			$response = new usr();
			$response->success = 2;
			$response->message = "Absensi Tanggal di Atas sudah Ada !!! ";
			die(json_encode($response));
		}else{
			
			$query = mysqli_query($con, "INSERT INTO visit (id,sales,tanggal,checkin,checkout,outlet,toko,longi,latti,limitgps,differencegps,divisi,jabatan) VALUES(0,'".$sales."','".$tanggal."','".$checkin."',0,'".$outlet."','".$toko."', '".$longi."', '".$latti."','".$limitgps."','".$differencegps."','".$divisi."','".$jabatan."')");		
			$query1 = mysqli_query($con, "INSERT INTO rekap (id,karyawan,divisi,toko,tanggal,checkin) VALUES(0,'".$sales."','".$divisi."','".$toko."','".$tanggal."','".$checkin."')");
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
		
	}


	 mysqli_close($con);

?>

<!-- </?php

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
$limitgps = $_POST["limitgps"];
$differencegps = $_POST["differencegps"];
$divisi = $_POST["divisi"];
$jabatan = $_POST["jabatan"];

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
		$query2 = mysqli_query($con,"SELECT * FROM visit WHERE tanggal='$tanggal' AND sales='$sales'");
		$row = mysqli_fetch_array($query2);

		if(!empty($row)){
			$response = new usr();
			$response->success = 2;
			$response->message = "Absensi Tanggal di Atas sudah Ada !!! ";
			die(json_encode($response));
		}else{

			// $query1 = mysqli_query($con, "INSERT INTO rekap (id,karyawan,tanggal,checkin) VALUES(0,'".$sales."','".$tanggal."','".$checkin."')");
			$query = mysqli_query($con, "INSERT INTO visit (id,sales,tanggal,checkin,checkout,outlet,toko,longi,latti,limitgps,differencegps,divisi,jabatan) VALUES(0,'".$sales."','".$tanggal."','".$checkin."',0,'".$outlet."','".$toko."', '".$longi."', '".$latti."','".$limitgps."','".$differencegps."','".$divisi."','".$jabatan."')");	
			
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
		
	}


	 mysqli_close($con);

?>

 -->