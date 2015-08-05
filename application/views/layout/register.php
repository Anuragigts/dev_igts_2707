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
   <!-- =============== BOOTSTRAP STYLES ===============-->
   <link rel="stylesheet" href="<?php echo $this->config->item('assets_url') ?>app/css/bootstrap.css" id="bscss">
   <!-- =============== APP STYLES ===============-->
   <link rel="stylesheet" href="<?php echo $this->config->item('assets_url') ?>app/css/app.css" id="maincss">
</head>

<body>
   <div class="wrapper">
      <div class="block-center mt-xl wd-xl">
         <!-- START panel-->
         <div class="panel panel-dark panel-flat">
            <div class="panel-heading text-center">
               <a href="#">
                  <img src="<?php echo $this->config->item('assets_url') ?>app/img/logo.png" alt="Image" class="block-center img-rounded">
               </a>
            </div>
            <div class="panel-body">
               <p class="text-center pv">SIGNUP TO GET INSTANT ACCESS.</p>
               <form method="post" role="form" data-parsley-validate="" novalidate="" class="mb-lg">
                  <div class="form-group has-feedback">
                      <label for="signupInputEmail1" class="text-muted">Email address<span class="red">*</span></label>
                      <input id="signupInputEmail1" name="email" value="<?= set_value("email"); ?>" type="email" placeholder="Enter email" autocomplete="off" required class="form-control">
                     <span class="fa fa-envelope form-control-feedback text-muted"></span>
                      <span class="red"><?=  form_error('email');?></span>
                  </div>
                  <div class="form-group has-feedback">
                      <label for="mobile" class="text-muted">Mobile Number<span class="red">*</span></label>
                     <input id="signupInputEmail1" name="mobile" value="<?= set_value("mobile"); ?>"  type="mobile" placeholder="Mobile Number" autocomplete="off" required class="form-control" value="<?= set_value("mobile"); ?>" onkeyup="validateR(this, '')" ruleset="[^0-9]" maxlength="10">
                     <span class="fa fa-mobile form-control-feedback text-muted"></span>
                     <span class="red"><?=  form_error('mobile');?></span>
                  </div>
                  <div class="form-group has-feedback">
                     <label for="signupInputPassword1" class="text-muted">Password<span class="red">*</span></label>
                     <input id="signupInputPassword1" name="pass" value="<?= set_value("pass"); ?>" type="password" placeholder="Password" autocomplete="off" required class="form-control">
                     <span class="fa fa-lock form-control-feedback text-muted"></span>
                      <span class="red"><?=  form_error('pass');?></span>
                  </div>
                  <div class="form-group has-feedback">
                     <label for="signupInputRePassword1" class="text-muted">Retype Password<span class="red">*</span></label>
                     <input id="signupInputRePassword1" name="con_pass" type="password" placeholder="Retype Password" autocomplete="off" required data-parsley-equalto="#signupInputPassword1" class="form-control">
                     <span class="fa fa-lock form-control-feedback text-muted"></span>
                     <span class="red"><?=  form_error('con_pass');?></span>
                  </div>
                    <div class="form-group has-feedback">
                     <label for="signupInputRePassword1" class="text-muted">Referred For<span class="red">*</span></label>
                      <select class="form-control b-c"  name="refer" >
                            <option value="">Select</option>
                            <option value="Agents" <?php echo set_select('refer',"Agents", ( !empty($data) && $data == "Agents") ? TRUE : FALSE )?>>Agents</option>
                            <option value="Distributor" <?php echo set_select('refer',"Distributor", ( !empty($data) && $data == "Distributor") ? TRUE : FALSE )?>>Distributor</option>
                            <option value="SuperDistributor" <?php echo set_select('refer',"SuperDistributor", ( !empty($data) && $data == "SuperDistributor") ? TRUE : FALSE )?>>Super Distributor</option>
                            <option value="MasterDistributor" <?php echo set_select('refer',"MasterDistributor", ( !empty($data) && $data == "MasterDistributor") ? TRUE : FALSE )?>>Master Distributor</option>
                           
                        </select>  
                     <span class="red"><?=  form_error('refer');?></span>
                  </div>
                  <div class="form-group has-feedback">
                     <label for="signupInputRePassword1" class="text-muted">State<span class="red">*</span></label>
                      <select class="form-control b-c" id="state" name="state">
                        <option value="">Select</option>
                        <?php foreach($states as $st){?>
                        <option value="<?php echo $st->State_name?>" state_id="<?php echo $st->State_id?>" <?php echo set_select('state',$st->State_name, ( !empty($data) && $data == "$st->State_name") ? TRUE : FALSE )?>><?php echo $st->State_name?></option>
                        <?php }?>
                    </select>
                     <span class="red"><?=  form_error('state');?></span>
                  </div>                   
                   <div class="form-group has-feedback">
                     <label for="signupInputRePassword1" class="text-muted">City<span class="red">*</span></label>
                     <select class="form-control b-c" id="city" name="city" >
                        <option value="">Select</option>
                        <?php foreach($citys as $ct){?>
                        <option value="<?php echo $ct->City_name?>" <?php echo set_select('city',$ct->City_name, ( !empty($data) && $data == "$ct->City_name") ? TRUE : FALSE )?>><?php echo $ct->City_name?></option>
                        <?php }?>
                    </select>   
                     <span class="red"><?=  form_error('city');?></span>
                  </div>
                  
                  <div class="clearfix">
                     <div class="checkbox c-checkbox pull-left mt0">
                        <label>
                           <input type="checkbox" value="1" required name="agreed">
                           <span class="fa fa-check"></span>I agree with the <a href="#">terms</a>
                           
                        </label>
                          <p class="red"><?php echo  form_error('agreed');?></p>
                     </div>
                  </div>
                  <button type="submit" class="btn btn-block btn-primary mt-lg">Create account</button>
               </form>
               <p class="pt-lg text-center"><a href="<?php echo base_url()?>login">Have an account?</a></p>
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
</body>

</html>
<script>
   function validateR(element,replacement)
   {
     //  IE
     if(! element)
      element = window.event.srcElement;
      element.value = element.value.replace(new RegExp(element.getAttribute('ruleset'), 'gi'), replacement);
   }
     // Get city by ajax
    $('#state').change(function(){
        var id =  $('option:selected', this).attr('state_id');//$('#state').val();
       
        $.post('<?php echo base_url();?>dmr/getCity',{'state':id},function(response){
               // alert(response);
                if(response != ""){
                        $('#city').html(response);							
                }else{
                      $('#city').html("<option value=''>Select</option>");
                }					
            });
    });
</script>