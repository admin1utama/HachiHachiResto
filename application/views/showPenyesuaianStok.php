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
            <h3 class="page-header" style="color:black"><b><i class="fa fa fa-bars"></i>Penyesuaian Stok</b></h3>
          </div>
        </div>

        <!-- page start-->      
       
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <?php 
                                  echo "<a href='".site_url('PenyesuaianStok/tambahpenyesuaian')."'>"; 
                                      echo form_button("btntambah", "Tambah Penyesuaian", ["class"=>"btn btn-danger"]);
                                  echo "</a>"; 
                                ?>
                                <br><br><br>
                                <div class="card-body">
                                    <table class='table table-striped'>
                                        <!--<tr>
                                            <th class="tengahtulisan"></th>
                                        </tr>-->
                                        <?php
                                        foreach($datapenyesuaian->result() as $row) {
                                            //echo form_open("PenyesuaianStok/index");
                                            //echo form_hidden("kode",$row->nomernota);
                                            // echo "<tr>"; 
                                            //     echo "<th><b><h4 style='color:black';>Tanggal : <br>".$row->tanggal.
                                            //     "</b></h3><br><b><h4 style='color:black';>".$row->namabahan."</b></th>";
                                                
                                            //     echo "<th><b><h3 style='color:black';><br><br></h3><br><b><h4 style='color:black';>Stok Awal : ".$row->stokawal."</b></th>";

                                            //     echo "<th><b><h3 style='color:black';><br><br></h3><br><b><h4 style='color:black';>Stok Akhir : ".$row->stokakhir."</b></th>";

                                            //     echo "<th><b><h3 style='color:black';><br><br></h3><br><b><h4 style='color:black';>Alasan : ".$row->alasan."</b></th>";

                                            //     //echo "<th><h4 style='color:black'><b>Tanggal : ".$row->tanggal."</h4>Status : ".$row->status."<br><br><br></b></th>";
                                            //     //echo "<th><b><h4>Subtotal : Rp. ".number_format($row->subtotal)."</b></h4><br><br><br><th>";
                                            echo "<tr>"; 
                                            echo "<th>"; 
                                            echo "<h4 style='color:red; font-weight: bold;'>Tanggal : ".$row->tanggal."</h4>"; 
                                            echo "<h3 style='font-weight: bold;'>".$row->namabahan."</h3>"; 
                                            //echo "<h3 style='font-weight: bold;'>".$row->kota."</h3>"; 
                                            //echo "<h5 style='color:red; font-weight: bold;'>".date("d F Y", strtotime($row->tanggal))."</h5>"; 
                                            echo "</th>";
                                            echo "<th><h3 style='font-weight: bold;'>Stok Awal: ".$row->stokawal."</h3><th>";
                                            echo "<th><h3 style='font-weight: bold;'>Stok Akhir: ".$row->stokakhir."</h3><th>";
                                            echo "<th><h3 style='font-weight: bold;'>Alasan: ".$row->alasan."</h3><th>";
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


  <link href='<?php echo base_url("asset/css/bootstrap.min.css"); ?>'       rel="stylesheet">
  <link href='<?php echo base_url("asset/css/bootstrap-theme.css"); ?>'     rel="stylesheet">
  <link href='<?php echo base_url("asset/css/elegant-icons-style.css"); ?>' rel="stylesheet">
  <link href='<?php echo base_url("asset/css/font-awesome.min.css"); ?>'    rel="stylesheet">
  <link href='<?php echo base_url("asset/css/style-responsive.css"); ?>'    rel="stylesheet">
  <link href='<?php echo base_url("asset/css/style.css"); ?>'               rel="stylesheet">

  <script src='<?php echo base_url("asset/js/jquery.js"); ?>'></script>
  <script src='<?php echo base_url("asset/js/bootstrap.min.js"); ?>'></script>
  <script src='<?php echo base_url("asset/js/jquery.scrollTo.min.js"); ?>'></script>
  <script src='<?php echo base_url("asset/js/jquery.nicescroll.js"); ?>' type="text/javascript"></script>
  <script src='<?php echo base_url("asset/js/scripts.js"); ?>'></script>
</body>
</html>
