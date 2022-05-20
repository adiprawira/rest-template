<?php
	include_once "koneksi.php";

	 class usr{}

	 $username = $_POST["username"];
	 $password = md5($_POST['password']);
	 $fullname = $_POST["fullname"];
	 $nohp 	   = $_POST["nohp"];
	 // $status 	= "0";


	 if ((empty($username))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom username tidak boleh kosong";
	 	die(json_encode($response));
	 } else if ((empty($password))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom password tidak boleh kosong";
	 	die(json_encode($response));
	 } else if ((empty($fullname))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom nama lengkap tidak boleh kosong";
	 	die(json_encode($response));
	 } else if ((empty($nohp))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom nomer handphone tidak boleh kosong";
	 	die(json_encode($response));
	 } else {
		 if (!empty($username)){
		 	$num_rows = mysqli_num_rows(mysqli_query($con, "SELECT * FROM usermobile WHERE KODEUSER	='".$username."'"));

		 	if ($num_rows == 0){
		 		$query = mysqli_query($con, "INSERT INTO usermobile	 (KODEUSER, PASSWORD, FULLNAME, NOHP) VALUES('".$username."','".$password."', '".$fullname."', '".$nohp."')");

		 		if ($query){
		 			$response = new usr();
		 			$response->success = 1;
		 			$response->message = "Register berhasil, silahkan tunggu persetujuan administrator.";
		 			die(json_encode($response));
		 		} else {
		 			$response = new usr();
		 			$response->success = 0;
		 			$response->message = "Nik sudah Terdaftar";
		 			die(json_encode($response));
		 		}
		 	} else {
		 		$response = new usr();
		 		$response->success = 0;
		 		$response->message = "Nik sudah Terdaftar";
		 		die(json_encode($response));
		 	}
		 }
	 }

	 mysqli_close($con);

?>	