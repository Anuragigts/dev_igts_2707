<section>
         <!-- Page content-->
    <div class="content-wrapper">
       <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
             <li><a href="<?php echo base_url();?>dashboard">Dashboard</a>
             </li>                  
             <li class="active">DMR</li>                 
          </ol>Sender Registration
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">For sending money to others account</span>
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
             <?php if(count($sender_details) == 0){?>
            <div class="col-lg-12">
                <form method="post" role="form">
                    <div class="row">
                        <div class="panel panel-default">                            
                            <div class="panel-body">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                       <label for="Mobile" >First Name<font class="red">*</font></label>
                                        <input name="first_name" class="form-control" type="text" value="<?= set_value("first_name"); ?>" >
                                        <span class="red"><?=  form_error('first_name');?></span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                       <label for="code" >Middle Name<font class="red">*</font></label>
                                        <input name="middle_name" id="code" class="form-control" type="text" value="<?= set_value("middle_name"); ?>" >
                                        <span class="red"><?=  form_error('middle_name');?></span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label for="Mobile">Last Name<font class="red">*</font> </label>
                                    <input name="last_name" id="name" class="form-control" type="text" value="<?= set_value("last_name"); ?>">
                                    <span class="red"><?=  form_error('last_name');?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="panel panel-default">                            
                            <div class="panel-body">
                                <div class="col-lg-4">
                                    <label for="Mobile" >Mothers Name<font class="red">*</font></label>
                                    <input name="m_name" class="form-control" type="text" value="<?= set_value("m_name"); ?>" >
                                    <span class="red"><?=  form_error('m_name');?></span>
                                </div>
                                <div class="col-lg-4">
                                    <label for="Mobile" >Date Of Birth<font class="red">*</font></label>
                                    <input name="dob" class="form-control" type="text" value="<?= set_value("dob"); ?>"  placeholder="dd/mm/yyyy">
                                    <span class="red"><?=  form_error('dob');?></span>
                                </div>
                                <div class="col-lg-4">
                                    <label for="Mobile" >Email<font class="red">*</font></label>
                                    <input name="email" class="form-control" type="email" value="<?= set_value("email"); ?>">
                                    <span class="red"><?=  form_error('email');?></span>
                                </div>
                                <div class="col-lg-4">
                                    <label for="Mobile" >Mobile<font class="red">*</font></label>
                                    <input name="mobile" class="form-control" type="text" value="<?= set_value("mobile"); ?>" onkeyup="validateR(this, '')" ruleset="[^0-9]" maxlength="10">
                                    <span class="red"><?=  form_error('mobile');?></span>
                                </div>
                                <div class="col-lg-4">
                                     <label for="Mobile" >State<font class="red">*</font></label>
                                     <select class="form-control" id="state" name="state">
                                        <option value="">Select</option>
                                        <?php foreach($states as $st){?>
                                        <option value="<?php echo $st->State_name?>" state_id="<?php echo $st->State_id?>" <?php echo set_select('state',$st->State_name, ( !empty($data) && $data == "$st->State_name") ? TRUE : FALSE )?>><?php echo $st->State_name?></option>
                                        <?php }?>
                                    </select>
                                    <!--<input name="state" class="form-control" type="text" value="">-->
                                    <span class="red"><?=  form_error('state');?></span>
                                </div>
                                <div class="col-lg-4">
                                    <label for="Mobile" >City<font class="red">*</font></label>
                                    <select class="form-control" id="city" name="city" >
                                        <option value="">Select</option>
                                        <?php foreach($citys as $ct){?>
                                        <option value="<?php echo $ct->City_name?>" <?php echo set_select('city',$ct->City_name, ( !empty($data) && $data == "$ct->City_name") ? TRUE : FALSE )?>><?php echo $ct->City_name?></option>
                                        <?php }?>
                                    </select>                    
                                    <span class="red"><?=  form_error('city');?></span>
                                    <!--<input name="city" class="form-control" type="text" value="">-->
                                    
                                </div>
                                <div class="col-lg-4">
                                     <label for="Mobile" >Address<font class="red">*</font></label>
                                    <input name="add" class="form-control" type="text" value="<?= set_value("add"); ?>">
                                    <span class="red"><?=  form_error('add');?></span>
                                </div>
                                <div class="col-lg-4">
                                    <label for="Mobile" >ZIP<font class="red">*</font></label>
                                    <input name="zip" class="form-control" type="text" value="<?= set_value("zip"); ?>" onkeyup="validateR(this, '')" ruleset="[^0-9]" maxlength="6">
                                    <span class="red"><?=  form_error('zip');?></span>
                                </div>
                                 <div class="col-lg-4">
                                      <label for="Mobile" >KYC<font class="red">*</font></label>
                                      <select class="form-control"  name="kyc" >
                                        <option value="">Select</option>
                                        <option value="1" <?php echo set_select('kyc','1', ( !empty($data) && $data == "1") ? TRUE : FALSE )?>>No</option>
                                        <option value="2" <?php echo set_select('kyc','2', ( !empty($data) && $data == "2") ? TRUE : FALSE )?>>Yes</option>
                                    </select> 
                                    <span class="red"><?=  form_error('kyc');?></span>
                                </div>
                                <div class="col-lg-4">
                                     <label for="Mobile" >ID Proof Type<font class="red">*</font></label>
                                     <select class="form-control"  name="id_proof_type" >
                                        <option value="">Select</option>                                       
                                        <option value="PAN" <?php echo set_select('id_proof_type','PAN', ( !empty($data) && $data == "PAN") ? TRUE : FALSE )?>>PAN</option>
                                        <option value="PASSPORT" <?php echo set_select('id_proof_type','PASSPORT', ( !empty($data) && $data == "PASSPORT") ? TRUE : FALSE )?>>Passport</option>
                                        <option value="VOTER" <?php echo set_select('id_proof_type','VOTER', ( !empty($data) && $data == "VOTER") ? TRUE : FALSE )?>>Voter ID</option>
                                        <option value="DRIVING LICENCE" <?php echo set_select('id_proof_type','DRIVING LICENCE', ( !empty($data) && $data == "DRIVING LICENCE") ? TRUE : FALSE )?>>Driving License</option>
                                        <option value="BANK PASS BOOK" <?php echo set_select('id_proof_type','BANK PASS BOOK', ( !empty($data) && $data == "BANK PASS BOOK") ? TRUE : FALSE )?>>Bank pass book</option>
                                        <option value="DEFENCE ID" <?php echo set_select('id_proof_type','DEFENCE ID', ( !empty($data) && $data == "DEFENCE ID") ? TRUE : FALSE )?>>Defence ID</option>
                                    </select> 
                                    <!--<input name="id_proof_type" class="form-control" type="text" value="">-->
                                    <span class="red"><?=  form_error('id_proof_type');?></span>
                                </div>
                                <div class="col-lg-4">
                                      <label for="Mobile" >ID Proof<font class="red">*</font></label>
                                    <input name="id_proof" class="form-control" type="text" value="<?= set_value("id_proof"); ?>">
                                    <span class="red"><?=  form_error('id_proof');?></span>
                                </div>
                                <div class="col-lg-4">
                                      <label for="Mobile" >ID Proof URL<font class="red">*</font></label>
                                    <input name="id_proof_url" class="form-control" type="url" value="<?= set_value("id_proof_url"); ?>">
                                    <span class="red"><?=  form_error('id_proof_url');?></span>
                                </div>
                                <div class="col-lg-4">
                                     <label for="Mobile" >Address Proof Type<font class="red">*</font></label>
                                    <select class="form-control"  name="address_proof_type" >
                                        <option value="">Select</option>
                                        <option value="PASSPORT" <?php echo set_select('address_proof_type','PASSPORT', ( !empty($data) && $data == "PASSPORT") ? TRUE : FALSE )?>>Passport</option>
                                        <option value="VOTER" <?php echo set_select('address_proof_type','VOTER', ( !empty($data) && $data == "VOTER") ? TRUE : FALSE )?>>Voter ID</option>
                                        <option value="DRIVING LICENCE" <?php echo set_select('address_proof_type','DRIVING LICENCE', ( !empty($data) && $data == "DRIVING LICENCE") ? TRUE : FALSE )?>>Driving License</option>
                                        <option value="TELIPHON BILL" <?php echo set_select('address_proof_type','TELIPHON BILL', ( !empty($data) && $data == "TELIPHON BILL") ? TRUE : FALSE )?>>Telephone Bill</option>
                                        <option value="GAS CONNECTION" <?php echo set_select('address_proof_type','GAS CONNECTION', ( !empty($data) && $data == "GAS CONNECTION") ? TRUE : FALSE )?>>Gas ConnectioN</option>
                                        <option value="BANK PASS BOOK" <?php echo set_select('address_proof_type','BANK PASS BOOK', ( !empty($data) && $data == "BANK PASS BOOK") ? TRUE : FALSE )?>>Bank pass book</option>                                        
                                    </select> 
                                     
                                     <!--<input name="address_proof_type" class="form-control" type="text" value="">-->
                                    <span class="red"><?=  form_error('address_proof_type');?></span>
                                </div>
                                <div class="col-lg-4">
                                      <label for="Mobile" >Address Proof<font class="red">*</font></label>
                                    <input name="address_proof" class="form-control" type="text" value="<?= set_value("address_proof"); ?>">
                                    <span class="red"><?=  form_error('address_proof');?></span>
                                </div>
                                <div class="col-lg-4">
                                      <label for="Mobile" >Address Proof URL<font class="red">*</font></label>
                                    <input name="address_proof_url" class="form-control" type="url" value="<?= set_value("address_proof_url"); ?>">
                                    <span class="red"><?=  form_error('address_proof_url');?></span>
                                </div>
                               
                                <div class="col-lg-12 text-center">
                                    <br>
                                     <input type="submit" class="btn btn-sm btn-info" name="register" value="Register" />
                                </div>
                               
                              

                            </div>
                         </div>
                    </div>
                </form>
            </div>
             
             <?php }else{?>
                
             <div class="col-lg-12">
                 <div class=" p0 bg-white">                        
                        <div id="dth_tab" role="tabpanel" class="tab-pane active">
                           <!-- START table responsive-->
                           <div class="list-group mb0">
                               <div class="panel panel-default">
                                    <div class="panel-heading"> you Already Registered as a sender. Your details are :</div>
                                    <div class="panel-body">
                                        <div class="row"> 
                                            <div class="col-lg-4 top-5">
                                                <label><b>Name : </b></label> <?php echo $sender_details->name;?>
                                            </div>
                                            <div class="col-lg-4 top-5">
                                                <label><b>Mobile : </b></label> <?php echo $sender_details->mobile;?>
                                            </div>
                                            <div class="col-lg-4 top-5">
                                                <label><b>Mobile : </b></label> <?php echo $sender_details->transection_id;?>
                                            </div>                     
                                            <div class="col-lg-4 top-5">
                                                <label><b>Email : </b></label> <?php echo $sender_details->email;?>
                                            </div>
                                            <div class="col-lg-4 top-5">
                                                <label><b>Card Number : </b></label> <?php echo $sender_details->card_number;?>
                                            </div>
                                            <div class="col-lg-4 top-5">
                                                <label><b>Status : </b></label> <?php echo $sender_details->card_number;?>
                                            </div>
                                            <?php if($sender_details->mmid == ''){?>
                                                <div class="col-lg-4 top-5">
                                                   <label><b>Verified : </b></label> No
                                                 </div>
                                                  <div class="col-lg-4 top-5">
                                                      <label><a href="<?php echo base_url()?>dmr/otp/<?php echo $sender_details->d_id?>">Click Here To Verify your account.</a></label> 
                                                 </div>
                                           <?php  }else{?>
                                                   <div class="col-lg-4 top-5">
                                                       <label><b>Verified : </b></label> Yes
                                                   </div>
                                                   <div class="col-lg-4 top-5">
                                                       <label><b>MMID : </b></label> <?php echo $sender_details->mmid;?>
                                                   </div>
                                                   <div class="col-lg-4 top-5">
                                                       <label><b>Serial Number : </b></label> <?php echo $sender_details->serial_no;?>
                                                   </div>
                                           <?php }?>
                                        </div>
                                    </div>
                               </div>
                           </div>
                        </div>
                 </div>
             </div>
             <?php }?>
       </div>            
    </div>
 </section>