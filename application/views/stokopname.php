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
    $arrcabang[$row->kodecabang] = $row->kodecabang." - ".$row->namacabang;
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
            <h3 class="page-header" style="color:black"><b><i class="fa fa fa-bars"></i>Input Bahan Makanan</b></h3>
          </div>
        </div>

        <!-- page start-->      
        <?php 
        echo form_open("Bahan/poststokopname");
        ?>        
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label class='judullabel'>Cabang :</label><br>  
                                <?php 
                                    echo form_dropdown("txtkodecabang",$arrcabang, $kodecabang, ['id'=>'txtkodecabang', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                        </div>
                        <br>
                        <?php 
                            echo form_submit("btnShow", "Show Bahan", ['id'=>'btnShow', 'class'=>'btn btn-lg btn-primary']);
                        ?>
                    </div>
                </div> 
            </div>
            <div class="col-md-6">

            </div>
        </div>    
        <br><br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <?php 
                                echo "<table class='table table-stripped'>"; 
                                    echo "<tr style='color: black;'>"; 
                                        echo "<th>Kode Bahan</th>"; 
                                        echo "<th>Nama Bahan</th>"; 
                                        echo "<th>Stok Gudang</th>"; 
                                        echo "<th>Kartu Stok</th>"; 
                                        echo "<th>Tanggal Kartu Stok</th>"; 
                                        echo "<th>Harga Trans</th>"; 
                                        echo "<th>Harga Avg</th>"; 
                                        echo "<th>&nbsp;</th>"; 
                                    echo "</tr>"; 
                                foreach($datastok as $row) {
                                    if($row->stok != $row->kartustok->stokakhir)  {
                                        echo "<tr style='background: yellow; color: black;'>"; 
                                            echo "<td>".$row->kodebahan."</td>"; 
                                            echo "<td>".$row->namabahan."</td>"; 
                                            echo "<td align='right'>".$row->stok."</td>"; 
                                            echo "<td align='right'>".$row->kartustok->stokakhir."</td>"; 
                                            echo "<td align='right'>".$row->kartustok->tanggal."</td>"; 
                                            echo "<td align='right'>".number_format($row->kartustok->hargatrans)."</td>"; 
                                            echo "<td align='right'>".number_format($row->kartustok->hargaavg)."</td>"; 
                                            echo "<td align='right'><input id='tombol".$row->kodebahan."' type='button' class='btn btn-primary' value='Lakukan Penyesuaian' onclick=penyesuaian('".$row->kodebahan."#".$row->stok."#".$row->kartustok->stokakhir."#".$kodecabang."')></td>"; 
                                        echo "</tr>"; 
                                    }
                                    else {
                                        echo "<tr>"; 
                                            echo "<td>".$row->kodebahan."</td>"; 
                                            echo "<td>".$row->namabahan."</td>"; 
                                            echo "<td align='right'>".$row->stok."</td>"; 
                                            echo "<td align='right'>".$row->kartustok->stokakhir."</td>"; 
                                            echo "<td align='right'>".$row->kartustok->tanggal."</td>"; 
                                            echo "<td align='right'>".number_format($row->kartustok->hargatrans)."</td>"; 
                                            echo "<td align='right'>".number_format($row->kartustok->hargaavg)."</td>"; 
                                            echo "<td align='right'>&nbsp;</td>"; 
                                        echo "</tr>"; 
                                    }
                                }
                                echo "</table>"; 
                                ?>
                            </div>
                        </div>
                        <br>
                    </div>
                </div> 
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
    function penyesuaian(param) {
        var node = param.split("#"); 
        var kodebahan = node[0]; 
        var stokcabang = parseFloat(node[1]); 
        var stokkartu  = parseFloat(node[2]); 
        var kodecabang = node[3]; 
        alert(stokkartu); 
        $.post(myurl + "/Bahan/revisiDataKartuStok",
            { kodecabang: kodecabang, kodebahan: kodebahan, stokcabang: stokcabang, stokkartu: stokkartu },
            function(res){
                $("#tombol" + kodebahan).css("display", "none"); 
            }
        );
    }
  </script>
</body>
</html>
