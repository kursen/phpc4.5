<?php
$hostname = 'localhost';   // Hostname
$dbname   = 'fc45';      // Nama Database
$username = 'root';        // Username Database
$password = ''; // Database password

// Koneksi ke databse
$connection=mysqli_connect($hostname, $username, $password);
// Pilih database
if(!$connection){
	DIE(mysql_error().'Koneksi ke server gagal !');
}else{
	$dbselect=mysqli_select_db($connection,$dbname) or DIE('Database tidak tersedia !');
}
?>