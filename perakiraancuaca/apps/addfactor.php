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
	
	 <link href="../bower_components/alertify/themes/alertify.core.css" rel="stylesheet">
	 <link href="../bower_components/alertify/themes/alertify.default.css" rel="stylesheet">
	 <link href="../bower_components/alertify/themes/alertify.bootstrap.css" rel="stylesheet">
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
                    <h1 class="page-header">Faktor Cuaca</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Tambah Faktor Cuaca
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form class="form-horizontal" method="post" action="Controller/savefactor.php" id="frm-cuaca">
									  <div class="form-group">
										<label class="col-sm-4 control-label">Kota</label>
										<div class="col-sm-7">
										  <input type="text" class="form-control" name="kota"/>
										</div>
									  </div>
									  <div class="form-group">
										<label class="col-sm-4 control-label">Suhu</label>
										<div class="col-sm-8">
										  <div class="input-group">
											  <div class="input-group-addon">Max.</div>
											  <input type="text" class="form-control" name="suhu_max" maxlength="2" />
											   <div class="input-group-addon">Min.</div>
											  <input  maxlength="2" type="text" class="form-control" name="suhu_min" />
										  </div>
										</div>
									  </div>
									   <div class="form-group">
										<label class="col-sm-4 control-label">Kelembapan</label>
										<div class="col-sm-3">
										  <input maxlength="2" type="text" class="form-control" name="kelembapan"/>
										</div>
									  </div>
									  <div class="form-group">
										<label class="col-sm-4 control-label">Angin</label>
										<div class="col-sm-8">
										  <input type="text" class="form-control" name="arah_angin"/>
										</div>
									  </div>
									   <div class="form-group">
										<label class="col-sm-4 control-label">Cuaca</label>
										<div class="col-sm-8">
										  <select name="cuaca" class="form-control">
											<option value="">Pilih</option>
											<option value="hujan">Hujan</option>
											<option value="cerah">Cerah</option>
											<option value="berawan">Berawan</option>
										  </select>
										</div>
									  </div>
									  <div class="form-group">
										<div class="col-sm-offset-4 col-sm-10">
										  <button id="btn-submit" type="submit" class="btn btn-success"><i class="fa fa-send"></i> Simpan</button>
										</div>
									  </div>
									</form>
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
	<script src="../dist/js/bootstrapValidator.min.js"></script>
	<script src="../bower_components/alertify/lib/alertify.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

	
	<script type="text/javascript">
		$(document).ready(function(){
			$('#frm-cuaca').bootstrapValidator({
				live: 'enabled',
				message: 'This value is not Valid',
				feedbackIcons: {
					valid: 'glyphicon glyphicon-ok',
					invalid: 'glyphicon glyphicon-remove',
					validating: 'glyphicon glyphicon-refresh'
				},
				excluded:'disabled',
				fields: {
					
					kota: {
						validators: {
							notEmpty: {
								message: 'Silahkan isi Kota'
							}
							
						}
					},
					suhu_max: {
						validators: {
							notEmpty: {
								message: 'Silahkan isi suhu max'
							},
							 numeric: {
								message: 'Suhu salah',
								
								thousandsSeparator: '',
								decimalSeparator: '.'
							}	
						}
					},
					suhu_min: {
						validators: {
							notEmpty: {
								message: 'Silahkan isi suhu min'
							},
							 numeric: {
								message: 'Suhu salah',
								
								thousandsSeparator: '',
								decimalSeparator: '.'
							}	
						}
					},
					
					kelembapan: {
						validators: {
							notEmpty: {
								message: 'Silahkan isi kelembapan'
							},
							numeric: {
								message: 'Kelembapan salah',
								
								thousandsSeparator: '',
								decimalSeparator: '.'
							}	
						}

					},
					arah_angin:{
						validators:{
							notEmpty: {
								message: 'Silahkan isi arah angin'
							}
						}
					},
					cuaca:{
						validators:{
							notEmpty: {
								message: 'Silahkan pilih cuaca'
							}
						}
					}
				}
			}).on('success.form.bv', function (e) {
        // Prevent form submission
				e.preventDefault();
				// Get the form instance
				var $form = $(e.target);
				// Get the BootstrapValidator instance
				var bv = $form.data('bootstrapValidator');
				// Use Ajax to submit form data
				
				//formData.append('file','file);
				var data = $form.serialize();
				$('#frm-cuaca input').attr("disabled", "disabled");
				$.ajax({
					type: 'POST',
					url: $form.attr('action'),
					data: data,
					dataType: 'json',
					success: function (data) {
							data=parseInt(data);
							if(data==1){
								alertify.success('Data berhasil dikirim, bloon :p');
							}else{
								alertify.error('Data gagal dikirim!');
							}
							return false;
						},
						error: function (xhr,textStatus,errormessage) {
							alertify.alert("Kesalahan! ","Error !!"+xhr.status+" "+textStatus+" "+"Tidak dapat mengirim data!");
						},
						complete: function () {
							$('#frm-cuaca').bootstrapValidator('resetForm',true);
							$('#btnsubmit').removeAttr('disabled');
							$('#frm-cuaca input').removeAttr("disabled");
						}
					});
				});
		});
	</script>
</body>

</html>
