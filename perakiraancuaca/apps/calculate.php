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
	<style>
		.text-right{
			text-align:right;
		}
	</style>
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
                  
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                <p/>

                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Kalkulasi Faktor Cuaca
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
								<?php
								require('calculatec45.php');
								
								?>
								<table class="table table-bordered">
									<thead>
										<tr>
											<th rowspan="2">No</th>
											<th rowspan="2"></th>
											<th rowspan="2">jlh kasus</th>
											<th>tidak hujan</th>
											<th>hujan sangat ringan</th>
											<th>hujan ringan</th>
											<th>hujan sedang</th>
											<th>hujan lebat</th>
											<th rowspan="2">Entropy</th>
											<th rowspan="2">Gain</th>
										</tr>
										<tr>
											<th>(Cuaca=0)</th>
											<th>(0.001<=Cuaca<5)</th>
											<th>(5.01<=Cuaca<20)</th>
											<th>(20.1<=Cuaca<50)</th>
											<th>(50.1<=Cuaca<100)</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Total</td>
											<td class="text-right"><?php print array_sum($arrjlhkasus);?></td>
											<td class="text-right"><?php print count($arr_jlhsuhu_max_kasus_tidakhujan);?></td>
											<td class="text-right"><?php print count($arr_jlhsuhu_max_kasus_hujan_sangat_ringan);?></td>
											<td class="text-right"><?php print count($arr_jlhsuhu_max_kasus_hujan_ringan);?></td>
											<td class="text-right"><?php print count($arr_jlhsuhu_max_kasus_hujan_sedang);?></td>
											<td class="text-right"><?php print count($arr_jlhsuhu_min_kasus_hujan_lebat);?></td>
											<td class="text-right"><?php print $entropyall;?></td>
											<td></td>
										</tr>
										
									</tbody>
								</table>
							<div class="col-lg-6 col-sm-6">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th colspan="2">Suhu Max</th>

											<th>Gain : <?php print $arr_resultgain_suhumax['gain'];?></th>

										</tr>
									</thead>
									<tbody>
										<tr>
											<?php
												
												
													print "<td>";
													print $data_splitinfo_suhu_max;
													print "</td>";
													print "<td> '<=' </td><td> '>' </td>";
												
											?>
										</tr>
										
										<tr>
											<td>Tidak Hujan</td>
											<td><?php print $count_splitinfo_less_suhumax_tidakhujan;?></td>
											<td><?php print $count_splitinfo_more_suhumax_tidakhujan;?></td>
										</tr>
										<tr>
											<td>Hujan Sangat Ringan</td>
											<td><?php print $count_splitinfo_less_suhumax_hujan_sangatringan;?></td>
											<td><?php print $count_splitinfo_more_suhumax_hujan_sangatringan;?></td>
										</tr>
										<tr>
											<td>Hujan Ringan</td>
											<td><?php print $count_splitinfo_less_suhumax_hujan_ringan;?></td>
											<td><?php print $count_splitinfo_more_suhumax_hujan_ringan;?></td>
										</tr>
										<tr>
											<td>Hujan Sedang</td>
											<td><?php print $count_splitinfo_less_suhumax_hujan_sedang;?></td>
											<td><?php print $count_splitinfo_more_suhumax_hujan_sedang;?></td>
										</tr>
										<tr>
											<td>Hujan Lebat</td>
											<td><?php print $count_splitinfo_less_suhumax_hujan_lebat;?></td>
											<td><?php print $count_splitinfo_more_suhumax_hujan_lebat;?></td>
										</tr>
										<tr>
											<td>Entropy</td>
											<td><?php print $arr_resultgain_suhumax['entropy_less'];?></td>
											<td><?php print $arr_resultgain_suhumax['entropy_more'];?></td>
										</tr>
										
									</tbody>
								</table>
							</div>
							<div class="col-lg-6 col-sm-6">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th colspan="2">Suhu Min</th>
											<th>Gain : <?php print $arr_resultgain_suhumin['gain'];?></th>
											
										</tr>
									</thead>
									<tbody>
										<tr>
											<?php
												
												
													print "<td>";
													print $data_splitinfo_suhu_min;
													print "</td>";
													print "<td> '<=' </td><td> '>' </td>";
												
											?>
										</tr>
										<tr>
											<td>Tidak Hujan</td>
											<td><?php print $count_splitinfo_less_suhumin_tidakhujan;?></td>
											<td><?php print $count_splitinfo_more_suhumin_tidakhujan;?></td>
										</tr>
										<tr>
											<td>Hujan Sangat Ringan</td>
											<td><?php print $count_splitinfo_less_suhumin_hujan_sangatringan;?></td>
											<td><?php print $count_splitinfo_more_suhumin_hujan_sangatringan;?></td>
										</tr>
										<tr>
											<td>Hujan Ringan</td>
											<td><?php print $count_splitinfo_less_suhumin_hujan_ringan;?></td>
											<td><?php print $count_splitinfo_more_suhumin_hujan_ringan;?></td>
										</tr>
										<tr>
											<td>Hujan Sedang</td>
											<td><?php print $count_splitinfo_less_suhumin_hujan_sedang;?></td>
											<td><?php print $count_splitinfo_more_suhumin_hujan_sedang;?></td>
										</tr>
										<tr>
											<td>Hujan Lebat</td>
											<td><?php print $count_splitinfo_less_suhumin_hujan_lebat;?></td>
											<td><?php print $count_splitinfo_more_suhumin_hujan_lebat;?></td>
										</tr>
										<tr>
										<td>Entropy</td>
											<td><?php print $arr_resultgain_suhumin['entropy_less'];?></td>
											<td><?php print $arr_resultgain_suhumin['entropy_more'];?></td>
										</tr>
										
									</tbody>
								</table>
							</div>
							<div class="col-lg-6 col-sm-6">
							<table class="table table-bordered">
									<thead>
										<tr>
											<th colspan="2">Kelembapan</th>
											<th>Gain : <?php print $arr_resultgain_kelembapan['gain'];?></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<?php
												
													print "<td >";
													print $data_splitinfo_kelembapan;
													print "</td>";
													print "<td> '<=' </td><td> '>' </td>";
											?>
										</tr>
										<tr>
											<td>Tidak Hujan</td>
											<td><?php print $count_splitinfo_less_kelembapan_tidakhujan;?></td>
											<td><?php print $count_splitinfo_more_kelembapan_tidakhujan;?></td>
										</tr>
										<tr>
											<td>Hujan Sangat Ringan</td>
											<td><?php print $count_splitinfo_less_kelembapan_hujan_sangatringan;?></td>
											<td><?php print $count_splitinfo_more_kelembapan_hujan_sangatringan;?></td>
										</tr>
										<tr>
											<td>Hujan Ringan</td>
											<td><?php print $count_splitinfo_less_kelembapan_hujan_ringan;?></td>
											<td><?php print $count_splitinfo_more_kelembapan_hujan_ringan;?></td>
										</tr>
										<tr>
											<td>Hujan Sedang</td>
											<td><?php print $count_splitinfo_less_kelembapan_hujan_sedang;?></td>
											<td><?php print $count_splitinfo_more_kelembapan_hujan_sedang;?></td>
										</tr>
										<tr>
											<td>Hujan Lebat</td>
											<td><?php print $count_splitinfo_less_kelembapan_hujan_lebat;?></td>
											<td><?php print $count_splitinfo_more_kelembapan_hujan_lebat;?></td>
										</tr>
										<tr>
										<td>Entropy</td>
											<td><?php print $arr_resultgain_kelembapan['entropy_less'];?></td>
											<td><?php print $arr_resultgain_kelembapan['entropy_more'];?></td>
										</tr>
									</tbody>
								</table>
							</div>
								
							<div class="col-lg-6 col-sm-6">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th colspan="2">Arah Angin</th>
											<th>Gain : <?php print $arr_resultgain_arah_angin['gain'];?></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<?php
												
												
													print "<td>";
													print $data_splitinfo_arah_angin;
													print "</td>";
													print "<td> '<=' </td><td> '>' </td>";
												
											?>
										</tr>
										<tr>
											<td>Tidak Hujan</td>
											<td><?php print $count_splitinfo_less_arah_angin_tidakhujan;?></td>
											<td><?php print $count_splitinfo_more_arah_angin_tidakhujan;?></td>
										</tr>
										<tr>
											<td>Hujan Sangat Ringan</td>
											<td><?php print $count_splitinfo_less_arah_angin_hujan_sangatringan;?></td>
											<td><?php print $count_splitinfo_more_arah_angin_hujan_sangatringan;?></td>
										</tr>
										<tr>
											<td>Hujan Ringan</td>
											<td><?php print $count_splitinfo_less_arah_angin_hujan_ringan;?></td>
											<td><?php print $count_splitinfo_more_arah_angin_hujan_ringan;?></td>
										</tr>
										<tr>
											<td>Hujan Sedang</td>
											<td><?php print $count_splitinfo_less_arah_angin_hujan_sedang;?></td>
											<td><?php print $count_splitinfo_more_arah_angin_hujan_sedang;?></td>
										</tr>
										<tr>
											<td>Hujan Lebat</td>
											<td><?php print $count_splitinfo_less_arah_angin_hujan_lebat;?></td>
											<td><?php print $count_splitinfo_more_arah_angin_hujan_lebat;?></td>
										</tr>
										<tr>
										<td>Entropy</td>
											<td><?php print $arr_resultgain_arah_angin['entropy_less'];?></td>
											<td><?php print $arr_resultgain_arah_angin['entropy_more'];?></td>
										</tr>
									</tbody>
								</table>
							</div>
							<table class="table table-bordered">
									<thead>
										<tr>
											<th colspan="2">Kecepatan Angin</th>
											<th>Gain : <?php print $arr_resultgain_kecepatan_angin['gain'];?></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<?php
												
												
													print "<td>";
													print $data_splitinfo_kecepatan_angin;
													print "</td>";
													print "<td> '<=' </td><td> '>' </td>";
												
											?>
										</tr>
										<tr>
											<td>Tidak Hujan</td>
											<td><?php print $count_splitinfo_less_kecepatan_angin_tidakhujan;?></td>
											<td><?php print $count_splitinfo_more_kecepatan_angin_tidakhujan;?></td>
										</tr>
										<tr>
											<td>Hujan Sangat Ringan</td>
											<td><?php print $count_splitinfo_less_kecepatan_angin_hujan_sangatringan;?></td>
											<td><?php print $count_splitinfo_more_kecepatan_angin_hujan_sangatringan;?></td>
										</tr>
										<tr>
											<td>Hujan Ringan</td>
											<td><?php print $count_splitinfo_less_kecepatan_angin_hujan_ringan;?></td>
											<td><?php print $count_splitinfo_more_kecepatan_angin_hujan_ringan;?></td>
										</tr>
										<tr>
											<td>Hujan Sedang</td>
											<td><?php print $count_splitinfo_less_kecepatan_angin_hujan_sedang;?></td>
											<td><?php print $count_splitinfo_more_kecepatan_angin_hujan_sedang;?></td>
										</tr>
										<tr>
											<td>Hujan Lebat</td>
											<td><?php print $count_splitinfo_less_kecepatan_angin_hujan_lebat;?></td>
											<td><?php print $count_splitinfo_more_kecepatan_angin_hujan_lebat;?></td>
										</tr>
										<tr>
											<td>Entropy</td>
											<td><?php print $arr_resultgain_kecepatan_angin['entropy_less'];?></td>
											<td><?php print $arr_resultgain_kecepatan_angin['entropy_more'];?></td>
										</tr>
									</tbody>
								</table>
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


</body>

</html>
