<?php
	include_once "koneksi.php";

	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	$TanggalAwal=$_REQUEST['TanggalAwal'];
	$TanggalAkhir=$_REQUEST['TanggalAkhir'];
	$Sales=$_REQUEST['Sales'];

			$sql_query = "SELECT DATE_FORMAT(tanggal,'%d-%m-%Y') as Tanggal,checkin,checkout,status FROM vreportabsen where tanggal between '$TanggalAwal' and '$TanggalAkhir' and Sales='$Sales' order by DATE_FORMAT(Tanggal,'%Y-%m-%d') asc ";
			
		$result = $con->query($sql_query) or die ("Error : ".mysql_error());
		
		
	while($row=mysqli_fetch_array($result))
	{
		$flag[]=$row;
	}

	print(json_encode($flag));
		
?>