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
            <h3 class="page-header" style="color:black"><b><i class="fa fa fa-bars"></i>Insert Member</b></h3>
          </div>
        </div>

        <!-- page start-->      
        <?php 
        echo form_open("Registermember/memberpelanggan"); 
        ?>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row"> 
                            <div class="col-md-4">                  
                                <br>
                                <?php 
                                    echo "<a href='".site_url('Registermember/index')."'>"; 
                                    echo form_button("btntambah", "Kembali", ["class"=>"btn btn-danger btn-lg"]); 
                                echo "</a>"; 
                                ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-4>
                                <label class='judullabel'>Kode Member : </label>
                                <?php 
                                    echo form_input("txtkodemember", $kodemember, ['id'=>'txtkodemember', 'type'=>'email', 'class'=>'form-control','readonly'=>'readonly']);
                                ?> 
                            </div>
                            <div class=col-md-6>
                                <br><br>
                                <?php echo "<label class='errorlabel'>".form_error('txtkodemember')."</label>"; ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-6>
                                <label class='judullabel'>Nama lengkap : </label>
                                <?php 
                                    echo form_input("txtnamalengkap", $namamember, ['id'=>'txtemail', 'type'=>'email', 'class'=>'form-control']);
                                ?>
                            </div>
                            <div class=col-md-6>
                                <br><br>
                                <?php echo "<label class='errorlabel'>".form_error('txtnamalengkap')."</label>"; ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-6>
                                <label class='judullabel'>Alamat Email : </label>
                                <?php 
                                    echo form_input("txtemail", $emailmember, ['id'=>'txtemail', 'type'=>'email', 'class'=>'form-control']);
                                ?>
                            </div>
                            <div class=col-md-6>
                                <br><br>
                                <?php echo "<label class='errorlabel'>".form_error('txtemail')."</label>"; ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-5>
                                <label class='judullabel'>Kota : </label>
                                <?php 
                                    echo form_input("txtkota", $kotamember, ['id'=>'txtkota', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                            <div class=col-md-6>
                                <br><br>
                                <?php echo "<label class='errorlabel'>".form_error('txtkota')."</label>"; ?>
                            </div>
                        </div>
                        <br>
                        <br><br>
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
            <div class="col-md-6">
                <br><br><br><br>
                <div class="row">
                    <div class=col-md-6>
                        <label class='judullabel'>Alamat Rumah : </label>
                        <?php 
                            echo form_input("txtalamatrumah", $alamatrumahmember, ['id'=>'txtalamatrumah', 'type'=>'text', 'class'=>'form-control']);
                        ?>
                    </div>
                    <div class=col-md-6>
                        <br><br>
                        <?php echo "<label class='errorlabel'>".form_error('txtalamatrumah')."</label>"; ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class=col-md-4>
                        <label class='judullabel'>Tanggal Lahir : </label>
                        <?php 
                            //echo form_input("txttgllahir", $tanggallahirmember, ['id'=>'txttgllahir', 'type'=>'text', 'class'=>'form-control']);
                        ?>
                        <input type='date' name='txttgllahir' id='txttgllahir' class='form-control' value='<?php echo date("Y-m-d"); ?>>  
                        
                    </div>
                    <div class=col-md-6>
                        <br><br>
                        <?php echo "<label class='errorlabel'>".form_error('txttgllahir')."</label>"; ?>
                    </div>
                </div>
                </br>
                <div class="row">
                    <div class=col-md-5>
                        <label class='judullabel'>Nomer Telp : </label>
                        <?php 
                            echo form_input("txtnotelp", $notelpmember, ['id'=>'txtnotelp', 'type'=>'text', 'class'=>'form-control']);
                        ?>
                    </div>
                    <div class=col-md-5>
                        <br><br>
                        <?php echo "<label class='errorlabel'>".form_error('txtnotelp')."</label>"; ?>
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
