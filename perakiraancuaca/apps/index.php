<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PerakiraanCuaca</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">


    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
	<link href="../bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
	<?php
		require 'Model/config.php';
		$query = 'select * from faktorcuaca';
		$results = mysqli_query($connection,$query);
		$rows='';
		if($results){
			$rows = mysqli_fetch_all($results,MYSQLI_ASSOC);
		}
	?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php require 'layout/nav.php'; ?>
        <div id="page-wrapper">

            <br/>
             <ul class="nav nav-tabs">
                  <li role="presentation" class="active">
                    <a href="#dashboard" data-toggle="tab">Dashboard</a>
                  </li>
                  <li role="presentation">
                    <a href="#pohonkeputusan" data-toggle="tab">PohonKeputusan</a>
                  </li>
            </ul>
          
        <div class="tab-content">
            <div class="tab-pane active" id="dashboard">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                Grafik Dataset
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div id="morris-area-chart"></div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                </div>

            <!-- /.row -->
            </div>
             <div class="tab-pane" id="pohonkeputusan">
                 <div class="row">
                    <div class="col-lg-12">
                       
                       <div class="col-lg-12">
                             <div class="panel panel-green">
                                <div class="panel-heading">
                                    Pohon Keputusan
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                   <img src="img/pohonfaktor.png" alt="img-tree" />
                                </div>
                                <!-- /.panel-body -->
                             </div>
                                <!-- /.panel -->
                       </div>
                    </div>
                </div>
            <!-- /.row -->
            </div>
        </div>
          
          
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
	<!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
	<script type='text/javascript'>
		$(function() {

			Morris.Area({
				element: 'morris-area-chart',
				data: <?php print json_encode($rows)?>,
				xkey: 'kota',
				ykeys: ['suhu_min', 'suhu_max', 'kelembapan'],
				labels: ['Suhu Min.', 'Suhu Max', 'Kelembapan'],
				parseTime:false,
				pointSize: 2,
				hideHover: 'auto',
				resize: true
			});
		});

	</script>
</body>

</html>
