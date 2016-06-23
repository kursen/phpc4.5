<?php
require 'Model/config.php';
	$Id = $_GET['id'];
	$query = "select * from faktorcuaca where Id =$Id"; 
	$execute = mysqli_query($connection,$query);
	$data = mysqli_fetch_assoc($execute);
	/*
	PErtama kau salah panggil
	kalo untuk buat table atau perulangan pake mysqli_fetch_arrayu
	mysqli_fetch_array -> akan memanggil data dalam bentuk array dan dilakukan dalam perulangan
	mysqli_fetch_assoc -> memanggil data dalam bentuk objek,sehinggia kita hanya memanggil attribuytnya
	*/
?>
<html>
<head>
<title>Form Edit Cuaca</title>
</head>
<body>
	<form action="update.php" method="POST">
	<input type="hidden" name="id" value="<?php print $Id; ?>" />
	Kota: <input type="text" name="kota" value="<?php echo $data['kota'];?>" ><br>
    	Suhu Max : <input type="text" name="suhu_max" value="<?php echo $data['suhu_max'];?>" ><br>
        Suhu Min : <input type="text" name="suhu_min" value="<?php echo $data['suhu_min'];?>"><br>
        Kelembapan : <input type="text" name="kelembapan" value="<?php echo $data['kelembapan'];?>"><br>
		Angin : <input type="text" name="arah_angin" value="<?php echo $data['arah_angin'];?>"><br>
		Cuaca : <input type="text" name="cuaca" value="<?php echo $data['cuaca'];?>"><br>
        <input type="submit" name="edit" value="EDIT"><a href='dataset.php'>Batal</a>
    </form>
</body>
</html>