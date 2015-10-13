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
             
				<?php if($this->session->userdata('dmrkyc') !="KYC  Processing"){?>
				<a href="<?php echo base_url()?>dmr/doKyc"><b>Do KYC</b></a>&nbsp; | 
				<?php }/*if($this->session->userdata('dmrkyc') =="KYC Processing"){echo "KYC Processing";}*/ ?>
			  &nbsp;
              <a href="<?php echo base_url()?>dmr/dmrLogout"><b>DMR Logout</b></a> 
          </span>
          <!-- Breadcrumb below title-->
       </h3>
       <!-- START widgets box-->
       <?php //echo $this->session->userdata('dmrkyc');?>
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
                                    <div class="row"><?php // echo "<pre>"; print_r($dl);?>
                                        <div class="col-lg-2"><br>
                                            <?php if(strlen($dl->IFSCCODE) == 11) {?>
                                                <input type="radio" name="typeamt" value="NEFT" class="nefradio" ifcod="<?php echo $i;?>" checked="checked"> NEFT  <br>
                                                <!--<input type="radio" name="typeamt" value="IFSC"  class="ifradio" ifcod="<?php echo $i;?>" totalifsc="<?php echo $dl->IFSCCODE;?>"> IFSC (Tatkal)<br>-->
                                            <?php }if(strlen($dl->IFSCCODE) != 11 && strlen($dl->IFSCCODE) != '') {?>
                                                <input type="radio" name="typeamt" value="IFSC" checked="checked" class="ifradio" ifcod="<?php echo $i;?>" totalifsc="<?php echo $dl->IFSCCODE;?>"> IMPS (Tatkal)<br>
                                            <?php }if(strlen($dl->IFSCCODE) == '') {?>
                                            <input type="radio" name="typeamt" checked="checked" value="MIID"> MIID (Tatkal) 
                                            <?php }?>
                                            <!--input type="radio" name="typeamt" > Tatkal-->
                                           
                                        </div>
                                        <div class="col-lg-2">
                                             <label for="Mobile" >Amount<font class="red">*</font></label>
                                             <input name="tr_amt" class="form-control m-c myamt" get="<?php echo $i;?>" id="total_<?php echo $i;?>" placeholder="Total Amount"  type="text" value="<?= set_value("tr_amt"); ?>" onkeyup="validateR(this, '')" ruleset="[^0-9.]" >
                                             <span class="red"><?=  form_error('tr_amt');?></span>
                                        </div>
                                        
                                        <div class="col-lg-1">
                                            <!--<label for="Mobile" >IFSC<font class="red">*</font></label>-->
                                            <input type="hidden" name="ifsc" value="<?php echo $dl->IFSCCODE;?>" class="form-control " id="ifedit_<?php echo $i;?>" readonly="readonly"/>
                                             <span class="red"><?=  form_error('ifsc');?></span>
                                            <input type="hidden" name="ben_id" value="<?php echo $dl->BENEID;?>" readonly="readonly"/>
                                            <input type="hidden" name="bene" value="<?php if($dl->IFSCCODE == ''){echo "MMID";}else{echo "IFSC";}?>" readonly="readonly"/>
                                            <input type="hidden" name="ac" value="<?php if($dl->IFSCCODE == ''){echo $dl->MMID;}else{echo $dl->ACCOUNTNO;}?>" readonly="readonly"/>
                                            <input type="hidden" name="mo" value="<?php if($dl->MOBILE != '0'){echo $dl->MOBILE;}?>" readonly="readonly"/>
                                        </div>
                                        <div class="col-lg-2">
                                            <label for="Mobile" >Total amount</label>
                                             <input name="" class="form-control m-c myamtt" id="total_amt<?php echo $i;?>" placeholder="Total Charge"  type="text" value="" readonly="readonly" >
                                            
                                        </div>
                                        <div class="col-lg-4">
                                            <span id="service_ch_<?php echo $i;?>"></span>
                                        </div>
                                        
                                    </div>
                                </div>
                                 <div class="panel-footer" style="background-color: #ccc;">
                                     <div class="row">
                                         <?php if(strlen($dl->IFSCCODE) != 11) {?>
                                          <div class="col-lg-3" >                                              
                                              <input type='submit' name='trans' class='btn btn-info' value='Transfer From Wallet' />
                                          </div>
                                          <div class="col-lg-3" >                                              
                                              <input type='submit' name='trans_top' class='btn btn-warning' value='Transfer From Topup' />
                                          </div>
                                         <?php } if(strlen($dl->IFSCCODE) == 11) {?>
                                          <div class="col-lg-3" >
                                              <input type='submit' name='transneft' class='btn btn-info' value='Transfer From Wallet' />
                                          </div>
                                         <div class="col-lg-3" >
                                             <input type='submit' name='transneft_top' class='btn btn-warning' value='Transfer From Topup' />
                                         </div>
                                        <?php }?>
                                         <div class="col-lg-2">
                                             <a href="<?php echo base_url()?>dmr/removeBeneficary/<?php echo $dl->BENEID;?>" class="btn btn-danger" title="Remove"><i class="fa fa-trash-o "></i> Remove</a>
                                         </div> 
                                          <div class="col-lg-2">
                                              <button class="btn btn-danger cancel" >Cancel</button> 
                                             
                                         </div> 
                                          <div class="col-lg-2 status-ver">
                                              <a href="javascript:void(0);" class="btn btn-warning verify" id="ver_<?php echo $i;?>" mysd="<?php echo $i;?>" bnk="<?php echo $dl->BANKNAME;?>" branch="<?php echo $dl->BRANCHNAME;?>" ifsc="<?php echo $dl->IFSCCODE;?>" mo="<?php echo $dl->MOBILE;?>" acc ="<?php if($dl->IFSCCODE == ''){echo $dl->MMID;}else{echo $dl->ACCOUNTNO;}?>" type="<?php if(strlen($dl->IFSCCODE) == 11) {echo "8";}else if(strlen($dl->IFSCCODE) == '' || strlen($dl->IFSCCODE) == 0) {echo "1";}else{echo "2";}?>" >Verify</a> 
                                             
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
    $('.verify').click(function(){
        var type = $(this).attr('type');
        var acc = $(this).attr('acc');
        var mo = $(this).attr('mo');
        var ifsc = $(this).attr('ifsc');
        var branch = $(this).attr('branch');
        var bnk = $(this).attr('bnk');
        var mysd = $(this).attr('mysd');
         $("#loading").modal('show');
            $.post('<?php echo base_url();?>dmr/verifybene',{'type':type,'acc':acc,'mo':mo,'ifsc':ifsc,'branch':branch,'bnk':bnk},function(response){
            
                if(response !=''){                        
                        
                        $('#ver_'+mysd).html("<buttion class='btn btn-success'>Verified</buttion>");
                        $("#loading").modal('hide');
                    }else{
                            $('#ver_'+mysd).html("<buttion class='btn btn-danger'>Not Verified</buttion>");
                            $("#loading").modal('hide');
                    }					
                });
    });
    $('.myamt').val('');
    $('.myamtt').val('');
    $('.cancel').click(function(){
        $('.myamt').val('');
    $('.myamtt').val('');
    });
    
