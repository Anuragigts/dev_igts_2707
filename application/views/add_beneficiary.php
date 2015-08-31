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
          <span class="text-sm hidden-xs">(Name: <?php echo $this->session->userdata('dmrname');?> <?php echo $this->session->userdata('dmrlastname');?> ) 
              <b>Mobile:</b> <?php echo $this->session->userdata('dmrmo');?>, 
              <b>card:</b> <?php echo $this->session->userdata('dmrcard');?>, 
              <b>Transaction Limit:</b> <?php echo $this->session->userdata('dmrtranslimit');?>,&nbsp;
				<?php  if($this->session->userdata('dmrkyc') =="KYC Not Collected"){?>
				<a href="<?php echo base_url()?>dmr/doKyc"><b>Do KYC</b></a>&nbsp; | 
				<?php }; ?>
			  &nbsp;
              <a href="<?php echo base_url()?>dmr/dmrLogout"><b>DMR Logout</b></a> </span>
          <!-- Breadcrumb below title-->
       </h3>
       <!-- START widgets box-->
       
       <div class="row">
               <?php $this->load->view("layout/success_error");?>          
             <br>
            
            <div class="col-lg-12">
                <form method="post" role="form">
                    <div class="row">
                        <div class="panel panel-default">                            
                            <div class="panel-body">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                       <label for="Mobile" >Card number<font class="red">*</font></label>
                                       <input name="card_no" class="form-control" type="text" value="<?php echo $this->session->userdata('dmrcard');?>" readonly="readonly" >
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
                                        <select class="form-control"  name="b_type" id='b_type' >
