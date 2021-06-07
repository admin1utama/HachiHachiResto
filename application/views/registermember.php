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
            <h3 class="page-header"><i class="fa fa fa-bars"></i>Insert Member</h3>
          </div>
        </div>

        <!-- page start-->      
        <?php 
        echo form_open("Registermember/memberpelanggan"); 
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row"> 
                            <div class="col-md-4">
                                <br>
                                <?php 
                                    echo "<a href='".site_url('Registermember/index')."'>"; 
                                        echo form_button("btntambah", "Kembali", ["class"=>"btn btn-danger btn-lg"]); 
                                    echo "</a>"; 
                                    echo "<br><br>";
                                    echo validation_errors();
                                ?>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class=col-md-4>
                                <label>Kode Member : </label>  
                                <?php 
                                    echo form_input("txtkodemember", $kodemember, ['id'=>'txtkodemember', 'type'=>'email', 'class'=>'form-control']);
                                ?> 
                            </div>
                            <div class=col-md-4>
                                <label>Nama Lengkap : </label>  
                                <?php 
                                    echo form_input("txtnamalengkap", $namamember, ['id'=>'txtemail', 'type'=>'email', 'class'=>'form-control']);
                                ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-4>
                                <label>Alamat Email : </label>
                                <?php 
                                    echo form_input("txtemail", $emailmember, ['id'=>'txtemail', 'type'=>'email', 'class'=>'form-control']);
                                ?>
                            </div>
                            <div class=col-md-4>
                                <label for="inputCity">Kota : </label>
                                <?php 
                                    echo form_input("txtkota", $kotamember, ['id'=>'txtkota', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-4>
                                <label for="inputState">Alamat Rumah :</label>
                                <?php 
                                    echo form_input("txtalamatrumah", $alamatrumahmember, ['id'=>'txtalamatrumah', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                            <div class=col-md-4>
                                <label>Tanggal Lahir :</label>
                                <?php 
                                    echo form_input("txttgllahir", $tanggallahirmember, ['id'=>'txttgllahir', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-4>
                                <label>Nomor Telepon</label>
                                <?php 
                                    echo form_input("txtnotelp", $notelpmember, ['id'=>'txtnotelp', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                            <div class=col-md-4>
                                <label>Status</label>
                                <?php 
                                    echo form_input("txtstatus", $status, ['id'=>'txtstatus', 'type'=>'text', 'class'=>'form-control', 'readonly'=>'readonly']);
                                ?>
                            </div>
                        </div>
                        <br>
                        <br>
                        <?php
                            if($kodemember == "")
                            {
                                echo form_submit("btnRegister", "Registrasi Member", ['id'=>'btnRegister', 'class'=>'btn btn-primary btn-lg']);
                            }
                            else{
                                echo form_submit("btnUpdate", "Perbarui Member", ['id'=>'btnUpdate', 'class'=>'btn btn-primary btn-lg']);
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
