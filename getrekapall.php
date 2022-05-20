<?php
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
   
    include_once "koneksi.php";

    class usr{}
    
    $divisi = $_REQUEST["divisi"];
 
    $query = "SELECT * FROM rekap WHERE divisi='$divisi'"; //select table in database
    $sql = mysqli_query($con, $query);
    $arraydata = array();
    while ($data = mysqli_fetch_array($sql)) {
        $arraydata[] = $data;
    }
 
    echo json_encode($arraydata);
 ?>