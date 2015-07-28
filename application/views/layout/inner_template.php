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
   <link rel="stylesheet" href="<?php echo $this->config->item('assets_url') ?>vendor/fontawesome/css/font-awesome.min.css">
   <!-- SIMPLE LINE ICONS-->
   <link rel="stylesheet" href="<?php echo $this->config->item('assets_url') ?>vendor/simple-line-icons/css/simple-line-icons.css">
   <!-- ANIMATE.CSS-->
   <link rel="stylesheet" href="<?php echo $this->config->item('assets_url') ?>vendor/animate.css/animate.min.css">
   <!-- WHIRL (spinners)-->
   <link rel="stylesheet" href="<?php echo $this->config->item('assets_url') ?>vendor/whirl/dist/whirl.css">
   <!-- =============== PAGE VENDOR STYLES ===============-->
   <!-- WEATHER ICONS-->
   <link rel="stylesheet" href="<?php echo $this->config->item('assets_url') ?>vendor/weather-icons/css/weather-icons.min.css">
   <!-- =============== BOOTSTRAP STYLES ===============-->
   <link rel="stylesheet" href="<?php echo $this->config->item('assets_url') ?>app/css/bootstrap.css" id="bscss">
   <!-- =============== APP STYLES ===============-->
   <link rel="stylesheet" href="<?php echo $this->config->item('assets_url') ?>app/css/app.css" id="maincss">
   
   <link rel="stylesheet" href="<?php echo $this->config->item('assets_url') ?>app/css/my.css" id="maincss">
   
      <!-- =============== VENDOR SCRIPTS ===============-->
   <!-- MODERNIZR-->
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/modernizr/modernizr.js"></script>
   <!-- JQUERY-->
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/jquery/dist/jquery.js"></script>
   <!-- BOOTSTRAP-->
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/bootstrap/dist/js/bootstrap.js"></script>
   
</head>

<body>
   <div class="wrapper">
      <!-- top navbar-->
      <?php echo $this->load->view('layout/header');?>
      <!-- sidebar-->
       <?php echo $this->load->view('layout/side');?>
      <!-- offsidebar-->
      
      <?php echo $this->load->view($content);?>
      <!-- Page footer-->
      <footer>
         <span>&copy; 2015 - Swami Communications</span>
         <span class="pull-right">Developed By: iGravitas TechnoSoft India Pvt. Ltd.</span>
         
      </footer>
   </div>
   <!-- =============== VENDOR SCRIPTS ===============-->
   
   <!-- STORAGE API-->
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/jQuery-Storage-API/jquery.storageapi.js"></script>
   <!-- JQUERY EASING-->
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/jquery.easing/js/jquery.easing.js"></script>
   <!-- ANIMO-->
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/animo.js/animo.js"></script>
   <!-- SLIMSCROLL-->
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/slimScroll/jquery.slimscroll.min.js"></script>
   <!-- SCREENFULL-->
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/screenfull/dist/screenfull.js"></script>
   <!-- LOCALIZE-->
   <!--<script src="<?php echo $this->config->item('assets_url') ?>vendor/jquery-localize-i18n/dist/jquery.localize.js"></script>-->
   <!-- RTL demo-->
   <script src="<?php echo $this->config->item('assets_url') ?>app/js/demo/demo-rtl.js"></script>
   <!-- =============== PAGE VENDOR SCRIPTS ===============-->
   <!-- FLOT CHART-->
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/Flot/jquery.flot.js"></script>
   <script src=".<?php echo $this->config->item('assets_url') ?>vendor/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/Flot/jquery.flot.resize.js"></script>
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/Flot/jquery.flot.pie.js"></script>
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/Flot/jquery.flot.time.js"></script>
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/Flot/jquery.flot.categories.js"></script>
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/flot-spline/js/jquery.flot.spline.min.js"></script>
   <!-- CLASSY LOADER-->
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/jquery-classyloader/js/jquery.classyloader.min.js"></script>
   <!-- MOMENT JS-->
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/moment/min/moment-with-locales.min.js"></script>
   <!-- SKYCONS-->
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/skycons/skycons.js"></script>
   <!-- DEMO-->
   <script src="<?php echo $this->config->item('assets_url') ?>app/js/demo/demo-flot.js"></script>
   <!-- VECTOR MAP-->
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/ika.jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/ika.jvectormap/jquery-jvectormap-world-mill-en.js"></script>
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/ika.jvectormap/jquery-jvectormap-us-mill-en.js"></script>
   <script src="<?php echo $this->config->item('assets_url') ?>app/js/demo/demo-vector-map.js"></script>
   <!-- =============== APP SCRIPTS ===============-->
   <script src="<?php echo $this->config->item('assets_url') ?>app/js/app.js"></script>
   
   <script src="<?php echo $this->config->item('assets_url') ?>app/js/my.js"></script>
</body>

</html>