<?php
require('../Model/config.php');

if($_FILES['datasetfile']['size']>0){
	$target_dir = "uploaddataset/";
	$uploadfile = $target_dir . basename($_FILES['datasetfile']['name']);

	$okupload=0;
	if (move_uploaded_file($_FILES['datasetfile']['tmp_name'], $uploadfile)) {
		$okupload=1;
		require_once "../Model/Classes/PHPExcel.php";
		$tmpfname = $uploadfile;
		$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getActiveSheet();
		$lastRow = $worksheet->getHighestRow();
		$action="";
		//print "<table border='1'>";
		for($row=2;$row<=$lastRow;$row++){
			$tgl =mysqli_real_escape_string($connection,$worksheet->getCell('A'.$row)->getValue());
			if(PHPExcel_Shared_Date::isDateTime($worksheet->getCell('A'.$row))) {
				$tgl = date("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($tgl)); 
			}
			$suhu_max = mysqli_real_escape_string($connection,$worksheet->getCell('F'.$row)->getValue());
			$suhu_min = mysqli_real_escape_string($connection,$worksheet->getCell('G'.$row)->getValue());
			$kelembapan =mysqli_real_escape_string($connection,$worksheet->getCell('P'.$row)->getValue());
			$arahangin =mysqli_real_escape_string($connection,$worksheet->getCell('R'.$row)->getValue());
			$kecepatanangin =mysqli_real_escape_string($connection,$worksheet->getCell('Q'.$row)->getValue());
			$cuaca =mysqli_real_escape_string($connection,$worksheet->getCell('H'.$row)->getValue());
			$queryinsert ="insert into testingtable(tanggal,suhu_max,suhu_min,kelembapan,arah_angin,kecepatan_angin,cuaca) values('$tgl','$suhu_max',
		'$suhu_min','$kelembapan','$arahangin','$kecepatanangin','$cuaca')";
			$action=mysqli_query($connection,$queryinsert);
			/*print "<tr><td>";
			print $tgl;
			print "</td><tr>";
			print "<tr><td>";
			print $tgl;
			print "</td><td>";
			print $worksheet->getCell('F'.$row)->getValue();
			print "</td><td>";
			print $worksheet->getCell('G'.$row)->getValue();
			print "</td><td>";
			print $worksheet->getCell('P'.$row)->getValue();
			print "</td><td>";
			print $worksheet->getCell('R'.$row)->getValue();
			print "</td><td>";
			print $worksheet->getCell('H'.$row)->getValue();
			print "</td><tr>";*/
			
			
		}
		//print"</table>";
		if($action){
			print "<script>alert('Data berhasil di simpan');window.location.href='../Index.php';</script>";
		}
	}
}else{
	print "<script>alert('masukkan dataset!!');window.history.back(0);</script>";
}
?>