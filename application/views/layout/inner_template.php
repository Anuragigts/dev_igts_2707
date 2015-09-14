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
   <link rel="icon" href="<?php echo $this->config->item('assets_url') ?>app/img/favi.png" type="image/gif" sizes="16x16">
  
   <!-- DATATABLES-->
   <link rel="stylesheet" href="<?php echo $this->config->item('assets_url') ?>vendor/datatables-colvis/css/dataTables.colVis.css">
   <link rel="stylesheet" href="<?php echo $this->config->item('assets_url') ?>app/vendor/datatable-bootstrap/css/dataTables.bootstrap.css">
   
   <!-- =============== BOOTSTRAP STYLES ===============-->
   <link rel="stylesheet" href="<?php echo $this->config->item('assets_url') ?>app/css/bootstrap.css" id="bscss">
   <!-- =============== APP STYLES ===============-->
   <link rel="stylesheet" href="<?php echo $this->config->item('assets_url') ?>app/css/app.css" id="maincss">
   
   <link rel="stylesheet" href="<?php echo $this->config->item('assets_url') ?>app/css/my.css" id="maincss">
     <!-- SWEET ALERT-->
   <link rel="stylesheet" href="<?php echo $this->config->item('assets_url') ?>vendor/sweetalert/dist/sweetalert.css">
   
   <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
      <!-- =============== VENDOR SCRIPTS ===============-->
   <!-- MODERNIZR-->
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/modernizr/modernizr.js"></script>
   <!-- JQUERY-->
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/jquery/dist/jquery.js"></script>
   <!-- BOOTSTRAP-->
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/bootstrap/dist/js/bootstrap.js"></script>
    <!-- DATATABLES CSS -->
   <link rel="stylesheet" href="<?php echo $this->config->item('assets_url') ?>vendor/datatables-colvis/css/dataTables.colVis.css">
   <link rel="stylesheet" href="<?php echo $this->config->item('assets_url') ?>app/vendor/datatable-bootstrap/css/dataTables.bootstrap.css">
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/bootstrap/dist/js/bootstrap.js"></script>
    <!--- Accordions -->
    <script src="<?php echo $this->config->item('assets_url') ?>app/js/jquery-ui.js"></script>
    <script src="<?php echo $this->config->item('assets_url') ?>app/js/jquery.passstrength.min.js"></script>
    <script>
        $(function() {
                $( "#accordion" ).accordion();
        });
         $(document).ready(function () {
            $('input[type=password]').bind('cut copy paste', function (e) {
               e.preventDefault();
            });
            $("#strpassword").passStrengthify({ rawEntry: true });
        });
    </script> 
    
</head>

<body>
     <!--<a id="swal-demo5" href="" class="btn btn-primary">Try me!</a>-->
