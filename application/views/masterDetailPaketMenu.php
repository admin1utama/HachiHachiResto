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
            <h3 class="page-header"><i class="fa fa fa-bars"></i>Paket Menu</h3>
          </div>
        </div>

        <!-- page start-->      
        <?php 
            echo form_open("PaketMenu/index"); 
        ?>        
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                    <div class="row">                            
                            <div class="col-md-5"">                                
                                <br>
                                <?php 
                                    echo "<a href='".site_url('PaketMenu/index')."'>"; 
                                        echo form_button("btnkembali", "Kembali", ["class"=>"btn btn-danger"]); 
                                    echo "</a>"; 
                                ?>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class=col-md-12>
                                <div class="form-group">
                                    <label>Kode Paket : </label>
                                    <?php 
                                        echo form_input("txtkodepaket", $kodepaket, ['id'=>'txtkodepaket', 'type'=>'text', 'class'=>'form-control']);
                                    ?>
                                    <small id="errorNoList" class="form-text" style="color:red;"></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=col-md-12>
                                <label>Nama Paket :</label><br>
                                <?php 
                                    echo form_input("txtnamapaket", $namapaket , ['id'=>'txtnamapaket', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-12>
                                <label>Harga :</label><br>
                                <?php 
                                    echo form_input("txthargapaket", $harga, ['id'=>'txthargapaket', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-12>
                                <label>Status :</label><br>
                                <?php 
                                    echo form_input("txtstatus", $status, ['id'=>'txtstatus', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-12>
                                <label>Bahan Jadi :</label><br>
                                  <?php 
                                      echo form_dropdown("dropBahanJadi", $arrbahanjadi, "" , ['id'=>'dropBahanJadi', 'type'=>'text', 'class'=>'form-control','onchange'=>'lihatbom()']);
                                  ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-12>
                                <label>Qty :</label><br>
                                <?php 
                                        echo form_input("txtQty", "" , ['id'=>'txtQty', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                        </div>
                        <br><br>
                        <?php      
                            if($kodepaket == "")
                            {
                              echo form_submit("btnAddPaket", "Tambah Paket Menu", ['id'=>'btnAddPaket', 'class'=>'btn btn-success']);
                            }
                            else
                            {
                              echo form_submit("btnUpdatePaket", "Update Paket Menu", ['id'=>'btnAddPaket', 'class'=>'btn btn-success']);
                              echo form_button("btnIsiPaket", "Tambah Isi Paket", ['id'=>'btnIsiPaket', 'class'=>'btn btn-success', 'onclick'=>'insertdetail_isiPaket()']);
                            }
                        ?>
                    </div>
                </div>
                <br><br>
                 
            </div>
            <div class="col-md-6">
              <table class="table table-splitted">
                <thead>
                  <tr>
                    <th>Nomer</th>
                    <th>Nama Bahan</th>
                    <th>Harga Bahan</th>
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
  alert(myurl);


  function loaddata()
  {
    alert("test");
    var idkodepaket = $("#txtkodepaket").val();
    alert(idkodepaket);
    $.post(myurl + "/PaketMenu/getDetailPaketMenu",
      { idkodepaket:idkodepaket },
      function(res){
        //alert(res);
        $("#divKanan").html(res);
      }
    );
  }

  function insertdetail_isiPaket()
  {
    //alert("res");
    var idbahanjadi = $("#dropBahanJadi").val();
    var idkodepaket = $("#txtkodepaket").val();
    var idqty = $("#txtQty").val();
    //alert(idbahanjadi);
    $.post(myurl + "/PaketMenu/insertisiDetail",
      { idbahanjadi:idbahanjadi, idkodepaket:idkodepaket, idqty:idqty },
      function(res){
        //alert(res);
        loaddata();
      }
    );
  }

  function hapusdetailpaket_isi(kodedetailpaket)
  {
    alert("ini delete");
    $.post(myurl + "/PaketMenu/hapusDetailpaket_ISI",
      { kodedetailpaket:kodedetailpaket },
      function(res)
      {
        alert(res);
        loaddata();
      }
    );
  }

  
  $(document).ready(function(){
    loaddata();
  });

  </script>
</body>
</html>