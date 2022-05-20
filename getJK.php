<?php
	include_once "koneksi.php";

	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

	$divisi=$_POST['divisi'];
	// $status = "Normal";


			$sql_query = "SELECT COUNT(fullname) as jumlah FROM user where  divisi='$divisi' and jabatan!='KADIV.'";
			
		$result = $con->query($sql_query) or die ("Error : ".mysql_error());
		
		
	while($row=mysqli_fetch_array($result))
	{
		$flag[]=$row;
	}

	print(json_encode($flag));
		
?>
