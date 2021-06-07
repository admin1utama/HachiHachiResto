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
            <h3 class="page-header"><i class="fa fa fa-bars"></i>Master Permintaan Bahan Outlet</h3>
          </div>
        </div>

        <!-- page start-->      
        <?php 
        echo form_open("PermintaanBahanOutlet/tambahPermintaan"); 
        ?>
        <div class="row">                            
          <div class="col-md-6">                                
            <br>
            <?php 
              echo "<a href='".site_url('PermintaanBahanOutlet/index')."'>"; 
              echo form_button("btnkembali", "Kembali", ["class"=>"btn btn-danger"]); 
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
                  <th><h5>Nomer Nota: </th></h5>
                </tr>
                <tr>
                  <th><h5>Tanggal: </th></h5>
                  <td>                      
                      <?php 
                        echo form_input("txtdate", "", ['id'=>'txtdate', 'type'=>'text', 'class'=>'form-control']);
                      ?>
                  </td>
                </tr>

              </thead>
            </table>
          </div>
          <div class="col-md-6">
            <label>Cabang : </label>
            <?php 
              echo form_dropdown("txtcabang", $arrcabang, "" , ['id'=>'txtcabang', 'type'=>'text', 'class'=>'form-control','onchange'=>'lihatsupplier(),lihatbahan()']);
            ?>
            <table class="table table-splitted">
              <tbody id="divKanan">
              </tbody>
            </table>
          </div>
        </div>
        <br>
        <div class='row'>
            <!-- bagian kedua -->
            <div class="col-md-12">
              <div class="row">
                <div class=col-md-6>
                  <label>Bahan Baku :</label><br>
                  <?php 
                      echo form_dropdown("dropBahanBaku", $arrbahanbaku, "" , ['id'=>'dropBahanBaku', 'type'=>'text', 'class'=>'form-control','onchange'=>'lihatstok()']);
                  ?>
                  <!-- ini buat stok-->
                  <table class="table table-splitted">
                    <tbody id="divStok">
                    </tbody>
                  </table>
                  <label>Qty :</label><br>
                    <?php 
                        echo form_input("txtQtyPemesanan", "", ['id'=>'txtQtyPemesanan', 'type'=>'text', 'class'=>'form-control']);
                    ?>
                  <!-- batas-->                 
                </div>
                <div class=col-md-6>
                  <div class=col-md-12>
                    <?php
                      if($this->session->userdata("cart")){
                      $arr = $this->session->userdata("cart");
                      $jum = count($arr);
                      //echo $jum;

                      echo "<table class='table table-splitted'>";
                      echo "<tr>";
                        echo "<th width=500>Nama Bahan </td>";
                        echo "<th width=500>Satuan </th>";
                        echo "<th width=500>Qty </th>";
                        //echo "<th width=500>Harga </th>";
                        echo "<th width=500>   </th>"; 
                      echo "</tr>";
                      for($i = 0; $i < $jum; $i+=1){
                          echo "<tr>";
                            echo "<td width=500>".$arr[$i][2]."</td>";
                            echo "<td width=500>".$arr[$i][3]."</td>";
                            echo "<td width=500>".$arr[$i][1]."</td>";
                            //echo "<td width=500>".$arr[$i][5]."</td>";
                            echo "<td><button onclick=hapusbom() type='button' class='btn btn-danger'><i class='icon_trash_alt'></i></button></td>"; 
                          echo "</tr>";
                      }
                      echo "</table>";
                      }
                    ?>
                  </div>     
                </div>
            </div>
            <br><br>
            <?php 
                echo form_submit("btnTambah", "Tambah", ['id'=>'btnTambah', 'class'=>'btn btn-success']);
                //echo form_submit("btnSimpan", "Simpan", ['id'=>'btnSimpan', 'class'=>'btn btn-success','onchange'=>'generatenota()']);
                echo form_submit("btnSimpan", "Simpan", ['id'=>'btnSimpan', 'class'=>'btn btn-success']);
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

  function lihatsupplier()
  {
    //alert("masuk sini");
    var idcabang = $("#txtcabang").val();
    //alert(idcabang);
    $.post(myurl + "/PermintaanBahanOutlet/getDetailCabang",
      { idcabang:idcabang },
      function(res){
        //alert(res);
        $("#divKanan").html(res);
      }
    );
  };

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
  };

  $(document).ready(function(){
    lihatsupplier();
    lihatstok();
  });
  </script>

</body>
</html>
