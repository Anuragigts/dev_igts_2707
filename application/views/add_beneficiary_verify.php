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
             <li class="active">DMR Beneficiary</li>                 
          </ol>Add Beneficiary
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">Add Users in Beneficiary for transfer money</span>
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

                                <div class="col-lg-6">
                                    <div class="form-group">
                                       <label for="code" >Beneficiary Type<font class="red">*</font></label>
                                        <select class="form-control"  name="b_type" id='b_type' >
                                            <option value="">Select</option>
                                            <option value="MMID" <?php echo set_select('b_type','MMID', ( !empty($data) && $data == "MMID") ? TRUE : FALSE )?>>MMID</option>
                                            <option value="IFSC" <?php echo set_select('b_type','IFSC', ( !empty($data) && $data == "IFSC") ? TRUE : FALSE )?>>IFSC</option>
                                        </select> 
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
                                    <input name="b_name" class="form-control" type="text" value="<?= set_value("b_name"); ?>" placeholder="Beneficiary Name" onkeyup="validateR(this, '')" ruleset="[^A-Z a-z]">
                                    <span class="red"><?=  form_error('b_name');?></span>
                                </div>
                                <div class="col-lg-4">
                                    <label for="Mobile" >MMID Number<font class="red mmid-imp">*</font></label>
                                    <input name="mmid" class="form-control m-c" type="text" value="<?= set_value("mmid"); ?>"  placeholder="MMID Number" onkeyup="validateR(this, '')" ruleset="[^0-9]" maxlength="7">
                                    <span class="red"><?=  form_error('mmid');?></span>
                                </div>
                                 <div class="col-lg-4">
                                    <label for="Mobile" >Mobile<font class="red mmid-imp">*</font></label>
                                    <input name="mobile" class="form-control m-c" placeholder="Mobile" type="text" value="<?= set_value("mobile"); ?>" onkeyup="validateR(this, '')" ruleset="[^0-9]" maxlength="10">
                                    <span class="red"><?=  form_error('mobile');?></span>
                                </div>
                                <div class="col-lg-4">
                                    <label for="Mobile" >Bank Name<font class="red ifsc-imp">*</font></label>
                                    <select name="bank_name" class="form-control b-c" id="bnk_name">
                                        <option value="">Select</option>
                                        <?php foreach($banks as $bnk){?>
                                            <option value="<?php echo $bnk->name;?>" <?php echo set_select('bank_name',$bnk->name, ( !empty($data) && $data == $bnk->name) ? TRUE : FALSE )?>><?php echo $bnk->name;?></option>
                                        <?php }?>
                                           
                                    </select>
                                    <span class="red"><?=  form_error('bank_name');?></span>
                                </div>
                               
                                
                                <div class="col-lg-4">
                                     <label for="Mobile" >State<font class="red ifsc-imp b-c">*</font></label>
                                     <select class="form-control b-c" id="state" name="state">
                                        <option value="">Select</option>
                                        <?php foreach($states as $st){?>
                                        <option value="<?php echo $st->State_name?>" state_id="<?php echo $st->State_id?>" <?php echo set_select('state',$st->State_name, ( !empty($data) && $data == "$st->State_name") ? TRUE : FALSE )?>><?php echo $st->State_name?></option>
                                        <?php }?>
                                    </select>
                                    <span class="red"><?=  form_error('state');?></span>
                                </div>
                                <div class="col-lg-4">
                                    <label for="Mobile" >City<font class="red ifsc-imp">*</font></label>
                                    <select class="form-control b-c" id="city" name="city" >
                                        <option value="">Select</option>
                                        <?php foreach($citys as $ct){?>
                                        <option value="<?php echo $ct->City_name?>" <?php echo set_select('city',$ct->City_name, ( !empty($data) && $data == "$ct->City_name") ? TRUE : FALSE )?>><?php echo $ct->City_name?></option>
                                        <?php }?>
                                    </select>                    
                                    <span class="red"><?=  form_error('city');?></span>
                                    <!--<input name="city" class="form-control" type="text" value="">-->
                                    
                                </div>
                                 <div class="col-lg-4">
                                    <label for="Mobile" >Branch Name<font class="red ifsc-imp">*</font></label>
                                    <select name="branch_name" class="form-control b-c" id="branch" disabled="disabled">
                                        <option value="">Select</option>
                                    </select>
                                    <!--<input name="branch_name" class="form-control b-c" type="text" value=""  placeholder="Branch Name">-->
                                    <span class="red"><?=  form_error('branch_name');?></span>
                                </div>
                                <div class="col-lg-4">
                                     <label for="Mobile" >IFSC Code<font class="red ifsc-imp">*</font></label>
                                     <input name="ifsc_code" class="form-control  b-c" id="ifsc" type="text" value="<?= set_value("ifsc_code"); ?>" placeholder="IFSC Code" >
                                    <span class="red"><?=  form_error('ifsc_code');?></span>
                                </div>
                                <div class="col-lg-4">
                                     <label for="Mobile" >Account No<font class="red ifsc-imp">*</font></label>
                                    <input name="ac_no" class="form-control b-c" type="text" value="<?= set_value("ac_no"); ?>" placeholder="Account No" onkeyup="validateR(this, '')" ruleset="[^0-9]">
                                    <span class="red"><?=  form_error('ac_no');?></span>
                                </div>
                                <div class="col-lg-4">                                     
                                     <div class="checkbox c-checkbox">
                                        <label>
                                            <input type="checkbox" name="verify_ac" id="verify_ac" value="1"> 
                                            <span class="fa fa-check"></span>
                                            <b>Verify This account</b>
                                        </label>
                                     </div>                                    
                                </div>
                                <div class="col-lg-12">                                     
                                    <label class="verify-acc" style="display:none;">
                                        Rs 5 will be deducted from the main account (maintained with us of the Client). and Rs 1 will be transferred to beneficiary account.<font class="red ifsc-imp">*</font>
                                    </label>                          
                                </div>
                               
                                <div class="col-lg-12 text-center">
                                    <br>
                                     <input type="submit" class="btn btn-sm btn-info non_verify" name="add" value="Add Beneficiary" />
                                     <input type="submit" class="btn btn-sm btn-info verify-acc" name="verify" value="Add Beneficiary With Verification" style="display:none;"/>
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

