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
            <h3 class="page-header" style="color:black"><b><i class="fa fa fa-bars"></i>Cetak Kartu Stok -           
            <?php
            $tanggalan = date("d F Y, H:i");
            echo $tanggalan;
            ?>
            </b></h3>
          </div>
        </div>
        <!-- page start-->
        <div class="row" style="margin-left: 10px;">
          <div class="col-lg-3 kotakcard">
            <div class="card">
                <div class="card-body">
                    <p class="card-text">
                    <?php 
                        foreach($header->result() as $row)
                        {
                            echo "<h4 style='font-weight: bold;'>Nama Bahan : ".$row->namabahan."</h4>"; 
                            echo "<h5>Kategori : ".$row->jenis."</h5>"; 
                            
                        }
                    ?>
                    </p>
                </div>
            </div>
          </div>
          <div class="col-lg-3">
              <div class="card">
                <div class="card-body">
                    <p class="card-text">
                    <?php 
                        /*foreach($header->result() as $row)
                        {
                            echo "<h3>".$row->namasupplier."</h3>"; 
                            echo "<h5>".$row->alamat."</h5>"; 
                            echo "<h5>".$row->kota."</h5>"; 
                        }*/
                    ?>
                    </p>
                </div>
              </div>
          </div>
        </div>
        <br><br>
        <?php 
        echo form_open("Bahan/cetak"); 
        ?>          
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class=col-md-8>
                                <div class="card-body">
                                    <table class="table table-splitted">
                                    <thead>
                                        <tr>
                                            <th >Tanggal</th>
                                            <th >Jenis</th>
                                            <th >Noref</th>
                                            <th class="tengahtulisan">Stok Awal</th>
                                            <th >Debet</th>
                                            <th >Kredit</th>
                                            <th >Stok Akhir</th>
                                            <th >Harga Trans</th>
                                            <th >Harga AVG</th>
                                        </tr>
                                        <?php
                                        $nomer=1;
                                        foreach($cetakdata->result() as $row)
                                        {
                                        echo "<tr>";
                                            //echo "<td>".$nomer."</td>";
                                            echo "<td>".$row->tanggal."</td>";
                                            echo "<td>".$row->jenis."</td>";
                                            echo "<td>".$row->noref."</td>";
                                            echo "<td class='tengahtulisan'>".$row->stokawal."</td>";
                                            echo "<td>".$row->debet."</td>";
                                            echo "<td>".$row->kredit."</td>";
                                            echo "<td class='tengahtulisan'>".$row->stokakhir."</td>";
                                            echo "<td>".$row->hargatrans."</td>";
                                            echo "<td>".$row->hargaavg."</td>";
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