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

  $arrKonversi1 = array();
  foreach($datakonversisatuan->result() as $row)
  {
    $arrKonversi1[$row->kodesatuan] = $row->namasatuan;
  }

  $arrKonversi2 = array();
  foreach($datakonversisatuan->result() as $row)
  {
    $arrKonversi2[$row->kodesatuan] = $row->namasatuan;
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
            <h3 class="page-header" style="color:black"><b><i class="fa fa fa-bars"></i>Insert Konversi</b></h3>
          </div>
        </div>

        <!-- page start-->      
        <?php 
        echo form_open("Konversi/tambahkonversi"); 
        ?>        
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">                            
                            <div class="col-md-5">                                
                                <br>
                                <?php 
                                    echo "<a href='".site_url('Konversi/index')."'>"; 
                                        echo form_button("btnkembali", "Kembali", ["class"=>"btn btn-lg btn-danger"]); 
                                    echo "</a>";
                                    //echo validation_errors();  
                                ?>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class=col-md-6>
                                <div class="form-group">
                                <label class='judullabel'>Bahan Baku :</label><br>
                                <?php 
                                    echo form_dropdown("dropBahanBaku", $arrbahanbaku, "" , ['id'=>'dropBahanBaku', 'type'=>'text', 'class'=>'form-control','onchange'=>'lihatkonversi()']);
                                ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=col-md-3>
                            <label class='judullabel'>Satuan Awal :</label><br>
                                <?php 
                                    //echo form_input("txtPertama", "", ['id'=>'txtPertama', 'type'=>'text', 'class'=>'form-control']);
                                    echo form_dropdown("txtPertama", $arrKonversi1, "" , ['id'=>'txtPertama', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-3>
                            <label class='judullabel'>Satuan Tujuan :</label><br>
                                <?php 
                                    echo form_input("txtKedua", "", ['id'=>'txtKedua', 'type'=>'text', 'class'=>'form-control', 'readonly'=>'readonly']);
                                    // echo form_dropdown("txtKedua", $arrKonversi2, "" , ['id'=>'txtKedua', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div> 
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-3>
                            <label class='judullabel'>Nilai Konversi :</label><br>
                                <?php 
                                    echo form_input("txtNilaiKonversi", "", ['id'=>'txtNilaiKonversi', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div> 
                        </div>
                        <br><br>
                       <?php 
                            echo form_button("btnSimpanKonversi", "Tambah Konversi", ['id'=>'btnSimpanKonversi', 'class'=>'btn btn-lg btn-primary', 'onclick'=>'insertKonversi()']);
                        ?>
                    </div>
                </div> 
            </div>
            <div class="col-md-6">
              <table class="table table-splitted" style="margin-top: 120px;">
                <thead>
                  <tr>
                    <th>Nomer</th>
                    <th>Bahan Baku</th>
                    <th>Konversi Pertama</th>
                    <th>Konversi Kedua</th>
                    <th>Nilai Konversi</th>
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

  function hapuskonversi(kodekonversi)
  {
    alert("masuk");
    $.post(myurl + "/Konversi/hapusDetailKonversi",
      { kodekonversi:kodekonversi },
      function(res)
      {
        alert(res);
        lihatkonversi();
      }
    );
  }

  function lihatkonversi()
  {
    var idbahanbaku = $("#dropBahanBaku").val();
    $.post(myurl + "/Konversi/getDetailKonversi",
      { idbahanbaku:idbahanbaku },
      function(res){
        //alert(res);
        $("#divKanan").html(res);
      }
    );
    $.post(myurl + "/Konversi/getSatuanBahan",
      { idbahanbaku:idbahanbaku },
      function(res){
        $("#txtKedua").val(res);
      }
    );
  };

  function insertKonversi()
  {
    var idbahanbaku     = $("#dropBahanBaku").val();
    var idtxtPertama    = $("#txtPertama").val();
    var idtxtKedua      = $("#txtKedua").val();
    var idtxtNilai      = $("#txtNilaiKonversi").val();

    if(idtxtNilai=="")
    { alert("Nilai Konversi Harus Diisikan"); }
    else
    {
      $.post(myurl + "/Konversi/insertKonversi",
        { idbahanbaku: idbahanbaku, idtxtPertama: idtxtPertama, idtxtKedua: idtxtKedua, idtxtNilai,idtxtNilai },
        function(res){
          //alert(res);
          lihatkonversi();
        }
      );
    }
  };

  $(document).ready(function(){
    lihatkonversi();
  });
</script>

</body>
</html>
