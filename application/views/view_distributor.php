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
             <li class="active">View Distributors</li>
          </ol> View Distributors
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">For viewing Distributors</span>
          <!-- Breadcrumb below title-->

        </h3>
        <div class="row">
            <!-- START DATATABLE 1 -->
               <div class="row">
                  <div class="col-lg-12">
                        <p class="success"></p>
                        <p class="error"></p>
                        <div class="panel-body">
                           <table id="datatable1" class="table table-striped table-hover">
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
                                  <?php foreach ($view_dis as $view){
                                        $name   =   ucfirst($view->first_name." ".$view->middle_name." ".$view->last_name);
                                        ?>
                                        <tr>                                           
                                            <th><?= ucfirst($view->package_name);?></th>
                                            <th><?= $name;?></th>
                                            <th><?= $view->mobile;?></th>
                                            <th><?= ucfirst($view->login_email);?></th>
                                            <th>
                                                <a href="javascript:void(0);" title="<?php echo ($view->status == 0)? 'Activate':'Deactivate';?>">
                                                    <!--<i class="success fa fa-check-circle-o"></i>-->
                                                    <label class="switch switch-sm">
                                                        <input type="checkbox" <?php echo ($view->status == 0)?"":"checked=checked";?> class="checkbox-inline <?php echo ($view->status == 0)?'activate':'deactivate';?>" login="<?= $view->login_id;?>" user_name="<?= $name;?>">
                                                        <span></span>
                                                    </label>
                                                </a>
                                                <a href="<?= base_url();?>distributor/distributor_details/<?= $view->login_id;?>" title="View Complete Details">
                                                    <i class="fa fa-search-plus"></i>
                                                </a>
                                                <a href="<?= base_url();?>distributor/edit_distributor/<?= $view->login_id;?>" title="Edit Details">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="<?= base_url();?>distributor/module_access_dis/<?= $view->login_id;?>" title="Module Access">
                                                    <i class="fa fa-paw"></i>
                                                </a>
                                            </th>
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