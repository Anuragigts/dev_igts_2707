<section>
         <!-- Page content-->
    <div class="content-wrapper">
       <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
             <li><a href="<?php echo base_url();?>dashboard">Dashboard</a>
             </li>                  
                              
             <li class="active">Upload Banner</li>                 
          </ol>Login banner
          <!-- Small text for title-->
          
          <!-- Breadcrumb below title-->
       </h3>
       <!-- START widgets box-->       
       <div class="row">              
              <?php $this->load->view("layout/success_error");?> 
         
          
           <form method="post" id="topup-form" enctype="multipart/form-data">
           <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="panel panel-default">                            
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-lg-12">
                                     <label for="Mobile" >Banner<font class="red mmid-imp">*</font></label>
                                     <img src="<?php echo base_url();?>baner/<?php echo $banner->b_name;?>" class="img img-responsive img-thumbnail">
                                     
                                </div>
<div class="col-lg-12"><font class="red mmid-imp">Note :</font> Banner size will be 900X550 px.</div>
<div class="col-lg-12"><hr></div>
                                <div class="col-lg-12">
                                     <label for="Mobile" >Upload<font class="red mmid-imp">*</font></label>
                                     <input type="file" name="banner"  class="">
                                    <span class="red"><?=  form_error('banner');?></span>
                                </div>
                               
                                
                            </div>
                            <div class="col-lg-12 text-center">
                            <br>
                            <input type='submit' class='btn btn-sm btn-info  '   name='addBanner' value='Update Banner' />
                            
                        </div>
                        </div>

                        

                    </div>
                 </div>
           </div>
       </form>   
     
       </div>
    </div>
 </section>
