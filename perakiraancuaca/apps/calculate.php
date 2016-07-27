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
                                <div class="col-lg-12">
								<?php
								require('Model/config.php');
								require('Model/C45.php');
								//Banyak Kategori
								
								
								
								$queryAllcount = mysqli_query($connection,"select * from trainingtable");
								
								
								$arr_jlhsuhu_max_kasus_tidakhujan = array();
								$arr_jlhsuhu_min_kasus_tidakhujan = array();
								
								$arr_jlhsuhu_max_kasus_hujan_sangat_ringan = array();
								$arr_jlhsuhu_min_kasus_hujan_sangat_ringan = array();
								
								$arr_jlhsuhu_max_kasus_hujan_ringan = array();
								$arr_jlhsuhu_min_kasus_hujan_ringan = array();
								
								$arr_jlhsuhu_max_kasus_hujan_sedang = array();
								$arr_jlhsuhu_min_kasus_hujan_sedang = array();
								
								$arr_jlhsuhu_max_kasus_hujan_lebat = array();
								$arr_jlhsuhu_min_kasus_hujan_lebat = array();
								while($alldata = mysqli_fetch_array($queryAllcount)){
									if($alldata['cuaca']==0){
										array_push($arr_jlhsuhu_max_kasus_tidakhujan,$alldata['suhu_max']);
										array_push($arr_jlhsuhu_min_kasus_tidakhujan,$alldata['suhu_min']);
									}else if($alldata['cuaca']>=0.01 && $alldata['cuaca']<5){
										array_push($arr_jlhsuhu_max_kasus_hujan_sangat_ringan,$alldata['suhu_max']);
										array_push($arr_jlhsuhu_min_kasus_hujan_sangat_ringan,$alldata['suhu_min']);
									}else if($alldata['cuaca']>=5.01 && $alldata['cuaca']<20){
										array_push($arr_jlhsuhu_max_kasus_hujan_ringan,$alldata['suhu_max']);
										array_push($arr_jlhsuhu_min_kasus_hujan_ringan,$alldata['suhu_min']);
									}else if($alldata['cuaca']>=20.1 && $alldata['cuaca']<50){
										array_push($arr_jlhsuhu_max_kasus_hujan_sedang,$alldata['suhu_max']);
										array_push($arr_jlhsuhu_min_kasus_hujan_sedang,$alldata['suhu_min']);
									}
									else{
										array_push($arr_jlhsuhu_max_kasus_hujan_lebat,$alldata['suhu_max']);
										array_push($arr_jlhsuhu_min_kasus_hujan_lebat,$alldata['suhu_min']);
									}
									
								}
								$arrjlhkasus = array(count($arr_jlhsuhu_max_kasus_tidakhujan),
								count($arr_jlhsuhu_max_kasus_hujan_sangat_ringan),
								count($arr_jlhsuhu_max_kasus_hujan_ringan),
								count($arr_jlhsuhu_max_kasus_hujan_sedang),
								count($arr_jlhsuhu_max_kasus_hujan_lebat)
								);
								
								//hitung semua entropy;
								$c45 = new c45();
								$entropyall = $c45->entropy($arrjlhkasus);
								
								$arrtempattributsuhumax =array();
								
								
								//split info suhu max tidak hujan
								$query_split_info_suhu_max = $c45->generalsplit('suhu_max');
								
								
								$data_splitinfo_suhu_max=$c45->resultsplitinfo($query_split_info_suhu_max);
								
								
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
								
								<table class="table table-bordered">
									<thead>
										<tr>
											<th colspan="<?php print count($data_splitinfo_suhu_max)*2; ?>">Suhu Max</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<?php
												
												
													print "<td colspan='2'>";
													print $data_splitinfo_suhu_max;
													print "</td>";
												
											?>
										</tr>
										<tr>
											<?php
												for($i=0;$i<count($data_splitinfo_suhu_max);$i++){
													print "<td> '<=' </td><td> '>' </td>";
												}
											?>
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

	
	<script type="text/javascript">
		$(document).ready(function(){
			
		});
	</script>
</body>

</html>
<?php
/*$data_splitinfo_1=$c45->gensplitinfo($arr_jlhsuhu_max_kasus_tidakhujan);
								$results_split_info_1 =$c45->resultsplitinfo($data_splitinfo_1);
								array_push($arrtempattributsuhumax,$results_split_info_1);
								
								//split info suhu max  hujan sangat ringan
								$data_splitinfo_2=$c45->gensplitinfo($arr_jlhsuhu_max_kasus_hujan_sangat_ringan);
								$results_split_info_2 =$c45->resultsplitinfo($data_splitinfo_2);
								array_push($arrtempattributsuhumax,$results_split_info_2);
								
								//split info suhu max hujan ringan
								$data_splitinfo_3=$c45->gensplitinfo($arr_jlhsuhu_max_kasus_hujan_ringan);
								$results_split_info_3 =$c45->resultsplitinfo($data_splitinfo_3);
								array_push($arrtempattributsuhumax,$results_split_info_3);
								
								//split info suhu max hujan sedang
								$data_splitinfo_4=$c45->gensplitinfo($arr_jlhsuhu_max_kasus_hujan_sedang);
								$results_split_info_4 =$c45->resultsplitinfo($data_splitinfo_4);
								array_push($arrtempattributsuhumax,$results_split_info_4);
								
								//split info suhu max hujan lebat
								$data_splitinfo_5=$c45->gensplitinfo($arr_jlhsuhu_max_kasus_hujan_lebat);
								$results_split_info_5 =$c45->resultsplitinfo($data_splitinfo_5);
								array_push($arrtempattributsuhumax,$results_split_info_5);*/
								
								
								//$last_results_attributsuhumax =$c45->gensplitinfo($arrtempattributsuhumax);
								
								
								//print_r($last_results_attributsuhumax);