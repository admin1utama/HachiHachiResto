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
            <h3 class="page-header"><i class="fa fa fa-bars"></i>Cetak Laporan Distribusi Keluar  -           
            <?php
            $tanggalan = date("d F Y, H:i");
            echo $tanggalan;
            ?>
            </h3>
          </div>
        </div>
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
                                        <?php
                                        $nomer=1;
                                        foreach($data->result() as $row)
                                        {
                                            //echo form_input("kode",$row->nomernota);
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
                                            //echo "<td><br><br><button type='submit' class='btn btn-lg btn-danger'><i class='icon_pencil-edit_alt'></i></button></td>"; 
                                          echo "</tr>"; 
                                        }
                                        ?>
                                        <?php
                                        // if($this->session->userdata("cartdetail")){
                                          $arr = $this->session->userdata("cart");
                                          //print_r($arr);
                                          $jum = count($arr);
                                          //echo "jumlahnya : ".$jum;
                                          for($i = 0; $i < $jum; $i+=1){
                                              echo "<tr>";
                                                //echo "<td style='text-align: center;'>".$arr[$i][0]."</td>";
                                                echo "<td style='text-align: center;'>".$arr[$i][2]."</td>";
                                                echo "<td style='text-align: center;'>".$arr[$i][4]."</td>";
                                                echo "<td style='text-align: center;'>".$arr[$i][3]."</td>";
                                                //echo "<td style='text-align: center;'>".form_input("txtQtyTerima".$i, $arr[$i][4], ['id'=>'txtQtyTerima', 'type'=>'number', 'class'=>'form-control', 'style'=>'text-align: center;'])."</td>";
                                                //echo "<td style='text-align: center;'>".$arr[$i][5]."</td>"; 
                                              echo "</tr>";
                                          }
                                          echo "</table>";
                                          //}
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