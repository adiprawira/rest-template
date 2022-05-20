
<?php
   
    include_once "koneksi.php";

	class usr{}
	
	$sales = $_REQUEST["sales"];
	$tanggal = $_REQUEST["tanggal"];
 
    $query = "SELECT * FROM vreportabsen WHERE sales='$sales' AND date_format(tanggal,'%d-%m-%Y')='$tanggal'"; //select table in database
    $sql = mysqli_query($con, $query);
    $arraydata = array();
    while ($data = mysqli_fetch_array($sql)) {
        $arraydata[] = $data;
    }
 
    echo json_encode($arraydata);
 ?>