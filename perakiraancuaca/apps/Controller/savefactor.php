<?php

if(isset($_POST['tanggal'],$_POST['suhu_max'],$_POST['suhu_min'],$_POST['kelembapan'],$_POST['arah_angin'],$_POST['kecepatan_angin'],$_POST['cuaca'])){
	require('../Model/config.php');
	$tanggal=$_POST['tanggal'];
	$suhu_max = $_POST['suhu_max'];
	$suhu_min = $_POST['suhu_min'];
	$kelembapan = $_POST['kelembapan'];
	$arah_angin =$_POST['arah_angin'];
	$kecepatan_angin= $_POST['kecepatan_angin'];
	$cuaca =$_POST['cuaca'];
	$query ="insert into trainingtable(tanggal,suhu_max,suhu_min,kelembapan,arah_angin,kecepatan_angin,cuaca) values('$tanggal','$suhu_max',
	'$suhu_min','$kelembapan','$arah_angin','$kecepatan_angin','$cuaca')";
	
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