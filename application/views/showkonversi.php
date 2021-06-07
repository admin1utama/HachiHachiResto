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
            <h3 class="page-header"><i class="fa fa fa-bars"></i>Konversi</h3>
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
                                echo "<a href='".site_url('Konversi/tambahkonversi')."'>"; 
                                    echo form_button("btntambah", "Tambah Data", ["class"=>"btn btn-danger"]); 
                                echo "</a>"; 
                                ?>
                                <br><br>
                                <div class="card-body">
                                    <table class='table table-striped'>
                                        <tr>
                                            <th class="tengahtulisan">Kode Konversi</th>
                                            <th class="tengahtulisan">Nama Bahan</th>
                                            <th class="tengahtulisan">Konversi Pertama</th>
                                            <th class="tengahtulisan">Konversi Kedua</th>
                                            <th class="tengahtulisan">Nilai Konversi</th>
                                            <th class="tengahtulisan">&nbsp</th>
                                        </tr>
                                        <?php
                                        foreach($datakonversisatuan->result() as $row) {
                                            echo form_open("Admin/editkaryawan");
                                            //echo form_hidden("kode",$row->kodekaryawan);
                                            echo "<tr>"; 
                                                echo "<td class='tengahtulisan'>".strtoupper($row->kodekonversi)."</td>"; 
                                                echo "<td class='tengahtulisan'>".strtoupper($row->namabahan)."</td>";
                                                echo "<td class='tengahtulisan'>".strtoupper($row->kodesatuan1)."</td>";
                                                echo "<td class='tengahtulisan'>".strtoupper($row->kodesatuan2)."</td>";
                                                echo "<td class='tengahtulisan'>".strtoupper($row->nilaikonversi)."</td>";
                                                echo "<td><button type='submit' class='btn btn-danger'><i class='icon_pencil-edit_alt'></i></button></td>";
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