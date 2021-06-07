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
            <h3 class="page-header"><i class="fa fa fa-bars"></i>Profil Saya</h3>
          </div>
        </div>

        <!-- page start-->      
        <?php 
        echo form_open("Profile/index"); 
        ?>        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">                            
                            <div class="col-md-5"">                                
                                <br>
                                <?php 
                                    echo "<a href='".site_url('Bahan/index')."'>"; 
                                        echo form_button("btnkembali", "Kembali", ["class"=>"btn btn-danger"]); 
                                    echo "</a>"; 
                                ?>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class=col-md-4>
                                <div class="form-group">
                                    <label>Kode Karyawan : </label>
                                    <?php 
                                        echo form_input("txtkodekaryawan", $kodekaryawan, ['id'=>'txtkodekaryawan', 'type'=>'text', 'class'=>'form-control', 'readonly'=>'readonly']);
                                    ?>
                                    <small id="errorNoList" class="form-text" style="color:red;"></small>
                                </div>
                            </div>
                            <div class=col-md-4>
                                <label>Penempatan Cabang :</label><br>
                                <?php 
                                    echo form_input("txtcabang", $cabang, ['id'=>'txtcabang', 'type'=>'text', 'class'=>'form-control', 'readonly'=>'readonly']);
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class=col-md-4>
                                <label>Username :</label><br>
                                <?php 
                                    echo form_input("txtusername", $username, ['id'=>'txtusername', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                            <div class=col-md-4>
                                <label>Nama Lengkap :</label><br>
                                <?php 
                                    echo form_input("txtnama", $txtnama, ['id'=>'txtnama', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                            
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-4>
                                <label>Nomer Identitas :</label><br>
                                <?php 
                                    echo form_input("txtnoidentitas", $noid, ['id'=>'txtnoidentitas', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                            <div class=col-md-4>
                                <label>Nomer Telepon :</label><br>
                                <?php 
                                    echo form_input("txtnotelp", $notelp, ['id'=>'txtnotelp', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-4>
                                <label>Tanggal Mulai Bekerja :</label><br>
                                <?php 
                                    echo form_input("txtmulai", $mulai, ['id'=>'txtmulai', 'type'=>'text', 'class'=>'form-control', 'readonly'=>'readonly']);
                                ?>
                            </div>
                            <div class=col-md-4>
                                <label>Jabatan :</label><br>
                                <?php 
                                    echo form_input("txtjabatan", $jabatan, ['id'=>'txtjabatan', 'type'=>'text', 'class'=>'form-control', 'readonly'=>'readonly']);
                                ?>  
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-4>
                                <label>Status :</label><br>
                                <?php 
                                    echo form_input("txtstatus", $status, ['id'=>'txtstatus', 'type'=>'text', 'class'=>'form-control', 'readonly'=>'readonly']);
                                ?>
                            </div>
                        </div>
                        <br><br>
                        <?php 
                                //echo form_submit("btnAdd", "Perbarui Data", ['id'=>'btnAdd', 'class'=>'btn btn-success']);
                                echo form_submit("btnUpdate", "Perbarui Data", ['id'=>'btnUpdate', 'class'=>'btn btn-success']);  
                            
                        ?>
                    </div>
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
