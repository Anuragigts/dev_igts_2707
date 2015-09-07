<section>
         <!-- Page content-->
    <div class="content-wrapper">
       <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
             <li><a href="<?php echo base_url();?>dashboard">Dashboard</a>
             </li>                  
             <li><a href="<?php echo base_url();?>settings/virtualAmt">Virtual Amount</a>
             </li>                  
                               
             <li class="active">Setting</li>                 
          </ol>Edit Virtual Amount
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">Edit your virtual amount management.</span>
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
                                   <div class="panel-heading"><b class="red">Note*: </b> In case your  Balance is not match with your recharge balance then only you need to update this.</div>
                                    <div class="panel-body">                                       
                                        <form method="post"class="form-horizontal" autocomplete="off">                                          
                                          
                                          <div class="form-group">
                                             <label class="col-lg-3 control-label">Edit Amount<font class="red">*</font></label>
                                             <div class="col-lg-9">
                                                 <input name="amount" class="form-control" type="text" value="<?php echo $get;?>" onkeyup="validateR(this, '')" ruleset="[^0-9.]">
                                                 <span class="red"><?=  form_error('amount');?></span>
                                             </div>
                                          </div>
                                          
                                          <div class="form-group">
                                             <div class="col-lg-offset-3 col-lg-4">
                                                 <input type="submit" class="btn btn-sm btn-info" name="add" value="Edit Virtual Money" />                                                
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
                  
                  <!-- END panel tab-->
               </div>
       </div>            
    </div>
 </section>