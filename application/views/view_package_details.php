<section>
    <!-- Page content-->
    <div class="content-wrapper">
        <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
              <li><a href="<?php echo base_url();?>dashboard">Dashboard</a></li> 
              <li><a href="<?php echo base_url();?>package/view_package">View Package</a></li> 
              <li class="active">View Complete Details of Package</li>
          </ol> View Package Details
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">For viewing complete details of Packages</span>
          <!-- Breadcrumb below title-->

        </h3>
        <div class="row">
            <!-- START DATATABLE 1 -->
               <div class="row">
                  <div class="col-lg-12">
                        <div class="panel-body">
                           <table id="datatable1" class="table table-striped table-hover">
                              <thead>
                                 <tr>
                                    <th>S.No.</th>
                                    <th>Module Name</th>
                                    <th width="10%">Sub Module Name</th>
                                    <th width="15%">Module Object Name</th>
                                    <th width="10%">User Type</th>
                                    <th width="20%">Package Name</th>
                                    <th width="25%">Package Remarks</th>
                                    <th width="10%">Commission Amount</th>
                                    <th width="10%">Created By</th>
                                 </tr>
                              </thead>
                              <tbody>
                                  <?php 
                                    $i  = 1;
                                    foreach ($view_det as $view){?>
                                        <tr>
                                            <th><?= $i++;?></th>
                                            <th><?= ucfirst($view->module_name);?></th>
                                            <th><?= ucfirst($view->sub_module_name);?></th>
                                            <th><?= ucfirst($view->modules_obj_name);?></th>
                                            <th><?= ucfirst($view->type_name);?></th>
                                            <th><?= ucfirst($view->package_name);?></th>
                                            <th><?= ucfirst($view->package_remarks);?></th>
                                            <th><?= ucfirst($view->commission_amt);?></th>
                                            <th><?= ucfirst($view->first_name);?></th>
                                         </tr>
                                  <?php }?>
                              </tbody>
                           </table>
                        </div>
                     </div>
               </div>
               <!-- END DATATABLE 1 -->
        </div>
    </div>
 </section>