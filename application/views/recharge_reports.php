<section>
    <!-- Page content-->
    <div class="content-wrapper">
        <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
              <li><a href="<?php echo base_url();?>dashboard">Dashboard</a></li> 
             <li class="active">View Recharge Reports</li>
          </ol> View Recharge Reports
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">For viewing recharge reports</span>
          <!-- Breadcrumb below title-->

        </h3>
        <div class="row">
            <!-- START DATATABLE 1 -->
               <div class="row">
                  <div class="col-lg-12">
                        <p class="success"></p>
                        <p class="error"></p>
                        <div class="panel-body">
                            <form method="post" action="">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>From Date<span class="red">*</span></label>
                                            <input type="text" placeholder="mm/dd/yyyy" class="form-control datepicker" name="from" value="<?= set_value('from');?>">
                                            <span class="red"><?= form_error('from');?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>To Date<span class="red">*</span></label>
                                            <input type="text" placeholder="mm/dd/yyyy" class="form-control datepicker" name="to" value="<?= set_value('to');?>">
                                            <span class="red"><?= form_error('to');?></span>
                                        </div>
                                    </div>
                                    <?php if($this->session->userdata("my_type") != "5"){ ?>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>User Type</label>
                                            <select class="form-control" name="user" id="user_type">
                                                <option value=""> Select  User type</option>
                                                <?php foreach($type as $ty) { ?>
                                                        <option value="<?= $ty->user_type_id;?>" <?= set_select("user",$ty->user_type_id);?> ><?= $ty->user_type;?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <select class="form-control" name="fname" id="fname">
                                                <option value=""> Select  Name</option>
                                            </select>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <div class="col-sm-12">
                                        <div class="pull-left">
                                            <input type="submit" class="btn btn-sm btn-info " name="search" value="Search" />
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                     </div>
               </div>
               <!-- END DATATABLE 1 -->
               
                 <style>
          @media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {
	td:nth-of-type(1):before { content: "S.No."; }
	td:nth-of-type(2):before { content: "Operator Name"; }
	td:nth-of-type(3):before { content: "Number"; }
	td:nth-of-type(4):before { content: "Amount"; }
	td:nth-of-type(5):before { content: "Date & Time"; }
	td:nth-of-type(6):before { content: "Recharge Type"; }
	td:nth-of-type(7):before { content: "Status"; }
	td:nth-of-type(8):before { content: "Complaint"; }
}
               </style>
        <div class="row">  
           <div class="col-lg-12">
               <div class="panel-body">
                    <table id="datatable1" class="table table-striped table-hover">
                       <thead>
                          <tr>
                             <th>S.No.</th>
                             <th>Operator Name</th>
                             <th>Number</th>
                             <th>Amount</th>
                             <th>Date & Time</th>
                             <th>Tractarians No</th>
                             <th>Recharge Type</th>
                             <th>Status</th>
                             <th>Complaint</th>       
                          </tr>
                       </thead>
                       <tbody>
                           <?php  if(count($view) > 0) {
                               $i   =  1;
                                foreach ($view as $view){   
                                ?>
                                <tr>
                                    <td><?= $i++;?></td>
                                    <td><?= $view->op_name;?></td>
                                    <td><?= $view->number;?></td>
                                    <td><?= $view->amount;?></td>
                                    <td><?= $view->cur_time;?></td>
                                    <td><?= $view->trans_no;?></td>
                                    <td><?= $view->module_name;?></td>
                                    <td><?php if($view->trans_no != ''){echo "Success";}else{echo "Fail";}?></td>
                                    <td>
                                        <?php
                                        if($view->st_re == "0"){ ?>
                                            <a href="javscript:void(0);" class="btn btn-primary btn-sm" title="In Processing">In Processing</a>
                                        <?php }else if($view->st_re == "1"){ ?>
                                            <a href="javscript:void(0);" class="btn btn-success btn-sm" title="Approved" amount="<?= $view->amount;?>"  recharge_id="<?= $view->recharge_id;?>">Approved</a>
                                        <?php }
                                        else if($view->st_re == "2"){ ?>
                                            <a href="javscript:void(0);" class="btn btn-warning btn-sm" title="Rejected" amount="<?= $view->amount;?>"  recharge_id="<?= $view->recharge_id;?>">Rejected</a>
                                        <?php } else { ?>
                                            <a href="javscript:void(0);" class="btn btn-danger btn-sm refund_req" title="Generate  Complaint" amount="<?= $view->amount;?>"  recharge_id="<?= $view->recharge_id;?>">Generate  Complaint</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                               <?php 
                                }
                            } ?>
                       </tbody>
                    </table>
               </div>

            </div>
        </div>
    </div>
 </section>