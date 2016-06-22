<?php
require 'Model/config.php';
$fetch = mysqli_query($connection,'select * from faktorcuaca');
//$nilaikelasTidak = mysqli_num_rows(mysqli_query($connection,"select count(Id) as total //from faktor1 where bermain Like '%idak%'"));
$arrkelascerah= array();
$arrkelasberawan = array();
$arrkelashujan= array();
if(!$fetch){
	print "Error ";
}else{
	$count = mysqli_num_rows($fetch);
	print "Total Data :".$count."<p/>";
	while($data = mysqli_fetch_array($fetch)){
		$data['cuaca'] =strtolower($data['cuaca']);
		if($data['cuaca']=='cerah'){
			array_push($arrkelascerah,$data['cuaca']);
		}else if($data['cuaca']=='berawan'){
			array_push($arrkelasberawan,$data['cuaca']);
		}
		else{
			array_push($arrkelashujan,$data['cuaca']);
		}
		
	}
}
$countkelascerah =count($arrkelascerah);
$countkelasberawan =count($arrkelasberawan);
$countkelashujan = count($arrkelashujan);
print "Total Kelas Cerah :".$countkelascerah."<p/>";
print "Total Kelas Berawan :".$countkelasberawan."<p/>"."Total Kelas Hujan :".$countkelashujan;


//hitung semua entropy
$allentropy = (-($countkelascerah/$count)*log($countkelascerah/$count,2))+(-($countkelasberawan/$count)*log($countkelasberawan/$count,2))+(-($countkelashujan/$count)*log($countkelashujan/$count,2));

print "<p/>"." Nilai Entropy Semua Data :".$allentropy;


