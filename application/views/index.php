<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Hachi Hachi Resto System Administration</title>



</head>

<body>
  <!-- container section start -->
  <section id="container" class="">
    <!--header start-->
    <?php include("header.php");?>
      <!--header end-->

<?php include("sidebar.php");?>

      <!--main content start-->
      <section id="main-content">
        <section class="wrapper">
          <div class="row">
            <div class="col-lg-12">
              <h3 class="page-header"><i class="icon_piechart"></i> Chart</h3>
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                <li><i class="icon_piechart"></i>Chart</li>

              </ol>
            </div>
          </div>
          <div class="row">
            <!-- chart morris start -->
            <div class="col-lg-12">
              <section class="panel">
                <header class="panel-heading">
                  <h3>General Chart</Char>
                      </header>
                      <div class="panel-body">
                        <div class="tab-pane" id="chartjs">
                      <div class="row">
                          <!-- Line -->

                          <!-- Doughnut -->
                          <div class="col-lg-6">
                              <section class="panel">
                                  <header class="panel-heading">
                                      Doughnut
                                  </header>
                                  <div class="panel-body text-center">
                                      <canvas id="doughnut" height="300" width="400"></canvas>
                                  </div>
                              </section>
                          </div>
                      </div>
                  </div>
                      </div>
                      </div>
                    </section>
              </div>
              <!-- chart morris start -->
            </div>
      </section>
      <!--main content end-->

    </section>
    <!-- container section end -->

    <link href='<?php echo base_url("asset/css/bootstrap.min.css"); ?>' rel="stylesheet">
    <link href='<?php echo base_url("asset/css/bootstrap-theme.css"); ?>' rel="stylesheet">
    <link href='<?php echo base_url("asset/css/elegant-icons-style.css"); ?>' rel="stylesheet" />
    <link href='<?php echo base_url("asset/css/font-awesome.min.css"); ?>' rel="stylesheet" />
    <link href='<?php echo base_url("asset/css/style.css"); ?>' rel="stylesheet">
    <link href='<?php echo base_url("asset/css/style-responsive.css"); ?>' rel="stylesheet" />

    <script src='<?php echo base_url("asset/js/jquery.js"); ?>'></script>
    <script src='<?php echo base_url("asset/js/bootstrap.min.js"); ?>'></script>
    <script src='<?php echo base_url("asset/js/jquery.scrollTo.min.js"); ?>'></script>
    <script src='<?php echo base_url("asset/js/jquery.nicescroll.js"); ?>' type="text/javascript"></script>
    <script src='<?php echo base_url("asset/js/scripts.js"); ?>'></script>

    <script src='<?php echo base_url("asset/assets/chart-master/Chart.js"); ?>'></script>
    <script src='<?php echo base_url("asset/js/chartjs-custom.js"); ?>'></script>
    <script src='<?php echo base_url("asset/js/scripts.js"); ?>'></script>

  </body>
</html>
