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
	<link rel='stylesheet' href='../bower_components/bootstrapdatetimepicker/bootstrap-datetimepicker.min.css' />
	<link href="../dist/css/bootstrapValidator.min.css" rel="stylesheet">
	<link href="../bower_components/alertify/themes/alertify.core.css" rel="stylesheet">
	 <link href="../bower_components/alertify/themes/alertify.default.css" rel="stylesheet">
	 <link href="../bower_components/alertify/themes/alertify.bootstrap.css" rel="stylesheet">
	 
    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

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
                    <h1 class="page-header">Dataset</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
				
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Dataset algoritma c45 perakiraan cuaca
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Suhu Max.</th>
                                            <th>Suhu Min.</th>
                                            <th>Kelembapan</th>
                                            <th>Arah Angin</th>
											<th>Kecepatan Angin</th>
											 <th>Curah Hujan</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
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
	<script type='text/javascript' src='../bower_components/bootstrapdatetimepicker/moment.min.js'></script>
	<script type="text/javascript" src="../bower_components/bootstrapdatetimepicker/moment-with-locales.min.js"></script>
	<script type="text/javascript" src="../bower_components/bootstrapdatetimepicker/bootstrap-datetimepicker.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
	
	<script src="../dist/js/bootstrapValidator.min.js"></script>
	<script src="../bower_components/alertify/lib/alertify.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
		$('#dtpicker').datetimepicker({
				format:'YYYY-MM-DD'
			});//ada kau ubah ini gak ada knpa 
		
        var gentable = $('#dataTables-example').DataTable({
                responsive: true,
				'ajax':'Controller/gettesting.php',
				'columns':[
				{"data": "tanggal"},
				{"data":"suhu_max"},
				{"data":"suhu_min"},
				{"data":"kelembapan"},
				{"data":"arah_angin"},
				{"data":"kecepatan_angin"},
				{"data":"cuaca"}
			]
        });
		
    });
	
	
    </script>

</body>

</html>
