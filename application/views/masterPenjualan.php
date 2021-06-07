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
  $arrmember['NON MEMBER'] = "NON MEMBER";
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
                echo form_button("btnkembali", "Hapus", ["class"=>"btn btn-danger btn-lg"]); 
              echo "</a>";
            ?>
          </div>
        </div>    

        <br>
        <div class="row">
          <div class="col-md-6">
          <label class='judullabel'>Pilih Member : </label>
            <?php 
              echo form_dropdown("txtMember", $arrmember, "" , ['id'=>'txtMember', 'type'=>'text', 'class'=>'form-control','onchange'=>'lihatmember()']);
            ?>
            <table class="table table-splitted">
              <tbody id="divMember">
              </tbody>
            </table>
          </div>
          <div class="col-md-6">
            <label class='judullabel'>Total : </label>
            <?php
                $total = 0; 
                if($this->session->userdata("cart")){
                  $arr = $this->session->userdata("cart");
                  $jum = count($arr);
                  for($i = 0; $i < $jum; $i++) { 
                    $total = $total + $arr[$i][5]; 
                  }
                }  
            ?>
            <table class="table table-splitted" style='font-size: 39px;'>
              <tbody id="divKanan">
                <tr>
                  <th id='divGrandTotal'>Rp. <?php echo $total; ?>,-</th>
                  <?php echo "<input type='hidden' id='txtGrandTotal' value='$total'>"; ?>
                </tr>
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
                  <label class='judullabel'>Nama Menu :</label><br>
                  <?php 
                      echo form_dropdown("dropMakanan",$arrmakanan, "" , ['id'=>'dropMakanan', 'type'=>'text', 'class'=>'form-control','onchange'=>'lihatstok()']);
                  ?>              
                </div>
            </div>
            <br><br>
            <?php 
                echo form_submit("btnTambah", "Tambah", ['id'=>'btnTambah', 'class'=>'btn btn-primary btn-lg']);
                echo form_submit("btnSimpan", "Simpan", ['id'=>'btnSimpan', 'class'=>'btn btn-primary btn-lg','onchange'=>'generatenota()']);
            ?>
        </div>
        <br>
        <div class=col-md-12>
            <div class=col-md-12>
            <?php
                if($this->session->userdata("cart")){
                $arr = $this->session->userdata("cart");
                $jum = count($arr);
                //echo $jum;

                echo "<table class='table table-splitted'>";
                  echo "<tr>";
                  echo "<th class='tengahtulisan'>Nama Bahan </td>";
                  echo "<th class='tengahtulisan'>Jumlah</th>";
                  echo "<th class='tengahtulisan'>Harga</th>";
                  echo "<th class='tengahtulisan'>Total</th>";
                  echo "<th>   </th>"; 
                  echo "</tr>";
                  for($i = 0; $i < $jum; $i+=1){
                      echo "<tr>";
                      echo "<td>".$arr[$i][2]."</td>";
                      echo "<td width='20%'><input type='hidden' name='oldJumlahItemPesan".$i."' id='oldJumlahItemPesan".$i."' value='".$arr[$i][1]."'><input value='".$arr[$i][1]."' style='text-align:center;' type='number' name='txtJumlahItemPesan".$i."' id='txtJumlahItemPesan".$i."' class='form-control' onchange='ubahqty($i)' onkeyup='ubahqty($i)'><input type='hidden' name='txtHargaItem".$i."' id='txtHargaItem".$i."' value='".$arr[$i][5]."'></td>"; 
                      echo "<td width='20%' class='kanantulisan'>".$arr[$i][5]."</td>";
                      echo "<td width='20%' id='divTotal".$i."' class='kanantulisan'>".$arr[$i][5] * $arr[$i][1]."</td>";
                      echo "<td><button onclick=hapuspenjualan($i) type='button' class='btn btn-danger'><i class='icon_trash_alt'></i></button></td>"; 
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

  function ubahqty(no) {
    var old = $("#oldJumlahItemPesan" + no).val(); 
    var qty = $("#txtJumlahItemPesan" + no).val(); 
    var hrg = $("#txtHargaItem" + no).val(); 
    var oldsubtotal = old * hrg; 
    var subtotal = qty * hrg;
    var grandtotal =  $("#txtGrandTotal").val(); 
    //alert(grandtotal + "-" + oldsubtotal + "-" + subtotal); 
    grandtotal = grandtotal - oldsubtotal + subtotal;

    $("#txtGrandTotal").html(grandtotal); 
    $("#divGrandTotal").html("Rp. " + grandtotal + ",-"); 
    $("#divTotal" + no).html(subtotal); 
  }

  function lihatmember()
  {
    var idmember = $("#txtMember").val();
    $.post(myurl + "/Penjualan/getDetailMember",
      { idmember:idmember },
      function(res){
        //alert(res);
        $("#divMember").html(res);
      }
    );
  };

  function hapuspenjualan(no) 
  {
    $.post(myurl + "/PemesananBahan/removeFromCart",
      { no: no },
      function(res){
        alert(res); 
        window.location = myurl + "/Penjualan/index"; 
      }
    );
  }

  $(document).ready(function(){
    lihatmember();
  });
  </script>

</body>
</html>
