<?php

if(isset($_POST['suhu_max'],$_POST['suhu_min'],
	$_POST['kelembapan'],
	$_POST['arah_angin'],
	$_POST['kecepatan_angin'])){
	require('../Model/config.php');
	require('../calculatec45.php');
	$suhu_max = $_POST['suhu_max'];
	$suhu_min = $_POST['suhu_min'];
	$kelembapan = $_POST['kelembapan'];
	$arah_angin =$_POST['arah_angin'];
	$kecepatan_angin= $_POST['kecepatan_angin'];
	$curahhujan=false;
	$arrcurah_hujan = array(
		'tidak_hujan'=>0,
		'hujan_sangat_ringan'=>0,
		'hujan_ringan'=>0,
		'hujan_sedang'=>0,
		'hujan_lebat'=>0
		);

	

	
		
	if($kelembapan > $data_splitinfo_kelembapan){
		$arrcurah_hujan['tidak_hujan']+=$arrcount_more_kelembapan[0]/array_sum($arrcount_more_kelembapan);
		$arrcurah_hujan['hujan_sangat_ringan']+=$arrcount_more_kelembapan[1]/array_sum($arrcount_more_kelembapan);
		$arrcurah_hujan['hujan_ringan']+=$arrcount_more_kelembapan[2]/array_sum($arrcount_more_kelembapan);
		$arrcurah_hujan['hujan_sedang']+=$arrcount_more_kelembapan[3]/array_sum($arrcount_more_kelembapan);
		$arrcurah_hujan['hujan_lebat']+=$arrcount_more_kelembapan[4]/array_sum($arrcount_more_kelembapan);
	}
	else
	{
		$total_kelembapan = array_sum($arrcount_less_kelembapan);
		$arrcurah_hujan['tidak_hujan']+=$arrcount_less_kelembapan[0]/$total_kelembapan;
		$arrcurah_hujan['hujan_sangat_ringan']+=$arrcount_less_kelembapan[1]/$total_kelembapan;
		$arrcurah_hujan['hujan_ringan']+=$arrcount_less_kelembapan[2]/$total_kelembapan;
		$arrcurah_hujan['hujan_sedang']+=$arrcount_less_kelembapan[3]/$total_kelembapan;
		$arrcurah_hujan['hujan_lebat']+=$arrcount_less_kelembapan[4]/$total_kelembapan;
	}
	//suhu min

	if($suhu_min > $data_splitinfo_suhu_min)
	{
		$arrcurah_hujan['tidak_hujan']+=$arrcount_more_suhu_min[0]/array_sum($arrcount_more_suhu_min);
		$arrcurah_hujan['hujan_sangat_ringan']+=$arrcount_more_suhu_min[1]/array_sum($arrcount_more_suhu_min);
		$arrcurah_hujan['hujan_ringan']+=$arrcount_more_suhu_min[2]/array_sum($arrcount_more_suhu_min);
		$arrcurah_hujan['hujan_sedang']+=$arrcount_more_suhu_min[3]/array_sum($arrcount_more_suhu_min);
		$arrcurah_hujan['hujan_lebat']+=$arrcount_more_suhu_min[4]/array_sum($arrcount_more_suhu_min);
	}else
	{
		$total_suhumin=array_sum($arrcount_less_suhu_min);
		$arrcurah_hujan['tidak_hujan']+=$arrcount_less_suhu_min[0]/$total_suhumin;
		$arrcurah_hujan['hujan_sangat_ringan']+=$arrcount_less_suhu_min[1]/$total_suhumin;
		$arrcurah_hujan['hujan_ringan']+=$arrcount_less_suhu_min[2]/$total_suhumin;
		$arrcurah_hujan['hujan_sedang']+=$arrcount_less_suhu_min[3]/$total_suhumin;
		$arrcurah_hujan['hujan_lebat']+=$arrcount_less_suhu_min[4]/$total_suhumin;
	}

	if($kecepatan_angin<=$data_splitinfo_kecepatan_angin)
	{
		$arrcurah_hujan['tidak_hujan']+=$arrcount_less_kecepatan_angin[0]/array_sum($arrcount_less_kecepatan_angin);
		$arrcurah_hujan['hujan_sangat_ringan']+=$arrcount_less_kecepatan_angin[1]/array_sum($arrcount_less_kecepatan_angin);
		$arrcurah_hujan['hujan_ringan']+=$arrcount_less_kecepatan_angin[2]/array_sum($arrcount_less_kecepatan_angin);
		$arrcurah_hujan['hujan_sedang']+=$arrcount_less_kecepatan_angin[3]/array_sum($arrcount_less_kecepatan_angin);
		$arrcurah_hujan['hujan_lebat']+=$arrcount_less_kecepatan_angin[4]/array_sum($arrcount_less_kecepatan_angin);
	}
	else{
		$total_kecepatanangin=array_sum($arrcount_more_kecepatan_angin);
		$arrcurah_hujan['tidak_hujan']+=$arrcount_less_kecepatan_angin[0]/$total_kecepatanangin;
		$arrcurah_hujan['hujan_sangat_ringan']+=$arrcount_more_kecepatan_angin[1]/$total_kecepatanangin;
		$arrcurah_hujan['hujan_ringan']+=$arrcount_more_kecepatan_angin[2]/$total_kecepatanangin;
		$arrcurah_hujan['hujan_sedang']+=$arrcount_more_kecepatan_angin[3]/$total_kecepatanangin;
		$arrcurah_hujan['hujan_lebat']+=$arrcount_more_kecepatan_angin[4]/$total_kecepatanangin;
	}

	if($suhu_max>$data_splitinfo_suhu_max)
	{
		$arrcurah_hujan['tidak_hujan']+=$arrcount_more_suhu_max[0]/array_sum($arrcount_more_suhu_max);
		$arrcurah_hujan['hujan_sangat_ringan']+=$arrcount_more_suhu_max[1]/array_sum($arrcount_more_suhu_max);
		$arrcurah_hujan['hujan_ringan']+=$arrcount_more_suhu_max[2]/array_sum($arrcount_more_suhu_max);
		$arrcurah_hujan['hujan_sedang']+=$arrcount_more_suhu_max[3]/array_sum($arrcount_more_suhu_max);
		$arrcurah_hujan['hujan_lebat']+=$arrcount_more_suhu_max[4]/array_sum($arrcount_more_suhu_max);
	}
	else
	{
		$total_suhumax=array_sum($arrcount_less_suhu_max);
		$arrcurah_hujan['tidak_hujan']+=$arrcount_less_suhu_max[0]/$total_suhumax;
		$arrcurah_hujan['hujan_sangat_ringan']+=$arrcount_less_suhu_max[1]/$total_suhumax;
		$arrcurah_hujan['hujan_ringan']+=$arrcount_less_suhu_max[2]/$total_suhumax;
		$arrcurah_hujan['hujan_sedang']+=$arrcount_less_suhu_max[3]/$total_suhumax;
		$arrcurah_hujan['hujan_lebat']+=$arrcount_less_suhu_max[4]/$total_suhumax;

	}

	if($arah_angin>180)
	{
		$arrcurah_hujan['tidak_hujan']+=$arrcount_less_arah_angin[0]/array_sum($arrcount_less_arah_angin);
		$arrcurah_hujan['hujan_sangat_ringan']+=$arrcount_less_arah_angin[1]/array_sum($arrcount_less_arah_angin);
		$arrcurah_hujan['hujan_ringan']+=$arrcount_less_arah_angin[2]/array_sum($arrcount_less_arah_angin);
		$arrcurah_hujan['hujan_sedang']+=$arrcount_less_arah_angin[3]/array_sum($arrcount_less_arah_angin);
		$arrcurah_hujan['hujan_lebat']+=$arrcount_less_arah_angin[4]/array_sum($arrcount_less_arah_angin);
	}
	else
	{
		$total_arahangin=sum3_array($arrcount_more_arah_angin);
		$arrcurah_hujan['tidak_hujan']+=$arrcount_more_arah_angin[0]/$total_arahangin;
		$arrcurah_hujan['hujan_sangat_ringan']+=$arrcount_more_arah_angin[1]/$total_arahangin;
		$arrcurah_hujan['hujan_ringan']+=$arrcount_more_arah_angin[2]/$total_arahangin;
		$arrcurah_hujan['hujan_sedang']+=$arrcount_more_arah_angin[3]/$total_arahangin;
		$arrcurah_hujan['hujan_lebat']+=$arrcount_more_arah_angin[4]/$total_arahangin;
	}



	$max_val=max($arrcurah_hujan);
	$cuaca = array_search($max_val, $arrcurah_hujan);
	print json_encode($cuaca);

}else{
	print "Data Tidak Lengkap";
}

 function sum3_array($arrval){
	$sumdata = $arrval[1]+$arrval[2]+$arrval[3]+$arrval[4];
	return $sumdata;
}
?>