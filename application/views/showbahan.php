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
            <h3 class="page-header"><i class="fa fa fa-bars"></i>Bahan</h3>
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
                                echo "<a href='".site_url('Bahan/tambahbahan')."'>"; 
                                    echo form_button("btntambah", "Tambah Data", ["class"=>"btn btn-danger"]);
                                echo "</a>"; 
                                ?>
                                <?php
                                echo "<a href='".site_url('Bahan/BOM')."'>"; 
                                    echo form_button("btnBOM", "Bill Of Material", ["class"=>"btn btn-danger"]);
                                echo "</a>"; 
                                ?>
                                <br><br><br>
                                <div class="card-body">
                                    <table class='table table-striped'>
                                        <tr>
                                            <th class="tengahtulisan">&nbsp</th>
                                            <th class="tengahtulisan">Nama Bahan</th>
                                            <th class="tengahtulisan">Satuan</th>
                                            <th class="tengahtulisan">Jenis</th>
                                            <th class="tengahtulisan">Harga</th>
                                            <th class="tengahtulisan">Jumlah Stok</th>
                                            <th class="tengahtulisan">Status</th>
                                            <th class="tengahtulisan">&nbsp</th>
                                        </tr>
                                        <?php
                                        foreach($databahan->result() as $row) {
                                            echo form_open("Bahan/editbahan");
                                            echo form_hidden("kode",$row->kodebahan);
                                            echo "<tr>"; 
                                                echo "<td class='tengahtulisan'>";
                                                  echo "<img src='".base_url('asset/bahan/'.$row->foto)."' width='100px' height='100px'>";
                                                echo "</td>"; 
                                                echo "<td>".strtoupper($row->namabahan)."</td>";
                                                echo "<td class='tengahtulisan'>".strtoupper($row->satuan)."</td>";
                                                echo "<td class='tengahtulisan'>".strtoupper($row->jenis)."</td>";
                                                echo "<td class='kanantulisan'>".number_format($row->harga)."</td>";
                                                echo "<td class='tengahtulisan'>".$row->stok."</td>";
                                                echo "<td class='tengahtulisan'>".strtoupper($row->status)."</td>";
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
