<!-- </?php

include_once "koneksi.php";

session_start();
class usr{}

date_default_timezone_set('Asia/Jakarta');
$KODEUSER = $_POST["KODEUSER"];
$PASSWORD = md5($_POST["PASSWORD"]);

 if ((empty($KODEUSER)) || (empty($PASSWORD))) { 
		
		$response = new usr();
		$response->success = 0;
		$response->message = "Kolom tidak boleh kosong"; 
		die(json_encode($response));
	 }
		$query = mysqli_query($con, "UPDATE usermobile SET KODEUSER = '$KODEUSER', PASSWORD='$PASSWORD'  WHERE KODEUSER='$KODEUSER' AND PASSWORD='$PASSWORD' ");		
		if ($query) {
			$response = new usr();
			$response->success = 1;
			$response->message = "Ubah Password Berhasil";
			die(json_encode($response));
		} else { 
			$response = new usr();
			$response->success = 0;
			$response->message = "Error ubah password";
			die(json_encode($response)); 
		}	
	}


	 mysqli_close($con);

?> -->

<?php

include_once "koneksi.php";

session_start();
class usr{}

date_default_timezone_set('Asia/Jakarta');
$username = $_POST["username"];
$password = $_POST["password"];

 if ((empty($username))) {
		$response = new usr();
		$response->success = 0;
	 	$response->message = "Masukkan NIK dengan benar!";
		die(json_encode($response));
}  else {
		$query = mysqli_query($con, "UPDATE usermobile SET PASSWORD=md5('".$password."') WHERE KODEUSER='".$username."'");		
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