<section>
         <!-- Page content-->
    <div class="content-wrapper">
       <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
             <li><a href="<?php echo base_url();?>dashboard">Dashboard</a>
             </li> 
             <li><a href="<?php echo base_url();?>dmr/dmrUserSearch">Transfer Money</a>
             </li>  
             <li><a href="<?php echo base_url();?>dmr/sender_registration">Sender Registration</a>
             </li>                  
             <li class="active">DMR Verification</li>                 
          </ol>OTP
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">For verification of account details</span>
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
                  <!-- START panel tab-->
                 
                     
                     <!-- Tab panes-->
                     <div class=" p0 bg-white">                        
                        <div id="dth_tab" role="tabpanel" class="tab-pane active">
                           <!-- START table responsive-->
                           <div class="list-group mb0">
                               <div class="panel panel-default">
                                   <?php if($details->mmid == '' ){?>
                                    <div class="panel-heading"> OTP will send On your mobile, If Unable to get the SMS Please resend the OTP.</div>
                                    <div class="panel-body">                                       
                                        <form method="post"class="form-horizontal" autocomplete="off">                                          
                                          
                                          <div class="form-group">
                                             <label class="col-lg-3 control-label">Transection Id<font class="red">*</font></label>
                                             <div class="col-lg-9">
                                                 <input name="trans" class="form-control" type="text" value="<?= $details->transection_id; ?>" readonly="readonly" >
                                                 <span class="red"><?=  form_error('trans');?></span>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                              <label class="col-lg-3 control-label">OTP<font class="red">*</font></label>
                                                <div class="col-lg-9">
                                                    <input name="otp" id="code" class="form-control" type="password" value="<?= set_value("otp"); ?>" placeholder="******">
                                                    <span class="red"><?=  form_error('otp');?></span>
                                                </div>
                                          </div>
                                          
                                          <div class="form-group">
                                             <div class="col-lg-offset-3 col-lg-4">
                                                 <input type="submit" class="btn btn-sm btn-info" name="send" value="Verify" />                                                
                                             </div>
                                             <div class="col-lg-4">                            
                                                 <a href="<?php echo base_url()?>dmr/resendOTP/<?php echo $details->transection_id;?>/<?php echo $this->uri->segment(3);?>"><buttion  class="btn btn-sm btn-warning" name="send"  />Resend Send OTP</buttion></a>
                                             </div>
                                          </div>
                                       </form>
                                    </div>
                                   <?php }?>
                                 </div>
                                 <!-- END panel-->
                           </div>
                           <!-- END table responsive-->
                          
                        </div>
                     </div>
                  
                  <!-- END panel tab-->
               </div>
       </div>            
    </div>
 </section>