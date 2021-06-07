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
            <h3 class="page-header" style="color:black"><b><i class="fa fa fa-bars"></i>Input Supplier</b></h3>
          </div>
        </div>

        <!-- page start-->      
        <?php 
        echo form_open("Supplier/mastersupplier"); 
        ?>        
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row"> 
                            <div class="col-md-4">                  
                                <br>
                                <?php 
                                    echo "<a href='".site_url('Supplier/index')."'>"; 
                                        echo form_button("btntambah", "Kembali", ["class"=>"btn btn-danger btn-lg"]); 
                                    echo "</a>";
                                ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-4>
                                <label class='judullabel'>Kode Supplier : </label>
                                <?php 
                                    echo form_input("txtkodesupplier", $kodesupplier, ['id'=>'txtkodesupplier', 'type'=>'text', 'class'=>'form-control','readonly'=>'readonly']);
                                ?>
                            </div>
                            <div class=col-md-6>
                                <br><br>
                                <?php echo "<label class='errorlabel'>".form_error('txtkodesupplier')."</label>"; ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-6>
                                <label class='judullabel'>Nama Supplier : </label>
                                <?php 
                                    echo form_input("txtnamasupplier", $namasupplier, ['id'=>'txtnamasupplier', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                            <div class=col-md-6>
                                <br><br>
                                <?php echo "<label class='errorlabel'>".form_error('txtnamasupplier')."</label>"; ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-5>
                                <label class='judullabel'>Contact Person : </label>
                                <?php 
                                    echo form_input("txtcp", $contactperson, ['id'=>'txtcp', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                            <div class=col-md-6>
                                <br><br>
                                <?php echo "<label class='errorlabel'>".form_error('txtcp')."</label>"; ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-5>
                                <label class='judullabel'>Nomer Telp : </label>
                                <?php 
                                    echo form_input("txtnotelpsupplier", $nomertelp, ['id'=>'txtnotelpsupplier', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                            <div class=col-md-6>
                                <br><br>
                                <?php echo "<label class='errorlabel'>".form_error('txtnotelpsupplier')."</label>"; ?>
                            </div>
                        </div>
                        <br>
                        <br><br>
                        <?php
                            if($kodesupplier == "" ){
                                echo form_submit("btnAdd_Supplier", "Tambah Supplier", ['id'=>'btnAdd_Supplier', 'class'=>'btn btn-primary btn-lg']);
                            }
                            else{
                                echo form_submit("btnUpdate_Supplier", "Update Supplier", ['id'=>'btnUpdate_Supplier', 'class'=>'btn btn-warning']);  
                                echo form_submit("btnRemove_Supplier", "Hapus Supplier", ['id'=>'btnRemove_Supplier  ', 'class'=>'btn btn-danger']);    
                            }
                        ?>
                    </div>
                </div> 
            </div>
            <div class="col-md-6">
                <br><br><br><br><br>
                <div class="row">
                    <div class=col-md-6>
                        <label class='judullabel'>Alamat : </label>
                        <?php 
                            echo form_input("txtalamatsupplier", $alamat, ['id'=>'txtalamatsupplier', 'type'=>'text', 'class'=>'form-control']);
                        ?>
                    </div>
                    <div class=col-md-6>
                        <br><br>
                        <?php echo "<label class='errorlabel'>".form_error('txtalamatsupplier')."</label>"; ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class=col-md-5>
                        <label class='judullabel'>Kota : </label>
                        <?php 
                            echo form_input("txtkotasupplier", $kota, ['id'=>'txtkotasupplier', 'type'=>'text', 'class'=>'form-control']);
                        ?>
                    </div>
                    <div class=col-md-6>
                        <br><br>
                        <?php echo "<label class='errorlabel'>".form_error('txtkotasupplier')."</label>"; ?>
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
