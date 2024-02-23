<?php
$host	= "localhost";	//alamat server, biasanya 'localhost' atau isi dengan alamat ip server mysql anda
$user	= "root";		//defaultnya 'root', sesuaikan dg konfigurasi server anda
$pass	= "root";		//kosongkan jika tidak ada
$db		= "sppku";	//isi dengan nama database

$connection = mysqli_connect($host, $user, $pass, $db);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>