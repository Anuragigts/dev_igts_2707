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
          <span class="text-sm hidden-xs">Top your card</span>
          <!-- Breadcrumb below title-->
       </h3>
       <!-- START widgets box-->       
       <div class="row">              
              <?php $this->load->view("layout/success_error");?> 
        
          
       <form method="post">
           <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="panel panel-default">                            
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                     <label for="Mobile" >Topup Amount<font class="red mmid-imp">*</font></label>
                                    <input name="amount"  class="form-control m-c" placeholder="Topup Amount" type="text" value="<?= set_value("amount"); ?>" onkeyup="validateR(this, '')" ruleset="[^0-9.]" >
                                    <span class="red"><?=  form_error('amount');?></span>
                                </div>
<!--                                <div class="col-lg-12">
                                        <label for="Mobile" >Mobile<font class="red mmid-imp">*</font></label>
                                        <input name="mobile_no"  class="form-control m-c" placeholder="Mobile" type="text" value="" onkeyup="validateR(this, '')" ruleset="[^0-9]" maxlength="10">
                                        <span class="red"></span>
                                </div>-->
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
                                    <span class="red"><?=  form_error('tr_charge');?></span>
                                </div>
                                <div class="col-lg-12">
                                     <label for="Mobile" >Service Charge<font class="red mmid-imp">*</font></label>
                                    <input name="charge"  class="form-control m-c" placeholder="Service Charge" type="text" value="<?= set_value("charge"); ?>" onkeyup="validateR(this, '')" ruleset="[^0-9.]" >
                                    <span class="red"><?=  form_error('charge');?></span>
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                            <br>
                             <input type="submit" class="btn btn-sm btn-info" name="topup" value="Topup" />
                        </div>
                        </div>

                        

                    </div>
                 </div>
           </div>
       </form>   
      
       </div>
    </div>
 </section>

