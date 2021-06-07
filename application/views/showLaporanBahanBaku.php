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

  $arrcabang['SEMUA'] = "SEMUA";
  foreach($datacabang->result() as $row)
  {
    $arrcabang[$row->kodecabang] = $row->namacabang;
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
            <h3 class="page-header" style="color:black"><b><i class="fa fa fa-bars"></i>Laporan stok bahan baku</b></h3>
          </div>
        </div>

        <!-- page start-->      
        <?php 
        echo form_open("LaporanBahanBaku/cetak"); 
        ?>        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <br><br>
                        <div class="row">
                            <div class=col-md-4>
                            <label>Bahan Baku :</label><br>
                            <?php
                                echo form_dropdown("dropBahanBaku",$arrbahanbaku, "" , ['id'=>'dropBahanBaku', 'type'=>'text', 'class'=>'form-control']);
                            ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-4>
                            <label>Cabang :</label><br>
                            <?php
                                echo form_dropdown("dropCabang",$arrcabang, "" , ['id'=>'dropCabang', 'type'=>'text', 'class'=>'form-control']);
                            ?>
                            </div>
                        </div>
                        <br>
                        <?php 
                            echo form_button("btnLihat", "Lihat", ['id'=>'btnLihat', 'class'=>'btn btn-success','onclick'=>'lihatstokoulet()']);
                            echo "<a href='#' onclick='printlaporan()'>"; 
                            echo form_button("btnPrint", "Cetak", ['id'=>'btnPrint', 'class'=>'btn btn-success']);  
                            echo "</a>"; 
                        ?>
                        <br><br>
                        <div class="row">
                          <div class=col-md-6>
                            <table class="table table-splitted">
                              <thead>
                                <tr>
                                  <th >No. </th>
                                  <th >Nama Oultet</th>
                                  <th >Nama Bahan</th>
                                  <th class="tengahtulisan">Stok</th>
                                </tr>
                              </thead>
                              <tbody id="divKanan">
                              </tbody>
                            </table>
                          </div>
                        </div>
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

  <script language='javascript'>
  var myurl = "<?php echo site_url(); ?>";
  //alert(myurl);

  function printlaporan() {
    var kodebahan   = $("#dropBahanBaku").val(); 
    var kodecabangg = $("#dropCabang").val(); 
    window.open(myurl + "/LaporanBahanBaku/cetak/" + kodebahan + "/" + kodecabangg, "_blank"); 
  }

  function lihatstokoulet()
  {
    var kodebahan = $("#dropBahanBaku").val();
    var kodecabang = $("#dropCabang").val();
    //alert(kodecabang);
    $.post(myurl + "/LaporanBahanBaku/getDetailStokBahan",
      { kodebahan:kodebahan, kodecabang:kodecabang },
      function(res){
        //alert(res);
        $("#divKanan").html(res);
      }
    );
  };

  $(document).ready(function(){
    lihatstokoulet();
  });

  </script>


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
