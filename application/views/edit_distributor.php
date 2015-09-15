<section>
    <!-- Page content-->
    <div class="content-wrapper">
        <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
              <li><a href="<?php echo base_url();?>dashboard">Dashboard</a></li> 
              <li><a href="<?php echo base_url();?>distributor/view_distributor">View Distributors</a></li> 
             <li class="active">Edit Distributor</li>
          </ol> Edit Distributor
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">For updating Distributor</span>
          <!-- Breadcrumb below title-->

        </h3>
        <div class="row">
            <?php   $this->load->view("layout/success_error");?>
            <!-- START panel--> 
            <div class="panel panel-default">
<!--                    <div class="panel-heading">
                       Edit Commission
                        | <small>Zero Configuration</small>
                    </div>-->
            <div class="panel-body">
                <form role="form" action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>First Name<span class="red">*</span></label>
                                <input type="text" placeholder="First Name" class="form-control" name="first_name" value="<?= $view->first_name;?>" onkeypress="return onlyAlpha(event);" maxlength="50">
                                <span class="red"><?= form_error('first_name');?></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Last Name<span class="red">*</span></label>
                                <input type="text" placeholder="Last Name" class="form-control" name="last_name" value="<?= $view->last_name;?>" onkeypress="return onlyAlpha(event);" maxlength="50">
                                <span class="red"><?= form_error('last_name');?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                               <label>State<span class="red">*</span></label>
                               <select class="form-control" name="state" id="state-id">
                                   <option value="Select State"> Select State </option>
                                   <?php foreach($state as $osp){ 
                                            if($view->state == $osp->State_id){ ?>
                                            <option value="<?= $osp->State_id;?>" selected="selected"><?= $osp->State_name;?></option>
                                            <?php } else { ?>
                                            <option value="<?= $osp->State_id;?>"><?= $osp->State_name;?></option>
                                            <?php } ?>
                                    <?php }
                                    ?>
                               </select>
                               <span class="red"><?= form_error('state');?></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                               <label>City<span class="red">*</span></label>
                               <select class="form-control" name="city" id="city-id">
                                   <option value="Select City"> Select City </option>
                                   <?php foreach($city as $opt){ 
                                            if($view->city == $opt->City_id){ ?>
                                            <option value="<?= $opt->City_id;?>" selected="selected"><?= $opt->City_name;?></option>
                                            <?php } else { ?>
                                            <option value="<?= $opt->City_id;?>"><?= $opt->City_name;?></option>
                                            <?php } ?>
                                    <?php }
                                    ?>
                               </select>
                               <span class="red"><?= form_error('city');?></span>
                            </div> 
                        </div>
                    </div>
                    <?php if($this->session->userdata("my_type") == 1){ ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Master Distributor<span class="red">*</span></label>
                                <select class="form-control" name="master" id="master-id-super">
                                    <option value="Select Master Distributor"> Select Master Distributor </option>
                                    <?php foreach($master as $mt){ 
                                        if($view->master_distributor_id == $mt->login_id){
                                        ?>
                                        <option value="<?= $mt->login_id;?>" selected="selected"><?= ucfirst($mt->first_name." ".$mt->middle_name." ".$mt->last_name);?></option>    
                                        <?php } else { ?>
                                        <option value="<?= $mt->login_id;?>"><?= ucfirst($mt->first_name." ".$mt->middle_name." ".$mt->last_name);?></option>    
                                        <?php }
                                    }?>
                                </select>
                                <span class="red"><?= form_error('master');?></span>
                             </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Super Distributor<span class="red">*</span></label>
                                <?php if($this->session->userdata("my_type") == 1 || $this->session->userdata("my_type") == 2){ ?>
                                <select class="form-control" name="super" id=""  val-dis="3">
                                    <option value="Select Super Distributor"> Select Super Distributor </option>
                                    <?php foreach($sup as $sp){ 
                                        if($view->super_distributor_id == $sp->login_id){
                                        ?>
                                        <option value="<?= $sp->login_id;?>" selected="selected"><?= ucfirst($sp->first_name." ".$sp->middle_name." ".$sp->last_name);?></option>    
                                        <?php } else { ?>
                                        <option value="<?= $sp->login_id;?>"><?= ucfirst($sp->first_name." ".$sp->middle_name." ".$sp->last_name);?></option>    
                                        <?php }
                                    }?>
                                </select>
                                <?php 
                                } else { 
                                        foreach($sup as $sp){  
                                        if($view->super_distributor_id == $sp->login_id){
                                            ?>
                                        <input type="text" disabled="disabled" value="<?= ucfirst($sp->first_name." ".$sp->middle_name." ".$sp->last_name);?>" class="form-control"/>    
                                            <input type="hidden" value="<?= $sp->login_id;?>" name="master">   
                                           <?php } 
                                        }
                                    }
                                    ?>
                                <span class="red"><?= form_error('super');?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Package Name <span class="red">*</span></label>
                                <select class="form-control" name="package" id="package">
                                    <option value="Select Package"> Select Package </option>
                                    <?php                                   
                                        foreach ($pkg as $pg) {
                                            if($pg->package_id  ==  $view->package_id){ ?>
                                                <option value="<?= $pg->package_id;?>" selected="selected"><?= ucfirst($pg->package_name);?></option>
                                            <?php  
                                            } else { ?>
                                                <option value="<?= $pg->package_id;?>"><?= ucfirst($pg->package_name);?></option>
                                        <?php  }
                                    }
                                   ?>
                                </select>
                                <span class="red"><?= form_error('package');?></span>
                             </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Mobile No<span class="red">*</span></label>
                                <input type="text" placeholder="Mobile No." class="form-control" name="mobile_no" value="<?= $view->mobile;?>" onkeyup="validateR(this, '')" ruleset="[^0-9]" maxlength="10">
                                <span class="red"><?= form_error('mobile_no');?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email Id<span class="red">*</span></label>
                                <input type="email" placeholder="Email Id" class="form-control email" name="login_email" value="<?= $view->login_email;?>" maxlength="200">
                                <span class="red"><?= form_error('login_email');?></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                               <label>Address<span class="red">*</span></label>
                               <textarea placeholder="Address" class="form-control" name="address"><?php if($view->address == ''){?><?= $view->door;?>-<?= $view->street;?>, <?= $view->area;?> <?php }else{?> <?= $view->address;?> <?php }?></textarea>
                               <span class="red"><?= form_error('address');?></span>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>ID Proof</label>
                                 <input id="" name="idproof" type="file"  autocomplete="off"  >                                
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Address Proof</label>
                                <input id="" name="addproof" type="file" autocomplete="off"  >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="submit" class="btn btn-sm btn-info" value="Update Distributor" name="update_distributor">
                        </div>
                    </div>
                    <?php } else if($this->session->userdata("my_type") == 2 ){ ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Super Distributor<span class="red">*</span></label>
                                <select class="form-control" name="super" id="super-id"  val-dis="3">
                                    <option value="Select Super Distributor"> Select Super Distributor </option>
                                    <?php foreach($sup as $sp){ 
                                        if($view->super_distributor_id == $sp->login_id){
                                        ?>
                                        <option value="<?= $sp->login_id;?>" selected="selected"><?= ucfirst($sp->first_name." ".$sp->middle_name." ".$sp->last_name);?></option>    
                                        <?php } else { ?>
                                        <option value="<?= $sp->login_id;?>"><?= ucfirst($sp->first_name." ".$sp->middle_name." ".$sp->last_name);?></option>    
                                        <?php }
                                    }?>
                                </select>
                                <span class="red"><?= form_error('super');?></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Package Name <span class="red">*</span></label>
                                <select class="form-control" name="package" id="package">
                                    <option value="Select Package"> Select Package </option>
                                    <?php                                   
                                        foreach ($pkg as $pg) {
                                            if($pg->package_id  ==  $view->package_id){ ?>
                                                <option value="<?= $pg->package_id;?>" selected="selected"><?= ucfirst($pg->package_name);?></option>
                                            <?php  
                                            } else { ?>
                                                <option value="<?= $pg->package_id;?>"><?= ucfirst($pg->package_name);?></option>
                                        <?php  }
                                    }
                                   ?>
                                </select>
                                <span class="red"><?= form_error('package');?></span>
                             </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Mobile No<span class="red">*</span></label>
                                <input type="text" placeholder="Mobile No." class="form-control" name="mobile_no" value="<?= $view->mobile;?>" onkeyup="validateR(this, '')" ruleset="[^0-9]" maxlength="10" disabled="disabled" readonly="readonly">
                                <input type="hidden" value="<?= $this->session->userdata("login_id");?>" name="master"/>
                                <span class="red"><?= form_error('mobile_no');?></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email Id<span class="red">*</span></label>
                                <input type="email" placeholder="Email Id" class="form-control email" name="login_email" value="<?= $view->login_email;?>" maxlength="200" disabled="disabled" readonly="readonly">
                                <span class="red"><?= form_error('login_email');?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                               <label>Address<span class="red">*</span></label>
                               <textarea placeholder="Address" class="form-control" name="address"><?php if($view->address == ''){?><?= $view->door;?>-<?= $view->street;?>, <?= $view->area;?> <?php }else{?> <?= $view->address;?> <?php }?></textarea>
                               <span class="red"><?= form_error('address');?></span>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>ID Proof</label>
                                 <input id="" name="idproof" type="file"  autocomplete="off"  >                                
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Address Proof</label>
                                <input id="" name="addproof" type="file" autocomplete="off"  >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="submit" class="btn btn-sm btn-info" value="Update Distributor" name="update_distributor">
                        </div>
                    </div>
                    <?php } else { ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Package Name <span class="red">*</span></label>
                                <select class="form-control" name="package" id="package">
                                    <option value="Select Package"> Select Package </option>
                                    <?php                                   
                                        foreach ($pkg as $pg) {
                                            if($pg->package_id  ==  $view->package_id){ ?>
                                                <option value="<?= $pg->package_id;?>" selected="selected"><?= ucfirst($pg->package_name);?></option>
                                            <?php  
                                            } else { ?>
                                                <option value="<?= $pg->package_id;?>"><?= ucfirst($pg->package_name);?></option>
                                        <?php  }
                                    }
                                   ?>
                                </select>
                                <span class="red"><?= form_error('package');?></span>
                             </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Mobile No<span class="red">*</span></label>
                                <input type="text" placeholder="Mobile No." class="form-control" name="mobile_no" value="<?= $view->mobile;?>" onkeyup="validateR(this, '')" ruleset="[^0-9]" maxlength="10" disabled="disabled" readonly="readonly">
                                <input type="hidden" value="<?= $this->session->userdata("master_distributor_id");?>" name="master"/>
                                <input type="hidden" value="<?= $this->session->userdata("login_id");?>" name="super"/>
                                <span class="red"><?= form_error('mobile_no');?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email Id<span class="red">*</span></label>
                                <input type="email" placeholder="Email Id" class="form-control email" name="login_email" value="<?= $view->login_email;?>" maxlength="200" disabled="disabled" readonly="readonly">
                                <span class="red"><?= form_error('login_email');?></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                               <label>Address<span class="red">*</span></label>
                               <textarea placeholder="Address" class="form-control" name="address"><?php if($view->address == ''){?><?= $view->door;?>-<?= $view->street;?>, <?= $view->area;?> <?php }else{?> <?= $view->address;?> <?php }?></textarea>
                               <span class="red"><?= form_error('address');?></span>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>ID Proof</label>
                                 <input id="" name="idproof" type="file"  autocomplete="off"  >                                
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Address Proof</label>
                                <input id="" name="addproof" type="file" autocomplete="off"  >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="submit" class="btn btn-sm btn-info" value="Update Distributor" name="update_distributor">
                        </div>
                    </div>
                    <?php  } ?>
                    </form>
            <!-- END panel-->
                </div>
            </div>
        </div>
    </div>
 </section>