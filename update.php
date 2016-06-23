<?php
require 'Model/config.php';
$id = $_POST['id'];
$kota = $_REQUEST['kota'];
$suhumax = $_REQUEST['suhu_max'];
$suhumin = $_REQUEST['suhu_min'];
$kelembapan = $_REQUEST['kelembapan'];
$arahangin = $_REQUEST['arah_angin'];
$cuaca= $_REQUEST['cuaca'];
$queryUpdate="update faktorcuaca set 
kota = '$kota',
suhu_max = '$suhumax',
suhu_min = '$suhumin',
kelembapan = '$kelembapan',
arah_angin = '$arahangin',
cuaca = '$cuaca' where Id = $id";
$executeUpdate=mysqli_query($connection,$queryUpdate);
if($executeUpdate){
print "<script>
alert('berhasil update');
document.location.href='dataset.php';</script>";
}else{
print "<script>alert('gagal Update');</script>";
}
?>