<!--       <button class="btn btn-primary btn-lg" data-toggle="modal" 
          data-target="#myModal">
          Launch demo modal
       </button>

      
       <div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
          aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
             <div class="modal-content">
                <div class="modal-header">
                   <button type="button" class="close" 
                      data-dismiss="modal" aria-hidden="true">
                         &times;
                   </button>
                   <h4 class="modal-title" id="myModalLabel">
                      This Modal title
                   </h4>
                </div>
                <div class="modal-body">
                   Add some text here
                </div>
                <div class="modal-footer">
                   <button type="button" class="btn btn-default" 
                      data-dismiss="modal">Close
                   </button>
                   <button type="button" class="btn btn-primary">
                      Submit changes
                   </button>
                </div>
             </div>
         </div>
       </div>-->

   <div class="wrapper">
      <!-- top navbar-->
      <?php echo $this->load->view('layout/header');?>
      <!-- sidebar-->
       <?php echo $this->load->view('layout/side');?>
      <!-- offsidebar-->
     
      <?php echo $this->load->view($content);?>
      <div class="modal fade" id="loading" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">      
            <div class="modal-dialog ">
                <center>
                    <img src="<?php echo $this->config->item('assets_url') ?>app/img/load.gif" class="img img-responsive"/>
                </center>
            </div>
        </div>
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
   
   <!-- DATATABLES-->
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/datatables/media/js/jquery.dataTables.min.js"></script>
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/datatables-colvis/js/dataTables.colVis.js"></script>
   <script src="<?php echo $this->config->item('assets_url') ?>app/vendor/datatable-bootstrap/js/dataTables.bootstrap.js"></script>
   <script src="<?php echo $this->config->item('assets_url') ?>app/vendor/datatable-bootstrap/js/dataTables.bootstrapPagination.js"></script>
   <script src="<?php echo $this->config->item('assets_url') ?>app/js/demo/demo-datatable.js"></script>
   
   <!-- =============== PAGE VENDOR SCRIPTS ===============-->
   <!-- FLOT CHART-->
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/Flot/jquery.flot.js"></script>
   <script src=".<?php echo $this->config->item('assets_url') ?>vendor/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/Flot/jquery.flot.resize.js"></script>
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/Flot/jquery.flot.pie.js"></script>
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/Flot/jquery.flot.time.js"></script>
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/Flot/jquery.flot.categories.js"></script>
   <!--<script src="<?php echo $this->config->item('assets_url') ?>vendor/flot-spline/js/jquery.flot.spline.min.js"></script>-->
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
    <!-- DATATABLES-->
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/datatables/media/js/jquery.dataTables.min.js"></script>
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/datatables-colvis/js/dataTables.colVis.js"></script>
   <script src="<?php echo $this->config->item('assets_url') ?>app/vendor/datatable-bootstrap/js/dataTables.bootstrap.js"></script>
   <script src="<?php echo $this->config->item('assets_url') ?>app/vendor/datatable-bootstrap/js/dataTables.bootstrapPagination.js"></script>
   <!-- =============== APP SCRIPTS ===============-->
   <script src="<?php echo $this->config->item('assets_url') ?>app/js/app.js"></script>
   <script src="<?php echo $this->config->item('assets_url') ?>app/js/my.js"></script>
    <script src="<?php echo $this->config->item('assets_url') ?>app/js/demo/demo-panels.js"></script>
<!--   <script src="<?php //echo $this->config->item('assets_url') ?>app/js/demo/demo-rtl.js"></script>-->
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/sweetalert/dist/sweetalert.min.js"></script>
</body>
     <?php echo $this->load->view('layout/script');?>
</html>
  <script>
  $(function() {
    $( ".datepicker" ).datepicker();
  });
  
  </script>
<script>
$("#checkAll").change(function () {
    $(".dmr").prop('checked', $(this).prop("checked"));
});
$(".add_ta").change(function () {
    var vsh = $(".mtrans").is(":checked");
    if(vsh == false){
            $("#checkAll").prop('checked', $(this).prop("checked"));
    }
});
$(".mtrans").change(function () {
    var vsh = $(".add_ta").is(":checked");
    if(vsh == false){
            $("#checkAll").prop('checked', $(this).prop("checked"));
    }
});
$("#checkAll_re").change(function () {
    $(".rech").prop('checked', $(this).prop("checked"));
});
$(".dth").change(function () {
    var po_m = $(".po_m").is(":checked");
    var pr_m = $(".pr_m").is(":checked");
    if(po_m == false && pr_m == false){
            $("#checkAll_re").prop('checked', $(this).prop("checked"));
    }
});
$(".po_m").change(function () {
    var pr_m = $(".pr_m").is(":checked");
    var dth = $(".dth").is(":checked");
    
    if(pr_m == false && dth == false){
            $("#checkAll_re").prop('checked', $(this).prop("checked"));
    }
});
$(".pr_m").change(function () {
    var po_m = $(".po_m").is(":checked");
     var dth = $(".dth").is(":checked");
    if(po_m == false && dth == false){
            $("#checkAll_re").prop('checked', $(this).prop("checked"));
    }
});

//$(window).load(function() {
//
//  if ($(this).width() < 500) {
//
//    var str = $("<div>");
//    $("table tr").each(function(){
//        var ul = $("<ul>");
//        $("th", this).each(function(){
//            var li = $("<li>").html(this.innerHTML);
//            ul.append(li);
//        });
//        $("td", this).each(function(){
//            var li = $("<li>").html(this.innerHTML);
//            ul.append(li);
//        });
//        str.append(ul);
//    })    
//    $("table").replaceWith(str); 
//  } else {
//    
//
//    }
//
//});

</script>