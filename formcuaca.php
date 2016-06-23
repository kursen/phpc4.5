<!--skrg kita buat file formcuaca.php
file ini beri form untuk menginput kan data,oke dan mengirimkan nya ke sebuah file php
yang bertugas untuk memasukkan data ke database
coba kau buat dulu form,kalo udah kasih tau ya
*/-->
<html>
<head>
<title>formcuaca</title>
</head>

<body>



       
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
                                    <form class="form-horizontal" method="post" action="savedatacuaca.php" id="frm-cuaca">
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
								</div>
								</div>
								</div>
								</div>
           

</body>
</html>
