<section>
         <!-- Page content-->
    <div class="content-wrapper">
       <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
             <li><a href="<?php echo base_url();?>dashboard">Dashboard</a>
             </li>                  
             <li class="active">Post paid </li>                 
          </ol>Post Paid Bill payment
          <!-- Small text for title-->
          
          <span class="text-sm hidden-xs">For Post Paid Bill payment</span>
           <?php if($this->session->userdata('my_type') == 1 ){?>
		   Recharge Amount : <?php echo $amt->REMAININGAMOUNT;?>
           <?php }?>
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
           <div class="col-lg-5">
                  <!-- START panel tab-->
                  <div role="tabpanel" class="panel panel-transparent">
                     <!-- Nav tabs-->
                     <ul role="tablist" class="nav nav-tabs nav-justified">
                        <li role="presentation" >
                           <a href="<?php echo base_url();?>recharge/mobile_recharge"  class="bb0">
                              <em class="fa fa-mobile-phone fa-fw"></em>Pre Paid</a>
                        </li>
                        <li role="presentation ">
                           <a href="<?php echo base_url();?>recharge/dth_recharge" class="bb0 ">
                              <em class="fa fa-rss fa-fw"></em>DTH</a>
                        </li>
                        <li role="presentation " class="active">
                           <a href="<?php echo base_url();?>recharge/post_recharge#post_tab" class="bb0 ">
                              <em class="fa fa-mobile-phone fa-fw"></em>Post Paid</a>
                        </li>
                       
                     </ul>
                     <!-- Tab panes-->
                     <div class=" p0 bg-white">                        
                        <div id="post_tab" role="tabpanel" class="tab-pane active">
                           <!-- START table responsive-->
                           <div class="list-group mb0">
                               <div class="panel panel-default">
                                    <div class="panel-heading"></div>
                                    <div class="panel-body">
                                        <form method="post"class="form-horizontal" id="recharge-form" autocomplete="off">                                          
                                          <div class="form-group">
                                             <label class="col-lg-3 control-label">Operator post<font class="red">*</font></label>
                                             <div class="col-lg-9">
                                                 <select class="select-oprator1 form-control" name="oprator_name" id="op_name" >
                                                     <option value="">Select</option>
                                                     <?php foreach($all_operator->Item as $op){?>
                                                    
                                                     <option value="<?php echo $op->Desc;?>" op_code="<?php echo $op->Code;?>" <?php echo set_select('oprator_name',$op->Desc);?>><?php echo $op->Desc;?></option>
                                                     <?php }?>
                                                 </select>
                                                 <span class="red"><?=  form_error('oprator_name');?></span>
                                                 <input type="hidden" name="code" id="code" />
                                                 <input type="hidden"  name="item"  value="" >
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="col-lg-3 control-label">Number<font class="red">*</font></label>
                                             <div class="col-lg-9">
                                                 <input type="mobile" id="num" placeholder="Number" name="mobile" value="<?= set_value("mobile"); ?>" class="form-control" onkeyup="validateR(this, '')" ruleset="[^0-9]" maxlength="11">
                                                 <span class="red"><?=  form_error('mobile');?></span>
                                             </div>
                                          </div>
                                            <div class="form-group"  id="circle">
                                             <label class="col-lg-3 control-label">Circle Code<font class="red">*</font></label>
                                             <div class="col-lg-9">
                                                 <input type="mobile" placeholder="Circle Code" name="circle" value="<?= set_value("circle"); ?>" class="form-control" >
                                                 <span class="red"><?=  form_error('circle');?></span>
                                             </div>
                                          </div>
                                            <div class="form-group" id="accc">
                                             <label class="col-lg-3 control-label">Account No<font class="red">*</font></label>
                                             <div class="col-lg-9">
                                                 <input type="mobile"  placeholder="Account No" name="accc" value="<?= set_value("accc"); ?>" class="form-control" onkeyup="validateR(this, '')" ruleset="[^0-9]">
                                                 <span class="red"><?=  form_error('accc');?></span>
                                             </div>
                                          </div>
                                          <div class="form-group" id="std">
                                              <label class="col-lg-3 control-label">STD Code<font class="red">*</font></label>
                                                <div class="col-lg-9">
                                                    <input type="text"  placeholder="STD Code" name="std" value="<?= set_value("std"); ?>" class="form-control" onkeyup="validateR(this, '')" ruleset="[^0-9]"  >
                                                    <span class="red"><?=  form_error('std');?></span>
                                                </div>
                                          </div>
                                             <div class="form-group">
                                              <label class="col-lg-3 control-label">Amount<font class="red">*</font></label>
                                                <div class="col-lg-9">
                                                    <input type="text" id="amount" placeholder="Amount" name="amount" value="<?= set_value("amount"); ?>" class="form-control" onkeyup="validateR(this, '')" ruleset="[^0-9]" maxlength="4" >
                                                    <span class="red"><?=  form_error('oprator_name');?></span>
                                                </div>
                                          </div>
                                          
                                          <div class="form-group">
                                             <div class="col-lg-offset-3 col-lg-4">
                                                 <!--<input type="submit" name="recharge" value="Process To Recharge" class="btn btn-sm btn-info"  />-->
                                                 <button class="btn btn-labeled btn-success" id="confirm_dth_recharge" type="button">
                                                    <span class="btn-label">
                                                    <i class="fa fa-check"></i>
                                                    </span>
                                                     Recharge
                                                    </button>
                                             </div>
                                             <div class="col-lg-4">                            
