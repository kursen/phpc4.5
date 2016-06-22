<?php
require_once('../Model/config.php');
if(isset($_POST['id'])){
	$id=$_POST['id'];
	$query="delete from faktorcuaca where Id=$id";
	$execute = mysqli_query($connection,$query);
	if(!$execute){
		print json_encode(0);
	}else{
		print json_encode(1);
	}
}else{
	print "Tidak ada data";
}

?>