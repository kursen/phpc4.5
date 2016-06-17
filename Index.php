<?php
require 'Model/config.php';
$fetch = mysqli_query($connection,'select * from faktor1');
//$nilaikelasTidak = mysqli_num_rows(mysqli_query($connection,"select count(Id) as total //from faktor1 where bermain Like '%idak%'"));
$arrkelasTidak = array();
$arrkelasYa = array();
if(!$fetch){
	print "Error ";
}else{
	$count = mysqli_num_rows($fetch);
	print "Total Data :".$count."<p/>";
	while($data = mysqli_fetch_array($fetch)){
		$data['bermain'] =strtolower($data['bermain']);
		if($data['bermain']=='tidak'){
			array_push($arrkelasTidak,$data['bermain']);
		}else{
			array_push($arrkelasYa,$data['bermain']);
		}
		
	}
}
$countkelasTidak =count($arrkelasTidak);
$countkelasYa =count($arrkelasYa)
print "Total Kelas Tidak :".$countkelasTidak."<p/>";
print "Total Kelas Ya :".$countkelasYa;


//hitung semua entropy
$allentropy = (-($countkelasYa/$count)*log2
/*
private function entropy(){
	
}*/


