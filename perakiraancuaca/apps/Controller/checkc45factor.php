<?php

if(isset($_POST['tanggal'],$_POST['suhu_max'],$_POST['suhu_min'],$_POST['kelembapan'],$_POST['arah_angin'],$_POST['kecepatan_angin'],$_POST['cuaca'])){
	
	require('../calculatec45.php');
	$suhu_max = $_POST['suhu_max'];
	$suhu_min = $_POST['suhu_min'];
	$kelembapan = $_POST['kelembapan'];
	$arah_angin =$_POST['arah_angin'];
	$kecepatan_angin= $_POST['kecepatan_angin'];
	$returncuaca='';
	if($kecepatan_angin <= $data_splitinfo_kecepatan_angin){
		$returncuaca=1;
	}else{
		$returncuaca=0.25;
	}
	if($arah_angin <= $data_splitinfo_arah_angin){
		$returncuaca+=1;
	}else{
		$returncuaca+=0.25;
	}
	
	if($kelembapan <= $data_splitinfo_kelembapan){
		$returncuaca+=1;
	}else{
		$returncuaca+=0.25;
	}
	
	if($suhu_min<=$data_splitinfo_suhu_min){
		$returncuaca+=1;
	}else{
		$returncuaca+=0.25;
	}
	
	if($suhu_max<=$data_splitinfo_suhu_max){
		$returncuaca+=1;
	}else{
		$returncuaca+=0.25;
	}
	
	
}else{
	print "Data Tidak Lengkap";
}
?>