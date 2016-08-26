<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Aplikasi Perkiraan Cuaca</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                       
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        
                        <li>
                            <a href="dataset.php"><i class="fa fa-table fa-fw"></i> Dataset</a>
                        </li>
                        <li>
                            <a href="addfactor.php"><i class="fa fa-edit fa-fw"></i> Faktor </a>
							
                        </li>
						<li>
							<a href="#" data-toggle="modal" data-target="#modalfaktor"><i class="fa fa-cloud-download fa-fw"></i> Load Faktor</a>
						</li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Perkiraan<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="calculate.php">Kalkulasi C45</a>
                                </li>
                                <li>
                                    <a href="testingform.php">Testing </a>
                                </li>
                                 <li>
                                    <a href="#">Load Testing </a>
                                </li>
                               
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
		<!--modal-->
		<div class="modal fade" id="modalfaktor" tabindex="-1" role="dialog" aria-labelledby="modalfaktorlabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Browse DataTesting</h4>
			  </div>
			  <div class="modal-body">
				<form class="form-horizontal" method="post" action="Controller/loaddataset.php" enctype="multipart/form-data" id="frmbrowse">
									  
									   <div class="form-group">
										<label class="col-sm-4 control-label">Data Testing</label>
										<div class="col-sm-3">
										  <input type="file" name="datasetfile">
										  <p class="help-block">.xlsx</p>
										</div>
									  </div>
									   
									  <div class="form-group">
										<div class="col-sm-offset-4 col-sm-10">
										  <button id="btnsub" type="submit" name="submit" class="btn btn-success"><i class="fa fa-send"></i> Upload</button>
										</div>
									  </div>
									</form>
			  </div>
			 
			</div>
		  </div>
		</div>
		