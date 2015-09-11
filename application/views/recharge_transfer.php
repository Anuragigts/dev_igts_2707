<section>
         <!-- Page content-->
    <div class="content-wrapper">
       <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
             <li><a href="<?php echo base_url();?>dashboard">Dashboard</a>
             </li>                  
                  
             <li class="active">Money Transfer</li>                 
          </ol>Recharge Money Transfer
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">Transfer The Money to users</span>
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
             
           <div class="col-lg-offset-3 col-lg-6">
                  <!-- START panel tab-->
                
                     
                     <!-- Tab panes-->
                     <div class=" p0 bg-white">                        
                        <div id="dth_tab" role="tabpanel" class="tab-pane active">
                           <!-- START table responsive-->
                           <div class="list-group mb0">
                               <div class="panel panel-default">
                                   <div class="panel-heading"> You Can transfer the Money to the user.</div>
                                    <div class="panel-body">                                       
                                        <form method="post"class="form-horizontal" autocomplete="off">                                          
                                          
                                          <div class="form-group">
                                             <label class="col-lg-3 control-label">Name</label>
                                             <div class="col-lg-9 " style="padding-top:5px;">
                                                 <?php echo $profile->first_name.' '.$profile->last_name;?>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="col-lg-3 control-label">Mobile</label>
                                             <div class="col-lg-9" style="padding-top:5px;">
                                                  <?php echo $profile->mobile;?>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="col-lg-3 control-label">Amount<font class="red">*</font></label>
                                             <div class="col-lg-9">
                                                 <input name="amount" class="form-control" type="text" value="<?= set_value("amount"); ?>" onkeyup="validateR(this, '')" ruleset="[^0-9.]">
                                                 <span class="red"><?=  form_error('amount');?></span>
                                             </div>
                                          </div>
                                            <div class="form-group">
                                             <label class="col-lg-3 control-label">Credit (or)<br/> Roll back<font class="red">*</font></label>
                                             <div class="col-lg-9">
                                                 <select class="form-control" name="credit">
                                                     <option value="">Select Credit (or) Roll back</option>
                                                     <option value="1">Credit</option>
                                                     <option value="2">Roll back</option>
                                                 </select>
                                                 <span class="red"><?=  form_error('credit');?></span>
                                             </div>
                                          </div>
                                             <div class="form-group">
                                             <label class="col-lg-3 control-label" >Remarks<font class="red">*</font></label>
                                             <div class="col-lg-9">
                                                 <textarea name="remarks" class="form-control"><?= set_value("remarks"); ?></textarea>
                                                 <span class="red"><?=  form_error('remarks');?></span>
                                             </div>
                                          </div>
                                          
                                          <div class="form-group">
                                             <div class="col-lg-offset-3 col-lg-4">
                                                 <input type="submit" class="btn btn-sm btn-info" name="transfer" value="Transfer Money" />                                                
                                             </div>                                             
                                          </div>
                                       </form>  
                                        <div class="row">
                                            <div class="col-md-8">
                                               <h4><?php echo $profile->first_name;?>'s Current Balance Is : <?php echo  $get;?> </h4>
                                               <?php 
                                                if($this->uri->segment(4) != "5"){
                                                    echo $get_co;
                                                }
                                               ?>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="<?= base_url()?>settings/viewTrandDetail/<?php echo $this->uri->segment(3);?>" class="btn btn-warning">View Full Details</a>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                                 <!-- END panel-->
                           </div>
                           <!-- END table responsive-->
                          
                        </div>
                     </div>
                  
                  <!-- END panel tab-->
               </div>
       </div>            
    </div>
 </section>