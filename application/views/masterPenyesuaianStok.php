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
  $arrbahanbaku = array();
  foreach($databahanbaku->result() as $row)
  {
    $arrbahanbaku[$row->kodebahan] = $row->namabahan;
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
            <h3 class="page-header"><i class="fa fa fa-bars"></i>Penyesuaian Stok</h3>
          </div>
        </div>

        <!-- page start-->      
        <?php 
        echo form_open("PenyesuaianStok/tambahpenyesuaian"); 
        ?>        
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">                            
                            <div class="col-md-5"">                                
                                <br>
                                <?php 
                                    echo "<a href='".site_url('PenyesuaianStok/index')."'>"; 
                                        echo form_button("btnkembali", "Kembali", ["class"=>"btn btn-danger"]); 
                                    echo "</a>"; 
                                ?>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class=col-md-12>
                                <label>Bahan Baku :</label><br>
                                <?php 
                                    echo form_dropdown("dropBahanBaku",$arrbahanbaku, "" , ['id'=>'dropBahanBaku', 'type'=>'text', 'class'=>'form-control','onchange'=>'lihatstok()']);
                                ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-12>
                                <table class="table table-splitted">
                                        <tbody id="divStok">
                                        </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class=col-md-12>
                                <label>Stok Akhir :</label><br>
                                <?php 
                                    echo form_input("txtakhir", "", ['id'=>'txtakhir', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div> 
                        </div>
                        <div class="row">
                            <div class=col-md-12>
                                <label>Alasan :</label><br>
                                <?php 
                                    echo form_input("txtAlasan", "", ['id'=>'txtAlasan', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div> 
                        </div>
                        <br><br>
                       <?php 
                            echo form_submit("btnSimpan", "Simpan", ['id'=>'btnSimpan', 'class'=>'btn btn-success']);
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

  <script language='javascript'>
  var myurl = "<?php echo site_url(); ?>";
  alert(myurl);

  function lihatstok()
  {
    alert("masuk sini");
    var idbahan = $("#dropBahanBaku").val();
    alert(idbahan);
    $.post(myurl + "/PenyesuaianStok/getStok",
      { idbahan:idbahan },
      function(res){
        //alert(res);
        $("#divStok").html(res);
      }
    );
  };

  $(document).ready(function(){
    lihatstok();
  });
  </script>

</body>
</html>