<!--                                            <option value="">Select</option>-->
                                            <option value="IFSC" <?php echo set_select('b_type','IFSC', ( !empty($data) && $data == "IFSC") ? TRUE : FALSE )?>>IFSC</option>
                                            <option value="MMID" <?php echo set_select('b_type','MMID', ( !empty($data) && $data == "MMID") ? TRUE : FALSE )?>>MMID</option>
                                            
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
                                <div class="col-lg-4 m-c">
                                    <label for="Mobile" >MMID Number<font class="red mmid-imp">*</font></label>
                                    <input name="mmid" class="form-control " type="text" value="<?= set_value("mmid"); ?>"  placeholder="MMID Number" onkeyup="validateR(this, '')" ruleset="[^0-9]" maxlength="7">
                                    <span class="red"><?=  form_error('mmid');?></span>
                                </div>
                                 <div class="col-lg-4 b-c">
                                    <label for="Mobile" >Bank Name<font class="red ifsc-imp">*</font></label>
                                    <select name="bank_name" class="form-control " id="bnk_name">
                                        <option value="">Select</option>
                                        <?php foreach($banks as $bnk){?>
                                            <option value="<?php echo $bnk->name;?>" is_require="<?php echo $bnk->require;?>" <?php echo set_select('bank_name',$bnk->name, ( !empty($data) && $data == $bnk->name) ? TRUE : FALSE )?>><?php echo $bnk->name;?></option>
                                        <?php }?>

                                    </select>
                                    <span class="red"><?=  form_error('bank_name');?></span>
                                    <input type="hidden" value="" name="reqval" id="reqval">
                                </div>
                                 <div class="col-lg-4 b-c">
                                     <label for="Mobile" >Account No<font class="red ifsc-imp">*</font></label>
                                    <input name="ac_no" class="form-control " type="text" value="<?= set_value("ac_no"); ?>" placeholder="Account No" onkeyup="validateR(this, '')" ruleset="[^0-9]">
                                    <span class="red"><?=  form_error('ac_no');?></span>
                                </div>
                                <div class="col-lg-4">
                                    <label for="Mobile" >Beneficiary Name<font class="red">*</font></label>
                                    <input name="b_name" class="form-control" type="text" value="<?= set_value("b_name"); ?>" placeholder="Beneficiary Name" onkeyup="validateR(this, '')" ruleset="[^A-Z a-z]">
                                    <span class="red"><?=  form_error('b_name');?></span>
                                </div>
                                 <div class="col-lg-4 m-c">
                                    <label for="Mobile" >Mobile<font class="red mmid-imp">*</font></label>
                                    <input name="mobile" class="form-control " placeholder="Mobile" type="text" value="<?= set_value("mobile"); ?>" onkeyup="validateR(this, '')" ruleset="[^0-9]" maxlength="10">
                                    <span class="red"><?=  form_error('mobile');?></span>
                                </div>
                                <div class="col-lg-4 b-c">
                                     <label for="Mobile" >IFSC Code<font class="red ifsc-imp">*</font></label>
                                     <input name="ifsc_code" class="form-control  ajaxval" id="ifsc" type="text" value="<?= set_value("ifsc_code"); ?>" placeholder="IFSC Code" maxlength="11">
                                    <span class="red"><?=  form_error('ifsc_code');?></span>
                                </div>
                                
                               
                                
                                <div class="col-lg-4 b-i">
                                     <label for="Mobile" >State<font class="red ifsc-imp b-c">*</font></label>
                                     <input name="state" class="form-control  ajaxval" id="state1"  type="text" value="<?= set_value("state"); ?>" placeholder="State" readonly="readonly" >
                                    <span class="red"><?=  form_error('state');?></span>
                                </div>
                                <div class="col-lg-4 b-i">
                                    <label for="Mobile" >City<font class="red ifsc-imp">*</font></label>
                                    <input name="city" class="form-control  ajaxval" id="city1" type="text" value="<?= set_value("city"); ?>" placeholder="City" readonly="readonly" >
                                    <span class="red"><?=  form_error('city');?></span>
                                    <!--<input name="city" class="form-control" type="text" value="">-->
                                    
                                </div>
                                 <div class="col-lg-4 b-i">
                                    <label for="Mobile" >Branch Name<font class="red ifsc-imp">*</font></label>
                                    <input name="branch_name" class="form-control  ajaxval" id="branch1" type="text" value="<?= set_value("branch_name"); ?>" placeholder="Branch Name" readonly="readonly" >
                                   
                                    <!--<input name="branch_name" class="form-control b-c" type="text" value=""  placeholder="Branch Name">-->
                                    <span class="red"><?=  form_error('branch_name');?></span>
                                </div>
                                <div class="col-lg-4 b-i">
                                    <label for="Mobile" >Address<font class="red ifsc-imp">*</font></label>
                                    <input name="address" class="form-control ajaxval " id="add1" type="text" value="<?= set_value("address"); ?>" placeholder="Address" readonly="readonly" >
                                   
                                    <!--<input name="branch_name" class="form-control b-c" type="text" value=""  placeholder="Branch Name">-->
                                    <span class="red"><?=  form_error('address');?></span>
                                </div>
                               
                                
                               
                                <div class="col-lg-12">                                     
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
                                        Rs 6 will be deducted from the main account (maintained with us of the Client). and Rs 1 will be transferred to beneficiary account.<font class="red ifsc-imp">*</font>
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
            
             
       </div>            
    </div>
 </section>

