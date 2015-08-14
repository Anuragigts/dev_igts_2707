<section>
    <!-- Page content-->
    <div class="content-wrapper">
        <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
              <li><a href="<?php echo base_url();?>dashboard">Dashboard</a></li> 
              <li><a href="<?php echo base_url();?>distributor/view_distributor">View Distributors</a></li> 
             <li class="active">View Distributors Details</li>
          </ol> View Distributors Details
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">For viewing Distributors Details</span>
          <!-- Breadcrumb below title-->

        </h3>
        <div class="row">
            <!-- START DATATABLE 1 -->
               <div class="row">
                  <div class="col-lg-12">
                        <div class="panel-body">
                            <?php 
                                $name = ucfirst($view->first_name." ".$view->middle_name." ".$view->last_name);
                            ?>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="col-sm-12">
                                        <div class="col-sm-6">
                                            <label class="success">Name</label>
                                        </div>
                                        <div class="col-sm-6"><?= $name;?></div>
                                    </div>                                  
                                </div>
                                <div class="col-sm-4">
                                    <div class="col-sm-12">
                                        <div class="col-sm-6"><label class="success">Mobile No.</label></div>
                                        <div class="col-sm-6"><?= $view->mobile;?></div>
                                    </div>  
                                </div>
                                <div class="col-sm-4">
                                    <div class="col-sm-12">
                                        <div class="col-sm-6"><label class="success">Email</label></div>
                                        <div class="col-sm-6"><?= ucfirst($view->login_email);?></div>
                                    </div>  
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="col-sm-12">
                                        <div class="col-sm-6">
                                            <label class="success">Country</label>
                                        </div>
                                        <div class="col-sm-6"><?= $view->Country_name;?></div>
                                    </div>                                  
                                </div>
                                <div class="col-sm-4">
                                    <div class="col-sm-12">
                                        <div class="col-sm-6"><label class="success">State</label></div>
                                        <div class="col-sm-6"><?= $view->State_name;?></div>
                                    </div>  
                                </div>
                                <div class="col-sm-4">
                                    <div class="col-sm-12">
                                        <div class="col-sm-6"><label class="success">City</label></div>
                                        <div class="col-sm-6"><?= $view->City_name;?></div>
                                    </div>  
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="col-sm-12">
                                        <div class="col-sm-6">
                                            <label class="success">Package Name</label>
                                        </div>
                                        <div class="col-sm-6"><?= ucfirst($view->package_name);?></div>
                                    </div>                                  
                                </div>
                                <div class="col-sm-4">
                                </div>
                                <div class="col-sm-4">
                                     
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h3 class="text-center text-bold"> <a href="javascript:void(0);" class="view_dis" onclick="showAgents(<?= $view->login_id;?>,'<?= $name;?>')" login="<?= $view->login_id;?>" user_name="<?= $name;?>" val-dis="3">View All Agents under this <?= $name;?></a></h3>
                                </div>
                            </div>
                        </div>
                     </div>
               </div>
                <!-- END DATATABLE 1 -->
                <!-- START AGENTS -->
                <div class="row">
                    <div class="col-lg-12">
                        <h4><span id="dis_user_val"></span></h4>
                     </div>
                </div>
                <div class="" id="txtHint_val">

                </div>
                <!-- END AGENTS -->
               <!-- END DATATABLE 2 -->
        </div>
    </div>
 </section>