//     $('.nefradio').click(function(){
//        var atval = $(this).attr('ifcod');
//        var ifval = $('#ifedit_'+atval).val().length;
//        if(ifval != 11){
//           $('#ifedit_'+atval).removeAttr("readonly"); 
//           $('#ifedit_'+atval).val('');
//        }
//    });
//    $('.ifradio').click(function(){
//        var atval = $(this).attr('ifcod');
//        var ifs = $(this).attr('totalifsc');
//       $('#ifedit_'+atval).val(ifs);
//        $('#ifedit_'+atval).attr("readonly","readonly"); 
//         
//
//    });
    
    $('.myamt').keyup(function(){
        var getvel = $(this).attr('get');
       var amt =  parseInt($('#total_'+getvel).val());
       var cal = (amt * 0.45)/100;
       
       var t = (amt + cal);
       $('#total_amt'+getvel).val(t.toFixed(2));
       $('#service_ch_'+getvel).html("<b>Transaction Charge </b> <br>"+cal.toFixed(2)+" <br> No Charge for wallet");
       
//        if(amt >= 100 && amt < 25001){
//           if(amt < 1001){
//              var ch = $('#charge_'+getvel).val(10);
//              $('#total_'+getvel).val(amt+10);
//           }else if(1000 < amt < 2001){
//              var ch = $('#charge_'+getvel).val(15);
//              $('#total_'+getvel).val(amt+15);
//           }else if(2000 < amt < 3001){
//              var ch = $('#charge_'+getvel).val(30);
//              $('#total_'+getvel).val(amt+30);
//           }else if(3000 < amt < 4001){
//              var ch = $('#charge_'+getvel).val(45);
//              $('#total_'+getvel).val(amt+45);
//           }else if(4000 < amt < 5001){
//              var ch = $('#charge_'+getvel).val(60);
//              $('#total_'+getvel).val(amt+60);
//           }else if(5000 < amt < 10001){
//              var ch = $('#charge_'+getvel).val(100);
//              $('#total_'+getvel).val(amt+100);
//           }else if(10000 < amt < 11001){
//              var ch = $('#charge_'+getvel).val(115);
//              $('#total_'+getvel).val(amt+115);
//           }else if(11000 < amt < 12001){
//              var ch = $('#charge_'+getvel).val(130);
//              $('#total_'+getvel).val(amt+130);
//           }else if(12000 < amt < 13001){
//              var ch = $('#charge_'+getvel).val(145);
//              $('#total_'+getvel).val(amt+145);
//           }else if(13000 < amt < 14001){
//              var ch = $('#charge_'+getvel).val(160);
//              $('#total_'+getvel).val(amt+160);
//           }else if(14000 < amt < 15001){
//              var ch = $('#charge_'+getvel).val(175);
//              $('#total_'+getvel).val(amt+175);
//           }else if(15000 < amt < 20001){
//              var ch = $('#charge_'+getvel).val(200);
//              $('#total_'+getvel).val(amt+200);
//           }else if(20000 < amt < 21001){
//              var ch = $('#charge_'+getvel).val(215);
//              $('#total_'+getvel).val(amt+215);
//           }else if(21000 < amt < 22001){
//              var ch = $('#charge_'+getvel).val(230);
//              $('#total_'+getvel).val(amt+230);
//           }else if(22000 < amt < 23001){
//              var ch = $('#charge_'+getvel).val(245);
//              $('#total_'+getvel).val(amt+245);
//           }else if(23000 < amt < 24001){
//              var ch = $('#charge_'+getvel).val(260);
//              $('#total_'+getvel).val(amt+260);
//           }else if(24000 < amt < 25000){
//              var ch = $('#charge_'+getvel).val(275);
//              $('#total_'+getvel).val(amt+275);
//           }else if(amt == 25000){
//              var ch = $('#charge_'+getvel).val(250);
//              $('#total_'+getvel).val(amt+250);
//           }else{
//               $('#charge_'+getvel).val('');
//               $('#total_'+getvel).val('');
//           }
//       }else{
//               $('#charge_'+getvel).val('');
//               $('#total_'+getvel).val('');
//           }
//      
        
    });    
    
</script>