<script>
    $('.ifsc-imp').hide();
    $('.mmid-imp').hide();
    $(".b-c").hide();
    $(".m-c").hide();
    $(".b-i").hide();
       $(function(){
        var val = $('#b_type').val();
         if(val == 'MMID'){
            $('.mmid-imp').show();
             $('.ifsc-imp').hide();
             $(".b-i").hide();
             $(".b-c").hide('slide', {direction: 'right'}, 1400);
            $(".m-c").show('slide', {direction: 'left'}, 1400);
        }else if(val == 'IFSC'){
            $('.ifsc-imp').show();
            $('.mmid-imp').hide();
             $(".b-i").hide();
             $(".b-c").show('slide', {direction: 'left'}, 1400);
            $(".m-c").hide('slide', {direction: 'right'}, 1400);;
        }else{
            $('.ifsc-imp').hide();
            $('.mmid-imp').hide();
             $(".b-i").hide();
             $(".b-c").hide('slide', {direction: 'right'}, 1400);;
            $(".m-c").hide('slide', {direction: 'right'}, 1400);;
        }
        
        //var require = $('#bnk_name').attr('is_require');$('option:selected', this).attr('is_require')
        var require = $('#bnk_name option:selected', this).attr('is_require');
        //alert(require);
        if(require == '1'){
             $('#ifsc').attr('readonly', 'readonly');
            $(".b-i").hide('slide', {direction: 'right'}, 1400);
             $('#reqval').val('');
             var name = $('#bnk_name').val();
           // $("#loading").modal('show');
            $.post('<?php echo base_url();?>dmr/getIFSCBank',{'name':name},function(response){            
                if(response !=''){
                    $('#ifsc').val(response);
                   // $("#loading").modal('hide');
                }else{
                  // $("#loading").modal('hide'); 
                }
            });
        }else if(require == '0'){
             $('#ifsc').removeAttr('readonly', 'readonly');
            $(".b-i").show('slide', {direction: 'left'}, 1400);
             $('#reqval').val('1');
        }else{
            $('#reqval').val('1');
        }
    });
    // $(".b-c").attr("readonly", "readonly");
    //  $(".m-c").attr("readonly", "readonly");
    $('#b_type').change(function(){
        $('#ifsc').val('');
        var val = $('#b_type').val();
        if(val == 'MMID'){
            $('#bnk_name').val('');
            $('.mmid-imp').show();
             $('.ifsc-imp').hide();
              $(".b-i").hide();
             $(".b-c").hide('slide', {direction: 'right'}, 1400);;
            $(".m-c").show('slide', {direction: 'left'}, 1400);
        }else if(val == 'IFSC'){
            $('#bnk_name').val('');
            $('.ifsc-imp').show();
            $('.mmid-imp').hide();
             $(".b-i").hide();
            $(".b-c").show('slide', {direction: 'left'}, 1400);
            $(".m-c").hide('slide', {direction: 'right'}, 1400);;
        }else{
            $('.ifsc-imp').hide();
            $('#bnk_name').val('');
            $('.mmid-imp').hide();
             $(".b-i").hide();
            $(".b-c").hide('slide', {direction: 'right'}, 1400);;
            $(".m-c").hide('slide', {direction: 'right'}, 1400);;
        }
        
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
    $('#bnk_name').change(function(){
        var require = $('option:selected', this).attr('is_require');
        $('.ajaxval').val('');
        if(require == '1'){
            $('#ifsc').attr('readonly', 'readonly');
            $(".b-i").hide('slide', {direction: 'right'}, 1400);
            $('#reqval').val('');
            var name = $('#bnk_name').val();
            $("#loading").modal('show');
            $.post('<?php echo base_url();?>dmr/getIFSCBank',{'name':name},function(response){            
                if(response !=''){
                    $('#ifsc').val(response);
                    $("#loading").modal('hide');
                }else{
                   $("#loading").modal('hide'); 
                }
            });
        }else if(require == '0'){
             $('#ifsc').removeAttr('readonly', 'readonly');
            $(".b-i").show('slide', {direction: 'left'}, 1400);
             $('#reqval').val('1');
        }else{
            $(".b-i").hide('slide', {direction: 'right'}, 1400);
            $('#reqval').val('1');
        }
    });
    $('#ifsc').keyup(function(){
        var ifsc = $('#ifsc').val(); 
        var bank =$('#bnk_name').val();
       // alert('jj');
        if(ifsc.length == 11){
            $("#loading").modal('show');
            $.post('<?php echo base_url();?>dmr/getAjaxBank',{'ifsc':ifsc,'bank':bank},function(response){
            //alert(response);
            if(response !=''){
               var res = response.split("@@");
                    $('#state1').val(res[0]);  						
                    $('#city1').val(res[1]); 
                    $('#branch1').val(res[2]); 
                    $('#add1').val(res[3]); 
                    $("#loading").modal('hide');
                }else{
                    alert('IFSC CODE IS WEONG ! ')
                     $('#state1').val('');  						
                    $('#city1').val(''); 
                    $('#branch1').val(''); 
                    $('#add1').val(''); 
                    $("#loading").modal('hide');
                    return false;	
                }					
            });
        }
    });
    
</script>