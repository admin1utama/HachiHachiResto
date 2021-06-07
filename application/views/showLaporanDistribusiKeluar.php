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
  $arrcabang = array();
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
            <h3 class="page-header" style="color:black"><b><i class="fa fa fa-bars"></i>Laporan Distribusi Keluar</b></h3>
          </div>
        </div>
        <!-- page start-->
        <?php 
        echo form_open("LaporanDistribusiKeluar/cetakdetail");
        //echo form_hidden("kode",$row->nomernota); 
        ?>          
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                  <label class="judullabel">Cabang :</label><br>
                                    <?php
                                        echo form_dropdown("dropCabang",$arrcabang, "" , ['id'=>'dropCabang', 'type'=>'text', 'class'=>'form-control']);
                                    ?>
                                    <br>
                                    <label class='judullabel'>Awal : </label>
                                    <?php
                                        echo "<input type='date' value='".date("Y-m-d")."'name='txttglawal' id='txttglawal' class='form-control'>"; 
                                        //echo form_input("txttglawal", "", ['id'=>'txttglawal', 'type'=>'text', 'class'=>'form-control']);
                                        echo "<br>";
                                    ?>
                                    <label class='judullabel'>Akhir : </label>
                                    <?php
                                        echo "<input type='date' value='".date("Y-m-d")."'name='txttglakhir' id='txttglakhir' class='form-control'>"; 
                                        //echo form_input("txttglakhir", "", ['id'=>'txttglakhir', 'type'=>'text', 'class'=>'form-control']);
                                        echo "<br>";
                                         echo form_button("btnLihat", "Lihat", ['id'=>'btnLihat', 'class'=>'btn btn-lg btn-success','onclick'=>'lihattransaksi()']);  
                                         //echo form_submit("btnPrint", "Cetak", ['id'=>'btnPrint', 'class'=>'btn btn-lg btn-success']);  
                                    ?>
                                </div>
                              </div>
                              <br><br>
                              <div class="row">
                                <div class="col-md-12"> 
                                  <div class="card-body">
                                    <table class="table table-splitted">
                                    <!-- <thead>
                                        <tr>
                                        <th class="tengahtulisan">Nomer Nota</th>
                                        <th class="tengahtulisan">Tanggal</th>
                                        <!-- <th class="tengahtulisan">Satuan</th>
                                        <th class="tengahtulisan">Jenis</th>
                                        <th class="tengahtulisan">Harga</th>
                                        <th class="tengahtulisan">Jumlah Stok</th>
                                        </tr>
                                    </thead> -->
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

  function lihattransaksi()
  {
    var kodecabang = $("#dropCabang").val(); 
    var tglawal = $("#txttglawal").val();
    var tglakhir = $("#txttglakhir").val();
    //alert(tglawal);
    //alert(tglakhir);
    $.post(myurl + "/LaporanDistribusiKeluar/getFilter",
      { kodecabang: kodecabang, tglawal:tglawal, tglakhir:tglakhir },
      function(res){
        //alert(res);
        if(res == "") { $("#divKanan").html("no transaction"); }
        else { $("#divKanan").html(res); }
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
