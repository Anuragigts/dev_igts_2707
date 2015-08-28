<section>
         <!-- Page content-->
    <div class="content-wrapper">
       <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
             <li><a href="<?php echo base_url();?>dashboard">Dashboard</a>
             </li> 
             <li><a href="<?php echo base_url();?>recharge/mobile_recharge">Recharge</a>
             </li> 
             <li class="active">Details</li>                 
          </ol>Recharge Details
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">Get the recharge status</span>
          <!-- Breadcrumb below title-->
       </h3>
       <!-- START widgets box-->
       
       <div class="row">
           <div class="col-lg-12">
               <div class="panel-body">
                    <table id="datatable1" class="table table-striped table-hover">
                       <thead>
                          <tr>
                             <th >S.No.</th>
                             <th >Number</th>
                             <th >Amount</th>
                             <th >Operator</th>
                             <th>Type</th>
                             <th >Reference No.</th>
                             <th >Transaction No.</th>
                             <th >Time</th>
                             <th >Done By</th>                             
                             <th >Status</th>                             
                          </tr>
                       </thead>
                       <tbody>
                           <?php $i=1;foreach($details as $dl){?>
                           <?php if($this->session->userdata('my_type') == 1){?>
                                <tr>
                                    <td><?php echo $i; $i++;?></td>
                                    <td><?php echo $dl->number;?></td>
                                    <td><?php echo $dl->amount;?></td>
                                    <td><?php echo $dl->op_name;?></td>
                                    <td><?php if($dl->recharge_type == 1){
                                       echo  "Mobile";
                                    }else if($dl->recharge_type == 2){
                                        echo  "DTH";
                                    }else{
                                        echo "Post paid / Landline";
                                    }?></td>
                                    <td><?php echo $dl->ref_num;?></td>
                                    <td><?php echo $dl->trans_no;?></td>
                                    <td><?php echo $dl->responce_time;?></td>
                                    <td><?php echo $dl->first_name;?> (<?php echo $dl->u_type;?>)</td>
                                    <td>
                                        <?php if($dl->status == 1){
                                            echo "Success";
                                        }else{?>
                                        <button class="btn btn-primary btn-xs" type="button">Complaint</button>

                                        <?php }?>
                                    </td>
                                </tr>
                           <?php }else if($this->session->userdata('my_type') == 2){?>
                                <?php if($dl->master_distributor_id == $this->session->userdata('login_id') || $dl->done_by == $this->session->userdata('login_id')){?>
                                    <tr>
                                        <td><?php echo $i; $i++;?></td>
                                        <td><?php echo $dl->number;?></td>
                                        <td><?php echo $dl->amount;?></td>
                                        <td><?php echo $dl->op_name;?></td>
                                        <td><?php if($dl->recharge_type == 1){
                                           echo  "Mobile";
                                        }else{
                                            echo  "DTH";
                                        }?></td>
                                        <td><?php echo $dl->ref_num;?></td>
                                        <td><?php echo $dl->trans_no;?></td>
                                        <td><?php echo $dl->responce_time;?></td>
                                        <td><?php echo $dl->first_name;?> (<?php echo $dl->u_type;?>)</td>
                                        <td>
                                            <?php if($dl->status == 1){
                                                echo "Success";
                                            }else{?>
                                            <button class="btn btn-primary btn-xs" type="button">Complaint</button>

                                            <?php }?>
                                        </td>
                                    </tr>
                                <?php }?>
                           <?php }else if($this->session->userdata('my_type') == 3){?>
                                <?php if($dl->super_distributor_id == $this->session->userdata('login_id') || $dl->done_by == $this->session->userdata('login_id')){?>
                                    <tr>
                                        <td><?php echo $i; $i++;?></td>
                                        <td><?php echo $dl->number;?></td>
                                        <td><?php echo $dl->amount;?></td>
                                        <td><?php echo $dl->op_name;?></td>
                                        <td><?php if($dl->recharge_type == 1){
                                           echo  "Mobile";
                                        }else{
                                            echo  "DTH";
                                        }?></td>
                                        <td><?php echo $dl->ref_num;?></td>
                                        <td><?php echo $dl->trans_no;?></td>
                                        <td><?php echo $dl->responce_time;?></td>
                                        <td><?php echo $dl->first_name;?> (<?php echo $dl->u_type;?>)</td>
                                        <td>
                                            <?php if($dl->status == 1){
                                                echo "Success";
                                            }else{?>
                                            <button class="btn btn-primary btn-xs" type="button">Complaint</button>

                                            <?php }?>
                                        </td>
                                    </tr>
                                <?php }?>
                           <?php }else if($this->session->userdata('my_type') == 4){?>
                                <?php if($dl->distributor_id == $this->session->userdata('login_id') || $dl->done_by == $this->session->userdata('login_id')){?>
                                    <tr>
                                        <td><?php echo $i; $i++;?></td>
                                        <td><?php echo $dl->number;?></td>
                                        <td><?php echo $dl->amount;?></td>
                                        <td><?php echo $dl->op_name;?></td>
                                        <td><?php if($dl->recharge_type == 1){
                                           echo  "Mobile";
                                        }else{
                                            echo  "DTH";
                                        }?></td>
                                        <td><?php echo $dl->ref_num;?></td>
                                        <td><?php echo $dl->trans_no;?></td>
                                        <td><?php echo $dl->responce_time;?></td>
                                        <td><?php echo $dl->first_name;?> (<?php echo $dl->u_type;?>)</td>
                                        <td>
                                            <?php if($dl->status == 1){
                                                echo "Success";
                                            }else{?>
                                            <button class="btn btn-primary btn-xs" type="button">Complaint</button>

                                            <?php }?>
                                        </td>
                                    </tr>
                                <?php }?>
                           <?php }else{?>
                                    <?php if($dl->done_by == $this->session->userdata('login_id')){?>
                                    <tr>
                                        <td><?php echo $i; $i++;?></td>
                                        <td><?php echo $dl->number;?></td>
                                        <td><?php echo $dl->amount;?></td>
                                        <td><?php echo $dl->op_name;?></td>
                                        <td><?php if($dl->recharge_type == 1){
                                           echo  "Mobile";
                                        }else{
                                            echo  "DTH";
                                        }?></td>
                                        <td><?php echo $dl->ref_num;?></td>
                                        <td><?php echo $dl->trans_no;?></td>
                                        <td><?php echo $dl->responce_time;?></td>
                                        <td><?php echo $dl->first_name;?> (<?php echo $dl->u_type;?>)</td>
                                        <td>
                                            <?php if($dl->status == 1){
                                                echo "Success";
                                            }else{?>
                                            <button class="btn btn-primary btn-xs" type="button">Complaint</button>

                                            <?php }?>
                                        </td>
                                    </tr>
                                <?php }?>
                           <?php }?>
                           <?php }?>
                       </tbody>
                    </table>
               </div>

            </div>
        </div>            
    </div>
 </section>