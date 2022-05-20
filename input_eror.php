<?php

include_once "koneksi.php";

session_start();
class usr{}

date_default_timezone_set('Asia/Jakarta');
$sales = $_POST['sales'];
$tanggal = $_POST['tanggal'];
$checkin = $_POST['checkin'];
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
	 	$response->message = "Silakan isi keterangan Absen anda";
		die(json_encode($response));
	} else{
        $query2 = mysqli_query($con,"SELECT * FROM lap_eror WHERE tanggal='$tanggal' AND sales='$sales'");
        $row = mysqli_fetch_array($query2);

        if(!empty($row)){
            $response = new usr();
            $response->success = 2;
            $response->message = "Absensi Tanggal di Atas sudah Ada !!! ";
            die(json_encode($response));
        }else{

        $query = mysqli_query($con, "INSERT INTO lap_eror (id,sales,tanggal,checkin,ket,longi,latti,lokasi,jabatan,divisi,proses) VALUES(0,'".$sales."','".$tanggal."','".$checkin."','Absen Checkin','".$longi."','".$latti."','".$lokasi."','".$jabatan."','".$divisi."','0')");		
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