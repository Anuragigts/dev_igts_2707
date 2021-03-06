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
          <span class="text-sm hidden-xs">For viewing recharge reports              
              &nbsp;&nbsp;<a href='<?php echo base_url();?>reports/recharge_reportsEXL/<?php echo $post_ary['getfr'];?>/<?php echo $post_ary['geto'];?>/<?php echo $post_ary['val'];?>' target="_blanck"  style="color: inherit" data-toggle="tooltip" data-placement="top" title="Download exl"><i class="fa fa-download fa-2x white" style="color:blue;" ></i></a>
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
                                            <input type="text" placeholder="<?php echo date('m/d/Y');?>" class="form-control datepicker" name="from" value="<?= set_value('from');?>">
                                            <span class="red"><?= form_error('from');?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>To Date<span class="red">*</span></label>
                                            <input type="text" placeholder="<?php echo date('m/d/Y');?>" class="form-control datepicker" name="to" value="<?= set_value('to');?>">
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
                                                <option value=""> Get All</option>
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
	.td:nth-of-type(1):before { content: "S.No."; }
	
	
	.td:nth-of-type(2):before { content: "Amount"; }
	.td:nth-of-type(3):before { content: "Date & Time"; }
	.td:nth-of-type(4):before { content: "Tractarians No"; }
	.td:nth-of-type(5):before { content: "Recharge Type"; }
	.td:nth-of-type(6):before { content: "Status"; }
	.td:nth-of-type(7):before { content: "Complaint"; }
}
               </style>
        <div class="row">  
           <div class="col-lg-12">
               <div class="panel-body">
                    <table id="datatable1" class="table table-striped table-hover" >
                       <thead>
                          <tr>
                             <th>S.No.</th>
                             <th width="17%">Date & Time</th>
                             <th width="15%">Tractarians No</th>
                              <th>Amount</th>
                             <th>Details</th>
                             <th>Status</th>
                              <th width="20%">Complaint</th>   
                            
                          </tr>
                       </thead>
                       <tbody>
                           <?php  if(count($view) > 0) {
                               $i   =  1;
                                foreach ($view as $view){   
                                ?>
                                <tr>
                                    <td><?= $i++;?></td>
                                    <td><?= $view->cur_time;?></td>
                                    <td>SCR-0<?= $view->rid;?></td>
                                    <td><?= $view->amount;?></td>
                                    <td><?= strtolower($view->op_name);?>
                                                <?php if($view->recharge_type == 1){
                                                    echo "Prepaid , ";
                                                }else if($view->recharge_type == 2){
                                                    echo "DTH, ";
                                                }else if($view->recharge_type == 4){
                                                    echo " ";
                                                }?>
                                               <?= $view->number;?></td>
                                    <td><?php if($view->trans_no != ''){echo "Success";}else{echo "Fail";}?></td>
                                    <td>
                                         <?php if($this->session->userdata('my_type') != 1 && $this->session->userdata('my_type') != 2 ){?>
                                        <?php
                                        if($view->st_re == "0"){ ?>
                                            <a href="#" class="btn btn-primary btn-sm" title="In Processing">In Processing</a>
                                        <?php }else if($view->st_re == "1"){ ?>
                                            <a href="#" class="btn btn-success btn-sm" title="Approved" amount="<?= $view->amount;?>"  recharge_id="<?= $view->rid;?>">Approved</a>
                                        <?php }
                                        else if($view->st_re == "2"){ ?>
                                            <a href="#" class="btn btn-warning btn-sm" title="Rejected" amount="<?= $view->amount;?>"  recharge_id="<?= $view->rid;?>">Rejected</a>
                                        <?php } else { ?>
                                            <a href="#" class="btn btn-danger btn-sm refund_req" title="Generate  Complaint" amount="<?= $view->amount;?>"  recharge_id="<?= $view->rid;?>">Generate  Complaint</a>
                                         <?php } }?>
                                            <a href="#" class="trackmo" trackid="<?php echo $view->track_id;?>">check</a>
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
<script>
        $(".trackmo").click(function(){
            var id = $(this).attr('trackid');
           // alert(id);
             $.post('<?php echo base_url();?>recharge/getsatus',{'id':id},function(response){
            
            if(response =='1'){
               alert("Successfully recharged.");
                }else if(response =='0'){
                    alert("Pending status.It may get success or failure.");
                }else if(response =='2'){
                    alert("Status Unknown (Continue checking this method until you get the status 1/3) .It may get success or failure.");
                }else if(response =='3'){
                    alert("Transaction Not Available on our Host / Failure-which is a Confirmed Failure .");
                }else{
                    alert("Unknown operator.");
                }
                					
            });
        });
</script>