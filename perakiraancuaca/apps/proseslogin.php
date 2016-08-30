<?php

//jika ditekan tombol login
if(isset($_POST['username'])){
include "model/config.php";
session_start();
$username=$_POST['username'];
$password=$_POST['password'];
$sql=mysqli_query($connection,"select * from tblogin where username='$username' && password='$password'");

$num=mysqli_num_rows($sql);
	if($num==1){
	//login benar//
		$_SESSION['username']=$username;
		$_SESSION['password']=$password;
		print "<script type='text/javascript'>
		alert('Selamat Datang Administrator');
		document.location='index.php'</script>";

	}else{
		//jika salah//
		print "<script type='text/javascript'>
		alert('Username atau Password anda salah');
		document.location='login.php'</script>";
	}


}
