<section>
         <!-- Page content-->
    <div class="content-wrapper">
       <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
             <li><a href="<?php echo base_url();?>dashboard">Dashboard</a>
             </li>                  
             <li class="active">Recharge</li>                 
          </ol>Mobile
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">For mobile recharge</span>
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
                        <li role="presentation" class="active">
                           <a href="<?php echo base_url();?>recharge/mobile_recharge#mob-tab" aria-controls="home" role="tab" data-toggle="tab" class="bb0">
                              <em class="fa fa-mobile-phone fa-fw"></em>Mobile</a>
                        </li>
                        <li role="presentation ">
                           <a href="<?php echo base_url();?>recharge/dth_recharge" class="bb0 ">
                              <em class="fa fa-rss fa-fw"></em>DTH</a>
                        </li>
                       
                     </ul>
                     <!-- Tab panes-->
                     <div class=" bg-white">
                        <div id="mob-tab" role="tabpanel" class="tab-pane active">
                           <!-- START list group-->
                           <div class="list-group mb0">
                               <div class="panel panel-default">
                                    <div class="panel-heading"></div>
                                    <div class="panel-body">
                                        <form method="post"class="form-horizontal" autocomplete="off">
                                          <div class="form-group">
                                             <label class="col-lg-3 control-label">Mobile<font class="red">*</font></label>
                                             <div class="col-lg-9">
                                                 <input type="mobile" id="mobile-ope-find" placeholder="Mobile" name="mobile" value="<?= set_value("mobile"); ?>" class="form-control" onkeyup="validateR(this, '')" ruleset="[^0-9]" maxlength="10">
                                                 <span class="red"><?=  form_error('mobile');?></span>
                                             </div>
                                          </div>
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
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="col-lg-3 control-label">Circle<font class="red">*</font></label>
                                             <div class="col-lg-9">
                                                 <input type="text"  placeholder="Circle Area" id="circle" name="circle" class="form-control" value="<?= set_value("circle"); ?>" >
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
                                                <button id="get-plans" class="btn btn-labeled btn-info" type="button">
                                                  <span class="btn-label">
                                                    <i class="fa fa-check"></i>
                                                  </span>
                                                   Get plans
                                                </button>
                                             </div>
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                                 <!-- END panel-->
                           </div>
                           <!-- END list group-->                           
                        </div>
                       
                     </div>
                  </div>
                  <!-- END panel tab-->
               </div>
               
                <div class="col-lg-7">
                  <!-- START panel tab-->
                  <div role="tabpanel" class="panel panel-transparent">
                     <!-- Nav tabs-->
                     <ul role="tablist" class="nav nav-tabs nav-justified">
                        <li role="presentation" class="active">
                           <a href="#full" aria-controls="full" role="tab" data-toggle="tab" class="bb0">
                             Full</a>
                        </li>
                        <li role="presentation">
                           <a href="#top" aria-controls="top" role="tab" data-toggle="tab" class="bb0">
                              TOP</a>
                        </li>
                        <li role="presentation">
                           <a href="#special" aria-controls="special" role="tab" data-toggle="tab" class="bb0">
                             SPECIAL</a>
                        </li>
                        <li role="presentation">
                           <a href="#twog" aria-controls="twog" role="tab" data-toggle="tab" class="bb0">
                             2G</a>
                        </li>
                        <li role="presentation">
                           <a href="#threeg" aria-controls="threeg" role="tab" data-toggle="tab" class="bb0">
                             3G</a>
                        </li>
                        <li role="presentation">
                           <a href="#roaming" aria-controls="roaming" role="tab" data-toggle="tab" class="bb0">
                             ROAMING</a>
                        </li>
                     </ul>
                     <!-- Tab panes-->
                     <div class="tab-content p0 bg-white">
                         <div class="alert alert-block alert-danger fade in alert-er">
                            <button data-dismiss="alert" class="close" type="button">
                              ×
                            </button>
                            <p>
                              Operator of circle area is not present !!
                            </p>
                        </div>
                        <div id="full" role="tabpanel" class="tab-pane active">
                           <!-- START list group-->
                           <div class="list-group mb0">
                              <div class="table-responsive">                                  
                                  <table class="table table-bordered table-hover table-striped rec-data" id="pln-full">
                                      
                                </table>
                                <br>
                             </div>
                           </div>
                           <!-- END list group-->                          
                        </div>
                        <div id="top" role="tabpanel" class="tab-pane">
                           <!-- START table responsive-->
                           <div class="table-responsive">                               
                              <table class="table table-bordered table-hover table-striped rec-data" id="pln-top">
                                 
                              </table>
                                <br>
                           </div>
                           <!-- END table responsive-->                          
                        </div>
                         
                         <div id="special" role="tabpanel" class="tab-pane">
                           <!-- START table responsive-->
                           <div class="table-responsive">                               
                              <table class="table table-bordered table-hover table-striped rec-data" id="pln-special">
                                 
                              </table>
                                <br>
                           </div>                          
                        </div>
                         <div id="twog" role="tabpanel" class="tab-pane">
                           <!-- START table responsive-->
                           <div class="table-responsive">                               
                              <table class="table table-bordered table-hover table-striped rec-data" id="pln-tog">
                                 
                              </table>
                                <br>
                           </div>                          
                        </div>
                         <div id="threeg" role="tabpanel" class="tab-pane">
                           <!-- START table responsive-->
                           <div class="table-responsive">                               
                              <table class="table table-bordered table-hover table-striped rec-data" id="pln-thg">
                                 
                              </table>
                                <br>
                           </div>                          
                        </div>
                         <div id="roaming" role="tabpanel" class="tab-pane">
                           <!-- START table responsive-->
                           <div class="table-responsive">                               
                              <table class="table table-bordered table-hover table-striped rec-data" id="pln-rom">
                                 
                              </table>
                                <br>
                           </div>                          
                        </div>
                         
                         
                         <br>
                     </div>
                  </div>
                  <!-- END panel tab-->
               </div>
       </div>            
    </div>
 </section>

<script>
    $('.alert-er').hide();
</script>