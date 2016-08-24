<a href="formcuaca.php">Tambah</a>
<?php

	require 'Model/config.php';
	$query = "select * from faktorcuaca1";
	$execute = mysqli_query($connection,$query);
	if(mysqli_num_rows($execute)>0){
		echo "<table border='1'>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Suhu Max</th>
					<th>Suhu Min</th>
					<th>Kelembapan</th>
					<th>Arah Angin</th>
					<th>Kecepatan Angin</th>
					<th>Curah Hujan</th>
					<th>Aksi</th>
				</tr>";
		$nomor = 1;
		
		while($row = mysqli_fetch_array($execute)){
			
			
			
			echo "<tr>
					<td>".$nomor."</td>
					<td>".$row['tanggal']."</td>
					<td>".$row['suhu_max']."</td>
					<td>".$row['suhu_min']."</td>
					<td>".$row['kelembapan']."</td>
					<td>".$row['arah_angin']."</td>
					<td>".$row['kec_angin']."</td>
					<td>".$row['curah_hujan']."</td>
					<td><a onclick='return confirm(\"Are you sure you want to delete this item?\");' href='hapus.php?id=".$row['Id']."'>
					Hapus</a> <a href='edit.php?id=".$row['Id']."'> Edit</a></td>
				</tr>";
			
			$nomor+=1;
		}
		echo "</table>";
	}else{
		echo "Data Kosong";
	}
	
?>
