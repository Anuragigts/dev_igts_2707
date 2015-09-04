<section>
    <!-- Page content-->
    <div class="content-wrapper">
        <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
              <li><a href="<?php echo base_url();?>dashboard">Dashboard</a></li>
              <li><a href="<?php echo base_url();?>super_distributor/view_super_distributor">View Super Distributors</a></li>
             <li class="active">View Super Distributors Details</li>
          </ol> View Super Distributors Details
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">For viewing Super Distributors Details</span>
          <!-- Breadcrumb below title-->

        </h3>
        <div class="row">
            <!-- START DATATABLE 1 -->
               <div class="row">
                  <div class="col-lg-12">
                      <?php 
                        $name = ucfirst($view->first_name." ".$view->middle_name." ".$view->last_name);
                    ?>
                        <p class="success"></p>
                        <p class="error"></p>
                        <div class="panel-body">
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
                                    <img src="<?php echo base_url()?>doc/<?php echo $view->id_proof;?>" class="img img-responsive img-thumbnail" Alt="N/A" style="height: 100px; width: 250px;">
                                </div>
                                <div class="col-sm-4">
                                    <img src="<?php echo base_url()?>doc/<?php echo $view->add_proof;?>" class="img img-responsive img-thumbnail" Alt="N/A" style="height: 100px; width: 250px;"> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h3 class="text-center text-bold"><a href="javascript:void(0);" class="view_dis" onclick="showDistributors(<?= $view->login_id;?>,'<?= $name;?>')" login="<?= $view->login_id;?>" user_name="<?= $name;?>" val-dis="3">View All Distributors under this <?= $name;?></a></h3>
                                </div>
                            </div>
<!--                           <table id="datatable1" class="table table-striped table-hover">
                              <thead>
                                 <tr>
                                    <th>Package Name</th>
                                    <th>Name</th>
                                    <th width="20%">Mobile No.</th>
                                    <th width="35%">Email</th>
                                    <th></th>
                                 </tr>
                              </thead>
                              <tbody>
                                  <?php 
                                      $name = ucfirst($view->first_name." ".$view->middle_name." ".$view->last_name);
                                      ?>
                                        <tr>  
                                            <th><?= ucfirst($view->package_name);?></th>
                                            <th><?= $name;?></th>
                                            <th><?= $view->mobile;?></th>
                                            <th><?= ucfirst($view->login_email);?></th>
                                            <th>
                                                <a href="javascript:void(0);" class="view_dis" onclick="showDistributors(<?= $view->login_id;?>,'<?= $name;?>')" login="<?= $view->login_id;?>" user_name="<?= $name;?>" val-dis="3">View All distributors</a>
                                            </th>
                                         </tr>
                              </tbody>
                           </table>-->
                        </div>
                     </div>
               </div>
                <!-- END DATATABLE 1 -->
                <!-- START DISTRIBUTORS -->
                <div class="row">
                    <div class="col-lg-12">
                        <h4><span id="user_val"></span></h4>
                     </div>
                </div>
                <div class="" id="txtHint">

                </div>
                <!-- END DISTRIBUTORS -->
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
