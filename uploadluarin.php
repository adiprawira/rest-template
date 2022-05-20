<?php
	include_once "koneksi.php";
	
	class emp{}
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	$karyawan = $_POST['karyawan'];
	$tanggal = $_POST['tanggal'];
	$longiin = $_POST['longiin'];
	$lattiin = $_POST['lattiin'];
	$imagein = $_POST['imagein'];
	$checkin = $_POST['checkin'];
	$status = $_POST['status'];
	$divisi = $_POST['divisi'];
	$jabatan = $_POST['jabatan'];

	$query2 = mysqli_query($con, "select max(kode) as maxKode from visitluar");
	$datakode = mysqli_fetch_array($query2);
	$kd_nts = $datakode['maxKode'];
	
	$noUrut = (int) substr($kd_nts, 3, 3);
	$noUrut++;
	$char = "VSI";
	$kode_notes = $char . sprintf("%03s", $noUrut);

	$cekdulu= "SELECT * FROM rekap where karyawan='$karyawan' AND tanggal='$tanggal'";
	
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
		
		$query = mysqli_query($con, "INSERT INTO visitluar (kode,karyawan,tanggal,status,checkin,longiin,lattiin,imagein,divisi,jabatan) VALUES ('$kode_notes','$karyawan','$tanggal','$status','$checkin','$longiin','$lattiin','$gambar','$divisi','$jabatan')");
		$prosescek= mysqli_query($con, $cekdulu);
		if (mysqli_num_rows($prosescek)>0) { //proses mengingatkan data sudah ada
		    echo ($response);
			}else {
				$query1 = mysqli_query($con, "INSERT INTO rekap (id,karyawan,divisi,tanggal,checkin,status,toko) VALUES(0,'".$karyawan."','".$divisi."','".$tanggal."','".$checkin."','".$status."','".$status."')");
		}
		
		if ($query){
			file_put_contents($path,base64_decode($imagein));
			
			$response = new emp();
			$response->success = 1;
			$response->message = "Successfully Checkin TL";
			die(json_encode($response));
		} else{ 
			$response = new emp();
			$response->success = 0;
			$response->message = "Error Checkin TL";
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