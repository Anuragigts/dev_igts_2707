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
                                    <th width="20%">Details</th>
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
                                            <td><?= $i++;?></td>
                                            <td><?= $name;?></td>
                                            <td><?= $view->mobile;?></td>
                                            <td >
                                                <?= strtolower($view->op_name);?>
                                                <?php if($view->recharge_type == 1){
                                                    echo "Prepaid , ";
                                                }else if($view->recharge_type == 2){
                                                    echo "DTH, ";
                                                }else if($view->recharge_type == 4){
                                                    echo " ";
                                                }?><br>
                                               <?= $view->number;?>
                                            </td>
                                            <td>Rs.<?= $view->trans_amount?number_format($view->trans_amount,2):"0.00";?></td>
                                            <?php if( $this->session->userdata("my_type") == 1){ ?>
                                            <td>
                                                <?php if($view->status1 == 1){ ?>
                                                
                                                      Approved 
                                                
                                                <?php } else if($view->status1 == 2){ ?>
                                                       Rejected
                                                
                                                <?php }else{ ?>
                                                <a class="btn btn-sm btn-info ref_fund" href="javascript:void(0);" title="Approve" fund="<?= $view->refund_req_id;?>" amount="<?= $view->trans_amount;?>" recharge="<?= $view->recharge_id;?>" op_name="<?= $view->op_name;?>" login="<?= $view->login_id;?>" user_name="<?= $name;?>" md="<?= $view->master_distributor_id;?>" sd="<?= $view->super_distributor_id;?>" d="<?= $view->distributor_id;?>">
                                                        Approve
                                                </a>
                                                <a class="btn btn-sm btn-warning noref_fund" href="javascript:void(0);" title="Reject" fund="<?= $view->refund_req_id;?>" amount="<?= $view->trans_amount;?>"  login="<?= $view->login_id;?>" user_name="<?= $name;?>">
                                                       Reject
                                                </a>
                                                <?php }?>
                                            </td>
                                            <?php } else {?>
                                            <td><?php  
                                                    if($view->status == 1) echo "Aprroved";
                                                    if($view->status == 2) echo "Not Approved";
                                                    if($view->status == 3) echo "Draft";
                                                ?></td>
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
