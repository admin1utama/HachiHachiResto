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
            <h3 class="page-header"><i class="fa fa fa-bars"></i>Penerimaan Pemesanan</h3>
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
                                        foreach($datapemesananbahan->result() as $row) {
                                            echo form_open("PenerimaanBahan/bukadetail");
                                            echo form_hidden("kode",$row->nomernota);
                                            echo "<tr>"; 
                                                /*echo "<td class='tengahtulisan'>".$row->nomernota."</td>"; 
                                                echo "<td class='tengahtulisan'>".$row->tanggal."</td>"; 
                                                echo "<td class='tengahtulisan'>".$row->namasupplier."</td>"; 
                                                echo "<td class='tengahtulisan'>".$row->kota."</td>"; 
                                                echo "<td class='kanantulisan'>".number_format($row->subtotal)."</td>";*/
                                                echo "<th><b><h3 style='color:red';>Nomer Nota : ".$row->nomernota.
                                                "</b></h3><br>Nama Supplier : ".$row->namasupplier.
                                                "<br>Kota : ".$row->kota."</th>";
                                                echo "<th><h4 style='color:black'>Tanggal : ".$row->tanggal."</h4><br><br><br></th>";
                                                echo "<th><b><h4>Subtotal : Rp. ".number_format($row->subtotal)."</b></h4><br><br><br><th>";
                                                echo "<td><button type='submit' class='btn btn-danger'><i class='icon_pencil-edit_alt'></i></button></td>"; 
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
