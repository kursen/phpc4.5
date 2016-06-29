<?php

if(isset($_POST['tanggal'],$_POST['suhu_max'],$_POST['suhu_min'],$_POST['kelembapan'],$_POST['arah_angin'],$_POST['kecepatan_angin'],$_POST['cuaca'],$_POST['Id'])){
	require('../Model/config.php');
	$Id =$_POST['Id'];
	$tanggal=$_POST['tanggal'];
	$suhu_max = $_POST['suhu_max'];
	$suhu_min = $_POST['suhu_min'];
	$kelembapan = $_POST['kelembapan'];
	$arah_angin =$_POST['arah_angin'];
	$kecepatan_angin =$_POST['kecepatan_angin'];
	$cuaca =$_POST['cuaca'];
	$query ="update trainingtable set tanggal='$tanggal',
	suhu_max='$suhu_max',
	suhu_min='$suhu_min',
	kelembapan='$kelembapan',
	arah_angin='$arah_angin',
	kecepatan_angin='$kecepatan_angin',
	cuaca='$cuaca' where Id=$Id";
	$executequery=mysqli_query($connection,$query);
	$returnval=0;
	if($executequery){
		$returnval=1;
	}
	print $returnval;
}else{
	print "Data Tidak Lengkap";
}
?>