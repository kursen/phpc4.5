<?php
//ini file untuk menyimpan data form nya
//pengecekkan apa kan data dikirim atau tidak
if(isset($_POST['kota'],$_POST['suhu_max'],$_POST['suhu_min'],$_POST['kelembapan'],
$_POST['arah_angin'],$_POST['cuaca'])){
	//skrg kita memerlukan koneksi database yg kita panggil dari file config.php di folder Model
	require 'Model/config.php';
	//buat variable untuk menampung data kiriman
	$kota = $_POST['kota'];//index ini diambil dari attribut name,
	$suhumax = $_POST['suhu_max'];
	$suhumin =$_POST['suhu_min'];
	$kelembapan = $_POST['kelembapan'];
	$arahangin = $_POST['arah_angin'];
	$cuaca = $_POST['cuaca'];
	//oke ,skrg kita buat query untuk insert data
	$queryinsert = "insert into faktorcuaca (kota,suhu_max,
	suhu_min,kelembapan,arah_angin,cuaca) values ('$kota','$suhumax','$suhumin',
	'$kelembapan','$arahangin','$cuaca')";//dah ngerti sampe sini udahhh
	
	//eksekusi queri tadi buat variable yg mengartikan apa kah queri berhasil dieksekusi atau tidak
	$execute = mysqli_query($connection,$queryinsert);//variable berhasil atau tidak ditampung di $execute
	
	if($execute){//jika berhasil
		//apa mau dilakukan disini,contoh nya kalo berhasil lgsg masuk ke dataset untuk melihat datanya
		header('location:dataset.php');//ini kalo berhasil
	}else{
		//kalo gagal,misalkan kembali ke form tadi dengan menampilkan error_get_last
		print "<script>
			alert('Gagal menyimpan data ".mysqli_error($connection)."');
			window.location.href='formcuaca.php';
		</script>";
	}
	//kalo uda siap,koneksi kita tutup
	mysqli_close($connection);//untuk menghindari memory penuh dan koneksi aktif terus
}else{
	print "Data Kosong";//ini untuk validasi jika link ini,kau perhatikan apa gak ini 
}