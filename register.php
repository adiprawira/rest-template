<?php
	include_once "koneksi.php";

	 class usr{}

	 $username = $_POST["username"];
	 $password = md5($_POST['password']);
	 $fullname = $_POST["fullname"];
	 $nohp 	   = $_POST["nohp"];
	 $status 	= "0";


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
		 	$num_rows = mysqli_num_rows(mysqli_query($con, "SELECT * FROM user WHERE username='".$username."'"));

		 	if ($num_rows == 0){
		 		$query = mysqli_query($con, "INSERT INTO user (id, username, password, fullname, nohp, status) VALUES(0,'".$username."','".$password."', '".$fullname."', '".$nohp."', '".$status."')");

		 		if ($query){
		 			$response = new usr();
		 			$response->success = 1;
		 			$response->message = "Register berhasil, silahkan tunggu persetujuan administrator.";
		 			die(json_encode($response));
		 		} else {
		 			$response = new usr();
		 			$response->success = 0;
		 			$response->message = "Username sudah ada2";
		 			die(json_encode($response));
		 		}
		 	} else {
		 		$response = new usr();
		 		$response->success = 0;
		 		$response->message = "Username sudah ada";
		 		die(json_encode($response));
		 	}
		 }
	 }

	 mysqli_close($con);

?>	