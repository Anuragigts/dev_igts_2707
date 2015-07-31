<section>
    <!-- Page content-->
    <div class="content-wrapper">
        <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
<!--                  <li><a href="#">Home</a>
             </li>
             <li><a href="#">Elements</a>
             </li>-->
             <li class="active">Create Distributor</li>
          </ol> Create Distributor
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">For the creation of Distributor</span>
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
                <form role="form" action="" method="post">
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
                               <label>Country<span class="red">*</span></label>
                               <select class="form-control" name="country" id="country-id">
                                   <option value="Select Country"> Select Country </option>
                                   <?php foreach($val as $op){ ?>
                                            <option value="<?= $op->Country_id;?>" <?= set_select('country',$op->Country_id);?>><?= $op->Country_name;?></option>
                                    <?php }
                                    ?>
                               </select>
                               <span class="red"><?= form_error('country');?></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                               <label>State<span class="red">*</span></label>
                               <select class="form-control" name="state" id="state-id">
                                   <option value="Select State"> Select State </option>
                               </select>
                               <span class="red"><?= form_error('state');?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                               <label>City<span class="red">*</span></label>
                               <select class="form-control" name="city" id="city-id">
                                   <option value="Select City"> Select City </option>
                               </select>
                               <span class="red"><?= form_error('city');?></span>
                            </div> 
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Master Distributor<span class="red">*</span></label>
                                <select class="form-control" name="master" id="master-id-super">
                                    <option value="Select Master Distributor"> Select Master Distributor </option>
                                    <?php foreach($master as $mt){ ?>
                                        <option value="<?= $mt->login_id;?>"><?= ucfirst($mt->first_name." ".$mt->middle_name." ".$mt->last_name);?></option>
                                        <?php } ?>
                                </select>
                                <span class="red"><?= form_error('master');?></span>
                             </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Super Distributor<span class="red">*</span></label>
                                <select class="form-control" name="super" id="super-id"  val-dis="3">
                                    <option value="Select Super Distributor"> Select Super Distributor </option>
                                </select>
                                <span class="red"><?= form_error('super');?></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Package Name <span class="red">*</span></label>
                                <select class="form-control" name="package" id="package">
                                    <option value="Select Package"> Select Package </option>
                                </select>
                                <span class="red"><?= form_error('package');?></span>
                             </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Mobile No<span class="red">*</span></label>
                                <input type="text" placeholder="Mobile No." class="form-control" name="mobile_no" value="<?= set_value('mobile_no');?>" onkeyup="validateR(this, '')" ruleset="[^0-9]" maxlength="15">
                                <span class="red"><?= form_error('mobile_no');?></span>
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
                                <label>Password<span class="red">*</span></label>
                                <input type="password" placeholder="Password" class="form-control email" name="password" value="<?= set_value('password');?>">
                                <span class="red"><?= form_error('password');?></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Confirm Password<span class="red">*</span></label>
                                <input type="password" placeholder="Confirm Password" class="form-control email" name="con_password" value="<?= set_value('con_password');?>">
                                <span class="red"><?= form_error('con_password');?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                               <label>Address<span class="red">*</span></label>
                               <textarea placeholder="Address" class="form-control" name="address" value="<?= set_value('address');?>"></textarea>
                               <span class="red"><?= form_error('address');?></span>
                            </div>
                        </div>
                        <div class="col-sm-6"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="submit" class="btn btn-sm btn-info" value="Create Distributor" name="create_distributor">
                        </div>
                    </div>
                    </form>
            <!-- END panel-->
                </div>
            </div>
        </div>
    </div>
 </section>