<?php
require('../Model/config.php');
$query="select * from faktorcuaca order by Id asc";
$execute = mysqli_query($connection,$query);
$data = array();
while($arrdata = mysqli_fetch_array($execute)){
	$getdata = array('Id' => $arrdata[0],
	'kota' => $arrdata[1],
	'suhu_max' => $arrdata[2],
	'suhu_min' => $arrdata[3],
	'kelembapan' => $arrdata[4],
	'arah_angin' => $arrdata[5],
	'cuaca' => $arrdata[6]
	);
	array_push($data,$getdata);
}
mysqli_close($connection);
$result = array('data'=>$data);
print json_encode($result);
?>