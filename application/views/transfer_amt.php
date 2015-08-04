<section>
         <!-- Page content-->
    <div class="content-wrapper">
       <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
             <li><a href="<?php echo base_url();?>dashboard">Dashboard</a>
             </li>                  
                              
             <li class="active">DMR</li>                 
          </ol>Money Transfer 
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">Transfer the money to others</span>
          <!-- Breadcrumb below title-->
       </h3>
       <!-- START widgets box-->       
       <div class="row">              
              <?php $this->load->view("layout/success_error");?> 
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
       </div>
       <form method="post">
           <div class="row">
                <div class="panel panel-default">                            
                    <div class="panel-body">
                        <div class="col-lg-4">
                            <label for="Mobile" >Card Number<font class="red">*</font></label>
                            <input name="card" class="form-control" type="text" value="<?php echo $card->card_number; ?>" placeholder="Card Number" readonly="readonly">
                            <span class="red"><?=  form_error('card');?></span>
                        </div>
                        <div class="col-lg-4">
                            <label for="Mobile" >Beneficiary<font class="red mmid-imp">*</font></label>
                            <select class="form-control" name="bene" id="bene">
                                <option value="">Select</option>
                                <?php foreach($benes as $ben){?>
                                    <option value="<?php echo $ben->ben_id;?>" ben_id = "<?php echo $ben->beneid;?>" ben_type = "<?php echo $ben->ben_type;?>" ben_mmid = "<?php echo $ben->ben_mmid;?>" ben_ac = "<?php echo $ben->acc;?>" mobile="<?php echo $ben->ben_mobile;?>" ifsc="<?php echo $ben->bank_ifsc;?>" <?php echo set_select('bene',$ben->ben_id, ( !empty($data) && $data == "$ben->ben_id") ? TRUE : FALSE )?>><?php echo $ben->ben_name;?></option>
                                <?php }?>
                            </select>
                            <span class="red"><?=  form_error('bene');?></span>
                        </div>
                         <div class="col-lg-4">
                            <label for="Mobile" >Beneficiary ID<font class="red mmid-imp">*</font></label>
                            <input name="bene_id" id="bn_id" class="form-control m-c" placeholder="Beneficiary Id" type="text" value="<?= set_value("bene_id"); ?>" readonly="readonly">
                            <span class="red"><?=  form_error('bene_id');?></span>
                        </div>
                         <div class="col-lg-4">
                            <label for="Mobile" >Beneficiary Type<font class="red mmid-imp">*</font></label>
                            <input name="bene_type" id="bn_type" class="form-control m-c" placeholder="Beneficiary Type" type="text" value="<?= set_value("bene_type"); ?>" readonly="readonly">
                            <span class="red"><?=  form_error('bene_type');?></span>
                        </div>


                        <div class="col-lg-4">
                            <label for="Mobile" >Transfer Amount<font class="red mmid-imp">*</font></label>
                            <input name="tr_amt" class="form-control m-c" placeholder="Transfer Amount" type="text" value="<?= set_value("tr_amt"); ?>" onkeyup="validateR(this, '')" ruleset="[^0-9.]" >
                            <span class="red"><?=  form_error('tr_amt');?></span>
                        </div>
                        <div class="col-lg-4">
                            <label for="Mobile" >Transfer Description<font class="red mmid-imp">*</font></label>
                            <input name="tr_des" id="tr_des" class="form-control m-c" placeholder="Transfer Description" type="text" value="<?= set_value("tr_des"); ?>" onkeyup="validateR(this, '')" ruleset="[^0-9]" readonly="readonly" >
                            <span class="red"><?=  form_error('tr_des');?></span>
                        </div>
                        <div class="col-lg-4">
                            <label for="Mobile" >Service Charge<font class="red mmid-imp">*</font></label>
                            <input name="tr_charge" id="mobile" class="form-control m-c" placeholder="Service Charge" type="text" value="<?= set_value("tr_charge"); ?>" onkeyup="validateR(this, '')" ruleset="[^0-9.]" >
                            <span class="red"><?=  form_error('tr_charge');?></span>
                        </div>
                        <div class="col-lg-4">
                            <label for="Mobile" >Mobile<font class="red mmid-imp">*</font></label>
                            <input name="mobile_no" id="tr_mobile" class="form-control m-c" placeholder="Mobile" type="text" value="<?= set_value("mobile_no"); ?>" onkeyup="validateR(this, '')" ruleset="[^0-9]" maxlength="10">
                            <span class="red"><?=  form_error('mobile_no');?></span>
                        </div>
                        <div class="col-lg-4">
                            <label for="Mobile" >IFSC Code<font class="red mmid-imp">*</font></label>
                            <input name="ifsc_cod" id="tr_ifsc" class="form-control m-c" placeholder="IFSC Code" type="text" value="<?= set_value("ifsc_cod"); ?>" >
                            <span class="red"><?=  form_error('ifsc_cod');?></span>
                        </div>
                        <div class="col-lg-4">
                            <label for="Mobile" >Agent Service Charge</label>
                            <input name="agent_charge"  class="form-control m-c" placeholder="Agent Service Charge" type="text" value="<?= set_value("agent_charge"); ?>" onkeyup="validateR(this, '')" ruleset="[^0-9.]">
                            <span class="red"><?=  form_error('agent_charge');?></span>
                        </div>
                        <div class="col-lg-4">
                            <label for="Mobile" >Remarks</label>
                            <input name="remark"  class="form-control m-c" placeholder="Remarks" type="text" value="<?= set_value("remark"); ?>" >
                            <span class="red"><?=  form_error('remark');?></span>
                        </div>
                        
                        

                        <div class="col-lg-12 text-center">
                            <br>
                             <input type="submit" class="btn btn-sm btn-info" name="transfer" value="Transfer Amount" />
                        </div>

                    </div>
                 </div>
           </div>
       </form>   
       <?php }else{?>
        Please Try after some time.
       <?php }?>
       </div>
    </div>
 </section>

<script>
    $('#bene').change(function(){
        var ben_id = $('option:selected', this).attr('ben_id');
        var ben_type = $('option:selected', this).attr('ben_type');
        var ben_mmid = $('option:selected', this).attr('ben_mmid');
        var ben_ac = $('option:selected', this).attr('ben_ac');
        var mobile = $('option:selected', this).attr('mobile');
        var ifsc = $('option:selected', this).attr('ifsc');
        
        $('#bn_id').val(ben_id);
        $('#bn_type').val(ben_type);
        if(ben_type == 'MMID'){
            $('#tr_des').val(ben_mmid);
        }else{
            $('#tr_des').val(ben_ac);
        }
        $('#tr_mobile').val(mobile);
        $('#tr_ifsc').val(ifsc);
    });
</script>