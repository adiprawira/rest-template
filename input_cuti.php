<?php

include_once "koneksi.php";

session_start();
class usr{}

date_default_timezone_set('Asia/Jakarta');
$username = $_POST['username'];
$fullname = $_POST['fullname'];
$divisi = $_POST['divisi'];
$tahun = $_POST['tahun'];
$tgl_pengajuan = $_POST['tgl_pengajuan'];
$tgl_awal = $_POST['tgl_awal'];
$tgl_akhir = $_POST['tgl_akhir'];
$jenis_cuti = $_POST['jenis_cuti'];
$keterangan = $_POST['keterangan'];
// kuota cuti off sementara
// $kuota_cuti = $_POST['kuota_cuti'];

$start = new DateTime($tgl_awal);
$finish = new DateTime($tgl_akhir);

// $int = $start->diff($finish);
// $dur = $int->days;
// $lama_cuti = $dur;

$daterange     = new DatePeriod($start, new DateInterval('P1D'), $finish);
//mendapatkan range antara dua tanggal dan di looping
$i=0;
$lama_cuti     =    1;
$finish     =    1;

foreach($daterange as $date){
    $daterange     = $date->format("Y-m-d");
    $datetime     = DateTime::createFromFormat('Y-m-d', $daterange);

    //Convert tanggal untuk mendapatkan nama hari
    $day         = $datetime->format('D');

    //Check untuk menghitung yang bukan hari sabtu dan minggu
    if($day!="Sun") {
        //echo $i;
        $lama_cuti    +=    $finish-$i;
        
    }
    $finish++;
    $i++;
}

//mengubah string menjad int
// $num = "$kuota_cuti";
// $int = (int)$num;  
// $float = (float)$num;

// $sisa = $kuota_cuti - $lama_cuti;
// $kuota_cuti = $sisa;


$status = $_POST['status'];

 if ((empty($username))) {
		$response = new usr();
		$response->success = 0;
		$response->message = "Kolom username tidak boleh kosong";
		die(json_encode($response));
	} else if ((empty($keterangan))) {
		$response = new usr();
		$response->success = 0;
	 	$response->message = "Silakan isi keterangan cuti anda";
		die(json_encode($response));
	} else{

        $query = mysqli_query($con, "INSERT INTO cuti (id,username,fullname,divisi,tahun, tgl_pengajuan,tgl_awal,tgl_akhir,jenis_cuti,keterangan,status,lama_cuti) VALUES(0,'".$username."','".$fullname."','".$divisi."','".$tahun."','".$tgl_pengajuan."','".$tgl_awal."','".$tgl_akhir."','".$jenis_cuti."','".$keterangan."','".$status."','".$lama_cuti."')");		
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