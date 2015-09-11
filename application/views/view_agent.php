<section>
    <!-- Page content-->
    <div class="content-wrapper">
        <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
              <li><a href="<?php echo base_url();?>dashboard">Dashboard</a></li> 
             <li class="active">View Agents</li>
          </ol> View Agents
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">For viewing Agents</span>
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
                                     <th>S.No.</th>
                                    <th>Name</th>
                                    <th width="20%">Email</th>
                                    <th width="20%">Mobile No.</th>
                                    <th>Amount</th>
                                    <th>Recharge Money</th>
                                    <th>Status</th>
                                 </tr>
                              </thead>
                              <tbody>
                                  <?php 
                                    $i= 1;
                                    foreach ($view_dis as $view){
                                      $name =   ucfirst($view->first_name." ".$view->middle_name." ".$view->last_name);
                                        ?>
                                        <tr>
                                            <th><?= $i++;?></th>
                                            <th><?= $name;?></th>
                                            <th><?= ucfirst($view->login_email);?></th>
                                            <th><?= $view->mobile;?></th>
                                            <th>Rs.<?= $view->amount?number_format($view->amount,2):"0.00";?></th>
                                            <th class="text-center"><a href="<?php echo base_url();?>settings/moneyTransfer/<?= $view->login_id;?>/<?= $view->user_type;?>" title="Money Transfer For Recharge" class="green"><i class="fa fa-paypal fa-1x"></i></a></th>
                                            <th>
                                                <a href="javascript:void(0);" title="<?php echo ($view->status == 0)? 'Activate':'Deactivate';?>">
                                                    <!--<i class="success fa fa-check-circle-o"></i>-->
                                                    <label class="switch switch-sm">
                                                        <input type="checkbox" <?php echo ($view->status == 0)?"":"checked=checked";?> class="checkbox-inline <?php echo ($view->status == 0)?'activate':'deactivate';?>" login="<?= $view->login_id;?>" user_name="<?= $name;?>">
                                                        <span></span>
                                                    </label>
                                                </a>
                                                <a href="<?= base_url();?>agent/agent_details/<?= $view->login_id;?>" title="View Complete Details">
                                                    <i class="fa fa-search-plus"></i>
                                                </a>
                                                <a href="<?= base_url();?>agent/edit_agent/<?= $view->login_id;?>" title="Edit Details">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                 <a href="<?= base_url();?>agent/module_access_agent/<?= $view->login_id;?>" title="Module Access">
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