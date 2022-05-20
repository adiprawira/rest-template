<?php
	include_once "koneksi.php";
	
	class emp{}
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	$karyawan = $_POST['karyawan'];
	$longiout = $_POST['longiout'];
	$lattiout = $_POST['lattiout'];
	$imageout = $_POST['imageout'];
	$checkout = $_POST['checkout'];
	$status = $_POST['status'];
	// mengambil tanggal sekarang
	$tgl      = date("Y-m-d");
	

	$query2 = mysqli_query($con, "select max(kode) as maxKode from visitluar");
	$datakode = mysqli_fetch_array($query2);
	$kd_nts = $datakode['maxKode'];
	
	$noUrut = (int) substr($kd_nts, 3, 3);
	$noUrut++;
	$char = "VSO";
	$kode_notes = $char . sprintf("%03s", $noUrut);
	
	if (empty($karyawan)) { 
		$response = new emp();
		$response->success = 0;
		$response->message = "Nama Karyawan tidak boleh kosong."; 
		die(json_encode($response));
	} else {
		$random = $karyawan."-".$kode_notes;
		
		$path = "gambar/".$random.".png";
		$gambar = $random.".png";
		// sesuiakan ip address laptop/pc atau URL server
		$actualpath = "http://localhost/mysag/android/gambar/$path";
		
		$query = mysqli_query($con, "update visitluar set checkout='$checkout',longiout='$longiout',lattiout='$lattiout',imageout='$gambar' where karyawan='$karyawan' and checkout='00:00:00'");
		$query1 = mysqli_query($con, "update rekap set checkout='$checkout', status='$status', toko='null' where karyawan='$karyawan' AND tanggal='$tgl'");
		if ($query){
			file_put_contents($path,base64_decode($imageout));
			
			$response = new emp();
			$response->success = 1;
			$response->message = "Successfully Checkout TL";
			die(json_encode($response));
		} else{ 
			$response = new emp();
			$response->success = 0;
			$response->message = "Error Checkout TL";
			die(json_encode($response)); 
		}
	}	
	
	// fungsi random string pada gambar untuk menghindari nama file yang sama
	function random_word($id = 20){
		$pool = '1234567890abcdefghijkmnpqrstuvwxyz';
		
		$word = '';
		for ($i = 0; $i < $id; $i++){
			$word .= substr($pool, mt_rand(0, strlen($pool) -1), 1);
		}
		return $word; 
	}

	mysqli_close($con);
	
?>	

<!-- </?php
	include_once "koneksi.php";
	
	class emp{}
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	$karyawan = $_POST['karyawan'];
	$longiout = $_POST['longiout'];
	$lattiout = $_POST['lattiout'];
	$imageout = $_POST['imageout'];
	$checkout = $_POST['checkout'];
	

	$query2 = mysqli_query($con, "select max(kode) as maxKode from visitluar");
	$datakode = mysqli_fetch_array($query2);
	$kd_nts = $datakode['maxKode'];
	
	$noUrut = (int) substr($kd_nts, 3, 3);
	$noUrut++;
	$char = "VSO";
	$kode_notes = $char . sprintf("%03s", $noUrut);
	
	if (empty($karyawan)) { 
		$response = new emp();
		$response->success = 0;
		$response->message = "Nama Karyawan tidak boleh kosong."; 
		die(json_encode($response));
	} else {
		$random = $karyawan."-".$kode_notes;
		
		$path = "gambar/".$random.".png";
		$gambar = $random.".png";
		// sesuiakan ip address laptop/pc atau URL server
		$actualpath = "http://139.255.116.21:8181/mysag/android/gambar/$path";
		
		$query = mysqli_query($con, "update visitluar set checkout='$checkout',longiout='$longiout',lattiout='$lattiout',imageout='$gambar' where karyawan='$karyawan' and checkout='00:00:00'");
		
		if ($query){
			file_put_contents($path,base64_decode($imageout));
			
			$response = new emp();
			$response->success = 1;
			$response->message = "Successfully Checkout TL";
			die(json_encode($response));
		} else{ 
			$response = new emp();
			$response->success = 0;
			$response->message = "Error Checkout TL";
			die(json_encode($response)); 
		}
	}	
	
	// fungsi random string pada gambar untuk menghindari nama file yang sama
	function random_word($id = 20){
		$pool = '1234567890abcdefghijkmnpqrstuvwxyz';
		
		$word = '';
		for ($i = 0; $i < $id; $i++){
			$word .= substr($pool, mt_rand(0, strlen($pool) -1), 1);
		}
		return $word; 
	}

	mysqli_close($con);
	
?>	 -->