<?php
$user ='localhost';
$db='fc45';
$pass='';
$connecion=mysqli_connect($user, $db, $pass);
if(!$connecion){
	DIE(mysql_error().'Koneksi ke server gagal !');
}else{
	$dbselect=mysqli_select_db($connecion,$dbname) or DIE('Database tidak tersedia !');
}

if(isset($_POST['angka'])){
	$angka=$_POST['angka'];
	print $angka;
	$insert = mysqli_query($connecion,"insert into table(angka) values('$angka')");
	if($insert){
		print "<script type='text/javacript'>alert('berhasil');</script>";
	}
}else{
	print "belom masuk";
}