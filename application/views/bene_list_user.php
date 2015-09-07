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
                              
          </ol>View Beneficiary 
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">(Name: <?php echo $this->session->userdata('dmrname');?> <?php echo $this->session->userdata('dmrlastname');?> ) 
              <b>Mobile:</b> <?php echo $this->session->userdata('dmrmo');?>, 
              <b>card:</b> <?php echo $this->session->userdata('dmrcard');?>, 
              <b>Transaction Limit:</b> <?php echo $this->session->userdata('dmrtranslimit');?>,&nbsp;
				<?php  if($this->session->userdata('dmrkyc') =="KYC Not Collected"){?>
				<a href="<?php echo base_url()?>dmr/doKyc"><b>Do KYC</b></a>&nbsp; | 
				<?php }; ?>
			  &nbsp;
              <a href="<?php echo base_url()?>dmr/dmrLogout"><b>DMR Logout</b></a> 
          </span>
          <!-- Breadcrumb below title-->
       </h3>
       <!-- START widgets box-->
       
       <div class="row">
           <?php $this->load->view("layout/success_error");?> 
           <div class="row text-center"> 
                <?php if(count($limit) != 0){?>
                   <div class="col-lg-4">
                       <h4>Face Value: <fotn style="color:#4AC3E9 !important;"><?php echo $limit->FACEVALUE;?></fotn></h4> 
                   </div>
                   <div class="col-lg-4">
                       <h4>Current Value: <fotn style="color:#4AC3E9 !important;"><?php echo $limit->CURRENTVALUE;?></fotn></h4> 
                   </div>
                   <div class="col-lg-4">
                       <h4>Topup Limit: <fotn style="color:#4AC3E9 !important;"><?php echo $limit->TOPUPLIMIT;?></fotn></h4> 
                   </div>
                <?php }?>
               <div class="col-lg-4 "></div>
               <div class="col-lg-4 "></div>
               <div class="col-lg-4 ">
                   <?php if($this->session->userdata('add_beneficiary') == 1){?>
                    <div >
                         <a href="<?php echo base_url();?>dmr/addBeneficiary/<?php echo $this->uri->segment(3);?>" class="btn btn-sm btn-warning">Add Beneficiary</a>
                    </div>
                   <?php }?>
                </div>
               </div>
           
           <div class="col-lg-12">
               <div class="panel-body">
                  <?php $i=1;foreach($ben_details->ITEM as $dl){?> 
                    <div id="" class="panel panel-default panel-demo">
                         <div class="panel-heading panel-heading-collapsed">
                             <b>Beneficiary : </b> <?php echo $dl->BENENAME;?>&nbsp;( <?php echo $dl->BENEID;?>) ,&nbsp;&nbsp;&nbsp;&nbsp;
                             <b>Type : </b> <?php if($dl->IFSCCODE == ''){echo "MMID";}else{echo "IFSC";}?> - <?php if($dl->ACCOUNTNO != ''){ echo $dl->ACCOUNTNO; }else{ echo $dl->MMID; }?>
                             <?php if($dl->MOBILE != '0'){?>
                             ,&nbsp;&nbsp;&nbsp;&nbsp;<b>Mobile : </b> <?php echo $dl->MOBILE;?>
                             <?php }?>&nbsp;&nbsp
                             <b>Account : </b><?php if($dl->BENESTATUS == 'Approved'){echo "Verified";}else{echo "Not Verified";}?>
                             &nbsp;&nbsp&nbsp;&nbsp
                             <?php if($dl->BENESTATUS == 'Approved'){?>
                             <i class="fa fa-check-circle green" title="Verified"></i>
                             <?php }else{?>
                             <i class="fa fa-times-circle red" title="Not Verified"></i>
                             <?php }?>
                            <a href="#" data-tool="panel-collapse" data-toggle="tooltip" title="Collapse Panel" class="pull-right">
                               <em class="fa fa-plus"></em>
                            </a>
                         </div>
                         <!-- .panel-wrapper is the element to be collapsed-->
                         <div class="panel-wrapper collapsing">
                             <form method="post">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-2"><br>
                                            <input type="radio" name="typeamt" checked="checked"> NEFT <br>
                                            <input type="radio" name="typeamt" > Tatkal
                                           
                                        </div>
                                        <div class="col-lg-3">
                                             <label for="Mobile" >Amount</label>
                                             <!--<input name="remark"  class="form-control m-c amt" id="amt_<?php echo $i;?>" get="<?php echo $i;?>" placeholder="Amount" type="text" value="<?= set_value("remark"); ?>"  onkeyup="validateR(this, '')" ruleset="[^0-9.]">-->
                                             <input name="tr_amt" class="form-control m-c" id="total_<?php echo $i;?>" placeholder="Total Amount"  type="text" value="<?= set_value("tr_amt"); ?>" onkeyup="validateR(this, '')" ruleset="[^0-9.]" >
                                        </div>
<!--                                        <div class="col-lg-3">
                                            <label for="Mobile" >Service Charge<font class="red mmid-imp">*</font></label>-->
                                            <input name="tr_charge" id="charge_<?php echo $i;?>" class="form-control m-c" placeholder="Service Charge" type="hidden" value="<?= set_value("tr_charge"); ?>" readonly="readonly" onkeyup="validateR(this, '')" ruleset="[^0-9.]" >
                                           <span class="red"><?=  form_error('tr_charge');?></span>
                                        <!--</div>-->
                                        <div class="col-lg-3">
                                            <input type="hidden" name="ben_id" value="<?php echo $dl->BENEID;?>" readonly="readonly"/>
                                            <input type="hidden" name="bene" value="<?php if($dl->IFSCCODE == ''){echo "MMID";}else{echo "IFSC";}?>" readonly="readonly"/>
                                            <input type="hidden" name="ac" value="<?php if($dl->IFSCCODE == ''){echo $dl->MMID;}else{echo $dl->ACCOUNTNO;}?>" readonly="readonly"/>
                                            <input type="hidden" name="ifsc" value="<?php echo $dl->IFSCCODE;?>" readonly="readonly"/>
                                            <input type="hidden" name="mo" value="<?php if($dl->MOBILE != '0'){echo $dl->MOBILE;}?>" readonly="readonly"/>
                                             <!--<label for="Mobile" >Total Amount<font class="red mmid-imp">*</font></label>-->
                                             <label for="Mobile" >Description<font class="red mmid-imp">*</font></label>
                                            <!--<input name="tr_amt" class="form-control m-c" id="total_<?php echo $i;?>" placeholder="Total Amount" readonly="readonly" type="text" value="<?= set_value("tr_amt"); ?>" onkeyup="validateR(this, '')" ruleset="[^0-9.]" >-->
                                            <input name="remark"  class="form-control m-c amt" id="amt_<?php echo $i;?>" get="<?php // echo $i;?>" placeholder="Description" type="text" value="<?= set_value("remark"); ?>" >
                                            <span class="red"><?=  form_error('tr_amt');?></span>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                                 <div class="panel-footer">
                                     <div class="row">
                                          <div class="col-lg-3" >                                              
                                              <input type='submit' name='trans' class='btn btn-info' value='<?php if($dl->IFSCCODE == ''){echo "MMID";}else{echo "IFSC";}?> Paymwnt'>
                                          </div>
                                         <?php if($dl->IFSCCODE != '') {?>
                                          <div class="col-lg-3" >                                              
                                              <input type='submit' name='transneft' class='btn btn-info' value='NEFT Payment'>
                                          </div>
                                        <?php }?>
                                         <div class="col-lg-3">
                                             <a href="<?php echo base_url()?>dmr/removeBeneficary/<?php echo $dl->BENEID;?>" class="btn btn-danger" title="Remove"><i class="fa fa-trash-o "></i> Remove</a>
                                         </div> 
                                          <div class="col-lg-3">
                                              <?php  if($dl->verification != 1){?>
                                              <a href="<?php echo base_url()?>dmr/accountVerification/<?php if($dl->IFSCCODE == ''){echo '1';}else{echo '2';}?>/<?php echo $dl->BENEID;?>/<?php echo $this->session->userdata('dmrcard');?>/<?php if($dl->IFSCCODE == ''){echo $dl->MMID;}else{echo $dl->ACCOUNTNO;}?>/<?php if($dl->MOBILE !='0'){echo $dl->MOBILE;}else{echo '0';}?>/<?php if($dl->IFSCCODE != ''){echo $dl->IFSCCODE;}else{echo '0';}?>/<?php if($dl->BANKNAME != ''){echo $dl->BANKNAME;}else{echo '0';}?>/<?php if($dl->BRANCHNAME != ''){echo $dl->BRANCHNAME;}else{echo '0';}?>" class="btn btn-warning" >Account Verification</a>
                                            
                                            <?php }?>
                                             
                                         </div> 
                                     </div>
                                 </div>
                             </form>
                         </div>
                      </div>
                   <?php $i++;}?>

                   
                   
                    
               </div>

            </div>
        </div>            
    </div>
 </section>
