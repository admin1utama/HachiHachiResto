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
            <h3 class="page-header" style="color:black"><b><i class="fa fa fa-bars"></i>Distribusi Keluar</b></h3>
          </div>
        </div>

        <!-- page start-->      
       
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <table class='table table-striped'>
                                        <!--<tr>
                                            <th class="tengahtulisan">Nomer Nota</th>
                                            <th class="tengahtulisan">Tanggal</th>
                                            <th class="tengahtulisan">Nama Supplier</th>
                                            <th class="tengahtulisan">Kota</th>
                                            <th class="tengahtulisan">Total</th>
                                            <th class="tengahtulisan">&nbsp</th>
                                        </tr>-->
                                        <?php
                                        foreach($datadistribusi->result() as $row) {
                                            echo form_open("DistribusiKeluar/bukadetail");
                                            echo form_hidden("kode",$row->nomernota);
                                            echo "<tr>"; 
                                            echo "<th>"; 
                                              echo "<h5 style='color:red; font-weight: bold;'>Nota : ".$row->nomernota."</h5>"; 
                                              echo "<h5 style='color:red; font-weight: bold;'>".date("d F Y", strtotime($row->tanggal))."</h5>"; 
                                            echo "</th>";
                                            echo "<th>"; 
                                              echo "<h5 style='color:red; font-weight: bold;'>Cabang Asal : </h5>"; 
                                              echo "<h3 style='font-weight: bold;'>".$row->namacabangasal."</h3>"; 
                                              echo "<h3 style='font-weight: bold;'>".$row->kotaasal."</h3>"; 
                                            echo "</th>";
                                            echo "<th>"; 
                                              echo "<h5 style='color:red; font-weight: bold;'>Cabang Tujuan : </h5>"; 
                                              echo "<h3 style='font-weight: bold;'>".$row->namacabangtujuan."</h3>"; 
                                              echo "<h3 style='font-weight: bold;'>".$row->kotatujuan."</h3>"; 
                                            echo "</th>";
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
