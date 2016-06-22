<?php

if(isset($_POST['kota'],$_POST['suhu_max'],$_POST['suhu_min'],$_POST['kelembapan'],$_POST['arah_angin'],$_POST['cuaca'],$_POST['Id'])){
	require('../Model/config.php');
	$Id =$_POST['Id'];
	$kota=$_POST['kota'];
	$suhu_max = $_POST['suhu_max'];
	$suhu_min = $_POST['suhu_min'];
	$kelembapan = $_POST['kelembapan'];
	$arah_angin =$_POST['arah_angin'];
	$cuaca =$_POST['cuaca'];
	$query ="update faktorcuaca set kota='$kota',
	suhu_max='$suhu_max',
	suhu_min='$suhu_min',
	kelembapan='$kelembapan',
	arah_angin='$arah_angin',
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