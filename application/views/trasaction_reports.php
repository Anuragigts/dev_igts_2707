<section>
    <!-- Page content-->
    <div class="content-wrapper">
        <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
              <li><a href="<?php echo base_url();?>dashboard">Dashboard</a></li> 
             <li class="active">View Transaction Reports</li>
          </ol> View  Transaction Reports
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">For viewing transaction reports
           &nbsp;&nbsp;<a href='<?php echo base_url();?>reports/trasaction_reportsEXL/<?php echo $post_ary['getfr'];?>/<?php echo $post_ary['geto'];?>/<?php echo $post_ary['val'];?>' target="_blanck"  style="color: inherit" data-toggle="tooltip" data-placement="top" title="Download exl"><i class="fa fa-download fa-2x white" style="color:blue;" ></i></a>
          </span>
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
	td:nth-of-type(2):before { content: "Transaction Number"; }
	
	td:nth-of-type(3):before { content: " Amount"; }
	td:nth-of-type(4):before { content: " Type"; }
	td:nth-of-type(5):before { content: "Balance"; }
	td:nth-of-type(6):before { content: "Remarks"; }
}
               </style>
        <div class="row">  
           <div class="col-lg-12">
               <div class="panel-body">
                    <table id="datatable1" class="table table-striped table-hover">
                       <thead>
                          <tr>
                             <th>S.No.</th>
                            <th width="13%"> Track Number</th>
                            
                             <th>Amount</th>
                             <th>Type</th>
                             <th>Balance</th>
                             <th width="15%">Date & Time</th>
                             <th>Remarks</th>       
                          </tr>
                       </thead>
                       <tbody>
                           <?php  if(count($view) > 0) {
                               $i   =  1;
                                foreach ($view as $view){   
                                ?>
                                <tr>
                                    <td><?= $i++;?></td>
                                    <td>SCT-0<?= $view->trans_id;?></td>
                                    
                                    <td><?= $view->trans_amt;?></td>
                                     <td><?php if($view->type == 1){ echo "Credited";}else if($view->type == 2){echo "Debited";}else{echo "N/A";}?></td>
                                    <td><?= $view->cur_amount;?></td>
                                   
                                    <td><?= $view->trans_date;?></td>
                                    <td><?= $view->trans_remark;?></td>
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