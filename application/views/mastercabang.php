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
            <h3 class="page-header"><i class="fa fa fa-bars"></i>Input Cabang</h3>
          </div>
        </div>

        <!-- page start-->      
        <?php 
        echo form_open("Cabang/mastercabang"); 
        ?>        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">                   
                                <br>
                                <?php 
                                    echo "<a href='".site_url('Cabang/index')."'>"; 
                                        echo form_button("btntambah", "Kembali", ["class"=>"btn btn-lg btn-danger"]); 
                                    echo "</a>";
                                ?>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class=col-md-4>
                                <label class='judullabel'>Kode Cabang : </label>
                                <?php 
                                    echo form_input("txtkodecabang", $kodecabang, ['id'=>'txtkodecabang', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                            <div class=col-md-4>
                                <br><br>
                                <?php echo "<label class='errorlabel'>".form_error('txtkodecabang')."</label>"; ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-4>
                                <label class='judullabel'>Nama Cabang : </label>
                                <?php 
                                    echo form_input("txtnamacabang", $namacabang, ['id'=>'txtnamacabang', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                            <div class=col-md-4>
                                <br><br>
                                <?php echo "<label class='errorlabel'>".form_error('txtnamacabang')."</label>"; ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-4>
                                <label class='judullabel'>Alamat : </label>
                                <?php 
                                    echo form_input("txtalamatcabang", $alamat, ['id'=>'txtalamatcabang', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                            <div class=col-md-4>
                                <br><br>
                                <?php echo "<label class='errorlabel'>".form_error('txtalamatcabang')."</label>"; ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-4>
                                <label class='judullabel'>Kota : </label>
                                <?php 
                                    echo form_input("txtkotacabang", $kota, ['id'=>'txtkotacabang', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                            <div class=col-md-4>
                                <br><br>
                                <?php echo "<label class='errorlabel'>".form_error('txtkotacabang')."</label>"; ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-4>
                                <label class='judullabel'>Nomer Telp : </label>
                                <?php 
                                    echo form_input("txtnotelpcabang", $nomertelp, ['id'=>'txtnotelpcabang', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                            <div class=col-md-4>
                                <br><br>
                                <?php echo "<label class='errorlabel'>".form_error('txtnotelpcabang')."</label>"; ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-4>
                                <label class='judullabel'>Tanggal Berdiri : </label>
                                <?php 
                                    echo form_input("txttglberdiri", $tanggalberdiri, ['id'=>'txttglberdiri', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                            <div class=col-md-4>
                                <br><br>
                                <?php echo "<label class='errorlabel'>".form_error('txttglberdiri')."</label>"; ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-4>
                                <label class='judullabel'>Jenis : </label>
                                <?php
                                    $options = [
                                        'OUTLET'        => 'OUTLET',
                                        'GUDANG'        => 'GUDANG',
                                    ]; 
                                    echo form_dropdown("txtjenis",$options, $jenis, ['id'=>'txtjenis', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-4>
                                <label class='judullabel'>Status : </label>
                                <?php
                                    $options = [
                                        'AKTIF'     => 'AKTIF',
                                        'NONAKTIF'  => 'NONAKTIF',
                                    ]; 
                                    echo form_dropdown("txtstatus",$options, $status, ['id'=>'txtstatus', 'type'=>'text', 'class'=>'form-control']);
                                ?> 
                            </div>
                        </div>
                        <br><br>
                        <?php 
                            if($kodecabang == "") {
                                echo form_submit("btnAdd_Cabang", "Tambah Cabang", ['id'=>'btnAdd', 'class'=>'btn btn-lg btn-primary']);
                            }
                            else {
                                echo form_submit("btnUpdate_Cabang", "Update Cabang", ['id'=>'btnUpdate', 'class'=>'btn btn-lg btn-primary']);
                                echo form_submit("btnRemove_Cabang", "Hapus Cabang", ['id'=>'btnRemove_employee  ', 'class'=>'btn btn-lg btn-danger']);  
                            }
                        ?>
                    </div>
                </div> 
            </div>
        </div>         
        <?php 
            echo form_close(); 
        ?>
        <br><br>
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
