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
            <h3 class="page-header"><i class="fa fa fa-bars"></i>Paket Menu</h3>
          </div>
        </div>
        <!-- page start-->      
        <?php 
            echo form_open("PaketMenu/index");
        ?>        
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <br><br>
                        <div class="row">
                            <div class=col-md-12>
                                <div class="form-group">
                                    <label class="judullabel">Kode Paket : </label>
                                    <?php 
                                        echo form_input("txtkodepaket", "", ['id'=>'txtkodepaket', 'type'=>'text', 'class'=>'form-control']);
                                    ?>
                                    <small id="errorNoList" class="form-text" style="color:red;"></small>
                                    <?php echo "<label style='margin-top:10px;' class='errorlabel'>".form_error('txtkodepaket')."</label>"; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=col-md-12>
                                <label class="judullabel">Nama Paket :</label><br>
                                <?php 
                                    echo form_input("txtnamapaket", "" , ['id'=>'txtnamapaket', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                                <?php echo "<label style='margin-top:10px;' class='errorlabel'>".form_error('txtnamapaket')."</label>"; ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-12>
                                <label class="judullabel">Harga :</label><br>
                                <?php 
                                    echo form_input("txthargapaket", "", ['id'=>'txthargapaket', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                                <?php echo "<label style='margin-top:10px;' class='errorlabel'>".form_error('txthargapaket')."</label>"; ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-12>
                                <label class="judullabel">Status :</label><br>
                                <?php
                                    $options = [
                                        'AKTIF'     => 'AKTIF',
                                        'NONAKTIF'  => 'NONAKTIF',
                                    ]; 
                                    echo form_dropdown("txtstatus",$options, "", ['id'=>'txtstatus', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                        </div>
                        <br><br>
                        <?php      
                            echo form_submit("btnAddPaket", "Tambah Paket Menu", ['id'=>'btnAddPaket', 'class'=>'btn btn-primary btn-lg']);
                        ?>
                    </div>
                </div> 
            </div>
        <div class="col-md-7">
            <br><br><br>
            <div class="card-body">
                <table class='table table-striped'>
                    <tr>
                        <th class="tengahtulisan">Kode Paket</th>
                        <th class="tengahtulisan">Nama Paket</th>
                        <th class="tengahtulisan">Harga</th>
                        <th class="tengahtulisan">Status</th>
                        <th class="tengahtulisan" width='15%'>&nbsp</th>
                    </tr>
                    <?php
                    foreach($datapaketmenu->result() as $row) {
                        echo form_open("PaketMenu/detailmenu");
                        echo form_hidden("kode",$row->kodepaket);
                        echo "<tr>"; 
                            echo "<td class='tengahtulisan'>".$row->kodepaket."</td>"; 
                            echo "<td>".strtoupper($row->namapaket)."</td>";
                            echo "<td class='tengahtulisan'>".strtoupper($row->harga)."</td>";
                            echo "<td class='tengahtulisan'>".strtoupper($row->status)."</td>"; 
                            echo "<td><a href='".site_url('PaketMenu/detailmenu/'.$row->kodepaket)."'><button type='button' class='btn btn-danger'><i class='icon_pencil-edit_alt'></i></button>";
                            echo "&nbsp;&nbsp; <a href='".site_url('PaketMenu/detailmenu/'.$row->kodepaket)."'><button type='button' class='btn btn-danger'><i class='icon_close_alt2 '></i></button></td>";
                        echo "</tr>"; 
                        echo form_close();
                    }
                    ?>
                </table>
            </div>
        </div>
        </div> 
        <?php 
            echo form_close(); 
        ?>        
        <!-- page end-->
        <br><br>
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
