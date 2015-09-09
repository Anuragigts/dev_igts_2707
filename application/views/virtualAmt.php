<section>
         <!-- Page content-->
    <div class="content-wrapper">
       <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
             <li><a href="<?php echo base_url();?>dashboard">Dashboard</a>
             </li>                  
                               
             <li class="active">Setting</li>                 
          </ol>Virtual Amount
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">Manage your virtual amount management.</span>
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
                                   <div class="panel-heading"><b class="red">Note*: </b> You have to add amount only, when you are taking the credit from live.<br> Ex: currently you are having Rs. 100, Now you are taking the credit of Rs. 500. Then you have to add Rs. 500 in add money. Then your total balance will be Rs. 600.<hr></div>
                                    <div class="panel-body">                                       
                                        <form method="post"class="form-horizontal" autocomplete="off">                                          
                                          
                                          <div class="form-group">
                                             <label class="col-lg-3 control-label">Add Amount<font class="red">*</font></label>
                                             <div class="col-lg-9">
                                                 <input name="amount" class="form-control" type="text" value="<?= set_value("amount"); ?>" onkeyup="validateR(this, '')" ruleset="[^0-9.]">
                                                 <span class="red"><?=  form_error('amount');?></span>
                                             </div>
                                          </div>
                                          
                                          <div class="form-group">
                                             <div class="col-lg-offset-3 col-lg-4">
                                                 <input type="submit" class="btn btn-sm btn-info" name="add" value="Add  Money" />                                                
                                             </div>                                             
                                          </div>
                                       </form>
                                        <div class="row">
                                            <div class="col-md-8">
                                               <h4>Current Virtual Balance Is : <?php echo  number_format($get,2);?> </h4>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="<?= base_url()?>settings/editVirtualAmt" class="btn btn-warning">Edit</a>
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