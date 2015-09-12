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
        <div class="row">  
           <div class="col-lg-12">
               <div class="panel-body">
                    <table id="datatable1" class="table table-striped table-hover">
                       <thead>
                          <tr>
                             <th>S.No.</th>
                             <th>Transaction ID</th>
                             <th>Operator Name</th>
                             <th>Number</th>
                             <th>Amount</th>
                             <th>Recharge Type</th>
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
                                    <td><?= $view->track_id;?></td>
                                    <td><?= $view->op_name;?></td>
                                    <td><?= $view->number;?></td>
                                    <td><?= $view->amount;?></td>
                                    <td><?= $view->module_name;?></td>
                                    <td>
                                    <form action="" method="">
                                        <input type="hidden" name="com_val" value="<?= $view->done_by;?>"/>
                                        <input type='submit' class="btn btn-danger btn-sm" value="Generate  Complaint" name="submit"/>
                                    </form>
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