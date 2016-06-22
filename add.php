<?php
	$query = "select * from faktorcuaca";
	$execute = mysqli_query($query,$koneksi);
	if(mysqli_num_rows($execute)>0){
		echo "<table class=\"data\">
				<tr>
					<th>No</th>
					<th>Kota</th>
					<th>Suhu Max</th>
					<th>Suhu Min</th>
					<th>Kelembapan</th>
					<th>Arah Angin</th>
					<th>Cuaca</th>
				</tr>";
		$I = 1;
		while($row = mysqli_fetch_array($execute)){
		$ID = $row['no'];
			$no = $row['no'];
			$kota = $row['kota'];
			$suhu_max= $row['suhu_max'];
			$suhu_min = $row['suhu_min'];
			$kelembapan = $row['kelembapan'];
			$cuaca = $row['cuaca'];
			
			
			echo "<tr>
					<td>".$no."</td>
					<td>".$kota."</td>
					<td>".$suhu_max."</td>
					<td>".$suhu_min."</td>
					<td>".$kelembapan."</td>
					<td>".$cuaca."</td>
					<td>< onClick=\"return confirm('Hapus?');\">Delete</a></td>
				</tr>";
			$I++;
		}
		echo "</table>";
	}else{
		echo "Data Kosong";
	}
?>
