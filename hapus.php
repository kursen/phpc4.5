<?php
require 'Model/config.php';//udah bnar
if(isset($_GET['id'])){//cukup gini aja
	$Id = $_GET['id'];//biar lebih  mudah dibaca
	$query = "delete from faktorcuaca where Id =$Id";//huruf besar kecil berpengaruh,lgsg gini aja pun bisa
	$execute = mysqli_query($connection,$query);//ini mana koneksinya soalnya ini php5.6, 
	//beda dengan php sebelumnya yg cuma pake mysql_query,paham kan
	if($execute){
		echo "<script>
				alert('Data Berhasil Di Hapus.');
				window.location.href='dataset.php';
			</script>";
	}else{
		print "gagal hapus ".mysqli_error($connection);//nengok errornya apa, bentar ada yg lupa
	}
}

?>