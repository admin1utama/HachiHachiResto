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
            <h3 class="page-header"><i class="fa fa fa-bars"></i>Master Distribusi</h3>
          </div>
        </div>

        <!-- page start-->      
        <?php 
        echo form_open("Distribusi/tambahdistribusi"); 
        ?>
        <div class="row">                            
          <div class="col-md-6">                                
            <br>
            <?php 
              echo "<a href='".site_url('Distribusi/index')."'>"; 
              echo form_button("btnkembali", "Kembali", ["class"=>"btn btn-danger btn-lg"]); 
              echo "</a>";
            ?>
          </div>
        </div>    

        <br>

        <div class="row">
          <div class="col-md-6">
          <!-- zzz kedua -->
          <label class='judullabel'>Asal : </label>
            <?php 
              echo form_dropdown("txtcabangasal", $arrcabang, "" , ['id'=>'txtcabangasal', 'type'=>'text', 'class'=>'form-control','onchange'=>'lihatsupplierkiri()']);
            ?>
            <table class="table table-splitted">
              <tbody id="divKiri">
              </tbody>
            </table>
          </div>
          <div class="col-md-6">
            <label class='judullabel'>Tujuan : </label>
            <?php 
              echo form_dropdown("txtcabangtujuan", $arrcabang, "" , ['id'=>'txtcabangtujuan', 'type'=>'text', 'class'=>'form-control','onchange'=>'lihatsupplier()']);
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
                <div class=col-md-5>
                  <th ><label class='judullabel'>Tanggal: </th></label>
                    <td>
                    <input type='date' name='txtdate' id='txtdate' class='form-control' value='<?php echo date("Y-m-d"); ?>' readonly='readonly'>
                    <hr size='5' style='border:2px solid black;'>
                        <?php 
                          //echo form_input("txtdate", "", ['id'=>'txtdate', 'type'=>'text', 'class'=>'form-control']);
                        ?>
                  </td>

                  <br>
                  <label class='judullabel'>Bahan Baku :</label><br>
                  <?php 
                      echo form_dropdown("dropBahanBaku", $arrbahanbaku, "" , ['id'=>'dropBahanBaku', 'type'=>'text', 'class'=>'form-control','onchange'=>'lihatstok()']);
                  ?>
                  <!-- ini buat stok-->
                  <br>
                  <div class="card" style='margin-left: 10%; width: 60%; background-color: #EAEAB3; padding: 10px; border-radius: 10px;'>
                    <div class="card-body">
                      <p class="card-text">
                        <table class="table">
                          <tbody id="divStok">
                          </tbody>
                        </table>                      
                      </p>
                    </div>
                  </div>

                  <!-- batas-->                 
                </div>
                <div class='col-md-1'></div>
                <br><br><br><br><br>
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
                        echo "<th width=500>Qty Pengiriman </th>";
                        //echo "<th width=500>Harga </th>";
                        echo "<th width=500>   </th>"; 
                      echo "</tr>";
                      for($i = 0; $i < $jum; $i+=1){
                          echo "<tr>";
                            echo "<td width=500>".$arr[$i][2]."</td>";
                            echo "<td width=500>".$arr[$i][3]."</td>";
                            //echo "<td width=500>".$arr[$i][1]."</td>";
                            echo "<td>".form_input("txtqtyasal".$i, "", ['id'=>'txtqtyasal', 'type'=>'number', 'class'=>'form-control'])."</td>";
                            //echo "<td>".form_input("txtqtytujuan".$i, "", ['id'=>'txtqtytujuan ', 'type'=>'number', 'class'=>'form-control'])."</td>";
                            //echo "<td width=500>".$arr[$i][5]."</td>";
                            echo "<td><button onclick=hapusdistribusi($i) type='button' class='btn btn-danger'><i class='icon_trash_alt'></i></button></td>"; 
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
                echo form_submit("btnTambah", "Tambah", ['id'=>'btnTambah', 'class'=>'btn btn-primary btn-lg']);
                echo form_submit("btnSimpan", "Simpan", ['id'=>'btnSimpan', 'class'=>'btn btn-primary btn-lg']);
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
    var idcabang = $("#txtcabangtujuan").val();
    //alert(idcabang);
    $.post(myurl + "/Distribusi/getDetailCabang",
      { idcabang:idcabang },
      function(res){
        //alert(res);
        $("#divKanan").html(res);
      }
    );
  };

  function lihatsupplierkiri()
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
  }

  $(document).ready(function(){
    lihatsupplier();
    lihatsupplierkiri();
    lihatstok();
  });
  </script>

</body>
</html>
