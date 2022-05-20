<?php
	include_once "koneksi.php";
	
	class emp{}
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	$image = $_POST['image'];
	$name = $_POST['name'];
	$username = $_POST['username'];
	$tanggal = $_POST['tanggal'];
	$outlet = $_POST['outlet'];

	$query2 = mysqli_query($con, "select max(kode_notes) as maxKode from notes");
	$datakode = mysqli_fetch_array($query2);
	$kd_nts = $datakode['maxKode'];
	
	$noUrut = (int) substr($kd_nts, 3, 3);
	$noUrut++;
	$char = "NTS";
	$kode_notes = $char . sprintf("%03s", $noUrut);
	
	if (empty($name)) { 
		$response = new emp();
		$response->success = 0;
		$response->message = "Nama Outlet Tidak Boleh Kosong."; 
		die(json_encode($response));
	} else {
		$random = $outlet."-".$kode_notes;
		
		$path = "gambar/".$random.".png";
		$gambar = $random.".png";
		// sesuiakan ip address laptop/pc atau URL server
		$actualpath = "http://localhost/mysag/android/gambar/$path";
		
		$query = mysqli_query($con, "INSERT INTO notes (kode_notes,username,outlet,gambar,tanggal_notes,notes) VALUES ('$kode_notes','$username',
		'$outlet','$gambar','$tanggal','$name')");
		
		if ($query){
			file_put_contents($path,base64_decode($image));
			
			$response = new emp();
			$response->success = 1;
			$response->message = "Successfully Uploaded";
			die(json_encode($response));
		} else{ 
			$response = new emp();
			$response->success = 0;
			$response->message = "Error Upload image";
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