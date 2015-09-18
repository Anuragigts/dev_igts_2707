<section>
         <!-- Page content-->
    <div class="content-wrapper">
       <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
             <li><a href="<?php echo base_url();?>dashboard">Dashboard</a>
             </li>                  
                              
             <li class="active">DMR</li>                 
          </ol>Transfer Money
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">Search the user, to whom you are going to transfer </span>
          <!-- Breadcrumb below title-->
       </h3>
       <!-- START widgets box-->
       
       <div class="row">           
                <?php if($this->session->flashdata('err') != ''){?>
                 <div class="alert alert-block alert-danger fade in">
                     <button data-dismiss="alert" class="close" type="button">
                       ×
                     </button>
                     <p>
                       <?php echo ($this->session->flashdata('err'))?$this->session->flashdata('err'):''?>
                     </p>
                 </div>
             <br>
             <?php }?>

             <?php if($this->session->flashdata('msg') != ''){?>
                 <div class="alert alert-block alert-info fade in no-margin">
                   <button data-dismiss="alert" class="close" type="button">
                     ×
                   </button>
                   <p>
                     <?php echo ($this->session->flashdata('msg'))?$this->session->flashdata('msg'):''?>
                   </p>
                 </div>
                 </br>
             <?php }?>           
             <br>            
            
           <div class="col-lg-offset-3 col-lg-6">
                     <div class=" p0 bg-white">                        
                        <div id="dth_tab" role="tabpanel" class="tab-pane active">
                           <!-- START table responsive-->
                           <div class="list-group mb0">
                               <div class="panel panel-default">
                                   
                                    <div id="panelDemo14" >
                                        <div class="panel-heading">DMR Login</div>
                                        <div class="panel-body">
                                           <div role="tabpanel">
                                              <!-- Nav tabs-->
                                              <ul role="tablist" class="nav nav-tabs">
                                                 <li role="presentation" class="active"><a href="#otp" aria-controls="home" role="tab" data-toggle="tab">OTP Based Login</a>
                                                 </li>
                                                 <li role="presentation"><a href="#pin" aria-controls="profile" role="tab" data-toggle="tab">PIN Based Login</a>
                                                 </li>                                                
                                              </ul>
                                              <!-- Tab panes-->
                                              <div class="tab-content">
                                                  <div id="otp" role="tabpanel" class="tab-pane active">
                                                        <div class="panel-heading"> Enter mobile number and search after that enter OTP fro login</div>
                                                        <div class="panel-body">                                       
                                                            <form method="post"class="form-horizontal" autocomplete="off">
                                                              <div class="form-group">
                                                                  <label class="col-lg-3 control-label">Mobile<font class="red">*</font></label>
                                                                    <div class="col-lg-9">
                                                                        <input name="mobile" id="mob" class="form-control" type="text" value="<?= set_value("mobile"); ?>" placeholder="Mobile Number" onkeyup="validateR(this, '')" ruleset="[^0-9]" maxlength="10" >
                                                                        <span class="red"><?=  form_error('mobile');?></span>
                                                                    </div>
                                                              </div>
                                                              <div class="form-group myotp"> 
                                                                  <label class="col-lg-3 control-label">OTP<font class="red">*</font></label>
                                                                 <div class="col-lg-9">
                                                                <input name="otp" id="charge" class="form-control m-c" placeholder="******" type="password" value=""  onkeyup="validateR(this, '')" ruleset="[^0-9.]">
                                                               <span class="red"><?=  form_error('otp');?></span>
                                                                 </div>
                                                           </div>
                                                              <div class="form-group">
                                                                 <div class="col-lg-offset-3 col-lg-4">
                                                                     <input type='submit' class='btn btn-sm btn-info myotp'   name='send' value='Login' />
                                                                     <input type="button" class="btn btn-sm btn-info" id="getpin" name="pin" value="Search" />

                                                                 </div>
                                                                 <div class="col-lg-4">                            
                                                                     <a href="<?php echo base_url()?>dmr/sender_registration"><buttion  class="btn btn-sm btn-warning" name="send"  />New Registration For DMR</buttion></a>
                                                                 </div>
                                                              </div>
                                                           </form>
                                                        </div>
                                                      
                                                  </div>
                                                  <div id="pin" role="tabpanel" class="tab-pane">
                                                      <div class="panel-heading"> Enter Customer's with Mobile number and PIN number for login</div>
                                                        <div class="panel-body">
                                                       <form method="post"class="form-horizontal" autocomplete="off">
                                                              <div class="form-group">
                                                                  <label class="col-lg-3 control-label">Mobile<font class="red">*</font></label>
                                                                    <div class="col-lg-9">
                                                                        <input name="mobile" id="mob" class="form-control" type="text" value="<?= set_value("mobile"); ?>" placeholder="Mobile Number" onkeyup="validateR(this, '')" ruleset="[^0-9]" maxlength="10" >
                                                                        <span class="red"><?=  form_error('mobile');?></span>
                                                                    </div>
                                                              </div>
                                                              <div class="form-group "> 
                                                                  <label class="col-lg-3 control-label">PIN<font class="red">*</font></label>
                                                                 <div class="col-lg-9">
                                                                <input name="pin"  class="form-control" placeholder="******" type="password" value=""  onkeyup="validateR(this, '')" ruleset="[^0-9.]">
                                                               <span class="red"><?=  form_error('pin');?></span>
                                                                 </div>
                                                           </div>
                                                              <div class="form-group">
                                                                 <div class="col-lg-offset-3 col-lg-4">
                                                                     <input type='submit' class='btn btn-sm btn-info '   name='pinbut' value='Login' />
                                                                     
                                                                 </div>
                                                                 <div class="col-lg-4">                            
                                                                     <a href="<?php echo base_url()?>dmr/sender_registration"><buttion  class="btn btn-sm btn-warning" name="send"  />New Registration For DMR</buttion></a>
                                                                 </div>
                                                              </div>
                                                           </form>
                                                        </div>
                                                  </div>                                                 
                                              </div>
                                           </div>
                                        </div>
                                     </div>
                                   
                                   
                                                    
                                 </div>
                                 <!-- END panel-->
                           </div>
                           <!-- END table responsive-->
                          
                        </div>
                     </div>
                  
                  <!-- END panel tab-->
               </div>
             
            <div class="col-lg-12">
                <p><h4>DMR Terms & Condition</h4></p>
            <ol>
                <li>For each sender registration <span style="font-family:rupee;font-size:13px">R</span> 15.00 will be service charge.</li>
                <li>For Non-KYC the monthly transaction amount is <span style="font-family:rupee;font-size:13px">R</span> 10,000 And for KYC <span style="font-family:rupee;font-size:13px">R</span> 25,000</li>
                <li>If in case transection is fail then money will debited on sender's account within seven working days. </li>
            </ol>
            </div>
       </div>            
    </div>
 </section>
<script>
      $(function(){$('.myotp').hide();});
        $('#getpin').click(function(){

              $('#getpin').hide();
              $('.myotp').show();


              var mo = $('#mob').val();

               $("#loading").modal('show');
                  $.post('<?php echo base_url();?>dmr/dmrLoginTopupAjax',{'mo':mo},function(response){
                 // alert(response);
                  if(response =='1'){
                          $("#loading").modal('hide');
                      }else{                         
                          var url = "<?php echo base_url();?>";
                          $(location).attr('href',url+"dmr/sender_registration");
                         //window.location= ;
                      }					
                  });
          }); 
</script>