<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Dashboard STSClustering</title>

    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="../css/bootstrap.min.css" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="../css/nifty.min.css" rel="stylesheet">
		<link href="../css/demo/nifty-demo-icons.min.css" rel="stylesheet">
    <link href="../plugins/magic-check/css/magic-check.min.css" rel="stylesheet">


    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="../css/demo/nifty-demo-icons.min.css" rel="stylesheet">


    <!--DataTables [ OPTIONAL ]-->
    <link href="../plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css" rel="stylesheet">

    <!--Bootstrap Validator [ OPTIONAL ]-->
    <link href="../plugins/bootstrap-validator/bootstrapValidator.min.css" rel="stylesheet">
    <!--JAVASCRIPT-->
    <!--=================================================-->

    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="../plugins/pace/pace.min.css" rel="stylesheet">
    <script src="../plugins/pace/pace.min.js"></script>


    <!--jQuery [ REQUIRED ]-->
    <script src="../js/jquery.min.js"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="../js/bootstrap.min.js"></script>


    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="../js/nifty.min.js"></script>
		<script src="../plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
		<script src="../js/demo/form-wizard.js"></script>

    <!--=================================================-->

    <!--Font Awesome [ OPTIONAL ]-->
    <link href="../plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!--Ion Icons [ OPTIONAL ]-->
    <link href="../plugins/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <!--Ion Icons [ OPTIONAL ]-->
    <link href="../plugins/ionicons/css/ionicons.min.css" rel="stylesheet">
    <!--Themify Icons [ OPTIONAL ]-->
    <link href="../plugins/themify-icons/themify-icons.min.css" rel="stylesheet">
    <!--Premium Line Icons [ OPTIONAL ]-->
    <link href="../premium/icon-sets/icons/line-icons/premium-line-icons.min.css" rel="stylesheet">
    <link href="../plugins/spinkit/css/spinkit.min.css" rel="stylesheet">
    <script src="../plugins/bootstrap-validator/bootstrapValidator.min.js"></script>

    <!--DataTables [ OPTIONAL ]-->
    <link href="../plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
	  <link href="../plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css" rel="stylesheet">

    <!--DataTables [ OPTIONAL ]-->
    <script src="../plugins/datatables/media/js/jquery.dataTables.js"></script>
	  <script src="../plugins/datatables/media/js/dataTables.bootstrap.js"></script>
	  <script src="../plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>


    <!-- para los higcharts-->
		<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
		<!-- para los higcharts-->
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="http://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="http://code.highcharts.com/modules/heatmap.js"></script>

    <script src="http://d3js.org/d3.v4.js"></script>
    <script src="http://d3js.org/d3.v3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/holtzy/D3-graph-gallery@master/LIB/d3.layout.cloud.js"></script>
    <script src="https://rawgit.com/jasondavies/d3-cloud/master/build/d3.layout.cloud.js"></script>

    <script src="http://d3js.org/d3.v3.min.js"></script>

    <script src="../js/resultsProcess/loadCurvesFull.js"></script>
    <script src="../js/resultsProcess/viewStatisticsTable.js"></script>
    <script src="../js/resultsProcess/viewDescriptionGroup.js"></script>
    <script src="../js/resultsProcess/loadTree.js"></script>
    <script src="../js/resultsProcess/loadCSVInputData.js"></script>
