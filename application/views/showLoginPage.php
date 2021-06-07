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
        <!-- page start-->      
       
        <body class="login-img3-body">

<div class="container">
    <?php 
        echo form_open("Login/index"); 
    ?>
  <form class="login-form" action="index.html">
    <div class="login-wrap">
      <p class="login-img"><i class="icon_lock_alt"></i></p>
      <div class="input-group">
        <span class="input-group-addon"><i class="icon_profile"></i></span>
        <!--<input type="text" class="form-control" placeholder="Username" autofocus>-->
        <?php 
            echo form_input("txtusername", "", ['id'=>'txtusername', 'type'=>'text', 'class'=>'form-control','placeholder'=>'Username']);
        ?>
      </div>
      <div class="input-group">
        <span class="input-group-addon"><i class="icon_key_alt"></i></span>
        <!--<input type="password" class="form-control" placeholder="Password">-->
        <?php 
            echo form_password("txtpassword", "", ['id'=>'txtpassword', 'type'=>'text', 'class'=>'form-control','placeholder'=>'Password']);
        ?>
      </div>
      <label class="checkbox">
              <input type="checkbox" value="remember-me"> Remember me
              <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
          </label>
      <!--<button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>-->
        <?php
            echo form_submit("btnLogin", "Login", ['id'=>'btnLogin', 'class'=>'btn btn-primary btn-lg btn-block']);
        ?>
        <?php 
            echo form_close();
        ?>  
    </div>
  </form>
</div>
</body>
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
