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
    <!--main content start-->
    <!-- <section id="main-content"> -->

      <!-- <section class="wrapper"> -->
      <?php
        echo "<img src='".base_url('asset/img/logohachi.png')."' style='width:70px'><b>HACHI-HACHI BISTRO</b>";
        
    ?>
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header" style="color:black"><b><i class="fa fa fa-bars"></i>Cetak Laporan Stok Bahan Baku-           
            <?php
            $tanggalan = date("d F Y, H:i");
            echo $tanggalan;
            ?>
            </b></h3>
          </div>
        </div>
        <!-- page start-->
        <?php 
        echo form_open("LaporanBahanBaku/cetak"); 
        ?>          
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class=col-md-6>
                                <div class="card-body">
                                    <table class="table table-splitted">
                                    <thead>
                                        <tr>
                                            <th >No. </th>
                                            <th >Nama Oultet</th>
                                            <th >Nama Bahan</th>
                                            <th class="tengahtulisan">Stok</th>
                                        </tr>
                                        <?php
                                        $nomer=1;
                                        foreach($cetakdata->result() as $row)
                                        {
                                            /*echo "<tr>";
                                                echo "<td>".$nomer."</td>";
                                                echo "<td>".$row->namabahan."</td>";
                                                echo "<td class='tengahtulisan'>".$row->satuan."</td>";
                                                echo "<td class='tengahtulisan'>".$row->jenis."</td>";
                                                echo "<td class='kanantulisan'>".number_format($row->harga)."</td>";
                                                echo "<td class='tengahtulisan'>".$row->stok."</td>";
                                            echo "</tr>";*/
                                            echo "<tr>";
                                            echo "<td>".$nomer."</td>";
                                            echo "<td>".$row->namacabang."</td>";
                                            echo "<td>".$row->namabahan."</td>";
                                            echo "<td class='tengahtulisan'>".$row->stok."</td>";
                                        echo "</tr>";
                                            $nomer+=1;
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
        <?php 
            echo form_close(); 
        ?>    
        <!-- page end-->
      </section>
    </section>
  <!-- </section> -->

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