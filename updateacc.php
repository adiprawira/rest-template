<?php

include_once "koneksi.php";

session_start();
class usr{}

date_default_timezone_set('Asia/Jakarta');
$fullname = $_POST['fullname'];
$tgl_pengajuan = $_POST['tgl_pengajuan'];
$tgl_awal = $_POST['tgl_awal'];
$tgl_akhir = $_POST['tgl_akhir'];
$jenis_cuti = $_POST['jenis_cuti'];
$lama_cuti = $_POST['lama_cuti'];
$kadiv = $_POST['kadiv'];


 if ((empty($fullname))) {
		$response = new usr();
		$response->success = 0;
		$response->message = "Kolom fullname tidak boleh kosong";
		die(json_encode($response));
	} else if ((empty($tgl_pengajuan))) {
		$response = new usr();
		$response->success = 0;
	 	$response->message = "Silakan isi tanggal pengajuan tidak terbaca";
		die(json_encode($response));
	} else{
        $query = mysqli_query($con, "UPDATE cuti SET kadiv_acc='1', status='Acc Kadiv', kadiv='$kadiv' WHERE fullname='".$fullname."' AND tgl_pengajuan='".$tgl_pengajuan."'");		
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