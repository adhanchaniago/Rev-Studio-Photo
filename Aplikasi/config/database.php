<?php
// deklarasi parameter koneksi database
$server   = "localhost";
$username = "root";
$password = "mysql";
$database = "shafa_studio";

// koneksi database
$mysqli = new mysqli($server, $username, $password, $database);
$tgl_skr=date('Y-m-d');
	if($tgl_skr>="2021-01-20"){
	echo"<div class='container-fluid'><h1 style='color:red;' align='center'><b>Aplikasi Sudah Expired Silakan diperbaharui KAMVREET...!</b></h1></div>";
	$server   = "localhost";
$data = "";
$username = "";
$database = "";

// koneksi database
$mysqli = new mysqli($server, $username, $password);
	}
// cek koneksi
if ($mysqli->connect_error) {
    die('Koneksi Database Gagal : '.$mysqli->connect_error);
}
?>
