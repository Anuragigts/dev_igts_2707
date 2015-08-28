<section>
         <!-- Page content-->
    <div class="content-wrapper">
       <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
             <li><a href="<?php echo base_url();?>dashboard">Dashboard</a>
             </li>              
             <li class="active">DMR</li>                 
          </ol>Sender List
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">Get the sender details</span>
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
                             <th >Name</th>
                             <th >Mobile</th>
                             <th >KYC</th>
                             <th>Email</th>
                             <th >Card Number</th>
                             <th>MMID</th>
                             <th >Done By</th>                             
                             <th >Action</th>                             
                             <th >View</th>                             
                          </tr>
                       </thead>
                       <tbody>
                           <?php $i=1;foreach($senders as $sr){?>
                             <?php if($this->session->userdata('my_type') == 1){?>
                                <tr>
                                    <td><?php echo $i; $i++;?></td>
                                    <td><?php echo $sr->name;?></td>
                                    <td><?php echo $sr->mobile;?></td>
                                    <td><?php if($sr->kyc == 1){
                                       echo  "Non KYC";
                                    }else{
                                        echo  "KYC";
                                    }?></td>
                                    <td><?php echo $sr->email;?></td>
                                    <td><?php echo $sr->card_number;?></td>
                                    <td><?php echo $sr->mmid;?></td>                               
                                    <td><?php echo $sr->first_name;?></td>
                                    <td class="text-center">
                                        <?php if($sr->kyc == 1){ ?>
                                     <a class="text-center bg-success" href="<?php echo base_url();?>dmr/doKyc/<?php echo $sr->d_id;?>"> &nbsp;Convert To KYC &nbsp; </a>
                                   <?php  }else{echo "Updated to KYC";}?>
                                    </td>
                                    <td>
                                        <a  href="<?php echo base_url();?>dmr/viewTransectionHIstory/<?php echo $sr->card_number;?>" title="View History"> <i class="fa fa-money"></i></a>
                                        <?php if($sr->mmid == '' ){?>
                                            <a  href="<?php echo base_url();?>dmr/otp/<?php echo $sr->d_id;?>" title="Verify Account"> <i class="fa fa-check-square-o red"></i></a>
                                        <?php }?>
                                    </td>
                                </tr>
                            <?php }else if($this->session->userdata('my_type') == 2){?>
                                <?php if($sr->master_distributor_id == $this->session->userdata('login_id') || $sr->login_id == $this->session->userdata('login_id')){?>
                                <tr>
                                    <td><?php echo $i; $i++;?></td>
                                    <td><?php echo $sr->name;?></td>
                                    <td><?php echo $sr->mobile;?></td>
                                    <td><?php if($sr->kyc == 1){
                                       echo  "Non KYC";
                                    }else{
                                        echo  "KYC";
                                    }?></td>
                                    <td><?php echo $sr->email;?></td>
                                    <td><?php echo $sr->card_number;?></td>
                                    <td><?php echo $sr->mmid;?></td>                               
                                    <td><?php echo $sr->first_name;?></td>
                                    <td class="text-center">
                                        <?php if($sr->kyc == 1){ ?>
                                     <a class="text-center bg-success" href="<?php echo base_url();?>dmr/doKyc/<?php echo $sr->d_id;?>"> &nbsp;Convert To KYC &nbsp; </a>
                                   <?php  }else{echo "Updated to KYC";}?>
                                    </td>
                                    <td>
                                        <a  href="<?php echo base_url();?>dmr/viewTransectionHIstory/<?php echo $sr->card_number;?>" title="View History"> <i class="fa fa-money"></i></a>
                                        <?php if($sr->mmid == ''){?>
                                            <a  href="<?php echo base_url();?>dmr/otp/<?php echo $sr->d_id;?>" title="Verify Account"> <i class="fa fa-check-square-o red"></i></a>
                                        <?php }?>
                                    </td>
                                </tr>
                                <?php }?>
                           <?php }else if($this->session->userdata('my_type') == 3){?>
                                <?php if($sr->super_distributor_id == $this->session->userdata('login_id') || $sr->login_id == $this->session->userdata('login_id')){?>
                                <tr>
                                    <td><?php echo $i; $i++;?></td>
                                    <td><?php echo $sr->name;?></td>
                                    <td><?php echo $sr->mobile;?></td>
                                    <td><?php if($sr->kyc == 1){
                                       echo  "Non KYC";
                                    }else{
                                        echo  "KYC";
                                    }?></td>
                                    <td><?php echo $sr->email;?></td>
                                    <td><?php echo $sr->card_number;?></td>
                                    <td><?php echo $sr->mmid;?></td>                               
                                    <td><?php echo $sr->first_name;?></td>
                                    <td class="text-center">
                                        <?php if($sr->kyc == 1){ ?>
                                     <a class="text-center bg-success" href="<?php echo base_url();?>dmr/doKyc/<?php echo $sr->d_id;?>"> &nbsp;Convert To KYC &nbsp; </a>
                                   <?php  }else{echo "Updated to KYC";}?>
                                    </td>
                                    <td>
                                        <a  href="<?php echo base_url();?>dmr/viewTransectionHIstory/<?php echo $sr->card_number;?>" title="View History"> <i class="fa fa-money"></i></a>
                                        <?php if($sr->mmid == '' ){?>
                                            <a  href="<?php echo base_url();?>dmr/otp/<?php echo $sr->d_id;?>" title="Verify Account"> <i class="fa fa-check-square-o red"></i></a>
                                        <?php }?>
                                    </td>
                                </tr>
                               <?php }?>
                           <?php }else if($this->session->userdata('my_type') == 4){?>
                                <?php if($sr->distributor_id == $this->session->userdata('login_id') || $sr->login_id == $this->session->userdata('login_id')){?>
                                <tr>
                                    <td><?php echo $i; $i++;?></td>
                                    <td><?php echo $sr->name;?></td>
                                    <td><?php echo $sr->mobile;?></td>
                                    <td><?php if($sr->kyc == 1){
                                       echo  "Non KYC";
                                    }else{
                                        echo  "KYC";
                                    }?></td>
                                    <td><?php echo $sr->email;?></td>
                                    <td><?php echo $sr->card_number;?></td>
                                    <td><?php echo $sr->mmid;?></td>                               
                                    <td><?php echo $sr->first_name;?></td>
                                    <td class="text-center">
                                        <?php if($sr->kyc == 1){ ?>
                                     <a class="text-center bg-success" href="<?php echo base_url();?>dmr/doKyc/<?php echo $sr->d_id;?>"> &nbsp;Convert To KYC &nbsp; </a>
                                   <?php  }else{echo "Updated to KYC";}?>
                                    </td>
                                    <td>
                                        <a  href="<?php echo base_url();?>dmr/viewTransectionHIstory/<?php echo $sr->card_number;?>" title="View History"> <i class="fa fa-money"></i></a>
                                        <?php if($sr->mmid == '' ){?>
                                            <a  href="<?php echo base_url();?>dmr/otp/<?php echo $sr->d_id;?>" title="Verify Account"> <i class="fa fa-check-square-o red"></i></a>
                                        <?php }?>
                                    </td>
                                </tr>
                                 <?php }?>
                           <?php }else{?>
                                    <?php if($sr->login_id == $this->session->userdata('login_id')){?>
                                <tr>
                                    <td><?php echo $i; $i++;?></td>
                                    <td><?php echo $sr->name;?></td>
                                    <td><?php echo $sr->mobile;?></td>
                                    <td><?php if($sr->kyc == 1){
                                       echo  "Non KYC";
                                    }else{
                                        echo  "KYC";
                                    }?></td>
                                    <td><?php echo $sr->email;?></td>
                                    <td><?php echo $sr->card_number;?></td>
                                    <td><?php echo $sr->mmid;?></td>                               
                                    <td><?php echo $sr->first_name;?></td>
                                    <td class="text-center">
                                        <?php if($sr->kyc == 1){ ?>
                                     <a class="text-center bg-success" href="<?php echo base_url();?>dmr/doKyc/<?php echo $sr->d_id;?>"> &nbsp;Convert To KYC &nbsp; </a>
                                   <?php  }else{echo "Updated to KYC";}?>
                                    </td>
                                    <td>
                                        <a  href="<?php echo base_url();?>dmr/viewTransectionHIstory/<?php echo $sr->card_number;?>" title="View History"> <i class="fa fa-money"></i></a>
                                        <?php if($sr->mmid == '' ){?>
                                            <a  href="<?php echo base_url();?>dmr/otp/<?php echo $sr->d_id;?>" title="Verify Account"> <i class="fa fa-check-square-o red"></i></a>
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