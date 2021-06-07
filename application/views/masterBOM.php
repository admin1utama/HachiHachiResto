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
  $arrbahanjadi = array();
  foreach($databahanjadi->result() as $row)
  {
    $arrbahanjadi[$row->kodebahan] = $row->namabahan;
  }

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
            <h3 class="page-header"><i class="fa fa fa-bars"></i>Bill Of Material</h3>
          </div>
        </div>

        <!-- page start-->      
        <?php 
        echo form_open("Bahan/BOM"); 
        ?>        
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">                            
                            <div class="col-md-5"">                                
                                <br>
                                <?php 
                                    echo "<a href='".site_url('Bahan/index')."'>"; 
                                        echo form_button("btnkembali", "Kembali", ["class"=>"btn btn-danger btn-lg"]); 
                                    echo "</a>"; 
                                ?>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class=col-md-12>
                                <div class="form-group">
                                    <label class='judullabel'>Bahan Jadi : </label>
                                    <?php 
                                        echo form_dropdown("dropBahanJadi", $arrbahanjadi, "" , ['id'=>'dropBahanJadi', 'type'=>'text', 'class'=>'form-control','onchange'=>'lihatbom()']);
                                    ?>
                                    <small id="errorNoList" class="form-text" style="color:red;"></small>
                                </div>
                            </div>
                        </div>
                        <br><br><br>
                        <div class="row">
                            <div class=col-md-12>
                                <label class='judullabel'>Bahan Baku :</label><br>
                                <?php 
                                    echo form_dropdown("dropBahanBaku", $arrbahanbaku, "" , ['id'=>'dropBahanBaku', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-12>
                                <label class='judullabel'>Qty :</label><br>
                                <?php 
                                    echo form_input("txtQty", "", ['id'=>'txtQty', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div> 
                        </div>

                        <br><br>
                       <?php 
                            echo form_button("btnSimpanBOM", "Tambah BOM", ['id'=>'btnSimpanBOM', 'class'=>'btn btn-primary btn-lg', 'onclick'=>'insertBom()']);
                        ?>
                    </div>
                </div> 
            </div>
            <div class="col-md-6" style="margin-top: 120px;">
              <table class="table table-splitted">
                <thead>
                  <tr>
                    <th>Nomer</th>
                    <th>Bahan Baku</th>
                    <th>Qty</th>
                  </tr>
                </thead>
                <tbody id="divKanan">
                </tbody>
              </table>
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
  //alert(myurl);

  function hapusbom(kodebom)
  {
    $.post(myurl + "/Bahan/hapusDetailBOM",
      { kodebom:kodebom },
      function(res)
      {
        //alert(res);
        lihatbom();
      }
    );
  }

  function lihatbom()
  {
    var idbahanjadi = $("#dropBahanJadi").val();
    $.post(myurl + "/Bahan/getDetailBOM",
      { idbahanjadi:idbahanjadi },
      function(res){
        //alert(res);
        $("#divKanan").html(res);
      }
    );
  };

  function insertBom()
  {
    //alert("res");
    var idbahanjadi = $("#dropBahanJadi").val();
    var idbahanbaku = $("#dropBahanBaku").val();
    var qty = $("#txtQty").val();
    //alert(idbahanbaku);
    //alert(idbahanjadi);
    //alert(qty);
    $.post(myurl + "/Bahan/insertBOM",
      { idbahanjadi:idbahanjadi, idbahanbaku: idbahanbaku, qty: qty },
      function(res){
        //alert(res);
        lihatbom();
      }
    );
  };

  $(document).ready(function(){
    lihatbom();
  });
  </script>

</body>
</html>
