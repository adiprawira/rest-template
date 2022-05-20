
<?php
	// include_once('../includes/connect_database.php'); 
	// include_once('../includes/variables.php');

	include_once "koneksi.php";

	error_reporting(E_ALL ^ E_DEPRECATED);
	$con = new mysqli($server, $user, $password,$database) or die("Error : ".mysql_error());
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	
			
			$sql_query = "SELECT * FROM izin_cuti";
			
		$result = $con->query($sql_query) or die ("Error : ".mysql_error());
		
		//$menus = array();
		//while($menu = $result->fetch_assoc()){
			//$menus[] = array('Menu'=>$menu);
		//}
		
		//$output = json_encode(array('data' => $menus));
		//$output = json_encode(array( $menus));
		//print($output);
	//Output the output.
	//echo $output;

		
	while($row=mysqli_fetch_array($result))
	{
		$cls[]=$row;
	}

	print(json_encode($cls));
		
	include_once('../includes/close_database.php'); 
?>