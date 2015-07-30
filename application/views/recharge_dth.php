<section>
         <!-- Page content-->
    <div class="content-wrapper">
       <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
             <li><a href="<?php echo base_url();?>dashboard">Dashboard</a>
             </li>                  
             <li class="active">Recharge</li>                 
          </ol>DTH
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">For DTH recharge</span>
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
           <div class="col-lg-6">
                  <!-- START panel tab-->
                  <div role="tabpanel" class="panel panel-transparent">
                     <!-- Nav tabs-->
                     <ul role="tablist" class="nav nav-tabs nav-justified">
                        <li role="presentation" >
                           <a href="<?php echo base_url();?>recharge/mobile_recharge"  class="bb0">
                              <em class="fa fa-mobile-phone fa-fw"></em>Mobile</a>
                        </li>
                        <li role="presentation " class="active">
                           <a href="<?php echo base_url();?>recharge/dth_recharge#dth_tab" aria-controls="home" role="tab" data-toggle="tab" class="bb0 ">
                              <em class="fa fa-rss fa-fw"></em>DTH</a>
                        </li>
                       
                     </ul>
                     <!-- Tab panes-->
                     <div class=" p0 bg-white">                        
                        <div id="dth_tab" role="tabpanel" class="tab-pane active">
                           <!-- START table responsive-->
                           <div class="list-group mb0">
                               <div class="panel panel-default">
                                    <div class="panel-heading"></div>
                                    <div class="panel-body">
                                        <form method="post"class="form-horizontal" autocomplete="off">                                          
                                          <div class="form-group">
                                             <label class="col-lg-3 control-label">Operator<font class="red">*</font></label>
                                             <div class="col-lg-9">
                                                 <select class="select-oprator form-control" name="oprator_name" >
                                                     <option value="">Select</option>
                                                     <?php foreach($all_operator as $op){?>
                                                     <option value="<?php echo $op->op_name;?>" op_code="<?php echo $op->code;?>" <?php echo set_select('oprator_name',$op->op_name);?>><?php echo $op->op_name;?></option>
                                                     <?php }?>
                                                 </select>
                                                 <span class="red"><?=  form_error('oprator_name');?></span>
                                                 <input type="hidden" name="code" id="code" />
                                                 <input type="hidden"    name="circle"  value="" >
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="col-lg-3 control-label">Number<font class="red">*</font></label>
                                             <div class="col-lg-9">
                                                 <input type="mobile"  placeholder="Number" name="mobile" value="<?= set_value("mobile"); ?>" class="form-control" onkeyup="validateR(this, '')" ruleset="[^0-9]" maxlength="10">
                                                 <span class="red"><?=  form_error('mobile');?></span>
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
                                                 <input type="submit" name="recharge" value="Process To Recharge" class="btn btn-sm btn-info"  />
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
       </div>            
    </div>
 </section>