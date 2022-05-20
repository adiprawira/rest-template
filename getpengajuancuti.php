<?php
	include_once "koneksi.php";

	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	$divisi=$_REQUEST['divisi'];
	// $status = "Normal";


			$sql_query = "SELECT *FROM cuti WHERE divisi='$divisi' AND kadiv_acc='0' ORDER BY tgl_pengajuan DESC";
			
		$result = $con->query($sql_query) or die ("Error : ".mysql_error());
		
		
	while($row=mysqli_fetch_array($result))
	{
		$flag[]=$row;
	}

	print(json_encode($flag));
		
?>