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
           <div class="col-lg-6">
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
                                             <label class="col-lg-3 control-label">Mobile</label>
                                             <div class="col-lg-9">
                                                 <input type="mobile" id="mobile-ope-find" placeholder="Mobile" name="mobile" class="form-control" onkeyup="validateR(this, '')" ruleset="[^0-9]" maxlength="10">
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="col-lg-3 control-label">Password</label>
                                             <div class="col-lg-9">
                                                 <select class="select-oprator form-control" name="oprator_name" >
                                                     <option value="">Select</option>
                                                     <?php foreach($all_operator as $op){?>
                                                     <option value="<?php echo $op->op_name;?>" op_code="<?php echo $op->code;?>"><?php echo $op->op_name;?></option>
                                                     <?php }?>
                                                 </select>
                                                 <input type="hidden" name="code" id="code" />
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="col-lg-3 control-label">Circle</label>
                                             <div class="col-lg-9">
                                                 <input type="text"  placeholder="Circle" id="circle" name="circle" class="form-control" >
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="col-lg-3 control-label">Recharge Amount</label>
                                             <div class="col-lg-9">
                                                 <input type="text"  placeholder="Recharge Amount" name="amount" class="form-control" onkeyup="validateR(this, '')" ruleset="[^0-9]" maxlength="4" >
                                             </div>
                                          </div>
                                          
                                          <div class="form-group">
                                             <div class="col-lg-offset-3 col-lg-9">
                                                 <input type="submit" name="recharge" value="Process To Recharge" class="btn btn-sm btn-info"  />
                                                
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
       </div>            
    </div>
 </section>