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
            <h3 class="page-header" style="color:black"><b><i class="fa fa fa-bars"></i>Cabang</b></h3>
          </div>
        </div>

        <!-- page start-->      
     
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <?php 
                                echo "<a href='".site_url('Cabang/mastercabang')."'>"; 
                                    echo form_button("btntambah", "Tambah Data", ["class"=>"btn btn-lg btn-danger"]); 
                                echo "</a>"; 
                                ?>
                                <br><br><br>
                                <div class="card-body">
                                <table class='table table-striped'>
                                    <tr>
                                        <th class="tengahtulisan">Kode Cabang</th>
                                        <th class="tengahtulisan">Nama Cabang</th>
                                        <th class="tengahtulisan">Amat</th>
                                        <th class="tengahtulisan">Nomer Telp</th>
                                        <th class="tengahtulisan">Status</th>
                                        <th class="tengahtulisan">&nbsp</th>
                                    </tr>
                                    <?php
                                    foreach($datacabang->result() as $row) {
                                        echo form_open("Cabang/editcabang");
                                        echo form_hidden("kode",$row->kodecabang);
                                        echo "<tr>"; 
                                            echo "<td class='tengahtulisan'>".strtoupper($row->kodecabang)."</td>"; 
                                            echo "<td>".strtoupper($row->namacabang)."<br><div style='font-weight: bold; font-size: 10px; color: red;'>Jenis : ".strtoupper($row->jenis)."</td>";
                                            echo "<td>".strtoupper($row->alamat)."<br><div style='font-weight: bold; font-size: 10px; color: red;'>".strtoupper($row->kota)."</div></td>"; 
                                            echo "<td class='tengahtulisan'>".$row->nomertelp."</td>"; 
                                            echo "<td class='tengahtulisan'>".strtoupper($row->status)."</td>";
                                            echo "<td>";
                                            echo "<button type='submit' class='btn btn-danger' name='btnedit'><i class='icon_pencil-edit_alt'></i></button>";
                                            echo "&nbsp;&nbsp;"; 
                                            if(strtoupper($row->status)== "AKTIF")
                                            {
                                              echo "<a href='".site_url('Cabang/nonaktifkan_cabang/'.$row->kodecabang)."'>"; 
                                                  echo "<button type='button' class='btn btn-danger' name='btnnonaktif'><i class='icon_trash_alt'></i></button>";
                                              echo "</a>"; 
                                            }
                                            else
                                            {
                                              echo "<a href='".site_url('Cabang/aktifkan_cabang/'.$row->kodecabang)."'>"; 
                                                  echo "<button type='button' class='btn btn-primary' name='btnaktif'><i class='icon_tag_alt'></i></button>";
                                              echo "</a>"; 
                                            }
                                            echo "</td>";
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
</body>
</html>
