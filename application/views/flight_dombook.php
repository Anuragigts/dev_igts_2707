<?php if($flight['dest'] == ''){redirect('flight/searchFlight'); }?>
<section>
         <!-- Page content-->
    <div class="content-wrapper">
       <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
             <li><a href="<?php echo base_url();?>dashboard">Dashboard</a>
             </li>                  
              <li><a href="<?php echo base_url();?>flight/searchFlight">Search Flight</a>
             </li>               
             <li class="active">Book Ticket</li>                 
          </ol>Book Ticket
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">Book flight ticket </span>
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
           <div class="col-md-8"><br>
               <div class="row panel mypad">
                    <div class="col-md-2 text-center">
                        <center><img src="<?php echo $flight['logo'];?>" class='img img-responsive center' /></center>
                       
                    </div>
                   <div class="col-md-10">
                       <?php for($i = 0; $i < count($flight['name']); $i++){?>                      
                       <div class="row">
                        <div class="col-md-3 text-center">
                            <span class="he1">Name</span><br>
                            <span class=""><b><?php echo $flight['name'][$i];?></b></span>
                            

                        </div>
                        <div class="col-md-3 text-center">
                            <span class="he1">Source</span><br>
                            <span class=""><b><?php echo $flight['dep'][$i];?></b></span>
                            <br>
                            <span class='dull1'><?php echo $flight['source'][$i];?></span>

                        </div>
                        <div class="col-md-3 text-center">
                            <span class="he1">Destination</span><br>
                            <span class=""><b><?php echo $flight['arr'][$i];?></b></span>
                            <br>
                            <span class='dull1'><?php echo $flight['dest'][$i];?></span>

                        </div>
                        <div class="col-md-3 text-center">
                            <span class="he1">Duration</span><br>
                            <span class=""><b><?php echo $flight['dur'][$i];?></b></span><br>
                            <span class='dull1'>
                            <?php echo $flight['stop'][$i];?>
                            </span>
                        </div>
                   </div>
                       <?php }?>
                   </div>
                </div>
               
                   <div class="row">
                       <div class="panel panel-default">
                            <div class="panel-body">
                                <form role="form"  method="post" enctype="multipart/form-data">
                                    <span class="red"><?php echo validation_errors(); ?></span>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Mobile No<span class="red">*</span></label>
                                                <input type="text" placeholder="Mobile No." class="form-control" name="mobile_no" value="<?= set_value('mobile_no');?>" onkeyup="validateR(this, '')" ruleset="[^0-9]" maxlength="10">
                                                
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Email Id<span class="red">*</span></label>
                                                <input type="email" placeholder="Email Id" class="form-control email" name="login_email" value="<?= set_value('login_email');?>" maxlength="200">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                <label>ZIP Code<span class="red">*</span></label>
                                                <input type="text" placeholder="ZIP Code" class="form-control" name="zip" value="<?= set_value('zip');?>" onkeyup="validateR(this, '')" ruleset="[^0-9]" maxlength="6">
                                               
                                            </div>
                                            </div>
                                        </div>
                                         <div class="col-sm-6">
                                             <div class="form-group">
                                                <label>Address<span class="red">*</span></label>
                                                 <input name="add"  placeholder="Address" class="form-control  " type="text" value="<?= set_value("add"); ?>" >
                                               
                                            </div>
                                        </div>
                                    </div>
                                   <!-- Adult --> 
                                   <?php for($i = 0; $i< $this->session->userdata('Adult'); $i++){?> 
                                    <div class="col-sm-12 text-dark"><u> <h4>Adult- <?php echo ($i + 1);?></h4></u></div>
                                    <div style="border: 1px solid #ccc; padding: 5px; margin-top: 5px;">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Title<span class="red">*</span></label>
                                                <input type="hidden" value="1" name="cat[]" />
                                                <select name="title[]" class="form-control">                                                   
                                                    <option value="Mr" <?php echo set_select('title','Mr', ( !empty($data) && $data == "Mr") ? TRUE : FALSE )?>>Mr.</option>
                                                    <option value="Mrs" <?php echo set_select('title','Mrs', ( !empty($data) && $data == "Mrs") ? TRUE : FALSE )?>>Mrs.</option>
                                                    <option value="Ms" <?php echo set_select('title','Ms', ( !empty($data) && $data == "Ms") ? TRUE : FALSE )?>>Ms.</option>
                                                                                           
                                                </select>
                                                
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>First Name<span class="red">*</span></label>
                                                <input type="text" placeholder="First Name" class="form-control" name="first_name[]" value="<?= set_value('first_name[]');?>" >
                                               
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Last Name<span class="red">*</span></label>                                               
                                                <input type="text" placeholder="Last Name" class="form-control" name="last_name[]" value="<?= set_value('last_name[]');?>" >
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Date Of Birth<span class="red">*</span></label>
                                                 <input name="dob[]" id="" placeholder="mm/dd/yyyy" class="form-control datepicker " type="text" value="<?= set_value("dob[]"); ?>" >
                                               
                                            </div>
                                        </div>
                                        
                                    </div>                                    
                                    </div>
                                    <!----End Adult-->
                                   <?php }?>
                                    <!--- Child ---->
                                    
                                    <?php for($i = 0; $i< $this->session->userdata('Child'); $i++){?> 
                                    <div class="col-sm-12 text-dark"><u> <h4>Child- <?php echo ($i + 1);?></h4></u></div>
                                    <div style="border: 1px solid #ccc; padding: 5px; margin-top: 5px;">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <input type="hidden" value="2" name="cat[]" />
                                                <label>Title<span class="red">*</span></label>
                                                <select name="title[]" class="form-control">                                                   
                                                    <option value="Mr" <?php echo set_select('title','Mr', ( !empty($data) && $data == "Mr") ? TRUE : FALSE )?>>Mr.</option>
                                                    <option value="Mrs" <?php echo set_select('title','Mrs', ( !empty($data) && $data == "Mrs") ? TRUE : FALSE )?>>Mrs.</option>
                                                     <option value="Ms" <?php echo set_select('title','Ms', ( !empty($data) && $data == "Ms") ? TRUE : FALSE )?>>Ms.</option>                                      
                                                </select>
                                                
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>First Name<span class="red">*</span></label>
                                                <input type="text" placeholder="First Name" class="form-control" name="first_name[]" value="<?= set_value('first_name[]');?>" >
                                               
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Last Name<span class="red">*</span></label>                                               
                                                <input type="text" placeholder="Last Name" class="form-control" name="last_name[]" value="<?= set_value('last_name[]');?>" >
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Date Of Birth<span class="red">*</span></label>
                                                 <input name="dob[]" id="" placeholder="mm/dd/yyyy" class="form-control datepicker " type="text" value="<?= set_value("dob[]"); ?>" >
                                               
                                            </div>
                                        </div>
                                          
                                    </div>
                                   
                                    </div>
                                    <!---End Child--->
                                   <?php }?>
                                    
                                    <!--- Infrunt ---->
                                    
                                    <?php for($i = 0; $i< $this->session->userdata('Infrunt'); $i++){?> 
                                    <div class="col-sm-12 text-dark"><u> <h4>Infrant- <?php echo ($i + 1);?></h4></u></div>
                                    <div style="border: 1px solid #ccc; padding: 5px; margin-top: 5px;">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <input type="hidden" value="3" name="cat[]" />
                                                <label>Title<span class="red">*</span></label>
                                                <select name="title[]" class="form-control">                                                   
                                                    <option value="Mr" <?php echo set_select('title','Mr', ( !empty($data) && $data == "Mr") ? TRUE : FALSE )?>>Mr.</option>
                                                    <option value="Mrs" <?php echo set_select('title','Mrs', ( !empty($data) && $data == "Mrs") ? TRUE : FALSE )?>>Mrs.</option>
                                                     <option value="Ms" <?php echo set_select('title','Ms', ( !empty($data) && $data == "Ms") ? TRUE : FALSE )?>>Ms.</option>                                      
                                                </select>
                                                
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>First Name<span class="red">*</span></label>
                                                <input type="text" placeholder="First Name" class="form-control" name="first_name[]" value="<?= set_value('first_name[]');?>" >
                                                
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Last Name<span class="red">*</span></label>                                               
                                                <input type="text" placeholder="Last Name" class="form-control" name="last_name[]" value="<?= set_value('last_name[]');?>" >
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Date Of Birth<span class="red">*</span></label>
                                                 <input name="dob[]" id="" placeholder="mm/dd/yyyy" class="form-control datepicker " type="text" value="<?= set_value("dob[]"); ?>" >
                                                
                                            </div>
                                        </div>
                                             
                                    </div>
                                    
                                    </div>
                                    <!---End Infrunt -->
                                   <?php }?>
                                    
                                    <div class="row">
                                        <div class="col-sm-12 text-center"><br>
                                           
                                             <input type="hidden" class="form-control" name="adult" value="<?php echo $this->session->userdata('Adult');?>">
                                            <input type="hidden" class="form-control" name="child" value="<?php echo $this->session->userdata('Child');?>">
                                            <input type="hidden" class="form-control" name="infrount" value="<?php echo $this->session->userdata('Infrunt');?>">
                                            <input type="hidden" class="form-control" name="type" value="<?php echo $this->session->userdata('type');?>">
                                            <input type="hidden" class="form-control" name="amt" value="<?php echo $getTotal;?>">
                                            <input type="hidden" class="form-control" name="track" value="<?php echo $this->session->userdata('Track');?>">
                                             <input type="hidden" class="form-control" name="class" value="<?php echo $flight['class'];?>">  
                                           
                                              <?php for($i = 0; $i < count($flight['name']); $i++){?>  
                                                <?php $cc = $flight['classCode']['0'];
                                                $classc = explode(',', $cc);
                                             $exp = explode('-', $flight['name'][$i]);?>
                                               <input type="hidden" class="form-control" name="classCode[]" value="<?php echo $classc[$i];?>">  
                                            <input type="hidden" class="form-control" name="code[]" value="<?php echo $exp['0'];?>">
                                            <input type="hidden" class="form-control" name="f_Id[]" value="<?php echo $flight['flight_i'][$i];?>">
                                            
                                            <input type="hidden" class="form-control" name="city[]" value="<?php echo $flight['source'][$i];?>">
                                              <?php }?>
                                            <input type="submit" name="book_ticket" value="Confirm & Book ticket" class="btn btn-success">
                                        </div>
                                    </div>
                                </form>
                            </div>
                       </div>
                   </div>
           </div>
           <div class="col-md-4 top-5">
               <?php echo $get_details;?>
           </div>
       </div>
    </div>
</section>