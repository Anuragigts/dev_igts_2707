<section>
    <!-- Page content-->
    <div class="content-wrapper">
        <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
              <li><a href="<?php echo base_url();?>dashboard">Dashboard</a></li> 
             <li class="active">Create Master Distributor</li>
          </ol> Create Master Distributor
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">For the creation of Master Distributor</span>
          <!-- Breadcrumb below title-->
        </h3>
        <div class="row">
            <?php   $this->load->view("layout/success_error");?>
            <!-- START panel--> 
            <div class="panel panel-default">

            <div class="panel-body">
                <form role="form" action="" enctype="multipart/form-data" method="post">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>First Name<span class="red">*</span></label>
                                <input type="text" placeholder="First Name" class="form-control" name="first_name" value="<?= set_value('first_name');?>" onkeypress="return onlyAlpha(event);" maxlength="50">
                                <span class="red"><?= form_error('first_name');?></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Last Name<span class="red">*</span></label>
                                <input type="text" placeholder="Last Name" class="form-control" name="last_name" value="<?= set_value('last_name');?>" onkeypress="return onlyAlpha(event);" maxlength="50">
                                <span class="red"><?= form_error('last_name');?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                               <label>State<span class="red">*</span></label>
                               <select class="form-control state_id" name="state" id="state-id">
                                   <option value="Select State"> Select State </option>
                                   <?php foreach ($state as $st){ ?> 
                                   <option value="<?= $st->State_id;?>" <?php echo set_select('state',$st->State_id, ( !empty($data) && $data == "$st->State_id") ? TRUE : FALSE )?>><?= $st->State_name;?></option>
                                   <?php } ?>
                               </select>
                               <span class="red"><?= form_error('state');?></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                               <label>City<span class="red">*</span></label>
                               <select class="form-control city-id-val" name="city" id="city-id">
                                   <option value="Select City"> Select City </option>
                                   <?php foreach ($city as $ct){ ?> 
                                   <option value="<?= $ct->City_id;?>" <?php echo set_select('city',$ct->City_id, ( !empty($data) && $data == "$ct->City_id") ? TRUE : FALSE )?>><?= $ct->City_name;?></option>
                                   <?php } ?>
                               </select>
                               <span class="red"><?= form_error('city');?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                               <label>Package Name<span class="red">*</span></label>
                               <select class="form-control" name="package">
                                   <option value="Select Package"> Select Package </option>
                                   <?php foreach($pkg as $pg){ ?>
                                   <option value="<?= $pg->package_id;?>" <?php echo set_select('package',$pg->package_id, ( !empty($data) && $data == "$pg->package_id") ? TRUE : FALSE )?>><?= ucfirst($pg->package_name);?></option>    
                                   <?php } ?>
                               </select>
                               <span class="red"><?= form_error('package');?></span>
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
                                <label>Email Id<span class="red">*</span></label>
                                <input type="email" placeholder="Email Id" class="form-control email" name="login_email" value="<?= set_value('login_email');?>" maxlength="200">
                                <span class="red"><?= form_error('login_email');?></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Password<span class="red">*</span></label>
                                <input type="password" placeholder="Password" class="form-control password" name="password" value="<?= set_value('password');?>" id="strpassword">
                                <span class="red"><?= form_error('password');?></span>
                            </div>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Confirm Password<span class="red">*</span></label>
                                <input type="password" placeholder="Confirm Password" class="form-control email" name="con_password" value="<?= set_value('con_password');?>">
                                <span class="red"><?= form_error('con_password');?></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                               <label>Address<span class="red">*</span></label>
                               <textarea placeholder="Address" class="form-control" name="address" value="<?= set_value('address');?>"></textarea>
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
                            <input type="submit" class="btn btn-sm btn-info" value="Create Master Distributor" name="create_master_distributor">
                        </div>
                    </div>
                    </form>
            <!-- END panel-->
                  </div>
            </div>
        </div>
    </div>
 </section>