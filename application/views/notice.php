<section>
         <!-- Page content-->
    <div class="content-wrapper">
       <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
             <li><a href="<?php echo base_url();?>dashboard">Dashboard</a>
             </li>                  
                               
             <li class="active">Setting</li>                 
          </ol>Notice Board
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">Show the message on user's dashboard.</span>
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
                                   <div class="panel-heading"><b class="red">Note*: </b> This message will show on Master distributor, Super distributors, Distributors, Agents  home page <hr></div>
                                    <div class="panel-body">                                       
                                        <form method="post"class="form-horizontal" autocomplete="off">                                          
                                          
                                          <div class="form-group">
                                             <label class="col-lg-3 control-label">Title<font class="red">*</font></label>
                                             <div class="col-lg-9">
                                                 <input name="title" class="form-control" type="text" value="<?php echo $notice->title;?>" >
                                                 <span class="red"><?=  form_error('title');?></span>
                                             </div>
                                          </div>
                                            <div class="form-group">
                                             <label class="col-lg-3 control-label">Message<font class="red">*</font></label>
                                             <div class="col-lg-9">
                                                 <textarea name="message" class="form-control"  ><?php echo $notice->msg;?></textarea>
                                                 <span class="red"><?=  form_error('message');?></span>
                                             </div>
                                          </div>
                                          
                                          <div class="form-group">
                                             <div class="col-lg-offset-3 col-lg-4">
                                                 <input type="submit" class="btn btn-sm btn-info" name="add" value="Set Message" />                                                
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