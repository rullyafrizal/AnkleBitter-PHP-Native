<?php
$koneksi = mysqli_connect("localhost","root","","website_fashion");
// cek koneksi
if (!$koneksi){
 die("Error koneksi: " . mysqli_connect_errno());
}



?>
