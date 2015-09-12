<section>
    <!-- Page content-->
    <div class="content-wrapper">
        <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
              <li><a href="<?php echo base_url();?>dashboard">Dashboard</a></li> 
             <li class="active">View Requests</li>
          </ol> View Requests
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">For viewing Requests</span>
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
                                    <th width="20%">Name</th>
                                    <th width="10%">Mobile No.</th>
                                    <th>Amount Request</th>
                                    <th>Status</th>
                                 </tr>
                              </thead>
                              <tbody>
                                  <?php 
                                    $i = 1;
                                    foreach ($view as $view){
                                      $name = ucfirst($view->first_name." ".$view->middle_name." ".$view->last_name);
                                      ?>
                                        <tr>
                                            <th><?= $i++;?></th>
                                            <th><?= $name;?></th>
                                            <th><?= $view->mobile;?></th>
                                            <th>Rs.<?= $view->trans_amount?number_format($view->trans_amount,2):"0.00";?></th>
                                            <?php if( $this->session->userdata("my_type") == 1){ ?>
                                            <th>
                                                <?php if($view->status == 1){ ?>
                                                <a  class="btn btn-sm btn-warning" href="javascript:void(0);" title="Reject" fund="<?= $view->refund_req_id;?>" amount="<?= $view->trans_amount;?>"  login="<?= $view->login_id;?>" user_name="<?= $name;?>">
                                                       Reject
                                                </a>
                                                <?php } else if($view->status == 2){ ?>
                                                <a class="btn btn-sm btn-info"  href="javascript:void(0);" title="Approve" fund="<?= $view->refund_req_id;?>" amount="<?= $view->trans_amount;?>"  login="<?= $view->login_id;?>" user_name="<?= $name;?>">
                                                        Approve
                                                </a>
                                                <?php }else{ ?>
                                                <a class="btn btn-sm btn-info ref_fund" href="javascript:void(0);" title="Approve" fund="<?= $view->refund_req_id;?>" amount="<?= $view->trans_amount;?>"  login="<?= $view->login_id;?>" user_name="<?= $name;?>">
                                                        Approve
                                                </a>
                                                <a class="btn btn-sm btn-warning noref_fund" href="javascript:void(0);" title="Reject" fund="<?= $view->refund_req_id;?>" amount="<?= $view->trans_amount;?>"  login="<?= $view->login_id;?>" user_name="<?= $name;?>">
                                                       Reject
                                                </a>
                                                <?php }?>
                                            </th>
                                            <?php } else {?>
                                            <th><?php  
                                                    if($view->status == 1) echo "Aprroved";
                                                    if($view->status == 2) echo "Not Approved";
                                                    if($view->status == 3) echo "Draft";
                                                ?></th>
                                            <?php } ?>
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