</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->
<body>
    <div id="container" class="effect aside-float aside-bright mainnav-lg">

        <!--NAVBAR-->
        <!--===================================================-->
        <header id="navbar">
            <div id="navbar-container" class="boxed">

                <!--Brand logo & name-->
                <!--================================-->
								<div class="navbar-header">
                    <a href="" class="navbar-brand">
                        <img src="../img/logo.png" alt="Nifty Logo" class="brand-icon">
                        <div class="brand-title">
                            <span class="brand-text">STSClustering</span>
                        </div>
                    </a>
                </div>
                <!--================================-->
                <!--End brand logo & name-->


                <!--Navbar Dropdown-->
                <!--================================-->
                <div class="navbar-content clearfix">
                    <ul class="nav navbar-top-links pull-left">

                        <!--Navigation toogle button-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li class="tgl-menu-btn">
                            <a class="mainnav-toggle" href="#">
                                <i class="demo-pli-view-list"></i>
                            </a>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End Navigation toogle button-->

                    </ul>
                </div>
                <!--================================-->
                <!--End Navbar Dropdown-->

            </div>
        </header>
        <!--===================================================-->
        <!--END NAVBAR-->

        <div class="boxed">

            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">

                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow nameJob">
												</h1>

                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->
                </div>


                <!--Page content-->
                <!--===================================================-->
              <div id="page-content">
								<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="panel">

								<div id="demo-cir-wz">
										<div class="wz-heading pad-ver">

												<!--Progress bar-->
												<div class="progress progress-xs progress-light-base">
														<div class="progress-bar progress-bar-primary"></div>
												</div>

												<!--Nav-->
												<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
												<ul class="wz-nav-off">
														<li class="col-xs-4">
																<a data-toggle="tab" href="#preview1" title="Preview data input" class="add-tooltip">
																		<div class="icon-wrap icon-wrap-sm bg-gray">
																				<i class="wz-icon demo-pli-information icon-lg"></i>
																				<i class="wz-icon-done demo-pli-like icon-lg"></i>
																		</div>
																</a>
														</li>
                            <li class="col-xs-4">
																<a data-toggle="tab" href="#preview2" title="Statistics and visualization" class="add-tooltip">
																		<div class="icon-wrap icon-wrap-sm bg-gray">
																				<i class="wz-icon demo-pli-information icon-lg"></i>
																				<i class="wz-icon-done demo-pli-like icon-lg"></i>
																		</div>
																</a>
														</li>
														<li class="col-xs-4">
																<a data-toggle="tab" href="#result" title="View result clustering" class="add-tooltip">
																		<div class="icon-wrap icon-wrap-sm bg-gray">
																				<i class="wz-icon demo-pli-information icon-lg"></i>
																				<i class="wz-icon-done demo-pli-like icon-lg"></i>
																		</div>
																</a>
														</li>
												</ul>
										</div>

										<!--Form-->
										<form class="form-horizontal">
												<div class="panel-body">
														<div class="tab-content">

																<!--First tab-->
																<div id="preview1" class="tab-pane">
																	<div class="row">

																		<div class="col-lg-12 col-md-12 col-sm-12">
																	    <div class="panel panel-bordered panel-primary">
																	        <div class="panel-heading">
																	            <h3 class="panel-title">Raw Data Input</h3>
																	        </div>
																	        <div class="panel-body">
                                            <div id="viewCurves">

                                            </div>
																	        </div>
																	    </div>
																	  </div>
																	</div>
																</div>

																<!--Second tab-->
																<div id="preview2" class="tab-pane fade">
																	<div class="row">
																	  <div class="col-lg-12 col-md-12 col-sm-12">
																	    <div class="panel panel-bordered panel-primary">
																	        <div class="panel-heading">
																	            <h3 class="panel-title">Summary Statistics input data set</h3>
																	        </div>
																	        <div class="panel-body">

																	          <table id="statistical" class="table table-striped table-bordered" cellspacing="0" width="100%">
																	              <thead>
																	                <tr>
																	                  <th class="min-tablet">Feature</th>
																	                  <th class="min-tablet">Average</th>
																	                  <th class="min-tablet">Standar Deviation</th>
																	                  <th class="min-tablet">Variance</th>
																	                  <th class="min-tablet">Max Value</th>
																	                  <th class="min-tablet">Min Value</th>
																	                </tr>
																	              </thead>
																	          </table>

																	        </div>
																	    </div>
																	  </div>
																	</div>
																</div>

																<!--Third tab-->
																<div id="result" class="tab-pane">
																	<div class="row">
																	  <div class="col-lg-12 col-md-12 col-sm-12">
																	    <div class="panel panel-bordered panel-primary">
																	        <div class="panel-heading">
																	            <h3 class="panel-title">Tree result</h3>
																	        </div>
																	        <div class="panel-body">
                                            <img id="treeView" class="img-thumbnail"></img>
																	        </div>
																	    </div>
																	  </div>

																	  <div class="col-lg-12 col-md-12 col-sm-12">
																	    <div class="panel panel-bordered panel-primary">
																	        <div class="panel-heading">
																	            <h3 class="panel-title">Description Group</h3>
																	        </div>
																	        <div class="panel-body">
                                            <table id="summaryGroup" class="table table-striped table-bordered" cellspacing="0" width="100%">
																	              <thead>
																	                <tr>
																	                  <th class="min-tablet">ID Group</th>
																	                  <th class="min-tablet">Members</th>
																	                  <th class="min-tablet">Detail</th>

																	                </tr>
																	              </thead>
																	          </table>
																	        </div>
																	    </div>
																	  </div>
																	</div>

																</div>
														</div>
												</div>

												<!--Footer button-->
												<div class="panel-footer text-right">
														<div class="box-inline">
																<button type="button" class="previous btn btn-primary">Previous</button>
																<button type="button" class="next btn btn-primary">Next</button>
																<button type="button" class="finish btn btn-success" disabled>Finish</button>
														</div>
												</div>
										</form>
								</div>
							</div>
					</div>
              </div>
            </div>

            <!--MAIN NAVIGATION-->
            <!--===================================================-->
						<nav id="mainnav-container">
                <div id="mainnav">

                    <!--Menu-->
                    <!--================================-->
                    <div id="mainnav-menu-wrap">
                        <div class="nano">
                            <div class="nano-content">

                                <!--Profile Widget-->
                                <!--================================-->
                                <div id="mainnav-profile" class="mainnav-profile">
                                    <div class="profile-wrap text-center">
                                        <div class="pad-btm">
                                            <img class="img-circle img-md" src="../img/profile-photos/11.png" alt="Profile Picture">
                                        </div>

                                        <p class="mnp-name">
                                            User View
                                        </p>
                                    </div>
                                </div>

                                <ul id="mainnav-menu" class="list-group">

                                  <li class="list-header">Dashboard</li>

                                  <li>
          						                <a href="../dataSet/">
          						                    <i class="fa fa fa-archive"></i>
          						                    <span class="menu-title">Data Sets Demo</span><i class="arrow"></i>
          						                </a>

          						            </li>

                                  <li>
          						                <a href="../about">
          						                    <i class="fa fa fa-users"></i>
          						                    <span class="menu-title">About Us</span><i class="arrow"></i>
          						                </a>

          						            </li>

                                  <li>
          						                <a href="../userManual">
          						                    <i class="fa fa fa-file"></i>
          						                    <span class="menu-title">How to use</span><i class="arrow"></i>
          						                </a>

          						            </li>

                                  <li>
          						                <a href="../">
          						                    <i class="fa fa fa-home"></i>
          						                    <span class="menu-title">Home</span><i class="arrow"></i>
          						                </a>

          						            </li>

						            </ul>

                    <!--================================-->
                    <!--End menu-->

                </div>
            </nav>
            <!--===================================================-->
            <!--END MAIN NAVIGATION-->

        </div>



        <!-- FOOTER -->
        <!--===================================================-->
        <footer id="footer">

            <!-- Visible when footer positions are fixed -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <div class="show-fixed pad-rgt pull-right">
                You have <a href="#" class="text-main"><span class="badge badge-danger">3</span> pending action.</a>
            </div>

            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <!-- Remove the class "show-fixed" and "hide-fixed" to make the content always appears. -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

            <p class="pad-lft">&#0169; 2019 Developed by <a href="http://pesb2.cl/"> PESB2 Group, </a>Centre for Biothecnology and Bioengineering, FCFM, University of Chile</p>

        </footer>
        <!--===================================================-->
        <!-- END FOOTER -->


        <!-- SCROLL PAGE BUTTON -->
        <!--===================================================-->
        <button class="scroll-top btn">
            <i class="pci-chevron chevron-up"></i>
        </button>
        <!--===================================================-->



    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->

   <!-- modal section -->

   <div>
   	<form id="frmEditar" action="" method="POST" data-parsley-validate class="form-horizontal form-label-left">
   		<input type="hidden" id="idjob" name="idjob" value="">
   		<div class="modal fade" id="myModalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabelEdit" aria-hidden="true">
   				<div class="modal-dialog">
   					<div class="modal-content">
   						<div class="modal-header">
   							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
   							<h4 class="modal-title" id="myModalLabelEdit">Drop job</h4>
   						</div>
   						<div class="modal-body">

                <p>
                   Are you sure you want to delete the selected job?
                </p>


   						  <div class="ln_solid"></div>
   						  <div class="form-group">
   							<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
   								<button type="button" id="editar-user" class="btn btn-primary" data-dismiss="modal">Delete</button>
   								<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
   							</div>
   						  </div>

   						</div>

   					</div>
   				</div>
   		</div>
   		</form>
   </div>

   <!-- modal para agregar-->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Add new job at queue system</h4>
          </div>
          <div class="modal-body">

             <form id="frmAgregarFile" action="../php/uploadFileQueue.php" class="dropzone" >
                    <div class="dz-default dz-message">
                        <div class="dz-icon">
                            <i class="demo-pli-upload-to-cloud icon-5x"></i>
                        </div>
                        <div>
                          <span class="dz-text">Drop files to upload</span>
                          <p class="text-sm text-muted">or click to pick manually</p>
                        </div>
                    </div>
                    <div class="fallback">
                        <input name="file" type="file" multiple>
                    </div>
                </form>

             <br>
             <br>

          <form id="frmAgregar" action="" method="POST" data-parsley-validate class="form-horizontal form-label-left">
            <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name Job <span class="required">*</span>
            </label>

            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="text" id="name" required="required" class="form-control col-md-7 col-xs-12" placeholder="Input name job">
            </div>
            </div>

            <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Description <span class="required">*</span>
            </label>

            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="text" id="desc" required="required" class="form-control col-md-7 col-xs-12" placeholder="Input description job">
            </div>

            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="option">Selected job <span class="required">*</span>
              </label>

              <div class="col-md-9 col-sm-9 col-xs-12">
                <select id="option" class="form-control">
                  <option value="1">CLASSIFICATION</option>
                  <option value="2">PREDICTION</option>
                </select>
              </div>
            </div>

            <div class="ln_solid"></div>
            <div class="form-group">
            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
              <button type="reset" class="btn btn-primary">Reset</button>
              <button type="button" id="add-job" class="btn btn-success" data-dismiss="modal">Add Job</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
            </div>

          </div>

        </div>
      </div>
    </form>
  </div>

</body>
</html>
