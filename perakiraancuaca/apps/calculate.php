<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PrakiraanCuaca</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
	<link href="../dist/css/bootstrapValidator.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php require 'layout/nav.php'; ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Kalkulasi METODE C45</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Kalkulasi Faktor Cuaca
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
								<?php
								require('Model/config.php');
								$queryAllcount = mysqli_query($connection,"select count(Id) as total from trainingtable");
								$datasetallcount = mysqli_fetch_assoc($queryAllcount);
								$AllCount = $datasetallcount['total'];
								print "Banyak Data =".$AllCount."<br/>";
								
								
								//Banyak Kategori
								$queryTidakHujan = mysqli_query($connection,"select count(Id) as total from trainingtable where cuaca=0");
								$datasetTidakHujan = mysqli_fetch_assoc($queryTidakHujan);
								$countTidakHujan=$datasetTidakHujan['total'];
								print "Jumlah Data Kategori Tidak Hujan =".$countTidakHujan."<br/>";
								
								$queryHujanSangatRingan =mysqli_query($connection,"select count(Id) as total from trainingtable where cuaca between 0.01 and 5");
								$datasetHujanSangatRingan =  mysqli_fetch_assoc($queryHujanSangatRingan);
								$countHujanSangatRingan=$datasetHujanSangatRingan['total'];
								print "Jumlah Data Kategori Hujan Sangat Ringan =".$countHujanSangatRingan."<br/>";
								
								$queryHujanRingan = mysqli_query($connection,"select count(Id) as total from trainingtable where cuaca between 5.01 and 20");
								$datasetHujanRingan = mysqli_fetch_assoc($queryHujanRingan);
								$countHujanRingan = $datasetHujanRingan['total'];
								print "Jumlah Data Kategori Hujan Ringan =".$countHujanRingan."<br/>";
								
								$queryHujanSedang = mysqli_query($connection,"select count(Id) as total from trainingtable where cuaca between 20.1 and 50");
								$datasetHujanSedang = mysqli_fetch_assoc($queryHujanSedang);
								$countHujanSedang = $datasetHujanSedang['total'];
								print "Jumlah Data Kategori Hujan Sedang =".$countHujanSedang."<br/>";
								
								$queryHujanLebat = mysqli_query($connection,"select count(Id) as total from trainingtable where cuaca between 50.1 and 100");
								$datasetHujanLebat = mysqli_fetch_assoc($queryHujanLebat);
								$countHujanLebat = $datasetHujanLebat['total'];
								print "Jumlah Data Kategori Hujan Lebat =".$countHujanLebat."<br/>";
								
								
								$queryHujanSangatLebat = mysqli_query($connection,"select count(Id) as total from trainingtable where cuaca>100");
								$datasetHujanSangatLebat = mysqli_fetch_assoc($queryHujanSangatLebat);
								$countHujanSangatLebat = $datasetHujanSangatLebat['total'];
								print "Jumlah Data Kategori Hujan Sangat Lebat =".$countHujanSangatLebat."<br/>";
								print "\n";
								
								
								//hitung semua Entropy
								$Eall= (-($countTidakHujan/$AllCount)*log($countTidakHujan/$AllCount,2)) + 
								(-($countHujanSangatRingan/$AllCount)*log($countHujanSangatRingan/$AllCount,2))+ 
								(-($countHujanRingan/$AllCount)*log($countHujanRingan/$AllCount,2))+
								(-($countHujanSedang/$AllCount)*log($countHujanSedang/$AllCount,2))+
								(-($countHujanLebat/$AllCount)*log($countHujanLebat/$AllCount,2));
								
								print "<p/>"."Nilai Semua Entropy = ".$Eall;
								
								//hitung entropy suhu max.
								$querySuhuMaxTidakHujan = mysqli_query($connection,"select count(suhu_max) as total from trainingtable where cuaca=0");
								$datasetSuhuMaxTidakHujan = mysqli_fetch_assoc($querySuhuMaxTidakHujan);
								$countSuhuMaxTidakHujan =$datasetSuhuMaxTidakHujan['total'];
								
								$querySuhuMaxHujanSangatRingan = mysqli_query($connection,"select count(suhu_max) as total from trainingtable where cuaca between 0.01 and 5");
								$datasetSuhuMaxHujanSangatRingan = mysqli_fetch_assoc($querySuhuMaxHujanSangatRingan);
								$countSuhuMaxHujanSangatRingan=$datasetSuhuMaxHujanSangatRingan['total'];
								
								$querySuhuMaxHujanRingan = mysqli_query($connection,"select count(suhu_max) as total from trainingtable where cuaca between 5.01 and 20");
								$datasetSuhuMaxHujanRingan = mysqli_fetch_assoc($querySuhuMaxHujanRingan);
								$countSuhuMaxHujanRingan = $datasetSuhuMaxHujanRingan['total'];
								
								$querySuhuMaxHujanSedang = mysqli_query($connection,"select count(suhu_max) as total from trainingtable where cuaca between 20.1 and 50");
								$datasetSuhuMaxHujanSedang = mysqli_fetch_assoc($querySuhuMaxHujanSedang);
								$countSuhuMaxHujanSedang = $datasetSuhuMaxHujanSedang['total'];
								
								$querySuhuMaxHujanLebat = mysqli_query($connection,"select count(suhu_max) as total from trainingtable where cuaca between 50.1 and 100");
								$datasetSuhuMaxHujanLebat = mysqli_fetch_assoc($querySuhuMaxHujanLebat);
								$countSuhuMaxHujanLebat = $datasetSuhuMaxHujanLebat['total'];
								
								//hitung entropy suhu min
								$querySuhuMinTidakHujan = mysqli_query($connection,"select count(suhu_min) as total from trainingtable where cuaca=0");
								$datasetSuhuMinTidakHujan = mysqli_fetch_assoc($querySuhuMinTidakHujan);
								$countSuhuMinTidakHujan =$datasetSuhuMinTidakHujan['total'];
								
								$querySuhuMinHujanSangatRingan = mysqli_query($connection,"select count(suhu_max) as total from trainingtable where cuaca between 0.01 and 5");
								$datasetSuhuMaxHujanSangatRingan = mysqli_fetch_assoc($querySuhuMaxHujanSangatRingan);
								$countSuhuMaxHujanSangatRingan=$datasetSuhuMaxHujanSangatRingan['total'];
								
								$querySuhuMaxHujanRingan = mysqli_query($connection,"select count(suhu_max) as total from trainingtable where cuaca between 5.01 and 20");
								$datasetSuhuMaxHujanRingan = mysqli_fetch_assoc($querySuhuMaxHujanRingan);
								$countSuhuMaxHujanRingan = $datasetSuhuMaxHujanRingan['total'];
								
								$querySuhuMaxHujanSedang = mysqli_query($connection,"select count(suhu_max) as total from trainingtable where cuaca between 20.1 and 50");
								$datasetSuhuMaxHujanSedang = mysqli_fetch_assoc($querySuhuMaxHujanSedang);
								$countSuhuMaxHujanSedang = $datasetSuhuMaxHujanSedang['total'];
								
								$querySuhuMaxHujanLebat = mysqli_query($connection,"select count(suhu_max) as total from trainingtable where cuaca between 50.1 and 100");
								$datasetSuhuMaxHujanLebat = mysqli_fetch_assoc($querySuhuMaxHujanLebat);
								$countSuhuMaxHujanLebat = $datasetSuhuMaxHujanLebat['total'];
								
								//hitung entropy kelembapan
								$querySuhuMaxTidakHujan = mysqli_query($connection,"select count(suhu_max) as total from trainingtable where cuaca=0");
								$datasetSuhuMaxTidakHujan = mysqli_fetch_assoc($querySuhuMaxTidakHujan);
								$countSuhuMaxTidakHujan =$datasetSuhuMaxTidakHujan['total'];
								
								$querySuhuMaxHujanSangatRingan = mysqli_query($connection,"select count(suhu_max) as total from trainingtable where cuaca between 0.01 and 5");
								$datasetSuhuMaxHujanSangatRingan = mysqli_fetch_assoc($querySuhuMaxHujanSangatRingan);
								$countSuhuMaxHujanSangatRingan=$datasetSuhuMaxHujanSangatRingan['total'];
								
								$querySuhuMaxHujanRingan = mysqli_query($connection,"select count(suhu_max) as total from trainingtable where cuaca between 5.01 and 20");
								$datasetSuhuMaxHujanRingan = mysqli_fetch_assoc($querySuhuMaxHujanRingan);
								$countSuhuMaxHujanRingan = $datasetSuhuMaxHujanRingan['total'];
								
								$querySuhuMaxHujanSedang = mysqli_query($connection,"select count(suhu_max) as total from trainingtable where cuaca between 20.1 and 50");
								$datasetSuhuMaxHujanSedang = mysqli_fetch_assoc($querySuhuMaxHujanSedang);
								$countSuhuMaxHujanSedang = $datasetSuhuMaxHujanSedang['total'];
								
								$querySuhuMaxHujanLebat = mysqli_query($connection,"select count(suhu_max) as total from trainingtable where cuaca between 50.1 and 100");
								$datasetSuhuMaxHujanLebat = mysqli_fetch_assoc($querySuhuMaxHujanLebat);
								$countSuhuMaxHujanLebat = $datasetSuhuMaxHujanLebat['total'];
								print "<div class=\"page-header\"></div>"."Suhu Max Kategori Tidak Hujan :".$countSuhuMaxTidakHujan;
								
								?>
								
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
	
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

	
	<script type="text/javascript">
		$(document).ready(function(){
			
		});
	</script>
</body>

</html>
