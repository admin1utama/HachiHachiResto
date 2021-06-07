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
            <h3 class="page-header" style="color:black"><b><i class="fa fa fa-bars"></i>Laporan Kepala Gudang</b></h3>
          </div>
        </div>
        <!-- page start-->
        <?php 
        echo form_open("LaporanKepalaGudang/cetak"); 
        ?>          
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                    <label class='judullabel'>Filter Nama : </label>
                                    <?php
                                        echo form_input("txtnama", "", ['id'=>'txtnama', 'type'=>'text', 'class'=>'form-control']);
                                        echo "<br>";
                                        echo form_button("btnLihat", "Lihat", ['id'=>'btnLihat', 'class'=>'btn btn-lg btn-success','onclick'=>'lihat()']);  
                                        echo form_submit("btnPrint", "Cetak", ['id'=>'btnPrint', 'class'=>'btn btn-lg btn-success']);  
                                    ?>
                                </div>
                              </div>
                              <br><br>
                              <div class="row">
                                <div class="col-md-10"> 
                                  <div class="card-body">
                                    <table class="table table-splitted">
                                    <thead>
                                        <tr>
                                        <th class="tengahtulisan">Kode Karyawan</th>
                                        <th class="tengahtulisan">Nama Cabang</th>
                                        <th class="tengahtulisan">Nama Admin</th>
                                        <th class="tengahtulisan">Tanggal Mulai</th>
                                        <th class="tengahtulisan">Nomer Identitas</th>
                                        <th class="tengahtulisan">Nomer Telepon</th>
                                        <th class="tengahtulisan">Jabatan</th>
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
        </div>        
        <?php 
            echo form_close(); 
        ?>    
        <!-- page end-->
      </section>
    </section>
  </section>

  <script language='javascript'>
  var myurl = "<?php echo site_url(); ?>";
  //alert(myurl);

  function lihat()
  {
    var datanama = $("#txtnama").val();
    //alert(datanama);
    $.post(myurl + "/LaporanKepalaGudang/getFilter",
      { datanama:datanama },
      function(res){
        //alert(res);
        $("#divKanan").html(res);
      }
    );
  };

  </script>


  <link href='<?php echo base_url("asset/css/bootstrap.min.css"); ?>'       rel="stylesheet">
  <link href='<?php echo base_url("asset/css/bootstrap-theme.css"); ?>'     rel="stylesheet">
  <link href='<?php echo base_url("asset/css/elegant-icons-style.css"); ?>' rel="stylesheet">
  <link href='<?php echo base_url("asset/css/font-awesome.min.css"); ?>'    rel="stylesheet">
  <link href='<?php echo base_url("asset/css/style-responsive.css"); ?>'    rel="stylesheet">
  <link href='<?php echo base_url("asset/css/style.css"); ?>'               rel="stylesheet">

  <script src='<?php echo base_url("asset/js/jquery.js"); ?>'></script>
  <script src='<?php echo base_url("asset/js/bootstrap.min.js"); ?>'></script>
  <script src='<?php echo base_url("asset/js/jquery.scrollTo.min.js"); ?>'></script>
  <script src='<?php echo base_url("asset/js/jquery.nicescroll.js"); ?>' type="text/javascript"></script>
  <script src='<?php echo base_url("asset/js/scripts.js"); ?>'></script>
</body>
</html>
