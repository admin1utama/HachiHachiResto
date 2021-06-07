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
  $arrmember = array();
  foreach($datamember->result() as $row)
  {
    $arrmember[$row->kodemember] = $row->namamember;
  }

  $arrmakanan = array();
  foreach($databahanjadi->result() as $row)
  {
    $arrmakanan[$row->kodebahan] = $row->namabahan;
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
            <h3 class="page-header"><i class="fa fa fa-bars"></i>Master Penjualan</h3>
            <?php
            $tanggalan = date("d F Y, H:i");
            echo $tanggalan;
            ?>
          </div>
        </div>

        <!-- page start-->      
        <?php 
        echo form_open("Penjualan/index"); 
        ?>
        <div class="row">                            
          <div class="col-md-6">                                
            <br>
            <?php 
              echo "<a href='".site_url('Penjualan/index')."'>"; 
              echo form_button("btnkembali", "Hapus", ["class"=>"btn btn-danger"]); 
              echo "</a>";
            ?>
          </div>
        </div>    

        <br>

        <div class="row">
          <div class="col-md-6">
          <label>Pilih Member : </label>
            <?php 
              echo form_dropdown("txtMember", $arrmember, "" , ['id'=>'txtMember', 'type'=>'text', 'class'=>'form-control','onchange'=>'lihatmember()']);
            ?>
            <table class="table table-splitted">
              <tbody id="divMember">
              </tbody>
            </table>
          </div>
          <div class="col-md-6">
            <label>Total : </label>
            <?php 
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
                  <label>Nama Menu :</label><br>
                  <?php 
                      echo form_dropdown("dropMakanan",$arrmakanan, "" , ['id'=>'dropMakanan', 'type'=>'text', 'class'=>'form-control','onchange'=>'lihatstok()']);
                  ?>              
                </div>
            </div>
            <br><br>
            <?php 
                echo form_submit("btnTambah", "Tambah", ['id'=>'btnTambah', 'class'=>'btn btn-success']);
                echo form_submit("btnSimpan", "Simpan", ['id'=>'btnSimpan', 'class'=>'btn btn-success','onchange'=>'generatenota()']);
            ?>
        </div>
        <br>
        <div class=col-md-12>
            <div class=col-md-12>
            <?php
                if($this->session->userdata("cart")){
                $arr = $this->session->userdata("cart");
                $jum = count($arr);
                echo $jum;

                echo "<table class='table table-splitted'>";
                echo "<tr>";
                echo "<th class='tengahtulisan' width=500>Nama Bahan </td>";
                echo "<th class='tengahtulisan' width=500>Jumlah</th>";
                echo "<th class='tengahtulisan' width=500>Harga</th>";
                echo "<th class='tengahtulisan' width=500>Total</th>";
                echo "<th width=500>   </th>"; 
                echo "</tr>";
                for($i = 0; $i < $jum; $i+=1){
                    echo "<tr>";
                    echo "<td width=500>".$arr[$i][2]."</td>";
                    echo "<td>".form_input("txtJumlahItemPesan".$i, "1", ['id'=>'txtJumlahItemPesan', 'type'=>'number', 'class'=>'form-control'])."</td>";
                    echo "<td class='kanantulisan' width=500>".number_format($arr[$i][5])."</td>";
                    echo "<td class='kanantulisan' width=500>".number_format($arr[$i][5])."</td>";
                    echo "<td><button onclick=hapusbom() type='button' class='btn btn-danger'><i class='icon_trash_alt'></i></button></td>"; 
                    echo "</tr>";
                }
                echo "</table>";
                }
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

  function lihatmember()
  {
    alert("masuk sini");
    var idmember = $("#txtMember").val();
    alert(idmember);
    $.post(myurl + "/Penjualan/getDetailMember",
      { idmember:idmember },
      function(res){
        //alert(res);
        $("#divMember").html(res);
      }
    );
  };

  $(document).ready(function(){
    lihatmember();
  });
  </script>

</body>
</html>