<script>
    $('.amt').keyup(function(){
        var getvel = $(this).attr('get');
       var amt =  parseInt($('#amt_'+getvel).val());
       if(amt >= 100 && amt < 25001){
           if(amt < 1001){
              var ch = $('#charge_'+getvel).val(10);
              $('#total_'+getvel).val(amt+10);
           }else if(1000 < amt < 2001){
              var ch = $('#charge_'+getvel).val(15);
              $('#total_'+getvel).val(amt+15);
           }else if(2000 < amt < 3001){
              var ch = $('#charge_'+getvel).val(30);
              $('#total_'+getvel).val(amt+30);
           }else if(3000 < amt < 4001){
              var ch = $('#charge_'+getvel).val(45);
              $('#total_'+getvel).val(amt+45);
           }else if(4000 < amt < 5001){
              var ch = $('#charge_'+getvel).val(60);
              $('#total_'+getvel).val(amt+60);
           }else if(5000 < amt < 10001){
              var ch = $('#charge_'+getvel).val(100);
              $('#total_'+getvel).val(amt+100);
           }else if(10000 < amt < 11001){
              var ch = $('#charge_'+getvel).val(115);
              $('#total_'+getvel).val(amt+115);
           }else if(11000 < amt < 12001){
              var ch = $('#charge_'+getvel).val(130);
              $('#total_'+getvel).val(amt+130);
           }else if(12000 < amt < 13001){
              var ch = $('#charge_'+getvel).val(145);
              $('#total_'+getvel).val(amt+145);
           }else if(13000 < amt < 14001){
              var ch = $('#charge_'+getvel).val(160);
              $('#total_'+getvel).val(amt+160);
           }else if(14000 < amt < 15001){
              var ch = $('#charge_'+getvel).val(175);
              $('#total_'+getvel).val(amt+175);
           }else if(15000 < amt < 20001){
              var ch = $('#charge_'+getvel).val(200);
              $('#total_'+getvel).val(amt+200);
           }else if(20000 < amt < 21001){
              var ch = $('#charge_'+getvel).val(215);
              $('#total_'+getvel).val(amt+215);
           }else if(21000 < amt < 22001){
              var ch = $('#charge_'+getvel).val(230);
              $('#total_'+getvel).val(amt+230);
           }else if(22000 < amt < 23001){
              var ch = $('#charge_'+getvel).val(245);
              $('#total_'+getvel).val(amt+245);
           }else if(23000 < amt < 24001){
              var ch = $('#charge_'+getvel).val(260);
              $('#total_'+getvel).val(amt+260);
           }else if(24000 < amt < 25000){
              var ch = $('#charge_'+getvel).val(275);
              $('#total_'+getvel).val(amt+275);
           }else if(amt == 25000){
              var ch = $('#charge_'+getvel).val(250);
              $('#total_'+getvel).val(amt+250);
           }else{
               $('#charge_'+getvel).val('');
               $('#total_'+getvel).val('');
           }
       }else{
               $('#charge_'+getvel).val('');
               $('#total_'+getvel).val('');
           }
      
        
    });    
    
</script>