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
            <h3 class="page-header"><i class="fa fa fa-bars"></i>Input Supplier</h3>
          </div>
        </div>

        <!-- page start-->      
        <?php 
        echo form_open("Supplier/mastersupplier"); 
        ?>        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row"> 
                            <div class="col-md-4">                  
                                <br>
                                <?php 
                                    echo "<a href='".site_url('Supplier/index')."'>"; 
                                        echo form_button("btntambah", "Kembali", ["class"=>"btn btn-danger"]); 
                                    echo "</a>";
                                    echo "<br><br>";
                                    echo validation_errors();  
                                ?>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class=col-md-4>
                                <label>Kode Supplier : </label>
                                <?php 
                                    echo form_input("txtkodesupplier", $kodesupplier, ['id'=>'txtkodesupplier', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                            <div class=col-md-4>
                                <label>Nama Supplier : </label>
                                <?php 
                                    echo form_input("txtnamasupplier", $namasupplier, ['id'=>'txtnamasupplier', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-4>
                                <label>Contact Person : </label>
                                <?php 
                                    echo form_input("txtcp", $contactperson, ['id'=>'txtcp', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                            <div class=col-md-4>
                                <label>Nomer Telp : </label>
                                <?php 
                                    echo form_input("txtnotelpsupplier", $nomertelp, ['id'=>'txtnotelpsupplier', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                            
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-4>
                                <label>Alamat : </label>
                                <?php 
                                    echo form_input("txtalamatsupplier", $alamat, ['id'=>'txtalamatsupplier', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                            <div class=col-md-4>
                                <label>Kota : </label>
                                <?php 
                                    echo form_input("txtkotasupplier", $kota, ['id'=>'txtkotasupplier', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-4>
                                <label>Status : </label>
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
                            if($kodesupplier == "" ){
                                echo form_submit("btnAdd_Supplier", "Tambah Supplier", ['id'=>'btnAdd_Supplier', 'class'=>'btn btn-success']);
                            }
                            else{
                                echo form_submit("btnUpdate_Supplier", "Update Supplier", ['id'=>'btnUpdate_Supplier', 'class'=>'btn btn-warning']);  
                                echo form_submit("btnRemove_Supplier", "Hapus Supplier", ['id'=>'btnRemove_Supplier  ', 'class'=>'btn btn-danger']);    
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
