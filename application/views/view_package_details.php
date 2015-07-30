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
             <li class="active">View Complete Details of Package</li>
          </ol> View Package
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
                                    <th>Module Name</th>
                                    <th width="22%">Sub Module Name</th>
                                    <th width="10%">User Type</th>
                                    <th width="20%">Package Name</th>
                                    <th width="25%">Package Remarks</th>
                                    <th width="22%">Commission Amount</th>
                                    <th width="10%">Created By</th>
                                 </tr>
                              </thead>
                              <tbody>
                                  <?php foreach ($view_det as $view){?>
                                        <tr>
                                            <th><?= $view->module_name;?></th>
                                            <th><?= $view->sub_module_name;?></th>
                                            <th><?= $view->type_name;?></th>
                                            <th><?= $view->package_name;?></th>
                                            <th><?= $view->package_remarks;?></th>
                                            <th><?= $view->commission_amt;?></th>
                                            <th><?= $view->first_name;?></th>
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