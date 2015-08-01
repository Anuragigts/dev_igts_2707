<section>
         <!-- Page content-->
    <div class="content-wrapper">
       <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
             <li><a href="<?php echo base_url();?>dashboard">Dashboard</a>
             </li>                  
             <li><a href="<?php echo base_url();?>dmr/viewBeneficiary">View Beneficiary</a>
             </li>                  
             <li class="active">DMR</li>                 
          </ol>Edit Beneficiary
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">Edit Beneficiary for transfer money</span>
          <!-- Breadcrumb below title-->
       </h3>
       <!-- START widgets box-->
       
       <div class="row">
               <?php $this->load->view("layout/success_error");?>          
             <br>
             <?php if(count($sender_details) != 0){?>
             <?php if(count($login_details)!= 0){?>
            <div class="col-lg-12">
                <form method="post" role="form">
                    <div class="row">
                        <div class="panel panel-default">                            
                            <div class="panel-body">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                       <label for="Mobile" >Card number<font class="red">*</font></label>
                                       <input name="card_no" class="form-control" type="text" value="<?php echo $sender_details->card_number;?>" readonly="readonly" >
                                        <span class="red"><?=  form_error('card_no');?></span>
                                    </div>
                                </div>
<!--                                <div class="col-lg-4">
                                    <div class="form-group">
                                       <label for="code" >Transection Number<font class="red">*</font></label>
                                        <input name="trans_no" id="code" class="form-control" type="text" value="" readonly="readonly" >
                                        <span class="red"></span>
                                    </div>
                                </div>-->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                       <label for="code" >Beneficiary Type<font class="red">*</font></label>
                                       <input type="text" name="b_type" class="form-control" value="<?php echo $ben_details->ben_type;?>" readonly="readonly">
                                        <span class="red"><?=  form_error('b_type');?></span>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="panel panel-default">                            
                            <div class="panel-body">
                                <div class="col-lg-4">
                                    <label for="Mobile" >Beneficiary Name<font class="red">*</font></label>
                                    <input name="b_name" class="form-control" type="text" value="<?php echo $ben_details->ben_name;?>" placeholder="Beneficiary Name" readonly="readonly">
                                    <span class="red"><?=  form_error('b_name');?></span>
                                </div>
                                <?php if($ben_details->ben_type == "MMID"){?>
                                <div class="col-lg-4">
                                    <label for="Mobile" >MMID Number<font class="red mmid-imp">*</font></label>
                                    <input name="mmid" class="form-control m-c" type="text" value="<?php echo $ben_details->ben_mmid;?>"  placeholder="MMID Number">
                                    <span class="red"><?=  form_error('mmid');?></span>
                                </div>
                                 <div class="col-lg-4">
                                    <label for="Mobile" >Mobile<font class="red mmid-imp">*</font></label>
                                    <input name="mobile" class="form-control m-c" placeholder="Mobile" type="text" value="<?php echo $ben_details->ben_mobile;?>" onkeyup="validateR(this, '')" ruleset="[^0-9]" maxlength="10">
                                    <span class="red"><?=  form_error('mobile');?></span>
                                </div>
                                <?php }else{?>
                                <div class="col-lg-4">
                                    <label for="Mobile" >Bank Name<font class="red ifsc-imp">*</font></label>
                                    <select name="bank_name" class="form-control b-c">
                                        <option value="">Select</option>
                                        <option value="HDFC" <?php echo ($ben_details->bank_name == 'HDFC')?"selected = selected":''?>>HDFC</option>
                                    </select>
                                    <span class="red"><?=  form_error('bank_name');?></span>
                                </div>
                               
                                
                                <div class="col-lg-4">
                                     <label for="Mobile" >State<font class="red ifsc-imp b-c">*</font></label>
                                     <select class="form-control b-c" id="state" name="state">
                                        <option value="">Select</option>
                                        <?php foreach($states as $st){?>
                                        <option value="<?php echo $st->State_name?>" state_id="<?php echo $st->State_id?>" <?php echo ($ben_details->bank_state == $st->State_name)?"selected = selected":''?>><?php echo $st->State_name?></option>
                                        <?php }?>
                                    </select>
                                    <span class="red"><?=  form_error('state');?></span>
                                </div>
                                <div class="col-lg-4">
                                    <label for="Mobile" >City<font class="red ifsc-imp">*</font></label>
                                    <select class="form-control b-c" id="city" name="city" >
                                        <option value="">Select</option>
                                        <?php foreach($citys as $ct){?>
                                        <option value="<?php echo $ct->City_name?>" <?php echo ($ben_details->bank_city == $ct->City_name)?"selected = selected":''?>><?php echo $ct->City_name?></option>
                                        <?php }?>
                                    </select>                    
                                    <span class="red"><?=  form_error('city');?></span>
                                    <!--<input name="city" class="form-control" type="text" value="">-->
                                    
                                </div>
                                 <div class="col-lg-4">
                                    <label for="Mobile" >Branch Name<font class="red ifsc-imp">*</font></label>
                                    <input name="branch_name" class="form-control b-c" type="text" value="<?php echo $ben_details->bank_branch; ?>"  placeholder="Branch Name">
                                    <span class="red"><?=  form_error('branch_name');?></span>
                                </div>
                                <div class="col-lg-4">
                                     <label for="Mobile" >IFSC Code<font class="red ifsc-imp">*</font></label>
                                    <input name="ifsc_code" class="form-control b-c" type="text" value="<?php echo $ben_details->bank_ifsc; ?>" placeholder="IFSC Code">
                                    <span class="red"><?=  form_error('ifsc_code');?></span>
                                </div>
                                <div class="col-lg-4">
                                     <label for="Mobile" >Account No<font class="red ifsc-imp">*</font></label>
                                    <input name="ac_no" class="form-control b-c" type="text" value="<?php echo $ben_details->acc; ?>" placeholder="Account No" onkeyup="validateR(this, '')" ruleset="[^0-9]">
                                    <span class="red"><?=  form_error('ac_no');?></span>
                                </div>
                                <?php }?>
                                <div class="col-lg-12 text-center">
                                    <br>
                                     <input type="submit" class="btn btn-sm btn-info" name="edit" value="Edit Beneficiary" />
                                </div>
                              

                            </div>
                         </div>
                    </div>
                </form>
            </div>
             <?php }else{?>                 
                 <div class="col-lg-12">                
                    <div class="row">
                        <div class="panel panel-default">                            
                            <div class="panel-body">
                                You Are not having access to use this functionality (Your DMR automatic login is failed). Please contact to administration.
                            </div>
                        </div>
                    </div>
                 </div>
             <?php }?>
             <?php }else{?>                 
                 <div class="col-lg-12">                
                    <div class="row">
                        <div class="panel panel-default">                            
                            <div class="panel-body">
                                Your DMR Registration or verification is pending.
                            </div>
                        </div>
                    </div>
                 </div>
             <?php }?>
             
       </div>            
    </div>
 </section>

