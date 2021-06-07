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
  $arrsupp = array();
  foreach($datasupplier->result() as $row)
  {
    $arrsupp[$row->kodesupplier] = $row->namasupplier;
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
            <h3 class="page-header"><i class="fa fa fa-bars"></i>Master Penerimaan</h3>
          </div>
        </div>

        <!-- page start-->      
        <?php 
        echo form_open("PenerimaanBahan/Penerimaan"); 
        ?>
        <div class="row">                            
          <div class="col-md-6">                                
            <br>
            <?php 
              echo "<a href='".site_url('PenerimaanBahan/index')."'>"; 
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
                  <th><h5>Nomer Nota Penerimaan: </th></h5>             
                  <td>                      
                      <?php 
                        echo form_input("txtNoPenerimaan", "", ['id'=>'txtNoPenerimaan', 'type'=>'text', 'class'=>'form-control', 'readonly'=>'readonly']);
                      ?>
                  </td>
                </tr>
                <tr>
                  <th><h5>Nomer Nota Pemesanan: </th></h5>             
                  <td>                      
                      <?php 
                        echo form_input("txtNoNotaPesan", $nomernota, ['id'=>'txtNoNotaPesan', 'type'=>'text', 'class'=>'form-control', 'readonly'=>'readonly']);
                      ?>
                  </td>
                </tr>
                <tr>
                  <th><h5>Tanggal: </th></h5>
                  <td>                      
                      <?php 
                        echo form_input("txtdate", $tanggal, ['id'=>'txtdate', 'type'=>'text', 'class'=>'form-control', 'readonly'=>'readonly']);
                      ?>
                  </td>
                </tr>
                <tr>
                  <th><h5>Subtotal: </th></h5>
                  <?php
                   echo "<td><h5><b> Rp.".$subtotal."</td><h5></b>";
                  ?>
                </tr>
                <tr>
                  <th><h5>Status: </th></h5>
                  <td>
                  <div class="custom-control custom-radio">
                    <input type="radio" id="satu" name="Status" value="AKTIF" checked class="custom-control-input">
                    <label class="custom-control-label" for="customRadio1">AKTIF</label>
                  </div>
                  </td>
                </tr>
              </thead>
            </table>
          </div>
          <div class="col-md-6">
            <label>Kode Supplier : </label>
            <?php 
              echo form_input("txtSupplier", $supplier , ['id'=>'txtSupplier', 'type'=>'text', 'class'=>'form-control','onchange'=>'lihatsupplier(),lihatbahan()', 'readonly'=>'readonly']);
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
                        echo "<th width=500>Nama Bahan </td>";
                        echo "<th width=500>Satuan </th>";
                        echo "<th width=500>Qty Pemesanan </th>";
                        echo "<th width=500>Qty Penerimaan</th>"; 
                        echo "<th width=500>Harga </th>";
                        echo "<th width=500>   </th>"; 
                      echo "</tr>";
                      for($i = 0; $i < $jum; $i+=1){
                          echo "<tr>";
                            echo "<td width=500>".$arr[$i][2]."</td>";
                            echo "<td width=500>".$arr[$i][3]."</td>";
                            echo "<td width=500>".$arr[$i][4]."</td>";
                            echo "<td>".form_input("txtQtyTerima".$i, "", ['id'=>'txtQtyTerima', 'type'=>'number', 'class'=>'form-control'])."</td>";
                            echo "<td width=500>".$arr[$i][5]."</td>"; 
                          echo "</tr>";
                      }
                      echo "</table>";
                      //}
                    ?>
                  </div>     
                </div>
            </div>
            <br><br>
            <?php 
                echo form_submit("btnSimpan", "Simpan", ['id'=>'btnSimpan', 'class'=>'btn btn-success','onchange'=>'generatenota()']);
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
    var idsupplier = $("#txtSupplier").val();
    //alert(idsupplier);
    $.post(myurl + "/PemesananBahan/getDetailSupplier",
      { idsupplier:idsupplier },
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