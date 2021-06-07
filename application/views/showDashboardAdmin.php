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
            <h3 class="page-header" style="color:black"><b><i class="fa fa fa-bars"></i>Dashboard</b></h3>
          </div>
        </div>

        <!-- page start-->      
      
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3" style="margin-top: 1px;">
                            <table class="table table-splitted">
                            <label class='judullabel'>Pengingat Stok Cabang : </label>
                            <?php 
                              echo form_dropdown("txtcabang", $arrcabang, "" , ['id'=>'txtcabang', 'type'=>'text', 'class'=>'form-control','onchange'=>'lihatstok()']);
                            ?>
                              <thead>
                                <tr>
                                  <th>Nama Bahan</th>
                                  <th>Stok</th>
                                </tr>
                              </thead>
                              <tbody id="divKiri">
                              </tbody>
                            </table>
                          </div>  
                            <div class="col-md-8">                                
                                <div class="card-body">
                                <table class='table table-striped'>
                                  <tr>
                                      <td colspan="6" style="font-weight: bold">STATUS PENERIMAAN PEMESANAN BAHAN</td>
                                      <th class="kanantulisan">
                                            <a class="" href="<?php echo site_url('PenerimaanBahan'); ?>">
                                            <span>View All</span>
                                            </a>
                                      </th>
                                    </tr>
                                        <?php
                                        foreach($datapemesananbahan->result() as $row) {
                                            echo form_open("PenerimaanBahan/bukadetail");
                                            //echo form_hidden("kode",$row->nomernota);
                                            echo "<tr>"; 
                                              echo "<th>"; 
                                                echo "<h5 style='color:red; font-weight: bold;'>Nota : ".$row->nomernota."</h5>"; 
                                                echo "<h5 style='font-weight: bold;'>".$row->namasupplier."</h3>"; 
                                                echo "<h5 style='font-weight: bold;'>".$row->kota."</h3>"; 
                                                echo "<h5 style='color:red; font-weight: bold;'>".date("d F Y", strtotime($row->tanggal))."</h5>"; 
                                              echo "</th>";
                                              echo "<th><h5 style='font-weight: bold;'>".$row->jumitem." items</h3><th>";
                                              echo "<th><h5 style='font-weight: bold;'>Rp. ".number_format($row->subtotal).",-</h3><th>";
                                              echo "<th><h5 style='font-weight: bold;'>".$row->status."</h3><th>";
                                            echo "</tr>"; 
                                            echo form_close();
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>        


        <!-- page end-->
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

  function lihatstok()
  {
    //alert("masuk sini");
    var idcabang = $("#txtcabang").val();
    //alert(idcabang);
    $.post(myurl + "/DashboardAdmin/getStokCabang",
      { idcabang:idcabang },
      function(res){
        //alert(res);
        $("#divKiri").html(res);
      }
    );
  };

  $(document).ready(function(){
    lihatstok();
  });
  </script>

</body>
</html>