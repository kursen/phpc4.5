<?php
//ini kan kerjaan jadi haru kau komit,coba kau cantikkan
	//ini ambil koneksi dari file config.php yang di folder Model
	//mysqli_query(nama_variabel_koneksi,variabel_Query); gini cara kerjanya,ngerti
	require 'Model/config.php';
	$query = "select * from faktorcuaca";
	$execute = mysqli_query($connection,$query);
	if(mysqli_num_rows($execute)>0){
		echo "<table border='1'>
				<tr>
					<th>No</th>
					<th>Kota</th>
					<th>Suhu Max</th>
					<th>Suhu Min</th>
					<th>Kelembapan</th>
					<th>Arah Angin</th>
					<th>Cuaca</th>
					<th>Aksi</th>
				</tr>";
		$nomor = 1;
		
		while($row = mysqli_fetch_array($execute)){
			//ini sebetolnya gak usah kyk gini,,bikin repot
			/*$kota = $row['kota'];
			$suhu_max= $row['suhu_max'];
			$suhu_min = $row['suhu_min'];
			$kelembapan = $row['kelembapan'];
			
			$cuaca = $row['cuaca'];*/
			
			
			echo "<tr>
					<td>".$nomor."</td>
					<td>".$row['kota']."</td>
					<td>".$row['suhu_max']."</td>
					<td>".$row['suhu_min']."</td>
					<td>".$row['kelembapan']."</td>
					<td>".$row['arah_angin']."</td>
					<td>".$row['cuaca']."</td>
					<td><a onclick='return confirm(\"Are you sure you want to delete this item?\");' href='hapus.php?id=".$row['Id']."'>
					Hapus</a></td>
				</tr>";//tambahi kyk gitu
				//itu kalo mau pake confirm,,perhatikan tanda ' atau ",,ngerti kan
			$nomor+=1;
		}
		echo "</table>";
	}else{
		echo "Data Kosong";
	}
?>
