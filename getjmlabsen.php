<!-- </?php
session_start();
	 include_once "koneksi.php";

	class usr{}
	
	// $username = $_POST["username"];

	
	$query = mysqli_query($con, "SELECT user.username, count(visit.kodeuser) AS jumlah_bulanan, visit.sales FROM user INNER JOIN visit ON visit.kodeuser = user.username WHERE visit.tanggal between '2021-08-01' AND '2021-09-25' group by user.username, visit.sales  ");
	
	$row = mysqli_fetch_array($query);
	
	if (!empty($row)){
		
		$response = new usr();
		$response->success = 1;
		$response->sales = $row['sales'];
		$response->jumlah_bulanan = $row['jumlah_bulanan'];

	 	die(json_encode($response));
		
	} else { 
	 	$response = new usr();
	 	$response->success = 0;
		$response->message = "data  tidak ditemukan";
	 	die(json_encode($response));
	}
	
	 mysqli_close($con);
?>  -->

<?php
	include_once "koneksi.php";

	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	$TanggalAwal=$_REQUEST['TanggalAwal'];
	$TanggalAkhir=$_REQUEST['TanggalAkhir'];
	$divisi=$_REQUEST['divisi'];
	// $status = "Normal";


			$sql_query = "SELECT COUNT(kodeuser) AS jumlah_bulanan, sales FROM user INNER JOIN visit ON user.username = visit.kodeuser WHERE visit.tanggal between '$TanggalAwal' AND '$TanggalAkhir' AND visit.divisi='$divisi' group by user.username, visit.kodeuser";
			
		$result = $con->query($sql_query) or die ("Error : ".mysql_error());
		
		
	while($row=mysqli_fetch_array($result))
	{
		$flag[]=$row;
	}

	print(json_encode($flag));
		
?>

