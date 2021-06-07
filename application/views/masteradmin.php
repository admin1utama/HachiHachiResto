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
            <h3 class="page-header"><i class="fa fa fa-bars"></i>Input Admin</h3>
          </div>
        </div>

        <!-- page start-->      
        <?php 
        echo form_open("Admin/masteroperator"); 
        ?>        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                                    
                                <br>
                                <?php 
                                    echo "<a href='".site_url('Admin/index')."'>"; 
                                        echo form_button("btntambah", "Kembali", ["class"=>"btn btn-danger"]); 
                                    echo "</a>"; 
                                ?>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class=col-md-4>
                                <label>Kode Karyawan : </label>
                                <?php 
                                    echo form_input("txtkodekaryawan", $kodekaryawan, ['id'=>'txtkodekaryawan', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                            <div class=col-md-4>
                                <label>Kode Cabang : </label>
                                <?php 
                                    echo form_input("txtkodecabang", $kodecabang, ['id'=>'txtkodecabang', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-4>
                                <label>Username : </label>
                                <?php 
                                    echo form_input("txtusername", $username, ['id'=>'txtusername', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                            <div class=col-md-4>
                                <label>Password : </label>
                                <?php 
                                    echo form_input("txtpass", $password, ['id'=>'txtpass', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                            
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-4>
                                <label>Nama Karyawan : </label>
                                <?php 
                                    echo form_input("txtnamakaryawan", $nama, ['id'=>'txtnamakaryawan', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                            <div class=col-md-4>
                                <label>Tanggal Mulai Bekerja : </label>
                                <?php 
                                    echo form_input("txtmulaikerja", $tanggalmulai, ['id'=>'txtmulaikerja', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-4>
                                <label>No Telepon : </label>
                                <?php 
                                    echo form_input("txttelpkaryawan", $nomertelp, ['id'=>'txttelpkaryawan', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                            <div class=col-md-4>
                                <label>No Identitas : </label>
                                <?php 
                                    echo form_input("txtnoidentitaskaryawan", $noidentitas, ['id'=>'txtnoidentitaskaryawan', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-4>
                                <label>Jabatan : </label>
                                <?php 
                                    echo form_input("txtjabatankaryawan", "ADMIN", ['id'=>'txtjabatankaryawan', 'type'=>'text', 'class'=>'form-control', 'readonly'=>'readonly']);
                                ?> 
                            </div>
                            <div class=col-md-4>
                                <label>Status Karyawan : </label>
                                <?php 
                                    echo form_input("txtstatuskaryawan", $status, ['id'=>'txtstatuskaryawan', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                        </div>
                        <br><br>
                        <?php
                            if($kodekaryawan == "" ){
                                echo form_submit("btnAdd_Admin", "Tambah Admin", ['id'=>'btnAdd_Admin', 'class'=>'btn btn-success']);
                            } 
                            else{
                                echo form_submit("btnUpdate_Admin", "Update Admin", ['id'=>'btnUpdate_Admin', 'class'=>'btn btn-warning']);  
                                echo form_submit("btnRemove_Admin", "Hapus Admin", ['id'=>'btnRemove_Admin  ', 'class'=>'btn btn-danger']);
                                echo form_submit("btnBlock", "Blokir", ['id'=>'btnBlock', 'class'=>'btn btn-danger']);  
                                echo form_submit("btnUnblock", "Buka Blokir", ['id'=>'btnUnblock', 'class'=>'btn btn-warning']);
                            }
                        ?>
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