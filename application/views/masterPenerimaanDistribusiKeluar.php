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
            <h3 class="page-header" style="color:black"><b><i class="fa fa fa-bars"></i>Transaksi Penerimaan Distribusi Keluar</b></h3>
          </div>
        </div>

        <!-- page start-->      
        <?php 
        echo form_open("DistribusiKeluar/penerimaan"); 
        ?>
        <div class="row">                            
          <div class="col-md-6">                                
            <br>
            <?php 
              echo "<a href='".site_url('DistribusiKeluar/index')."'>"; 
              echo form_button("btnkembali", "Kembali", ["class"=>"btn btn-danger btn-lg"]); 
              echo "</a>";
            ?>
          </div>
        </div>    

        <br>

        <div class="row">
          <div class="col-md-6">
            <table class="table table-splitted">
              <thead>
                <tr>
                  <th><h5 class='judullabel'>Nomer Nota Penerimaan Distribusi Keluar: </th></h5>             
                  <td>                      
                      <?php 
                        echo form_input("txtNoPenerimaan", "", ['id'=>'txtNoPenerimaan', 'type'=>'text', 'class'=>'form-control', 'readonly'=>'readonly']);
                      ?>
                  </td>
                </tr>
                <tr>
                  <th><h5 class='judullabel'>Nomer Nota Distribusi Keluar: </th></h5>             
                  <td>                      
                      <?php 
                        echo form_input("txtNoNotaDisKeluar", $nomernota, ['id'=>'txtNoNotaDisKeluar', 'type'=>'text', 'class'=>'form-control', 'readonly'=>'readonly']);
                      ?>
                  </td>
                </tr>
                <tr>
                  <th><h5 class='judullabel'>Tanggal: </th></h5>
                  <td>                      
                      <?php 
                        echo form_input("txtdate", date("Y-m-d"), ['id'=>'txtdate', 'type'=>'text', 'class'=>'form-control', 'readonly'=>'readonly']);
                      ?>
                  </td>
                </tr>
                <tr>
                  <th><h5 class='judullabel'>Status: </th></h5>
                  <td>
                  <?php
                        echo form_input("txtStatus", $status, ['id'=>'txtStatus', 'type'=>'text', 'class'=>'form-control', 'readonly'=>'readonly']);
                  ?>
                  </td>
                </tr>
              </thead>
            </table>
          </div>
        </div>
        <div class='row'>
          <div class="col-md-6">
            <label class='judullabel'>Dari : </label>
            <?php 
              echo "<input type='hidden' value='$kodecabangasal' id='txtCabAsal' name='txtCabAsal'>"; 
            ?>
            <table class="table table-splitted">
              <tbody id="divKanan">
              </tbody>
            </table>
          </div>
          <div class="col-md-6">
            <label class='judullabel'>Ke : </label>
            <?php 
              echo "<input type='hidden' value='$kodecabangtujuan' id='txtCabTujuan' name='txtCabTujuan'>"; 
            ?>
            <table class="table table-splitted">
              <tbody id="divKananTujuan">
              </tbody>
            </table>
          </div>
        </div>
        <br>
        <div class='row'>
            <!-- bagian kedua -->
            <div class="col-md-12">
              <div class="row">
    <!--bekas hapus disini -->
                <div class=col-md-12>
                  <div class=col-md-12>
                    <?php
                     // if($this->session->userdata("cartdetail")){
                      $arr = $this->session->userdata("cart");
                      //print_r($arr);
                      $jum = count($arr);
                      //echo "jumlahnya : ".$jum;

                      echo "<table class='table table-splitted'>";
                      echo "<tr>";
                        echo "<th style='text-align: center;'>Nama Bahan </td>";
                        echo "<th style='text-align: center;'>Satuan </th>";
                        echo "<th style='text-align: center;'>Qty Asal </th>";
                        echo "<th style='text-align: center;' width='10%'>Qty Tujuan</th>"; 
                        //echo "<th style='text-align: center;'>Harga </th>";
                        echo "<th style='text-align: center;'>   </th>"; 
                      echo "</tr>";
                      for($i = 0; $i < $jum; $i+=1){
                          echo "<tr>";
                            echo "<td style='text-align: left;'>".$arr[$i][2]."</td>";
                            echo "<td style='text-align: center;'>".$arr[$i][3]."</td>";
                            echo "<td style='text-align: center;'>".$arr[$i][4]."</td>";
                            echo "<td style='text-align: center;'>".form_input("txtQtyKirim".$i, $arr[$i][4], ['id'=>'txtQtyKirim', 'type'=>'number', 'class'=>'form-control', 'style'=>'text-align: center;'])."</td>";
                            //echo "<td style='text-align: center;'>".$arr[$i][5]."</td>"; 
                          echo "</tr>";
                      }
                      echo "</table>";
                      //}
                    ?>
                  </div>     
                </div>
            </div>
            <?php 
                echo form_submit("btnSimpan", "Lakukan Pengiriman", ['id'=>'btnSimpan', 'class'=>'btn btn-lg btn-primary','onchange'=>'generatenota()']);
            ?>
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

  function lihatcabang()
  {
    var idcabang = $("#txtCabAsal").val();
    $.post(myurl + "/DistribusiKeluar/getDetailCabAsal",
      { idcabang:idcabang },
      function(res){
        $("#divKanan").html(res);
      }
    );

    var idcabangtujuan = $("#txtCabTujuan").val();
    $.post(myurl + "/DistribusiKeluar/getDetailCabAsal",
      { idcabang:idcabangtujuan },
      function(res){
        $("#divKananTujuan").html(res);
      }
    );
  };

  /*function lihatsupplierkiri()
  {
    //alert("masuk sini");
    var idcabang = $("#txtcabangasal").val();
    //alert(idcabang);
    $.post(myurl + "/Distribusi/getDetailCabang",
      { idcabang:idcabang },
      function(res){
        //alert(res);
        $("#divKiri").html(res);
      }
    );
  };

  function hapusdistribusi(no) 
  {
    $.post(myurl + "/PemesananBahan/removeFromCart",
      { no: no },
      function(res){
        //alert(res); 
        window.location = myurl + "/Distribusi/tambahDistribusi"; 
      }
    );
  }
  
  function lihatstok()
  {
    //alert("masuk sini");
    var idbahan = $("#dropBahanBaku").val();
    $.post(myurl + "/PemesananBahan/getStok",
      { idbahan:idbahan },
      function(res){
        //alert(res);
        $("#divStok").html(res);
      }
    );
  }*/

  $(document).ready(function(){
    lihatcabang();
    //lihatsupplierkiri();
    //lihatstok();
  });
  </script>

</body>
</html>
