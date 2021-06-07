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

<?php
$arrsatuan = array();
foreach($datasatuan->result() as $row)
{
    $arrsatuan[$row->kodesatuan] = $row->namasatuan;
}
?>

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
            <h3 class="page-header" style="color:black"><b><i class="fa fa fa-bars"></i>Input Bahan Makanan</b></h3>
          </div>
        </div>

        <!-- page start-->      
        <?php 
        echo form_open_multipart("Bahan/tambahbahan");
        ?>        
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">                            
                            <div class="col-md-5">                                
                                <?php 
                                    echo "<a href='".site_url('Bahan/index')."'>"; 
                                        echo form_button("btnkembali", "Kembali", ["class"=>"btn btn-lg btn-danger"]); 
                                    echo "</a>"; 
                                    echo "<br><br>";
                                ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class='judullabel'>Kode Bahan : </label>
                                    <?php 
                                        echo form_input("txtkodebahan", $kodebahan, ['id'=>'txtkodebahan', 'type'=>'text', 'class'=>'form-control', 'readonly'=>'readonly']);
                                    ?>
                                    <small id="errorNoList" class="form-text" style="color:red;"></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class='judullabel'>Nama Bahan :</label><br>
                                <?php 
                                    echo form_input("txtnamabahan", $namabahan, ['id'=>'txtnamabahan', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                            <div class="col-md-6">
                                <br><br>
                                <?php echo "<label class='errorlabel'>".form_error('txtnamabahan')."</label>"; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label class='judullabel'>Satuan :</label><br>  
                                <?php 
                                    echo form_dropdown("txtsatuanbahan",$arrsatuan, $satuan, ['id'=>'txtsatuanbahan', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label class='judullabel'>Jenis :</label><br>
                                <?php
                                    $options = [
                                        'BAHAN BAKU'     => 'BAHAN BAKU',
                                        'BAHAN JADI'  => 'BAHAN JADI',
                                    ]; 
                                    echo form_dropdown("txtjenisbahan",$options, $jenis, ['id'=>'txtjenisbahan', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>                            
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label class='judullabel'>Sifat Bahan :</label><br>
                                <?php 
                                if(isset($mudahbusuk)) {
                                    if($mudahbusuk == 0) {
                                        echo "<input type='checkbox' id='chkMudahBusuk' name='chkMudahBusuk' value='1'>
                                        &nbsp;&nbsp;<label class='judullabel' style='color: red;'>Mudah Busuk</label><br>";     
                                    }
                                    else {
                                        echo "<input checked='checked' type='checkbox' id='chkMudahBusuk' name='chkMudahBusuk' value='1'>
                                        &nbsp;&nbsp;<label class='judullabel' style='color: red;'>Mudah Busuk</label><br>";     
                                    }
                                }
                                else {
                                    echo "<input type='checkbox' id='chkMudahBusuk' name='chkMudahBusuk' value='1'>
                                    &nbsp;&nbsp;<label class='judullabel' style='color: red;'>Mudah Busuk</label><br>"; 
                                }
                                ?>
                            </div>                            
                        </div>
                        <br>

                        <br><br>
                        <?php 
                            if($kodebahan == "") {
                                echo form_submit("btnAdd", "Tambah Bahan", ['id'=>'btnAdd', 'class'=>'btn btn-lg btn-primary']);
                            }
                            else {
                                echo form_submit("btnUpdate", "Update Bahan", ['id'=>'btnUpdate', 'class'=>'btn btn-lg btn-primary']);  
                            }
                        ?>
                    </div>
                </div> 
            </div>
            <div class="col-md-6">
            <br><br><br><br>
            <div class="row">
                <div class="col-md-5">
                        <label class='judullabel'>Harga :</label><br>
                        <?php 
                            echo form_input("txthargabahan", $harga, ['id'=>'txthargabahan', 'class'=>'form-control'], 'number');
                        ?>
                    </div>
                    <div class="col-md-6">
                        <br><br>
                        <?php echo "<label class='errorlabel'>".form_error('txthargabahan')."</label>"; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class='judullabel'>Stok :</label><br>
                        <?php 
                            //ini cara lama
                            //echo form_input("txtstokbahan", $stok, ['id'=>'txtstokbahan', 'type'=>'text', 'class'=>'form-control']);
                            if($kodebahan == "") {
                                echo "<input value='1' style='text-align:center;' type='number' name='txtstokbahan' id='txtstokbahan' class='form-control''>";
                            }
                            else
                            {
                                echo "<input value='".$stok."' style='text-align:center;' type='number' name='txtstokbahan' id='txtstokbahan' class='form-control''>";
                            }
                        ?>
                    </div>
                    <div class="col-md-6">
                        <br><br>
                        <?php echo "<label class='errorlabel'>".form_error('txtstokbahan')."</label>"; ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <label class='judullabel'>Foto :</label><br>
                        <!-- <input type='file' name='txtfoto'> -->
                        <?php
                            if($kodebahan == "") {
                                echo form_upload("txtfoto", $foto, ['id'=>'txtfoto', 'type'=>'text', 'class'=>'form-control']);
                            }
                            else {
                                echo "<img src='".base_url('asset/bahan/'.$foto)."' width='100px' height='100px'>";
                                echo "<br><br>";
                                echo form_upload("txtfoto", $foto, ['id'=>'txtfoto', 'type'=>'text', 'class'=>'form-control']);
                            }
                        ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <label class='judullabel'>Status :</label><br>
                        <?php
                            $options = [
                                'AKTIF'     => 'AKTIF',
                                'NONAKTIF'  => 'NONAKTIF',
                            ]; 
                            echo form_dropdown("txtstatusbahan",$options, $status, ['id'=>'txtstatusbahan', 'type'=>'text', 'class'=>'form-control']);
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
