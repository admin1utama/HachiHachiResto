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
            <h3 class="page-header" style="color:black"><b><i class="fa fa fa-bars"></i>Dashboard</b></h3>
          </div>
        </div>

        <!-- page start-->      
      
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">                                
                                <div class="card-body">
                                    <table class='table table-striped'>
                                        <tr>
                                            <tr><th class='tengahtulisan'>PENGINGAT STOK CABANG</th></tr>
                                            <th class="tengahtulisan">Nama Bahan</th>
                                            <th class="tengahtulisan">Stok</th>
                                        </tr>
                                        <?php
                                        //echo count($datasatuan->result());
                                        //print_r($datasatuan->result());
                                        foreach($datastok->result() as $row) {
                                            //print_r($row);
                                            echo form_open("DashboardKepalaGudang/index");
                                            //echo form_hidden("kode",$row->kodekaryawan);
                                            echo "<tr>"; 
                                                echo "<td class='tengahtulisan'>".strtoupper($row->namabahan)."</td>"; 
                                                echo "<td class='tengahtulisan'>".strtoupper($row->stok)."</td>";
                                            echo "</tr>"; 
                                            echo form_close();
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-8">                                
                                <div class="card-body">
                                <table class='table table-striped'>
                                <tr>
                                  <td colspan="2" style="font-weight: bold">DISTRIBUSI MASUK</td>
                                  <th class="kanantulisan">
                                        <a class="" href="<?php echo site_url('DistribusiMasuk'); ?>">
                                        <span>View All</span>
                                        </a>
                                  </th>
                                </tr>
                                        <?php
                                        foreach($datadistribusimasuk->result() as $row) {
                                            echo form_open("DistribusiMasuk/bukadetail");
                                            echo form_hidden("kode",$row->nomernota);
                                            echo "<tr>"; 
                                              echo "<th>"; 
                                                echo "<h5 style='color:red; font-weight: bold;'>Nota : ".$row->nomernota."</h5>"; 
                                                echo "<h5 style='color:red; font-weight: bold;'>".date("d F Y", strtotime($row->tanggal))."</h5>"; 
                                              echo "</th>";
                                              echo "<th>"; 
                                                echo "<h5 style='color:red; font-weight: bold;'>Cabang Asal : </h5>"; 
                                                echo "<h5 style='font-weight: bold;'>".$row->namacabangasal."</h3>"; 
                                                echo "<h5 style='font-weight: bold;'>".$row->kotaasal."</h3>"; 
                                              echo "</th>";
                                              echo "<th>"; 
                                                echo "<h5 style='color:red; font-weight: bold;'>Cabang Tujuan : </h5>"; 
                                                echo "<h5 style='font-weight: bold;'>".$row->namacabangtujuan."</h3>"; 
                                                echo "<h5 style='font-weight: bold;'>".$row->kotatujuan."</h3>"; 
                                              echo "</th>";

                                            echo "</tr>"; 
                                            echo form_close();
                                        }
                                        ?>
                                    </table>
                                    <table class='table table-striped'>
                                    <tr>
                                      <td colspan="2" style="font-weight: bold">DISTRIBUSI KELUAR</td>
                                      <th class="kanantulisan">
                                        <a class="" href="<?php echo site_url('DistribusiKeluar'); ?>">
                                        <span>View All</span>
                                        </a>
                                      </th>
                                    </tr>
                                        <?php
                                        foreach($datadistribusikeluar->result() as $row) {
                                            echo form_open("DistribusiKeluar/bukadetail");
                                            echo form_hidden("kode",$row->nomernota);
                                            echo "<tr>"; 
                                            echo "<th>"; 
                                              echo "<h5 style='color:red; font-weight: bold;'>Nota : ".$row->nomernota."</h5>"; 
                                              echo "<h5 style='color:red; font-weight: bold;'>".date("d F Y", strtotime($row->tanggal))."</h5>"; 
                                            echo "</th>";
                                            echo "<th>"; 
                                              echo "<h5 style='color:red; font-weight: bold;'>Cabang Asal : </h5>"; 
                                              echo "<h5 style='font-weight: bold;'>".$row->namacabangasal."</h3>"; 
                                              echo "<h5 style='font-weight: bold;'>".$row->kotaasal."</h3>"; 
                                            echo "</th>";
                                            echo "<th>"; 
                                              echo "<h5 style='color:red; font-weight: bold;'>Cabang Tujuan : </h5>"; 
                                              echo "<h5 style='font-weight: bold;'>".$row->namacabangtujuan."</h3>"; 
                                              echo "<h5 style='font-weight: bold;'>".$row->kotatujuan."</h3>"; 
                                            echo "</th>";
                                          echo "</tr>"; 
                                            echo form_close();
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>        


        <!-- page end-->
      </section>
    </section>
  </section>


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
</body>
</html>