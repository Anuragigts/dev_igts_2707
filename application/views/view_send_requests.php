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
        
           
                 <style>
          @media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {
	td:nth-of-type(1):before { content: "S.No."; }
	td:nth-of-type(2):before { content: "Name"; }
	td:nth-of-type(3):before { content: "Mobile No."; }
	td:nth-of-type(4):before { content: "Bank Name"; }
	td:nth-of-type(5):before { content: "Payment"; }
	td:nth-of-type(6):before { content: "Transaction No"; }
	td:nth-of-type(7):before { content: "Amount Request"; }
	td:nth-of-type(8):before { content: "Status"; }
}
               </style>
               
        <div class="row">  
           <div class="col-lg-12">
               <div class="panel-body">
                    <table id="datatable1" class="table table-striped table-hover">
                       <thead>
                          <tr>
                            <th>S.No.</th>
                            <th>Name</th>
                            <th>Mobile No.</th>
                            <th>Bank Name</th>
                            <th>Payment Type</th>
                            <th>Cheque / Transaction No.</th>
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
                                            <td><?= $view->bank_name;?></td>
                                            <td><?php 
                                                if($view->ptype == 1) echo "Draft";
                                                if($view->ptype == 2) echo "Cash";
                                                if($view->ptype == 3) echo "Cheque";
                                                if($view->ptype == 4) echo "NEFT";
                                                if($view->ptype == 5) echo "Online";
                                            ?></td>
                                            <td><?= $view->cheque?$view->cheque:"N/A";?></td>
                                            <td>Rs.<?= $view->amount?number_format($view->amount,2):"0.00";?></td>
                                            <?php if( $this->session->userdata("my_type") == 1){ ?>
                                            <td>
                                                <?php if($view->status == 1){ ?>
                                               Approved
                                                <?php } else if($view->status == 2){ ?>
                                                Rejected
                                                <?php }else{ ?>
                                                <a class="btn btn-sm btn-info approvefund" href="javascript:void(0);" title="Approve" fund="<?= $view->fund_id;?>" amount="<?= $view->amount;?>"  login="<?= $view->login_id;?>" user_name="<?= $name;?>">
                                                        Approve
                                                </a>
                                                <a class="btn btn-sm btn-warning notapprovefund" href="javascript:void(0);" title="Approve" fund="<?= $view->fund_id;?>" amount="<?= $view->amount;?>"  login="<?= $view->login_id;?>" user_name="<?= $name;?>">
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
         
      
    </div>
 </section>
