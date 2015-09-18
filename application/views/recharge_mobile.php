<section>
         <!-- Page content-->
    <div class="content-wrapper">
       <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
             <li><a href="<?php echo base_url();?>dashboard">Dashboard</a>
             </li>                  
             <li class="active">Recharge</li>                 
          </ol>Pre paid Mobile Recharge
          <!-- Small text for title-->
          
          <span class="text-sm hidden-xs">For Pre paid mobile recharge</span>
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
			 
           <div class="col-lg-6">
                  <!-- START panel tab-->
                  <div role="tabpanel" class="panel panel-transparent">
                     <!-- Nav tabs-->
                     <ul role="tablist" class="nav nav-tabs nav-justified">
                        <li role="presentation" class="active">
                           <a href="<?php echo base_url();?>recharge/mobile_recharge#mob-tab" aria-controls="home" role="tab" data-toggle="tab" class="bb0">
                              <em class="fa fa-mobile-phone fa-fw"></em>Pre paid</a>
                        </li>
                          <li role="presentation ">
                           <a href="<?php echo base_url();?>recharge/dth_recharge" class="bb0 ">
                              <em class="fa fa-rss fa-fw"></em>DTH</a>
                        </li>
                        <li role="presentation ">
                           <a href="<?php echo base_url();?>recharge/post_recharge" class="bb0 ">
                             <em class="fa fa-mobile-phone fa-fw"></em>Post Paid</a>
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
                                        <form method="post"class="form-horizontal" id="recharge-form" >
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
                                                 <select class="select-oprator form-control" id="oprator_name" name="oprator_name" >
                                                     <option value="">Select</option>
                                                     <?php foreach($all_operator as $op){?>
                                                     <option value="<?php echo $op->op_name;?>" op_code="<?php echo $op->code;?>" <?php echo set_select('oprator_name',$op->op_name);?>><?php echo $op->op_name;?></option>
                                                     <?php }?>
													 <!--option value="ID">IDEA</option>
													 <option value="AR">Airtel</option>
													 <option value="MT">MTS</option>
													 <option value="AC">Aircel</option>
													 <option value="RC">Reliance CDMA</option>
													 <option value="RG">Reliance GSM</option>
													 <option value="TD">Tata Docomo</option>
													 <option value="TI">Tata Indicom</option>
													 <option value="UN">Uninor</option>
													 <option value="VO">Vodafone</option>
													 <option value="BT">BSNL TOP UP</option-->
                                                 </select>
                                                 <span class="red"><?=  form_error('oprator_name');?></span>
                                                 <input type="hidden" name="code" id="code" />
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="col-lg-3 control-label">Circle Area<font class="red">*</font></label>
                                             <div class="col-lg-9">
                                                 <select class="select-oprator form-control circle1" id="" name="circle" >
                                                     <option value="">Select</option> 
                                                     <?php foreach($circle as $c){?>
                                                        <option value="<?php echo $c->name;?>"><?php echo $c->name;?></option> 
                                                      <?php }?>
                                                     
                                                 </select>
                                                 <input type="text"  placeholder="Circle Area" id="circle" name="circle" class="form-control circle2" value="<?= set_value("circle"); ?>" value="<?php echo  set_value("mobile"); ?>" class="form-control" onkeyup="validateR(this, '')" ruleset="[^A-Z a-z]">
                                                 <span class="red"><?= form_error('circle');?></span>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                              <label class="col-lg-3 control-label">Amount<font class="red">*</font></label>
                                                <div class="col-lg-9">
                                                    <input type="text" id="amount" placeholder="Amount" name="amount" value="<?= set_value("amount"); ?>" class="form-control amou" onkeyup="validateR(this, '')" ruleset="[^0-9]" maxlength="4" >
                                                    <span class="red"><?=  form_error('oprator_name');?></span>
                                                </div>
                                          </div>
                                          
                                          <div class="form-group">
                                             <div class="col-lg-offset-3 col-lg-4">
                                                 <input type="hidden" value="" name="recharge"/>
                                                 <!--<input type="submit" name="recharge" value="Process To Recharge" class="btn btn-sm btn-info"  />-->
                                                 <!--<input type="buttion" id="confirm_details" name="recharge" data-toggle="modal" data-target="#confirm_details" value="Process To Recharge" class="btn btn-sm btn-info"  />-->
                                                 <button class="btn btn-labeled btn-success" id="confirm_recharge" type="button">
                                                    <span class="btn-label">
                                                    <i class="fa fa-check"></i>
                                                    </span>
                                                     Recharge
                                                    </button>
                                                 
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
                   <div role="tabpanel" class="panel panel-transparent">
                     
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
                           
                           <div class="list-group mb0">
                              <div class="table-responsive">                                  
                                  <table class="table table-bordered table-hover table-striped rec-data" id="pln-full">
                                      
                                </table>
                                <br>
                             </div>
                           </div>
                                                 
                        </div>
                        <div id="top" role="tabpanel" class="tab-pane">
                           
                           <div class="table-responsive">                               
                              <table class="table table-bordered table-hover table-striped rec-data" id="pln-top">
                                 
                              </table>
                                <br>
                           </div>
                                            
                        </div>
                         
                         <div id="special" role="tabpanel" class="tab-pane">
                           
                           <div class="table-responsive">                               
                              <table class="table table-bordered table-hover table-striped rec-data" id="pln-special">
                                 
                              </table>
                                <br>
                           </div>                          
                        </div>
                         <div id="twog" role="tabpanel" class="tab-pane">
                           
                           <div class="table-responsive">                               
                              <table class="table table-bordered table-hover table-striped rec-data" id="pln-tog">
                                 
                              </table>
                                <br>
                           </div>                          
                        </div>
                         <div id="threeg" role="tabpanel" class="tab-pane">
                          
                           <div class="table-responsive">                               
                              <table class="table table-bordered table-hover table-striped rec-data" id="pln-thg">
                                 
                              </table>
                                <br>
                           </div>                          
                        </div>
                         <div id="roaming" role="tabpanel" class="tab-pane">
                           
                           <div class="table-responsive">                               
                              <table class="table table-bordered table-hover table-striped rec-data" id="pln-rom">
                                 
                              </table>
                                <br>
                           </div>                          
                        </div>
                         
                         
                         <br>
                     </div>
                  </div>
                   <!--END panel tab-->
               </div>
                    
                     <style>
          @media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {
	td:nth-of-type(1):before { content: "S.No."; }
	td:nth-of-type(2):before { content: "Amount"; }
	td:nth-of-type(3):before { content: "Talktime"; }
	td:nth-of-type(4):before { content: "Validity"; }
	td:nth-of-type(5):before { content: "Description"; }
	td:nth-of-type(6):before { content: "Get"; }
}
               </style>
                <div class="col-lg-6 heddin-xs">
              
                 
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
                           <?php if($dl->recharge_type == 1){?>
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
                                        <!--<td><?php // echo $dl->first_name;?> (<?php // echo $dl->u_type;?>)</td>-->
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
                                        <!--<td><?php // echo $dl->first_name;?> (<?php // echo $dl->u_type;?>)</td>-->
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
                                        <!--<td><?php // echo $dl->first_name;?> (<?php // echo $dl->u_type;?>)</td>-->
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
                                        <!--<td><?php // echo $dl->first_name;?> (<?php // echo $dl->u_type;?>)</td>-->
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
    $('.alert-er').hide();
    $('.circle2').hide();
</script>