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
            <h3 class="page-header" style="color:black"><b><i class="fa fa fa-bars"></i>Detail Paket Menu</b></h3>
          </div>
        </div>
        <!-- page start-->      
        <?php 
            echo form_open("Paketmenu/index"); 
        ?>        
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                    <div class="row">                            
                            <div class="col-md-5"">                                
                                <br>
                                <?php 
                                    echo "<a href='".site_url('Paketmenu/index')."'>"; 
                                        echo form_button("btnkembali", "Kembali", ["class"=>"btn btn-lg btn-danger"]); 
                                    echo "</a>"; 
                                ?>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class=col-md-4>
                                <div class="form-group">
                                    <label class='judullabel'>Kode Paket : </label>
                                    <?php 
                                        echo form_input("txtkodepaket", $kodepaket, ['readonly'=>'readonly', 'id'=>'txtkodepaket', 'type'=>'text', 'class'=>'form-control']);
                                    ?>
                                    <small id="errorNoList" class="form-text" style="color:red;"></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=col-md-8>
                                <label class='judullabel'>Nama Paket :</label><br>
                                <?php 
                                    echo form_input("txtnamapaket", $namapaket , ['id'=>'txtnamapaket', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-4>
                                <label class='judullabel'>Harga :</label><br>
                                <?php 
                                    echo form_input("txthargapaket", $harga, ['id'=>'txthargapaket', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-4>
                                <label class='judullabel'>Status :</label><br>
                                <?php 
                                  $arr = array(); 
                                  $arr['AKTIF'] = "AKTIF"; 
                                  $arr['NONAKTIF'] = "NONAKTIF"; 

                                  echo form_dropdown("txtstatus", $arr, $status, ['id'=>'txtstatus', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                        </div>
                        <br><br>
                        <?php      
                            if($kodepaket == "")
                            {
                              echo form_submit("btnAddPaket", "Tambah Paket Menu", ['id'=>'btnAddPaket', 'class'=>'btn btn-lg btn-primary']);
                            }
                            else
                            {
                              echo form_submit("btnUpdatePaket", "Update Paket Menu", ['id'=>'btnAddPaket', 'class'=>'btn btn-lg btn-primary']);
                            }
                        ?>
                    </div>
                </div>
                <br><br>
                 
            </div>
            <div class="col-md-6" style="margin-top: 120px;">
              <div class="row">
                  <div class=col-md-12>
                      <label class='judullabel'>Bahan Jadi :</label><br>
                        <?php 
                            echo form_dropdown("dropBahanJadi", $arrbahanjadi, "" , ['id'=>'dropBahanJadi', 'type'=>'text', 'class'=>'form-control','onchange'=>'lihatbom()']);
                        ?>
                  </div>
              </div>
              <br>
              <div class="row">
                  <div class=col-md-4>
                      <label class='judullabel'>Qty :</label><br>
                      <?php 
                          //echo form_input("txtQty", "" , ['id'=>'txtQty', 'type'=>'text', 'class'=>'form-control']);
                          //kalau pakai spinner yang bawah 128 ini di buka remarknya
                          echo "<input value='1' style='text-align:center;' type='number' name='txtQty' id='txtQty' class='form-control''>";
                      ?>
                  </div>
              </div>
              <br><br>
              <?php 
                echo form_button("btnIsiPaket", "Tambah Isi Paket", ['id'=>'btnIsiPaket', 'class'=>'btn btn-success btn-lg', 'onclick'=>'insertdetail_isiPaket()']);
              ?>


              <br><br><br>
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
  //alert(myurl);


  function loaddata()
  {
    //alert("test");
    var idkodepaket = $("#txtkodepaket").val();
    //alert(idkodepaket);
    $.post(myurl + "/Paketmenu/getDetailPaketMenu",
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
    $.post(myurl + "/Paketmenu/insertisiDetail",
      { idbahanjadi:idbahanjadi, idkodepaket:idkodepaket, idqty:idqty },
      function(res){
        //alert(res);
        loaddata();
      }
    );
  }

  function hapusdetailpaket_isi(kodedetailpaket)
  {
    //alert("ini delete");
    $.post(myurl + "/Paketmenu/hapusDetailpaket_ISI",
      { kodedetailpaket:kodedetailpaket },
      function(res)
      {
        //alert(res);
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
