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
            <h3 class="page-header" style="color:black"><b><i class="fa fa fa-bars"></i>DETAIL PERMINTAAN BAHAN -           
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
                            echo "<h4 style='font-weight: bold;'>Nomer Nota : ".$row->nomernota."</h4>"; 
                        }
                        foreach($datapemesananbahan->result() as $row)
                        {
                            echo "<h4 style='font-weight: bold;'>Dari : ".$row->namacabang."</h4>"; 
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
        <br>
        <?php 
        echo form_open("LaporanBahan/cetak"); 
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
                                        <th class="tengahtulisan">No.</th>
                                        <th class="tengahtulisan">Nama Bahan</th>
                                        <th class="tengahtulisan">Satuan</th>
                                        <th class="tengahtulisan">Qty Pesan</th>
                                        </tr>
                                        <?php
                                        $nomer=1;
                                        //$grandtotal = 0; 
                                        foreach($detail->result() as $row)
                                        {
                                            echo "<tr>";
                                                echo "<td>".$nomer."</td>";
                                                echo "<td>".$row->namabahan."</td>";
                                                echo "<td class='tengahtulisan'>".$row->kodesatuan."</td>";
                                                echo "<td class='tengahtulisan'>".$row->qtypesan."</td>";
                                                //echo "<td class='kanantulisan'>".number_format($row->hargabeli)."</td>";
                                                //echo "<td class='kanantulisan'>".number_format($row->qty * $row->hargabeli)."</td>";
                                            echo "</tr>";
                                            $nomer+=1;
                                            //$grandtotal = $grandtotal + ($row->qty * $row->hargabeli); 
                                        }
                                        /*echo "<tr style='font-weight: bold; font-size: 15px; background: #CCD3D9;'>";
                                            echo "<td colspan='5' align='right'>Grandtotal :</td>";
                                            echo "<td class='kanantulisan'>".number_format($grandtotal)."</td>";
                                        echo "</tr>";*/
                                        ?>
                                    </table>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div> 
        </div> 
        <!-- <div class="row" style="margin-left: 10px;">
          <div class="col-lg-3 kotakcard">
            <div class="card">
                <div class="card-body">
                    <p class="card-text">
                    </p>
                </div>
            </div>
          </div>
        </div> -->
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

  <script language='javascript'>
    //window.print(); 
  </script>