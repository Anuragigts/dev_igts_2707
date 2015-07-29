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
             <li class="active">View Package</li>
          </ol> View Package
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">Quick View of Packages</span>
          <!-- Breadcrumb below title-->

        </h3>
        <div class="row">
            <!-- START DATATABLE 1 -->
               <div class="row">
                  <div class="col-lg-12">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           Packages 
                           <!-- | <small>Zero Configuration</small>-->
                        </div>
                        <div class="panel-body">
                           <table id="datatable1" class="table table-striped table-hover">
                              <thead>
                                 <tr>
                                    <th>User Type</th>
                                    <th width="20%">Package Name</th>
                                    <th width="45%">Package Remarks</th>
                                    <th width="10%">Created By</th>
                                    <th class="sort-alpha">Status</th>
                                 </tr>
                              </thead>
                              <tbody>
                                  <?php foreach ($view_package as $view){?>
                                        <tr>
                                            <th><?= $view->user_name_type;?></th>
                                            <th><?= $view->package_name;?></th>
                                            <th><?= $view->package_remarks;?></th>
                                            <th><?= $view->first_name;?></th>
                                            <th class="sort-alpha">
                                                <?php if($view->status == 1){ ?>
                                                    <label class="label-green label">Active</label>
                                                <?php } else { ?>
                                                <!--<a href="javascript:void(0);">-->
                                                    <label class="label-danger label">Deactive</label>
                                                <!--</a>-->    
                                                <?php } ?>
                                            </th>
                                         </tr>
                                  <?php }?>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- END DATATABLE 1 -->
        </div>
    </div>
 </section>