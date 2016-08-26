<?php
require('../Model/config.php');

if($_FILES['datasetfile']['size']>0){
	$target_dir = "uploaddataset/";
	$uploadfile = $target_dir . basename($_FILES['datasetfile']['name']);

	$okupload=0;
	if (move_uploaded_file($_FILES['datasetfile']['tmp_name'], $uploadfile)) {
		$okupload=1;
		require_once "../Model/Classes/PHPExcel.php";
		require('../calculatec45.php');
		$tmpfname = $uploadfile;
		$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getActiveSheet();
		$lastRow = $worksheet->getHighestRow();
		$action="";
		mysqli_query($connection,'truncate table testingtable');
		for($row=2;$row<=$lastRow;$row++){
			$tgl =mysqli_real_escape_string($connection,$worksheet->getCell('A'.$row)->getValue());
			if(PHPExcel_Shared_Date::isDateTime($worksheet->getCell('A'.$row))) {
				$tgl = date("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($tgl)); 
			}
			$suhu_max = mysqli_real_escape_string($connection,$worksheet->getCell('F'.$row)->getValue());
			$suhu_min = mysqli_real_escape_string($connection,$worksheet->getCell('G'.$row)->getValue());
			$kelembapan =mysqli_real_escape_string($connection,$worksheet->getCell('P'.$row)->getValue());
			$arah_angin =mysqli_real_escape_string($connection,$worksheet->getCell('R'.$row)->getValue());
			$kecepatan_angin =mysqli_real_escape_string($connection,$worksheet->getCell('Q'.$row)->getValue());
			$cuaca='';
			//hitung
			$curahhujan=false;
			$arrcurah_hujan = array(
				'tidakhujan'=>0,
				'hujan_sangat_ringan'=>0,
				'hujan_ringan'=>0,
				'hujan_sedang'=>0,
				'hujan_lebat'=>0
				);

			if($kelembapan > $data_splitinfo_kelembapan)
			{
				$curahhujan=true;
			}else
			{
				$total_kelembapan = sum3_array($arrcount_less_kelembapan);
				$arrcurah_hujan['hujan_sangat_ringan']+=$arrcount_less_kelembapan[1]/$total_kelembapan;
				$arrcurah_hujan['hujan_ringan']+=$arrcount_less_kelembapan[2]/$total_kelembapan;
				$arrcurah_hujan['hujan_sedang']+=$arrcount_less_kelembapan[3]/$total_kelembapan;
				$arrcurah_hujan['hujan_lebat']+=$arrcount_less_kelembapan[4]/$total_kelembapan;
				$curahhujan=false;
			}

			if($kelembapan > $data_splitinfo_kelembapan && $suhu_min > $data_splitinfo_suhu_min)
			{
				$curahhujan=true;
			}else
			{
				$total_suhumin=sum3_array($arrcount_less_suhu_min);
				$arrcurah_hujan['hujan_sangat_ringan']+=$arrcount_less_suhu_min[1]/$total_suhumin;
				$arrcurah_hujan['hujan_ringan']+=$arrcount_less_suhu_min[2]/$total_suhumin;
				$arrcurah_hujan['hujan_sedang']+=$arrcount_less_suhu_min[3]/$total_suhumin;
				$arrcurah_hujan['hujan_lebat']+=$arrcount_less_suhu_min[4]/$total_suhumin;
				$curahhujan=false;
			}

			if($kelembapan > $data_splitinfo_kelembapan && $suhu_min > $data_splitinfo_suhu_min && $kecepatan_angin<=$data_splitinfo_kecepatan_angin)
			{
				$curahhujan=true;
			}else
			{
				$total_kecepatanangin=sum3_array($arrcount_more_kecepatan_angin);
				$arrcurah_hujan['hujan_sangat_ringan']+=$arrcount_more_kecepatan_angin[1]/$total_kecepatanangin;
				$arrcurah_hujan['hujan_ringan']+=$arrcount_more_kecepatan_angin[2]/$total_kecepatanangin;
				$arrcurah_hujan['hujan_sedang']+=$arrcount_more_kecepatan_angin[3]/$total_kecepatanangin;
				$arrcurah_hujan['hujan_lebat']+=$arrcount_more_kecepatan_angin[4]/$total_kecepatanangin;
				$curahhujan=false;
			}

			if($kelembapan > $data_splitinfo_kelembapan && $suhu_min > $data_splitinfo_suhu_min && $kecepatan_angin<=$data_splitinfo_kecepatan_angin && $suhu_max<=$data_splitinfo_suhu_max)
			{
				$curahhujan=true;
			}else
			{
				$total_suhumax=sum3_array($arrcount_less_suhu_max);
				$arrcurah_hujan['hujan_sangat_ringan']+=$arrcount_less_suhu_max[1]/$total_suhumax;
				$arrcurah_hujan['hujan_ringan']+=$arrcount_less_suhu_max[2]/$total_suhumax;
				$arrcurah_hujan['hujan_sedang']+=$arrcount_less_suhu_max[3]/$total_suhumax;
				$arrcurah_hujan['hujan_lebat']+=$arrcount_less_suhu_max[4]/$total_suhumax;
				$curahhujan = false;
			}

			if($kelembapan > $data_splitinfo_kelembapan && $suhu_min > $data_splitinfo_suhu_min && $kecepatan_angin<=$data_splitinfo_kecepatan_angin && $suhu_max<=$data_splitinfo_suhu_max && $arah_angin<=$data_splitinfo_arah_angin)
			{
				$curahhujan=true;
			}
			else
			{
				$total_arahangin=sum3_array($arrcount_more_arah_angin);
				$arrcurah_hujan['hujan_sangat_ringan']+=$arrcount_more_arah_angin[1]/$total_arahangin;
				$arrcurah_hujan['hujan_ringan']+=$arrcount_more_arah_angin[2]/$total_arahangin;
				$arrcurah_hujan['hujan_sedang']+=$arrcount_more_arah_angin[3]/$total_arahangin;
				$arrcurah_hujan['hujan_lebat']+=$arrcount_more_arah_angin[4]/$total_arahangin;
				$curahhujan=false;
			}

			if($curahhujan)
			{
				$cuaca= 0;
			}
			else{
				$max_val=max($arrcurah_hujan);
				$cuaca = array_search($max_val, $arrcurah_hujan);
			}
			//$cuaca =mysqli_real_escape_string($connection,$worksheet->getCell('H'.$row)->getValue());
			$queryinsert ="insert into testingtable(tanggal,suhu_max,suhu_min,kelembapan,arah_angin,kecepatan_angin,cuaca) values('$tgl','$suhu_max',
		'$suhu_min','$kelembapan','$arah_angin','$kecepatan_angin','$cuaca')";
			$action=mysqli_query($connection,$queryinsert);
			
			$cuaca='';
			
		}
		//print"</table>";
		if($action){
			print "<script>alert('Data berhasil di simpan');window.location.href='../Index.php';</script>";
		}
	}
}else{
	print "<script>alert('masukkan dataset!!');window.history.back(0);</script>";
}

 function sum3_array($arrval){
	$sumdata = $arrval[1]+$arrval[2]+$arrval[3]+$arrval[4];
	return $sumdata;
}
?>