<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <meta name="description" content="<?php echo $metadesc;?>">
   <meta name="keywords" content="<?php echo $metakeyword;?>">
   <meta name="author" content="iGravitas Technosoft India Pvt. Ltd.">
   <title><?php echo $title;?></title>
   <!-- =============== VENDOR STYLES ===============-->
   <!-- FONT AWESOME-->
   <link rel="icon" href="<?php echo $this->config->item('assets_url') ?>app/img/favi.png" type="image/gif" sizes="16x16">
   <link rel="stylesheet" href="<?php echo $this->config->item('assets_url') ?>vendor/fontawesome/css/font-awesome.min.css">
   <!-- SIMPLE LINE ICONS-->
   <link rel="stylesheet" href="<?php echo $this->config->item('assets_url') ?>vendor/simple-line-icons/css/simple-line-icons.css">
   <!-- =============== BOOTSTRAP STYLES ===============-->
   <link rel="stylesheet" href="<?php echo $this->config->item('assets_url') ?>app/css/bootstrap.css" id="bscss">
   <!-- =============== APP STYLES ===============-->
   <link rel="stylesheet" href="<?php echo $this->config->item('assets_url') ?>app/css/app.css" id="maincss">
   <!-- =============== MY STYLES ===============-->
   <link rel="stylesheet" href="<?php echo $this->config->item('assets_url') ?>app/css/my.css" id="maincss">
</head>

<body>
   <div class="wrapper">
      <div class="block-center mt-xl wd-xl">
        <?php   $this->load->view("layout/success_error");?>
         <!-- START panel-->
         <div class="panel panel-dark panel-flat">
            <div class="panel-heading text-center">
               <a href="<?= base_url();?>">
                  <img src="<?php echo $this->config->item('assets_url') ?>app/img/logo.png" alt="Image" class="block-center img-rounded">
               </a>
            </div>
            <div class="panel-body">
               <p class="text-center pv">SUPER ADMIN ACCESS</p>
               <form role="form" data-parsley-validate="" novalidate="" class="mb-lg" method="post" action="">
                  <div class="form-group has-feedback">
                     <input id="exampleInputEmail1" name="login_email" type="email" placeholder="Email-Id (or) Mobile No." autocomplete="off" required class="form-control email" value="<?= set_value("login_email");?>">
                     <span class="fa fa-envelope form-control-feedback text-muted"></span>
                     <span class="red"><?php echo form_error('login_email');?></span>
                  </div>
                  <div class="form-group has-feedback">
                     <input id="exampleInputPassword1" name="login_password" type="password" placeholder="Password" required class="form-control">
                     <span class="fa fa-lock form-control-feedback text-muted"></span>
                     <span class="red"><?php echo form_error('login_password');?></span>
                  </div>
                  <div class="clearfix">
<!--                     <div class="checkbox c-checkbox pull-left mt0">
                        <label>
                           <input type="checkbox" value="" name="remember">
                           <span class="fa fa-check"></span>Remember Me</label>
                     </div>-->
                     <div class="text-center"><a href="<?= base_url();?>forgot_password" class="text-muted">Forgot your password?</a>
                     </div>
                  </div>
                   <input type="submit" class="btn btn-block btn-primary mt-lg" value="Login" name="login">
                   <br>
                   <p class="pt-lg text-center"><a href="http://esytopup.com/">Home !</a></p>
                   
               </form>
               
            </div>
         </div>
         <!-- END panel-->
         <div class="p-lg text-center">
            <span>&copy;</span>
            <span>2015</span>
            <span>-</span>
            <span>Swami Communication</span>
            <br>
            <span>Developed by iGravitas TechnoSoft India Pvt. Ltd.</span>
         </div>
      </div>
   </div>
   <!-- =============== VENDOR SCRIPTS ===============-->
   <!-- MODERNIZR-->
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/modernizr/modernizr.js"></script>
   <!-- JQUERY-->
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/jquery/dist/jquery.js"></script>
   <!-- BOOTSTRAP-->
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/bootstrap/dist/js/bootstrap.js"></script>
   <!-- STORAGE API-->
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/jQuery-Storage-API/jquery.storageapi.js"></script>
   <!-- PARSLEY-->
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/parsleyjs/dist/parsley.min.js"></script>
   <!-- =============== APP SCRIPTS ===============-->
   <script src="<?php echo $this->config->item('assets_url') ?>app/js/app.js"></script>
   <!-- Not to allow Special Characters Scripts --->
   <script src="<?php echo $this->config->item('assets_url') ?>app/js/jquery.min.js"></script>
   <script src="<?php echo $this->config->item('assets_url') ?>app/js/my.js"></script>
   <script>
         $(document).ready(function () {
            $('input[type=password]').bind('cut copy paste', function (e) {
               e.preventDefault();
            });
        });
    </script> 
</body>

</html>