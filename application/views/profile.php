<section>
    <!-- Page content-->
    <div class="content-wrapper">
        <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
               <li><a href="<?php echo base_url();?>dashboard">Dashboard</a></li> 
             <li class="active">Profile</li>
          </ol> Profile
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">For the editing your profile</span>
          <!-- Breadcrumb below title-->

        </h3>
        <div class="row">
            <?php   $this->load->view("layout/success_error");?>
            <!-- START panel--> 
            <div class="panel panel-default">
<!--                    <div class="panel-heading">
                       Create Commission
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
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>User Type<span class="red">*</span></label>
                                <input type="text" placeholder="User Type" class="form-control" name="user_type" value="<?= $view->type_user;?>" disabled="disabled" readonly="readonly">
                                <span class="red"><?= form_error('user_type');?></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Mobile No<span class="red">*</span></label>
                                <input type="text" placeholder="Mobile No." class="form-control" name="mobile_no" value="<?= $view->mobile;?>" onkeyup="validateR(this, '')" ruleset="[^0-9]" maxlength="10" disabled="disabled" readonly="readonly">
                                <span class="red"><?= form_error('mobile_no');?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email Id<span class="red">*</span></label>
                                <input type="email" placeholder="Email Id" class="form-control email" name="login_email" value="<?= $view->login_email;?>" maxlength="200"  disabled="disabled" readonly="readonly">
                                <span class="red"><?= form_error('login_email');?></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                               <label>Address<span class="red">*</span></label>
                               <textarea placeholder="Address" class="form-control" name="address"><?= $view->address;?></textarea>
                               <span class="red"><?= form_error('address');?></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="signupInputEmail1" class="text-muted">Door No. <span class="red">*</span></label>
                                    <input id="signupInputEmail1" name="door" value="<?= $view->door; ?>" type="text" placeholder="Door No." autocomplete="off" required class="form-control">
                                   <span class="fa fa-window form-control-feedback text-muted"></span>
                                   <span class="red"><?=  form_error('door');?></span>
                                </div> 
                            </div>
                            <div class="col-md-6">
                               <div class="form-group has-feedback">
                                   <label for="signupInputEmail1" class="text-muted">Street <span class="red">*</span></label>
                                   <input id="signupInputEmail1" name="street" value="<?= $view->street; ?>" type="text" placeholder="Street" autocomplete="off" required class="form-control">
                                  <span class="fa fa-window form-control-feedback text-muted"></span>
                                  <span class="red"><?=  form_error('street');?></span>
                               </div> 
                           </div> 
                    </div> 
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label for="signupInputEmail1" class="text-muted">Area <span class="red">*</span></label>
                                <input id="signupInputEmail1" name="area" value="<?= $view->area; ?>" type="text" placeholder="Area" autocomplete="off" required class="form-control">
                               <span class="fa fa-window form-control-feedback text-muted"></span>
                               <span class="red"><?=  form_error('area');?></span>
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
                            <input type="submit" class="btn btn-sm btn-info" value="Update Profile" name="update_profile">
                        </div>
                    </div>
                    </form>
            <!-- END panel-->
            </div>
            </div>
        </div>
    </div>
 </section>