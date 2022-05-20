<?php

include_once "koneksi.php";

session_start();
class usr{}

date_default_timezone_set('Asia/Jakarta');
$sales = $_POST['sales'];
$tanggal = $_POST['tanggal'];
$checkout = $_POST['checkout'];
$ket = $_POST['ket'];
$longi = $_POST['longi'];
$latti = $_POST['latti'];
$lokasi = $_POST['lokasi'];
$jabatan = $_POST['jabatan'];
$divisi = $_POST['divisi'];
$proses = $_POST['proses'];

 if ((empty($sales))) {
		$response = new usr();
		$response->success = 0;
		$response->message = "Kolom username tidak boleh kosong";
		die(json_encode($response));
	} else if ((empty($jabatan))) {
		$response = new usr();
		$response->success = 0;
	 	$response->message = "Silakan isi keterangan absen anda";
		die(json_encode($response));
	} else{

        // $query = mysqli_query($con, "INSERT INTO lap_eror (id,sales,tanggal,checkout,ket,longi,latti,lokasi,jabatan,divisi,proses) VALUES(0,'".$sales."','".$tanggal."','".$checkout."','Absen Checkout','".$longi."','".$latti."','".$lokasi."','".$jabatan."','".$divisi."','0')");
        $query = mysqli_query($con, "UPDATE lap_eror SET checkout='".$checkout."', ket='Absen Checkout', longi='".$longi."', latti='".$latti."', proses='0'  WHERE tanggal='".$tanggal."' AND sales='".$sales."'");		
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