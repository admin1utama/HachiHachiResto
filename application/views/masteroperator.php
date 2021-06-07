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
foreach($dataa->result() as $row)
{
    $arrcabang[$row->kodecabang] = $row->namacabang;
}
$arrjabatan = array();
foreach($datajabatan->result() as $row)
{
    $arrjabatan[$row->kodekaryawan] = $row->jabatan;
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
            <h3 class="page-header" style="color:black"><b><i class="fa fa fa-bars"></i>Input Operator</b></h3>
          </div>
        </div>

        <!-- page start-->      
        <?php 
        echo form_open("Operator/masteroperator"); 
        ?>        
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">                    
                                <br>
                                <?php 
                                    echo "<a href='".site_url('Operator/index')."'>"; 
                                        echo form_button("btntambah", "Kembali", ["class"=>"btn btn-danger btn-lg"]); 
                                    echo "</a>";
                                ?> 
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class=col-md-6>
                                <label class='judullabel'>Nama Cabang : </label>
                                <?php
                                    echo form_dropdown("txtkodecabang", $arrcabang, $kodecabang, ['id'=>'txtkodecabang', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-4>
                                <label class='judullabel'>Kode Karyawan : </label>
                                <?php 
                                    echo form_input("txtkodekaryawan", $kodekaryawan, ['id'=>'txtkodekaryawan', 'type'=>'text', 'class'=>'form-control','readonly'=>'readonly']);
                                ?>
                            </div>
                            <div class=col-md-6>
                                <br><br>
                                <?php echo "<label class='errorlabel'>".form_error('txtkodekaryawan')."</label>"; ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-5>
                                <label class='judullabel'>Username : </label>
                                <?php 
                                    echo form_input("txtusername", $username, ['id'=>'txtusername', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                            <div class=col-md-6>
                                <br><br>
                                <?php echo "<label class='errorlabel'>".form_error('txtusername')."</label>"; ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-4>
                                <label class='judullabel'>Password : </label>
                                <?php 
                                    echo form_password("txtpass", $password, ['id'=>'txtpass', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                            <div class=col-md-6>
                                <br><br>
                                <?php echo "<label class='errorlabel'>".form_error('txtpass')."</label>"; ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class=col-md-4>
                                <label class='judullabel'>Confirm Password : </label>
                                <?php 
                                    echo form_password("txtrepass", $password, ['id'=>'txtrepass', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                            <div class=col-md-6>
                                <br><br>
                                <?php echo "<label class='errorlabel'>".form_error('txtrepass')."</label>"; ?>
                            </div>
                        </div>
                        <br>

                        <br><br>   
                        <?php
                            if($kodekaryawan == "" ){
                                echo form_submit("btnAdd_opt", "Tambah Pegawai", ['id'=>'btnAdd_opt', 'class'=>'btn btn-primary btn-lg']);
                            }
                            else{
                                echo form_submit("btnUpdate_opt", "Update Pegawai", ['id'=>'btnUpdate_opt', 'class'=>'btn btn-warning']);  
                                echo form_submit("btnRemove_opt", "Hapus Pegawai", ['id'=>'btnRemove_opt', 'class'=>'btn btn-danger']);
                                echo form_submit("btnBlock", "Blokir", ['id'=>'btnBlock', 'class'=>'btn btn-danger']);  
                                echo form_submit("btnUnblock", "Buka Blokir", ['id'=>'btnUnblock', 'class'=>'btn btn-warning']); 
                            }
                        ?>
                    </div>
                </div> 
            </div>
            <div class="col-md-6">
            <br><br><br><br><br>
                <div class="row">
                    <div class=col-md-6>
                        <label class='judullabel'>Nama Karyawan : </label>
                        <?php 
                            echo form_input("txtnamakaryawan", $nama, ['id'=>'txtnamakaryawan', 'type'=>'text', 'class'=>'form-control']);
                        ?>
                    </div>
                    <div class=col-md-4>
                        <br><br>
                        <?php echo "<label class='errorlabel'>".form_error('txtnamakaryawan')."</label>"; ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class=col-md-4>
                        <label class='judullabel'>Tanggal Mulai Bekerja : </label>
                        <?php 
                            //echo form_input("txtmulaikerja", $tanggalmulai, ['id'=>'txtmulaikerja', 'type'=>'text', 'class'=>'form-control']);
                        ?>
                        <input type='date' name='txtmulaikerja' id='txtmulaikerja' class='form-control' value='<?php echo date("Y-m-d"); ?>>  
                    </div>
                    <div class=col-md-4>
                        <br><br>
                        <?php echo "<label class='errorlabel'>".form_error('txtmulaikerja')."</label>"; ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class=col-md-5>
                        <label class='judullabel'>No Telepon : </label>
                        <?php 
                            echo form_input("txttelpkaryawan", $nomertelp, ['id'=>'txttelpkaryawan', 'type'=>'text', 'class'=>'form-control']);
                        ?>
                    </div>
                    <div class=col-md-6>
                        <br><br>
                        <?php echo "<label class='errorlabel'>".form_error('txttelpkaryawan')."</label>"; ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class=col-md-5>
                        <label class='judullabel'>No Identitas : </label>
                        <?php 
                            echo form_input("txtnoidentitaskaryawan", $noidentitas, ['id'=>'txtnoidentitaskaryawan', 'type'=>'text', 'class'=>'form-control']);
                        ?>
                    </div>
                    <div class=col-md-6>
                        <br><br>
                        <?php echo "<label class='errorlabel'>".form_error('txtnoidentitaskaryawan')."</label>"; ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class=col-md-4>
                        <?php
                            if($kodekaryawan == "")
                            {
                                $options = [
                                    'OPERATOR'  => 'OPERATOR',
                                ]; 
                                echo form_dropdown("txtjabatankaryawan", $options, $jabatan, ['id'=>'txtjabatankaryawan', 'type'=>'text', 'class'=>'form-control', 'style'=>'display:none;']);
                            }
                            else
                            {
                                $options = [
                                    'ADMIN'     => 'ADMIN',
                                    'KEPALA GUDANG'  => 'KEPALA GUDANG',
                                    'OPERATOR'  => 'OPERATOR',
                                ]; 
                                echo form_dropdown("txtjabatankaryawan", $options, $jabatan, ['id'=>'txtjabatankaryawan', 'type'=>'text', 'class'=>'form-control', 'style'=>'display:none;']);
                            }
                        ?> 
                    </div>
                </div>
                <div class="row">
                    <div class=col-md-4>
                        <label class='judullabel'>Status Karyawan : </label>
                        <?php
                            $options = [
                                'AKTIF'     => 'AKTIF',
                                'NONAKTIF'  => 'NONAKTIF',
                            ];
                            echo form_dropdown("txtstatuskaryawan",$options, $status, ['id'=>'txtstatuskaryawan', 'type'=>'text', 'class'=>'form-control']);
                        ?>
                    </div>
                </div>
            </div>
        </div>        
        <?php 
            echo form_close(); 
        ?>
        <br><br>
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
