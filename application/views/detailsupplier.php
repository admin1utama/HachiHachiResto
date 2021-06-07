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
  $arrsupp = array();
  foreach($datasupplier->result() as $row)
  {
    $arrsupp[$row->kodesupplier] = $row->namasupplier;
  }

  $arrbahansupp = array();
  foreach($databahansupp->result() as $row)
  {
    $arrbahansupp[$row->kodebahan] = $row->namabahan;
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
            <h3 class="page-header"><i class="fa fa fa-bars"></i>Detail Supplier</h3>
          </div>
        </div>

        <!-- page start-->      
        <?php 
        echo form_open("DetailSupplier/index"); 
        ?>        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                    <div class="row">                            
                            <div class="col-md-5"">                                
                                <br>
                                <?php 
                                    echo "<a href='".site_url('Supplier/index')."'>"; 
                                        echo form_button("btnkembali", "Kembali", ["class"=>"btn btn-danger"]); 
                                    echo "</a>"; 
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">                       
                                <br>
                                <div class="card-body">
                                    <br>
                                    <label>Supplier : </label>
                                    <?php 
                                        echo form_dropdown("txtSupplier", $arrsupp, "" , ['id'=>'txtSupplier', 'type'=>'text', 'class'=>'form-control']);
                                    ?>
                                    <br>
                                    <label>Bahan : </label>
                                    <?php 
                                        echo form_dropdown("txtBahan", $arrbahansupp, "" , ['id'=>'txtBahan', 'type'=>'text', 'class'=>'form-control']);
                                    ?>
                                    <br>                            
                                </div>   
                                    <?php 
                                        echo form_submit("btnTambahDetailSup", "Tambah", ['id'=>'btnTambahDetailSup', 'class'=>'btn btn-success']);      
                                    ?>
                        </div>
                        <div class="col-md-8">                       
                                <br>
                                <table class='table table-striped'>
                                    <tr>
                                        <th>Nama Supplier</th>
                                        <th>Nama Bahan</th>
                                        <th>Status</th>
                                        <th>&nbsp</th>
                                    </tr>
                                    <?php
                                    foreach($datadetail->result() as $row) {
                                        echo "<tr>"; 
                                            echo "<td>".$row->namasupplier."</td>";
                                            echo "<td>".$row->namabahan."</td>"; 
                                            echo "<td>".$row->status."</td>"; 
                                            echo "<td><button type='submit' class='btn btn-danger'><i class='icon_pencil-edit_alt'></i></button></td>"; 
                                        echo "</tr>"; 
                                    }
                                    ?>
                                </table>
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
