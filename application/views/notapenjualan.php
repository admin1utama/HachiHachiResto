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
        <div class="row" style="margin-left: 10px;">
          <div class="col-lg-3 kotakcard">
            <div class="card">
                <div class="card-body">
                    <p class="card-text">
                    <?php 
                        foreach($header->result() as $row)
                        {
                            echo "<h4 style='font-weight: bold;'>Nota Penjualan : ".$row->nomernota."</h4>"; 
                            echo "<h5>Tanggal : ".$row->tanggal."</h5>"; 
                            echo "<h5>Grandtotal : Rp. ".number_format($row->grandtotal)."</h5>"; 
                            echo "<h5>".$row->namacabang."</h5>"; 
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
                        foreach($header->result() as $row)
                        {
                            echo "<h3>".$row->namamember."</h3>"; 
                            echo "<h5>".$row->alamatrumahmember."</h5>"; 
                            echo "<h5>".$row->kotamember."</h5>"; 
                        }
                    ?>
                    </p>
                </div>
              </div>
          </div>
        </div>
        <br><br>
        <!-- page start-->
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
                                        <th class="tengahtulisan">Qty</th>
                                        <th class="tengahtulisan">Harga</th>
                                        <th class="tengahtulisan">Subtotal</th>
                                        </tr>
                                        <?php
                                        $nomer=1;
                                        $grandtotal = 0; 
                                        foreach($detailpaket->result() as $rowpaket)
                                        {
                                            echo "<tr>";
                                                echo "<td>".$nomer."</td>";
                                                echo "<td>".$rowpaket->namapaket."</td>";
                                                echo "<td class='tengahtulisan'>Paket</td>";
                                                echo "<td class='tengahtulisan'>".$rowpaket->qty."</td>";
                                                echo "<td class='kanantulisan'>".number_format($rowpaket->harga)."</td>";
                                                echo "<td class='kanantulisan'>".number_format($rowpaket->qty * $rowpaket->harga)."</td>";
                                            echo "</tr>";
                                            foreach($detail->result() as $row)
                                            {
                                                if($row->kodepaket == $rowpaket->kodepaket) {
                                                    echo "<tr style='color: red;'>";
                                                        echo "<td>&nbsp;</td>";
                                                        echo "<td>".$row->namabahan."</td>";
                                                        echo "<td class='tengahtulisan'>".$row->satuan."</td>";
                                                        echo "<td class='tengahtulisan'>".$row->qty."</td>";
                                                        echo "<td class='kanantulisan'>&nbsp;</td>";
                                                        echo "<td class='kanantulisan'>&nbsp;</td>";
                                                    echo "</tr>";
                                                }
                                            }

                                            $nomer+=1;
                                            $grandtotal = $grandtotal + ($rowpaket->qty * $rowpaket->harga); 
                                        }
                                        foreach($detail->result() as $row)
                                        {
                                            if($row->kodepaket == "") {
                                                echo "<tr>";
                                                    echo "<td>".$nomer."</td>";
                                                    echo "<td>".$row->namabahan."</td>";
                                                    echo "<td class='tengahtulisan'>".$row->satuan."</td>";
                                                    echo "<td class='tengahtulisan'>".$row->qty."</td>";
                                                    echo "<td class='kanantulisan'>".number_format($row->harga)."</td>";
                                                    echo "<td class='kanantulisan'>".number_format($row->qty * $row->harga)."</td>";
                                                echo "</tr>";
                                                $nomer+=1;
                                                $grandtotal = $grandtotal + ($row->qty * $row->harga); 
                                            }
                                        }
                                        echo "<tr style='font-weight: bold; font-size: 15px; background: #CCD3D9;'>";
                                            echo "<td colspan='5' align='right'>Grandtotal :</td>";
                                            echo "<td class='kanantulisan'>".number_format($grandtotal)."</td>";
                                        echo "</tr>";
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
        <div class="row" style="margin-left: 10px;">
          <div class="col-lg-3 kotakcard">
            <div class="card">
                <div class="card-body">
                    <p class="card-text">
                    </p>
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

  <script language='javascript'>
    window.print(); 
  </script>