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
   <link rel="icon" href="<?php echo $this->config->item('assets_url') ?>app/img/favi.png" type="image/gif" sizes="16x16">
   <!-- SIMPLE LINE ICONS-->
   <link rel="stylesheet" href="<?php echo $this->config->item('assets_url') ?>vendor/simple-line-icons/css/simple-line-icons.css">
   <!-- =============== BOOTSTRAP STYLES ===============-->
   <link rel="stylesheet" href="<?php echo $this->config->item('assets_url') ?>app/css/bootstrap.css" id="bscss">
   <!-- =============== APP STYLES ===============-->
   <link rel="stylesheet" href="<?php echo $this->config->item('assets_url') ?>app/css/app.css" id="maincss">
   <link rel="stylesheet" href="<?php echo $this->config->item('assets_url') ?>app/css/my.css" id="maincss">
 
   
</head>

<body>
   <div class="wrapper">
      <div class="block-center mt-xl wd-xl rg-xl">
          <?php   $this->load->view("layout/success_error");?>
         <!-- START panel-->
         <div class="panel panel-dark panel-flat">
            <div class="panel-heading text-center">
               <a href="#">
                  <img src="<?php echo $this->config->item('assets_url') ?>app/img/logo.png" alt="Image" class="block-center img-rounded">
               </a>
            </div>
            <div class="panel-body">
               <p class="text-center pv">SIGNUP TO GET ACCESS.</p>
               <form method="post" role="form" enctype="multipart/form-data" class="mb-lg">
                     <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label>First Name<span class="red">*</span></label>
                                <input type="text" placeholder="First Name" class="form-control" name="first_name" value="<?= set_value('first_name');?>" onkeypress="return onlyAlpha(event);" maxlength="50" required>
                                <span class="red"><?= form_error('first_name');?></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label>Last Name<span class="red">*</span></label>
                                <input type="text" placeholder="Last Name" class="form-control" name="last_name" value="<?= set_value('last_name');?>" onkeypress="return onlyAlpha(event);" maxlength="50" required>
                                <span class="red"><?= form_error('last_name');?></span>
                            </div>
                        </div>
                    </div>
                   <div class="row">
                        <div class="col-md-6">
                           <div class="form-group has-feedback">
                                <label for="signupInputEmail1" class="text-muted">Email address<span class="red">*</span></label>
                                <input id="signupInputEmail1" name="email" value="<?= set_value("email"); ?>" type="email" placeholder="Enter email"   required class="form-control email">
                               <span class="fa fa-envelope form-control-feedback text-muted"></span>
                                <span class="red"><?=  form_error('email');?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group has-feedback">
                                <label for="mobile" class="text-muted">Mobile Number<span class="red">*</span></label>
                               <input id="signupInputEmail1" name="mobile" value="<?= set_value("mobile"); ?>"  type="mobile" placeholder="Mobile Number"   required class="form-control" value="<?= set_value("mobile"); ?>" onkeyup="validateR(this, '')" ruleset="[^0-9]" maxlength="10">
                               <span class="fa fa-mobile form-control-feedback text-muted"></span>
                               <span class="red"><?=  form_error('mobile');?></span>
                            </div>
                        </div>
                   </div>
                    <div class="row">
                         <div class="col-md-6">
                            <div class="form-group has-feedback">
                               <label for="signupInputPassword1" class="text-muted">Password<span class="red">*</span></label>
                               <input id="strpassword" name="pass" value="<?= set_value("pass"); ?>" type="password" placeholder="Password"   required class="form-control" >
                               <span class="fa fa-lock form-control-feedback text-muted"></span>
                                <span class="red"><?=  form_error('pass');?></span>
                            </div>
                        </div>                    
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label for="signupInputRePassword1" class="text-muted">Retype Password<span class="red">*</span></label>
                                <input id="signupInputRePassword1" name="con_pass" type="password" placeholder="Retype Password"   required data-parsley-equalto="#signupInputPassword1" class="form-control">
                                <span class="fa fa-lock form-control-feedback text-muted"></span>
                                <span class="red"><?=  form_error('con_pass');?></span>
                            </div>
                        </div>
                    </div>
                   <div class="row">
                         <div class="col-md-6">
                            <div class="form-group has-feedback">
                             <label for="signupInputRePassword1" class="text-muted">Referred For<span class="red">*</span></label>
                              <select class="form-control b-c"  name="refer" >
                                    <option value="">Select</option>
                                    <option value="Agent" <?php echo set_select('refer',"Agent", ( !empty($data) && $data == "Agent") ? TRUE : FALSE )?>>Agents</option>
                                    <option value="Distributor" <?php echo set_select('refer',"Distributor", ( !empty($data) && $data == "Distributor") ? TRUE : FALSE )?>>Distributor</option>
                                    <option value="Super Distributor" <?php echo set_select('refer',"Super Distributor", ( !empty($data) && $data == "Super Distributor") ? TRUE : FALSE )?>>Super Distributor</option>
                                    <option value="Master Distributor" <?php echo set_select('refer',"Master Distributor", ( !empty($data) && $data == "Master Distributor") ? TRUE : FALSE )?>>Master Distributor</option>

                                </select>  
                             <span class="red"><?=  form_error('refer');?></span>
                          </div>
                        </div>                    
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label for="signupInputEmail1" class="text-muted">Door No. <span class="red">*</span></label>
                                <input id="signupInputEmail1" name="door" value="<?= set_value("door"); ?>" type="text" placeholder="Door No."   required class="form-control">
                               <span class="fa fa-window form-control-feedback text-muted"></span>
                               <span class="red"><?=  form_error('door');?></span>
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label for="signupInputEmail1" class="text-muted">Street <span class="red">*</span></label>
                                <input id="signupInputEmail1" name="street" value="<?= set_value("street"); ?>" type="text" placeholder="Street"   required class="form-control">
                               <span class="fa fa-window form-control-feedback text-muted"></span>
                               <span class="red"><?=  form_error('street');?></span>
                            </div> 
                        </div>                    
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label for="signupInputEmail1" class="text-muted">Area <span class="red">*</span></label>
                                <input id="signupInputEmail1" name="area" value="<?= set_value("area"); ?>" type="text" placeholder="Area"   required class="form-control">
                               <span class="fa fa-window form-control-feedback text-muted"></span>
                               <span class="red"><?=  form_error('area');?></span>
                            </div> 
                        </div>
                    </div>
                   <div class="row">
                        <div class="col-md-6">
                           <div class="form-group has-feedback">
                                <label for="signupInputRePassword1" class="text-muted">State<span class="red">*</span></label>
                                 <select class="form-control b-c" id="state-reg" name="state">
                                   <option value="">Select</option>
                                   <?php foreach($states as $st){?>
                                   <option value="<?php echo $st->State_name?>" state_id="<?php echo $st->State_id?>" <?php echo set_select('state',$st->State_name, ( !empty($data) && $data == "$st->State_name") ? TRUE : FALSE )?>><?php echo $st->State_name?></option>
                                   <?php }?>
                               </select>
                                <span class="red"><?=  form_error('state');?></span>
                             </div> 
                        </div>
                         <div class="col-md-6">
                            <div class="form-group has-feedback">
                              <label for="signupInputRePassword1" class="text-muted">City<span class="red">*</span></label>
                              <select class="form-control b-c" id="city-reg" name="city" >
                                 <option value="">Select</option>
                                 <?php  foreach($citys as $ct){?>
                                 <option value="<?php echo $ct->City_name?>" <?php echo set_select('city',$ct->City_name, ( !empty($data) && $data == "$ct->City_name") ? TRUE : FALSE )?>><?php echo $ct->City_name?></option>
                                 <?php  }?>
                             </select>   
                              <span class="red"><?=  form_error('city');?></span>
                           </div>
                        </div>
                   </div>
                   <div class="row">
                       <div class="col-md-6">
                            <div class="form-group has-feedback">
                              <label for="" class="text-muted">Zip Code<span class="red">*</span></label>
                               <input id="signupInputRePassword1" name="zip" type="text" placeholder="Zip Code"   required data-parsley-equalto="#zip" class="form-control"   required class="form-control" value="<?= set_value("zip"); ?>" onkeyup="validateR(this, '')" ruleset="[^0-9]" maxlength="6">
                              <span class="fa fa-map-marker form-control-feedback text-muted"></span>
                              <span class="red"><?=  form_error('zip');?></span>
                           </div>
                        </div>
                    </div>
                   <div class="row">
                         <div class="col-md-6">
                            <div class="form-group has-feedback">
                              <label for="" class="text-muted">ID Proof</label>
                               <input id="" name="idproof" type="file"   required >
                           </div>
                         </div>
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                             <label for="" class="text-muted">Address Proof</label>
                              <input id="" name="addproof" type="file"   required >
                          </div>
                        </div>
                    </div>
                  <div class="clearfix">
                    <div class="checkbox c-checkbox pull-left mt0">
                       <label>
                          <input type="checkbox" value="1" required name="agreed" />
                          <span class="fa fa-check"></span>I agree with the <a href="#">terms</a>
                       </label>
                    </div>
                  </div>
                 <div class="row">
                         <div class="col-md-12 text-center ">
                            <span class="red"><?php echo  form_error('agreed');?></span>
                           <input type="submit" class="btn btn-lg btn-primary mt-lg" name="create_account" value="Create account"/>
                        </div>
                  </div>
               </form>
               <p class="pt-lg text-center"><a href="http://esytopup.com/">Home !</a></p>
               <p class="pt-lg text-center"><a href="<?php echo base_url()?>login/access">Have an account?</a></p>
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
   <script src="<?php echo $this->config->item('assets_url') ?>app/js/my.js"></script>
   <script src="<?php echo $this->config->item('assets_url') ?>app/js/jquery.passstrength.min.js"></script>
<script>
        $(document).ready(function () {
           $('input[type=password]').bind('cut copy paste', function (e) {
              e.preventDefault();
           });
            $("#strpassword").passStrengthify({ rawEntry: true });
    });
</script>
<script>
   function validateR(element,replacement)
   {
     //  IE
     if(! element)
      element = window.event.srcElement;
      element.value = element.value.replace(new RegExp(element.getAttribute('ruleset'), 'gi'), replacement);
   }
     // Get city by ajax
        $('#state-reg').change(function(){
		var state    =    $('option:selected', this).attr('state_id');
                if(state != "Select State" ) {
                        $.post('<?=base_url()?>register/getCityChanged',
                                    {'state':state},function(response){
                                    $('#city-reg').html(response);
                        });
                }else{
                        $('#city-reg').html('<option value="Select City"> Select City </option>');
                }                
	});
        
</script>
</body>

</html>