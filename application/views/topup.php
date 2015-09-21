<section>
         <!-- Page content-->
    <div class="content-wrapper">
       <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
             <li><a href="<?php echo base_url();?>dashboard">Dashboard</a>
             </li>                  
                              
             <li class="active">DMR</li>                 
          </ol>Topup
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">(Name: <?php echo $this->session->userdata('dmrname');?> <?php echo $this->session->userdata('dmrlastname');?> ) 
              <b>Mobile:</b> <?php echo $this->session->userdata('dmrmo');?>, 
              <b>card:</b> <?php echo $this->session->userdata('dmrcard');?>, 
              <b>Transection Limit:</b> <?php echo $this->session->userdata('dmrtranslimit');?>, &nbsp;
			  <?php  if($this->session->userdata('dmrkyc') =="KYC Not Collected"){?>
				<a href="<?php echo base_url()?>dmr/doKyc"><b>Do KYC</b></a>&nbsp; | 
				<?php }; ?>
              <a href="<?php echo base_url()?>dmr/dmrLogout"><b>DMR Logout</b></a>
          </span>
          <!-- Breadcrumb below title-->
       </h3>
       <!-- START widgets box-->       
       <div class="row">              
              <?php $this->load->view("layout/success_error");?> 
         <div class="row text-center"> 
                <?php if(count($limit) != 0){?>
                    <div class="col-lg-3">
                       <h4>Current Amount: <fotn style="color:#4AC3E9 !important;"><?php echo $limit->CURRENTVALUE;?></fotn></h4>  
                   </div>
                    <div class="col-lg-3">
                       <h4>Topup Limit: <fotn style="color:#4AC3E9 !important;"><?php echo $limit->TOPUPLIMIT;?></fotn></h4> 
                   </div>
                   <div class="col-lg-3">
                       <h4>Used Card: <fotn style="color:#4AC3E9 !important;"><?php echo $card_bal->CONSUMEDLIMIT;?></fotn></h4> 
                   </div>
                   <div class="col-lg-3">
                       <h4>Remaining Limit: <fotn style="color:#4AC3E9 !important;"><?php echo $card_bal->REMAININGLIMIT;?></fotn></h4> 
                   </div>
                   
                <?php }?>
               
               </div>
           <br>
          
           <form method="post" id="topup-form">
           <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="panel panel-default">                            
                        <div class="panel-body">
                            <div class="row">
<!--                                <div class="col-lg-12">
                                     <label for="Mobile" >Mobile<font class="red mmid-imp">*</font></label>
                                     <input name="mob" id="mob"  class="form-control m-c" placeholder="Mobile" type="text" value="<? //set_value("mob"); ?>" onkeyup="validateR(this, '')" ruleset="[^0-9.]" maxlength="10">
                                    <span class="red"><?  //form_error('mob');?></span>
                                </div>-->
                                <div class="col-lg-12">
                                     <label for="Mobile" >Topup Amount<font class="red mmid-imp">*</font></label>
                                     <input name="amount" id="amt"  class="form-control m-c" placeholder="Topup Amount" type="text" value="<?= set_value("amount"); ?>" onkeyup="validateR(this, '')" ruleset="[^0-9.]" >
                                    <span class="red"><?=  form_error('amount');?></span>
                                </div>

                                <div class="col-lg-12">
                                     <label for="Mobile" >Region<font class="red mmid-imp">*</font></label>
                                    <select class="form-control" name="region" id="bene">
                                        <option value="">Select</option>
                                        <option value="1" <?php echo set_select('region',1, ( !empty($data) && $data == "1") ? TRUE : FALSE )?>>South</option>
                                        <option value="2" <?php echo set_select('region',2, ( !empty($data) && $data == "2") ? TRUE : FALSE )?>>North</option>
                                        <option value="3" <?php echo set_select('region',3, ( !empty($data) && $data == "3") ? TRUE : FALSE )?>>West</option>
                                        <option value="4" <?php echo set_select('region',4, ( !empty($data) && $data == "4") ? TRUE : FALSE )?>>East</option>
                                        <option value="5" <?php echo set_select('region',5, ( !empty($data) && $data == "5") ? TRUE : FALSE )?>>Others</option>
                                        
                                    </select>
                                    <span class="red"><?=  form_error('region');?></span>
                                </div>
                                <div class="col-lg-12">
                                     <!--<label for="Mobile" >Service Charge<font class="red mmid-imp">*</font></label>-->
                                     <input name="charge" id="charge" class="form-control m-c" placeholder="Service Charge" type="hidden" value="<?= set_value("charge"); ?>" readonly="readonly" >
                                    
                                </div>
                                
                            </div>
                            <div class="col-lg-12 text-center">
                            <br>
                            <input type='button' class='btn btn-sm btn-info dotopup myotp'   name='topup' value='Topup' />
                            
                        </div>
                        </div>

                        

                    </div>
                 </div>
           </div>
       </form>   
      
       </div>
    </div>
 </section>
<script>
    
   
    $('#amt').change(function(){
        var amt = parseInt($('#amt').val());
        var ch = (amt * 0.20)/100;
        $('#charge').val(ch.toFixed(2));
        
    });
</script>