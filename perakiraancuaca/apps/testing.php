<?php
require('Model/config.php');
$query = "select * from trainingtable";
$execute = mysqli_query($connection,$query);
while($data=mysqli_fetch_array($execute)){
	print_r($data);
}
?>