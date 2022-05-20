
<?php
   
    include_once "koneksi.php";

	class usr{}
	
	$divisi = $_POST["divisi"];
 
    $query = "SELECT * FROM user WHERE divisi='$divisi'"; //select table in database
    $sql = mysqli_query($con, $query);
    $arraydata = array();
    while ($data = mysqli_fetch_array($sql)) {
        $arraydata[] = $data;
    }
 
    echo json_encode($arraydata);
 ?>