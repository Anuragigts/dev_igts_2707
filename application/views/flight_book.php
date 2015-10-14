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
           <div class="col-md-8"><br>
               <div class="row panel mypad">
                    <div class="col-md-3 text-center">
                        <center><img src="<?php echo $flight['logo'];?>" class='img img-responsive center' /></center>
                         <?php echo "<span class='dull1'>".$flight['name']."</span>";?>
                    </div>
                    <div class="col-md-3 text-center">
                        <span class="he1">Source</span><br>
                        <span class=""><b><?php echo $flight['dep'];?></b></span>
                        <br>
                        <span class='dull1'><?php echo $flight['source'];?></span>

                    </div>
                    <div class="col-md-3 text-center">
                        <span class="he1">Destination</span><br>
                        <span class=""><b><?php echo $flight['arr'];?></b></span>
                        <br>
                        <span class='dull1'><?php echo $flight['dest'];?></span>

                    </div>
                    <div class="col-md-3 text-center">
                        <span class="he1">Duration</span><br>
                        <span class=""><b><?php echo $flight['dur'];?></b></span><br>
                        <span class='dull1'>
                        <?php echo $flight['stop'];?>
                        </span>
                    </div>
                </div>
               
                   <div class="row">
                       <div class="panel panel-default">
                            <div class="panel-body">
                                <form role="form" action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Title<span class="red">*</span></label>
                                                <select name="title" class="form-control">
                                                    <option value="">Select</option>
                                                    <option value="Mr" <?php echo set_select('title','Mr', ( !empty($data) && $data == "Mr") ? TRUE : FALSE )?>>Mr.</option>
                                                    <option value="Mrs" <?php echo set_select('title','Mrs', ( !empty($data) && $data == "Mrs") ? TRUE : FALSE )?>>Mrs.</option>
                                                                                           
                                                </select>
                                                <span class="red"><?=  form_error('to');?></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Mobile No<span class="red">*</span></label>
                                                <input type="text" placeholder="Mobile No." class="form-control" name="mobile_no" value="<?= set_value('mobile_no');?>" onkeyup="validateR(this, '')" ruleset="[^0-9]" maxlength="10">
                                                <span class="red"><?= form_error('mobile_no');?></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Name<span class="red">*</span></label>
                                                <input type="hidden" class="form-control" name="city" value="<?php echo $flight['dep'];?>">
                                                <input type="text" placeholder="Name" class="form-control" name="name" value="<?= set_value('first_name');?>" >
                                                <span class="red"><?= form_error('name');?></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Email Id<span class="red">*</span></label>
                                                <input type="email" placeholder="Email Id" class="form-control email" name="login_email" value="<?= set_value('login_email');?>" maxlength="200">
                                                <span class="red"><?= form_error('login_email');?></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                <label>ZIP Code<span class="red">*</span></label>
                                                <input type="text" placeholder="ZIP Code" class="form-control" name="zip" value="<?= set_value('zip');?>" onkeyup="validateR(this, '')" ruleset="[^0-9]" maxlength="6">
                                                <span class="red"><?= form_error('zip');?></span>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" name="adult" value="<?php echo $this->session->userdata('Infrunt');?>">
                                                <input type="hidden" class="form-control" name="child" value="<?php echo $this->session->userdata('Child');?>">
                                                <input type="hidden" class="form-control" name="infrount" value="<?php echo $this->session->userdata('Infrunt');?>">
                                                <input type="hidden" class="form-control" name="type" value="<?php echo $this->session->userdata('type');?>">
                                                <input type="hidden" class="form-control" name="amt" value="<?php echo $getTotal;?>">
                                                <?php 
                                                $exp = explode('-', $flight['name']);?>
                                                <input type="hidden" class="form-control" name="code" value="<?php echo $exp['0'];?>">
                                                
                                                <label>Email Id<span class="red">*</span></label>
                                                <input type="email" placeholder="Email Id" class="form-control email" name="login_email" value="<?= set_value('login_email');?>" maxlength="200">
                                                <span class="red"><?= form_error('login_email');?></span>
                                            </div>
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