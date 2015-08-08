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
             <li class="active">DMR Beneficiary List</li>                 
          </ol>View Beneficiary
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">View Users in Beneficiary for transfer money</span>
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
                    <div >
                         <a href="<?php echo base_url();?>dmr/addBeneficiary" class="btn btn-sm btn-warning">Add Beneficiary</a>
                    </div>
                </div>
               </div>
           
           <div class="col-lg-12">
               <div class="panel-body">
                  <?php $i=1;foreach($ben_details as $dl){?> 
                    <div id="" class="panel panel-default panel-demo">
                         <div class="panel-heading panel-heading-collapsed">
                             <b>Beneficiary : </b> <?php echo $dl->ben_name;?>&nbsp;( <?php echo $dl->beneid;?>) ,&nbsp;&nbsp;&nbsp;&nbsp;
                             <b>Type : </b> <?php echo $dl->ben_type;?> - <?php if($dl->ben_mmid != ''){ echo $dl->ben_mmid; }else{ echo $dl->bank_ifsc; echo '&nbsp;('.$dl->acc.')';  }?>
                             <?php if($dl->ben_mobile != ''){?>
                             ,&nbsp;&nbsp;&nbsp;&nbsp;<b>Mobile : </b> <?php echo $dl->ben_mobile;?>
                             <?php }?>&nbsp;&nbsp
                             <?php if($dl->otp == 1){?>
                             <i class="fa fa-check-circle green" title="Verified"></i>
                             <?php }else{?>
                             <i class="fa fa-times-circle red" title="Not Verified"></i>
                             <?php }?>
                            <a href="#" data-tool="panel-collapse" data-toggle="tooltip" title="Collapse Panel" class="pull-right">
                               <em class="fa fa-plus"></em>
                            </a>
                         </div>
                         <!-- .panel-wrapper is the element to be collapsed-->
                         <div class="panel-wrapper collapse">
                             <form method="post">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <input type="hidden" name="ben_id" value="<?php echo $dl->beneid;?>" readonly="readonly"/>
                                            <input type="hidden" name="bene" value="<?php echo $dl->ben_id;?>" readonly="readonly"/>
                                             <label for="Mobile" >Transfer Amount<font class="red mmid-imp">*</font></label>
                                            <input name="tr_amt" class="form-control m-c" placeholder="Transfer Amount" type="text" value="<?= set_value("tr_amt"); ?>" onkeyup="validateR(this, '')" ruleset="[^0-9.]" >
                                            <span class="red"><?=  form_error('tr_amt');?></span>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="Mobile" >Service Charge<font class="red mmid-imp">*</font></label>
                                            <input name="tr_charge" id="mobile" class="form-control m-c" placeholder="Service Charge" type="text" value="<?= set_value("tr_charge"); ?>" onkeyup="validateR(this, '')" ruleset="[^0-9.]" >
                                           
                                        </div>
                                        <div class="col-lg-4">
                                             <label for="Mobile" >Remarks</label>
                                            <input name="remark"  class="form-control m-c" placeholder="Remarks" type="text" value="<?= set_value("remark"); ?>" >
                                        </div>
                                    </div>
                                </div>
                                 <div class="panel-footer">
                                     <div class="row">

                                         <div class="col-lg-3">
                                             <a href="<?php echo base_url()?>dmr/removeBeneficary/<?php echo $dl->ben_id;?>/<?php echo $dl->card_no;?>/<?php echo $dl->beneid;?>" class="btn btn-danger" title="Remove"><i class="fa fa-trash-o "></i> Remove</a>
                                         </div> 
                                          <div class="col-lg-3">
                                              <?php  if($dl->otp == 1){?>
                                              <input type="submit" name="trans" class="btn btn-info" value="Transfer Amount">
                                            <?php }else{ ?>
                                                <a href="<?php echo base_url()?>dmr/beneficiaryOTP/<?php echo $dl->ben_id;?>" class="btn btn-warning" > Verify</a>
                                            <?php }?>
                                         </div> 
                                     </div>
                                 </div>
                             </form>
                         </div>
                      </div>
                   <?php }?>
<!--                   <div id="" class="panel panel-default panel-demo">
                        <div class="panel-heading panel-heading-collapsed">Initially collapsed Panel
                          
                           <a href="#" data-tool="panel-collapse" data-toggle="tooltip" title="Collapse Panel" class="pull-right">
                              <em class="fa fa-plus"></em>
                           </a>
                        </div>
                         .panel-wrapper is the element to be collapsed
                        <div class="panel-wrapper collapse">
                           <div class="panel-body">
                              <p>Initially collapsed panel</p>
                           </div>
                           <div class="panel-footer">Panel Footer</div>
                        </div>
                     </div>-->
                   
                   
                    
               </div>

            </div>
        </div>            
    </div>
 </section>