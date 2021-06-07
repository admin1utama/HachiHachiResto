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
            <h3 class="page-header" style="color:black"><b><i class="fa fa fa-bars"></i>Penerimaan Permintaan Bahan Cabang</b></h3>
          </div>
        </div>
        <?php 
          if(isset($message)) {
            echo "<div class='row'>"; 
              echo "<div class='col-lg-12'>"; 
                echo "<h5 style='color: red; font-weight: bold;' class='page-header'>$message</h5>"; 
              echo "</div>"; 
            echo "</div>"; 
          }
        ?>

        <!-- page start-->      
       
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                  if($this->session->userdata('jabatan')== "ADMIN")
                                  {
                                    echo "";
                                  }
                                  else
                                  {
                                    echo "<a href='".site_url('PermintaanBahanOutlet/tambahPermintaan')."'>"; 
                                    echo form_button("btntambah", "Tambah Permintaan", ["class"=>"btn btn-danger btn-lg"]);
                                    echo "</a>"; 
                                  } 

                                ?>
                                <br><br><br>
                                <div class="card-body">
                                    <table class='table table-striped'>
                                        <!--<tr>
                                            <th class="tengahtulisan">Nomer Nota</th>
                                            <th class="tengahtulisan">Tanggal</th>
                                            <th class="tengahtulisan">Nama Supplier</th>
                                            <th class="tengahtulisan">Kota</th>
                                            <th class="tengahtulisan">Total</th>
                                            <th class="tengahtulisan">&nbsp</th>
                                        </tr>-->
                                        <?php
                                        foreach($datapemesananbahan->result() as $row) {
                                            echo form_open("PermintaanBahanOutlet/responsePermintaan");
                                            echo form_hidden("kode",$row->nomernota);
                                            echo form_hidden("cabangpenerima",$row->kodecabang);
                                            echo "<tr>"; 
                                                echo "<th>"; 
                                                  //echo "<h5 style='color:red; font-weight: bold;'>Nota : ".$row->nomernota."</h5>";
                                                  echo "<a target='_blank' href='".site_url('PermintaanBahanOutlet/detail/'.$row->nomernota)."'><h5 style='color:red; font-weight: bold;'>Nota : ".$row->nomernota."</h5></a>";  
                                                  echo "<h3 style='font-weight: bold;'>".$row->namacabang."</h3>"; 
                                                  echo "<h3 style='font-weight: bold;'>".$row->kota."</h3>"; 
                                                  echo "<h5 style='color:red; font-weight: bold;'>".date("d F Y", strtotime($row->tanggal))."</h5>"; 
                                                  if(strtoupper($row->status)== "AKTIF")
                                                  {
                                                    if($this->session->userdata('jabatan')== "ADMIN")
                                                    {
                                                      echo "<br>"; 
                                                        echo "<label style='font-weight: bold;'>Dikirim Dari : </label><br><br>"; 
                                                        echo form_dropdown("txtcabang", $arrcabang, "" , ['id'=>'txtcabang', 'type'=>'text', 'class'=>'form-control','onchange'=>'lihatsupplier()']);
                                                        echo "<br><br>"; 
                                                        echo "<a href='".site_url('PermintaanBahanOutlet/batal_permintaan/'.$row->nomernota)."'>"; 
                                                          echo "<button type='button' class='btn btn-danger' name='btnbatal'><i class='icon_close'></i></button>";
                                                        echo "</a>"; 
                                                        echo "&nbsp;&nbsp;"; 
                                                        echo "<button type='submit' class='btn btn-danger' name='btnsukses'><i class='icon_check'></i></button>";
                                                        // echo "<a href='".site_url('PermintaanBahanOutlet/sukses_permintaan/'.$row->nomernota)."'>"; 
                                                        //   echo "<button type='button' class='btn btn-danger' name='btnsukses'><i class='icon_check'></i></button>";
                                                        // echo "</a>"; 
                                                    }
                                                  }      
                                                echo "</th>";
                                                echo "<th><h3 style='font-weight: bold;'>".$row->jumitem." items</h3></th>";
                                                echo "<th><h3 style='font-weight: bold;'>".$row->status."</h3></th>";
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


  <link href='<?php echo base_url("asset/css/bootstrap.min.css"); ?>'       rel="stylesheet">
  <link href='<?php echo base_url("asset/css/bootstrap-theme.css"); ?>'     rel="stylesheet">
  <link href='<?php echo base_url("asset/css/elegant-icons-style.css"); ?>' rel="stylesheet">
  <link href='<?php echo base_url("asset/css/font-awesome.min.css"); ?>'    rel="stylesheet">
  <link href='<?php echo base_url("asset/css/style-responsive.css"); ?>'    rel="stylesheet">
  <link href='<?php echo base_url("asset/css/style.css"); ?>'               rel="stylesheet">

  <script src='<?php echo base_url("asset/js/jquery.js"); ?>'></script>
  <script src='<?php echo base_url("asset/js/bootstrap.min.js"); ?>'></script>
  <script src='<?php echo base_url("asset/js/jquery.scrollTo.min.js"); ?>'></script>
  <script src='<?php echo base_url("asset/js/jquery.nicescroll.js"); ?>' type="text/javascript"></script>
  <script src='<?php echo base_url("asset/js/scripts.js"); ?>'></script>
</body>
</html>
