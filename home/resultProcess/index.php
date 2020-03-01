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

  <!-- javascript process information -->
  <script src="../js/resultsProcess/loadSummary.js"></script>
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
                    <a href="../" class="navbar-brand">
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

                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->
                </div>


                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">

                <div class="row">
                  <div class="col-sm-12 col-md-12">

                    <div class="panel panel-bordered panel-primary">

                      <div class="panel-heading">
                        <h3 class="panel-title">
                          Diagram Recursive Binary Splitter
                        </h3>
                      </div>
                      <div class="panel-body">
                        <?php
                          echo "<a href=\"../../jobs/".$_GET['job']."/results/tree.png\">";
                          echo "<img src=\"../../jobs/".$_GET['job']."/results/tree.png\" alt=\"\" class=\"img-thumbnail\">";
                          echo "</a>";
                        ?>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-6">

                    <div class="panel panel-bordered panel-primary">

                      <div class="panel-heading">
                        <h3 class="panel-title">
                          Members by group
                        </h3>
                      </div>
                      <div class="panel-body">
                        <div id="graphMembers"></div>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-6">

                    <div class="panel panel-bordered panel-primary">

                      <div class="panel-heading">
                        <h3 class="panel-title">
                          Average curve per group
                        </h3>
                      </div>
                      <div class="panel-body">
                        <div id="curveGroups"></div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12 col-md-12">

                    <div class="panel panel-bordered panel-primary">

                      <div class="panel-heading">
                        <h3 class="panel-title">
                          Summary report about process
                        </h3>
                      </div>
                      <div class="panel-body">
                        <table class="table table-hover table-vcenter">
                        <tbody>
                          <tr>
                            <td>
                              <span class="text-main text-semibold">Calinski-Harabasz Index</span>
                            </td>
                            <td>
                              <span class="text-main text-semibold calinski"></span>
                              <br>
                            </td>
                           </tr>

                            <tr>
                                <td>
                                  <span class="text-main text-semibold">Silhouette Coeficient</span>
                                </td>
                                <td>
                                    <span class="text-main text-semibold siluetas"></span>
                                    <br>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                  <span class="text-main text-semibold">Number of clusters</span>
                                </td>
                                <td>
                                    <span class="text-main text-semibold number"></span>
                                    <br>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                  <span class="text-main text-semibold">File Input</span>
                                </td>
                                <td>
                                    <span class="text-main text-semibold">
                                      <?php
                                        echo "<a href=\"../../jobs/".$_GET['job']."/".$_GET['file']."\">File Input</a>";
                                      ?>
                                    </span>
                                    <br>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                  <span class="text-main text-semibold">File Result Process </span>
                                </td>
                                <td>
                                    <span class="text-main text-semibold">
                                      <?php
                                        echo "<a href=\"../../jobs/".$_GET['job']."/results/fullDataSetWith.csv\">File With id clustering</a>";
                                      ?>
                                    </span>
                                </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12 col-md-12">

                    <div class="panel panel-bordered panel-primary">

                      <div class="panel-heading">
                        <h3 class="panel-title">
                          Details of groups
                        </h3>
                      </div>
                      <div class="panel-body">

                        <table id="groups" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                              <tr>
                                <th class="min-tablet">ID-Group</th>
                                <th class="min-tablet">Number Members</th>
                                <th class="min-tablet">Details</th>
                              </tr>
                            </thead>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6 col-md-6">

                    <div class="panel panel-bordered panel-primary">

                      <div class="panel-heading">
                        <h3 class="panel-title">
                          How to cite this article
                        </h3>
                      </div>
                      <div class="panel-body">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-6">

                    <div class="panel panel-bordered panel-primary">

                      <div class="panel-heading">
                        <h3 class="panel-title">
                          PESB2 Group information
                        </h3>
                      </div>
                      <div class="panel-body">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                      </div>
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

            <p class="pad-lft">&#0169; 2020 Developed by <a href="http://pesb2.cl/"> PESB2 Group, </a>Centre for Biothecnology and Bioengineering, FCFM, University of Chile</p>



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
</body>
</html>