<!--                                                <button id="get-plans" class="btn btn-labeled btn-info" type="button">
                                                  <span class="btn-label">
                                                    <i class="fa fa-check"></i>
                                                  </span>
                                                   Get plans
                                                </button>-->
                                             </div>
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                                 <!-- END panel-->
                           </div>
                           <!-- END table responsive-->
                          
                        </div>
                     </div>
                  </div>
                  <!-- END panel tab-->
               </div>
            
             <div class="col-md-7 hidden-xs">
                 <div class="panel-body" style="border:1px solid #ccc;">
                     <h3> Recharge Details </h3><hr>
                    <table id="" class="table table-striped table-hover ">
                       <thead>
                          <tr>
                             <th >S.No.</th>
                             <th >Number</th>
                             <th >Amount</th>
                             <th >Operator</th>                             
                             <th >Time</th>
                             <!--<th >Done By</th>-->                             
                             <th >Status</th>                             
                          </tr>
                       </thead>
                       <tbody>
                           <?php $i=1;foreach($details as $dl){?>
                           <?php if($dl->recharge_type == 4){?>
                           <?php if($this->session->userdata('my_type') == 1){?>
                           
                                <tr>
                                    <td><?php echo $i; $i++;?></td>
                                    <td><?php echo $dl->number;?></td>
                                    <td><?php echo $dl->amount;?></td>
                                    <td><?php echo $dl->op_name;?></td>
                                    <td><?php echo $dl->responce_time;?></td>
                                    <!--<td><?php // echo $dl->first_name;?> (<?php // echo $dl->u_type;?>)</td>-->
                                    <td>
                                        <?php if($dl->status == 1){
                                            echo "Success";
                                        }else{?>
                                        <button class="btn btn-primary btn-xs" type="button">Complaint</button>

                                        <?php }?>
                                    </td>
                                </tr>
                           <?php }else if($this->session->userdata('my_type') == 2){?>
                                <?php if($dl->master_distributor_id == $this->session->userdata('login_id') || $dl->done_by == $this->session->userdata('login_id')){?>
                                    <tr>
                                        <td><?php echo $i; $i++;?></td>
                                        <td><?php echo $dl->number;?></td>
                                        <td><?php echo $dl->amount;?></td>
                                        <td><?php echo $dl->op_name;?></td>
                                        <td><?php echo $dl->responce_time;?></td>
                                        <td><?php echo $dl->first_name;?> (<?php echo $dl->u_type;?>)</td>
                                        <td>
                                            <?php if($dl->status == 1){
                                                echo "Success";
                                            }else{?>
                                            <button class="btn btn-primary btn-xs" type="button">Complaint</button>

                                            <?php }?>
                                        </td>
                                    </tr>
                                <?php }?>
                           <?php }else if($this->session->userdata('my_type') == 3){?>
                                <?php if($dl->super_distributor_id == $this->session->userdata('login_id') || $dl->done_by == $this->session->userdata('login_id')){?>
                                    <tr>
                                        <td><?php echo $i; $i++;?></td>
                                        <td><?php echo $dl->number;?></td>
                                        <td><?php echo $dl->amount;?></td>
                                        <td><?php echo $dl->op_name;?></td>
                                        <td><?php echo $dl->responce_time;?></td>
                                        <td><?php echo $dl->first_name;?> (<?php echo $dl->u_type;?>)</td>
                                        <td>
                                            <?php if($dl->status == 1){
                                                echo "Success";
                                            }else{?>
                                            <button class="btn btn-primary btn-xs" type="button">Complaint</button>

                                            <?php }?>
                                        </td>
                                    </tr>
                                <?php }?>
                           <?php }else if($this->session->userdata('my_type') == 4){?>
                                <?php if($dl->distributor_id == $this->session->userdata('login_id') || $dl->done_by == $this->session->userdata('login_id')){?>
                                    <tr>
                                        <td><?php echo $i; $i++;?></td>
                                        <td><?php echo $dl->number;?></td>
                                        <td><?php echo $dl->amount;?></td>
                                        <td><?php echo $dl->op_name;?></td>
                                        <td><?php echo $dl->responce_time;?></td>
                                        <td><?php echo $dl->first_name;?> (<?php echo $dl->u_type;?>)</td>
                                        <td>
                                            <?php if($dl->status == 1){
                                                echo "Success";
                                            }else{?>
                                            <button class="btn btn-primary btn-xs" type="button">Complaint</button>

                                            <?php }?>
                                        </td>
                                    </tr>
                                <?php }?>
                           <?php }else{?>
                                    <?php if($dl->done_by == $this->session->userdata('login_id')){?>
                                    <tr>
                                        <td><?php echo $i; $i++;?></td>
                                        <td><?php echo $dl->number;?></td>
                                        <td><?php echo $dl->amount;?></td>
                                        <td><?php echo $dl->op_name;?></td>
                                        <td><?php echo $dl->responce_time;?></td>
                                        <td><?php echo $dl->first_name;?> (<?php echo $dl->u_type;?>)</td>
                                        <td>
                                            <?php if($dl->status == 1){
                                                echo "Success";
                                            }else{?>
                                            <button class="btn btn-primary btn-xs" type="button">Complaint</button>

                                            <?php }?>
                                        </td>
                                    </tr>
                                <?php }?>
                           <?php }?>
                           <?php }}?>
                       </tbody>
                    </table>
               </div>
             </div>
       </div>            
    </div>
 </section>

<script>
    $(function(){
         var val = $('.select-oprator1').val();
        if(val == 'BSNL POSTPAID OR LANDLINE'){
            $('#circle').show();
            $('#accc').show();
            $('#std').show();
        }else if(val == 'RELIANCE POSTPAID'){
             $('#circle').hide();
            $('#accc').hide();
            $('#std').show();
        }else{
            $('#circle').hide();
            $('#accc').hide();
            $('#std').hide();
        }
    });
     $('.select-oprator1').change(function(){ 
       
        var code = $('option:selected', this).attr('op_code');
        $('#code').val(code);
         var val = $('.select-oprator1').val();
        if(val == 'BSNL POSTPAID OR LANDLINE'){
            $('#circle').show();
            $('#accc').show();
            $('#std').show();
        }else if(val == 'RELIANCE POSTPAID'){
             $('#circle').hide();
            $('#accc').hide();
            $('#std').show();
        }else{
            $('#circle').hide();
            $('#accc').hide();
            $('#std').hide();
        }
    });
</script>