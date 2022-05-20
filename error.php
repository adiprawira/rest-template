<?php
session_start();

date_default_timezone_set('Asia/Jakarta');
$tanggal = time();
$checkin = date('H:i', time());
$date = date('H:i', $tanggal);

echo $date;
echo $_SESSION['username'];
?>