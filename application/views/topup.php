<section>
         <!-- Page content-->
    <div class="content-wrapper">
       <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
             <li><a href="<?php echo base_url();?>dashboard">Dashboard</a>
             </li>                  
                              
             <li class="active">DMR</li>                 
          </ol>Add In wallet
          <!-- Small text for title-->
          
          <!-- Breadcrumb below title-->
       </h3>
        <div class="row">
        <div class="col-md-12">
        <div class="dmr-menu">
            <b>Name :</b> <span class="ligcol"><?php echo $this->session->userdata('dmrname');?> <?php echo $this->session->userdata('dmrlastname');?> </span>, &nbsp;
            <b>Mobile :</b> <span class="ligcol"><?php echo $this->session->userdata('dmrmo');?></span>, &nbsp;
            <b>Card :</b> <span class="ligcol"><?php echo $this->session->userdata('dmrcard');?></span>, 
             
            <b>KYC :</b> <span class="ligcol"><?php echo $this->session->userdata('dmrkyc');?></span>
            <span class="pull-right">
                <span style="color:#DF0101;"><i class="fa fa-hand-o-right fa-lg"></i></span>&nbsp;&nbsp;
		<?php  if($this->session->userdata('dmrkyc') =="KYC  Processing" || $this->session->userdata('dmrkyc') =="KYC Not Collected" || $this->session->userdata('dmrkyc') =="KYC Rejected"){?>
				<a href="<?php echo base_url()?>dmr/doKyc"><b>Do KYC</b></a>&nbsp; | 
				<?php } ?>
			  &nbsp;
                    <a href="<?php echo base_url()?>dmr/dmrLogout"><b>DMR Logout</b></a> 
            </span>
        </div>
        </div>
        </div>
       <!-- START widgets box-->       
       <div class="row">              
              <?php $this->load->view("layout/success_error");?> 
         <div class="row text-center"> 
                <?php if(count($limit) != 0){?>
                    <div class="col-lg-3">
                       <h4>Wallet Amount: <fotn style="color:#4AC3E9 !important;"><?php echo $limit->CURRENTVALUE;?></fotn></h4>  
                   </div>
                    <div class="col-lg-3">
                      <h4>Remaining Wallet: <fotn style="color:#4AC3E9 !important;"><?php echo $limit->TOPUPLIMIT;?></fotn></h4> 
                   </div>
                   <div class="col-lg-3">
                       <h4>Used Card: <fotn style="color:#4AC3E9 !important;"><?php echo $card_bal->CONSUMEDLIMIT;?></fotn></h4> 
                   </div>
                   <div class="col-lg-3">
                       <h4>Remaining Card: <fotn style="color:#4AC3E9 !important;"><?php echo $card_bal->REMAININGLIMIT;?></fotn></h4> 
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
                                     <label for="Mobile" >Wallet Amount<font class="red mmid-imp">*</font></label>
                                     <input name="amount" id="amt"  class="form-control m-c" placeholder="Wallet Amount" type="text" value="<?= set_value("amount"); ?>" onkeyup="validateR(this, '')" ruleset="[^0-9.]" >
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
                            <input type='button' class='btn btn-sm btn-info dotopup myotp'   name='topup' value='Add In Wallet' />
                            
                        </div>
                        </div>

                        

                    </div>
                 </div>
           </div>
       </form>   
      <div class="col-lg-12">
                <p><h4>Wallet Terms & Condition</h4></p>
            <ol>
                <li>Minimum wallet amount is <span style="font-family:rupee;font-size:13px">R</span> 100.00</li>
                <li>For each wallet service charge will be <span style="font-family:rupee;font-size:13px">R</span> 0.45 %</li>
                <li>Any how money will not directly revert from customer's wallet account to agent's account. </li>
            </ol>
            </div>
       </div>
    </div>
 </section>
<script>
    
   
    $('#amt').change(function(){
        var amt = parseInt($('#amt').val());
        var ch = (amt * 0.45)/100;
        $('#charge').val(ch.toFixed(2));
        
    });
</script>