<script>
    $('.ifsc-imp').hide();
    $('.mmid-imp').hide();
     $(".b-c").attr("readonly", "readonly");
      $(".m-c").attr("readonly", "readonly");
    $('#b_type').change(function(){
        var val = $('#b_type').val();
        if(val == 'MMID'){
            $('.mmid-imp').show();
             $('.ifsc-imp').hide();
             $(".b-c").attr("readonly", "readonly");
            $(".m-c").removeAttr("readonly", "readonly");
        }else if(val == 'IFSC'){
            $('.ifsc-imp').show();
            $('.mmid-imp').hide();
            $(".b-c").removeAttr("readonly", "readonly");
            $(".m-c").attr("readonly", "readonly");
        }else{
            $('.ifsc-imp').hide();
            $('.mmid-imp').hide();
            $(".b-c").attr("readonly", "readonly");
            $(".m-c").attr("readonly", "readonly");
        }
        
    });
    $(function(){
        var val = $('#b_type').val();
         if(val == 'MMID'){
            $('.mmid-imp').show();
             $('.ifsc-imp').hide();
             $(".b-c").attr("readonly", "readonly");
            $(".m-c").removeAttr("readonly", "readonly");
        }else if(val == 'IFSC'){
            $('.ifsc-imp').show();
            $('.mmid-imp').hide();
             $(".b-c").removeAttr("readonly", "readonly");
            $(".m-c").attr("readonly", "readonly");
        }else{
            $('.ifsc-imp').hide();
            $('.mmid-imp').hide();
             $(".b-c").attr("readonly", "readonly");
            $(".m-c").attr("readonly", "readonly");
        }
    });
    
    $('#city').change(function(){
        var bname = $('#bnk_name').val();
        var state = $('#state').val();
        var city = $('#city').val();
        if(bname != '' && state != '' && city != ''){
            $("#branch").removeAttr("disabled", "disabled");
            $("#loading").modal('show');
            $.post('<?php echo base_url();?>dmr/getBranch',{'bname':bname, 'state':state, 'city':city},function(response){
                //alert(response);
                if(response != ""){
                        $('#branch').html(response);
                        $("#loading").modal('hide');
                }else{
                      $('#city').html("<option value=''>Select</option>");
                      $('#branch').html("<option value=''>Select</option>");
                }					
            });
        }else{
            $("#branch").attr("disabled", "disabled");
        }
    });
    
    $("#bnk_name").change(function(){
        //$('#state').html("<option value=''>Select</option>");
        $('#city').html("<option value=''>Select</option>");
    });
    $('#branch').change(function(){
        $('#ifsc').val('');
        var br = $('#branch').val();
         $("#loading").modal('show');
        $.post('<?php echo base_url();?>dmr/getifsc',{'br':br},function(response){
               
                if(response != ""){
                        $('#ifsc').val(response);
                        $("#loading").modal('hide');
                }else{
                      $('#ifsc').val('');
                       $("#loading").modal('hide');
                }					
            });
    });
    $('#verify_ac').click(function(){
        
        if( $("#verify_ac").is(':checked')){            
            $('.non_verify').hide();
            $('.verify-acc').css('display','inline');
            $('.verify-acc').show();
        }else{
            $('.verify-acc').hide();
            $('.non_verify').show();
            
        }
    });
    $(function(){
          var check = $('#verify_ac').val();
         
        if($("#verify_ac").is(':checked')){            
            $('.non_verify').hide();
            $('.verify-acc').css('display','inline');
            $('.verify-acc').show();
        }else{
            $('.verify-acc').hide();
            
            $('.non_verify').show();
            
        }
    });
    
</script>