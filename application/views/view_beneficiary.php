<section>
         <!-- Page content-->
    <div class="content-wrapper">
        <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
             <li><a href="<?php echo base_url();?>dashboard">Dashboard</a>
             </li>                  
             <li><a href="<?php echo base_url();?>dmr/addBeneficiary">Add Beneficiary</a>
             </li>                  
             <li class="active">DMR</li>                 
          </ol>View Beneficiary
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">View Users in Beneficiary for transfer money</span>
          <!-- Breadcrumb below title-->
       </h3>
       <!-- START widgets box-->
       
       <div class="row">
           <?php $this->load->view("layout/success_error");?>     
           <div class="col-lg-12">
               <div class="panel-body">
                    <table id="datatable1" class="table table-striped table-hover">
                       <thead>
                          <tr>
                             <th>Beneficiary ID</th>
                             <th>Beneficiary</th>
                             <th>Track Id</th>
                             <th>Type</th>
                             <th>MMID</th>
                             <th>Mobile</th>
                             <th>Bank</th>
                             <th>IFSC</th>
                             <th>Account</th>                             
                             <th>Status</th>                             
                             <th>Action</th>                             
                                                    
                          </tr>
                       </thead>
                       <tbody>
                           <?php foreach($ben_details as $dl){?>
                            <tr>
                                <td><?php echo $dl->beneid;?></td>
                                <td><?php echo $dl->ben_name;?></td>
                                <td><?php echo $dl->track_id;?></td>
                                <td><?php echo $dl->ben_type;?></td>
                                <td><?php echo $dl->ben_mmid;?></td>
                                <td><?php echo $dl->ben_mobile;?></td>
                                <td><?php echo $dl->bank_name;?></td>
                                <td><?php echo $dl->bank_ifsc;?></td>
                                <td><?php echo $dl->acc;?></td>
                                <td><?php  if($dl->otp == 1){
                                    echo "Verified";
                                }else{
                                    echo "<a href='".base_url()."dmr/beneficiaryOTP/".$dl->ben_id."' title='verifi it'><i class='fa fa-fighter-jet'></i></a>";
                                }?></td>
                                <td>
                                    <!--<a href="<?php //echo base_url()?>dmr/editBeneficary/<?php //echo $dl->ben_id;?>" title="Edit"><i class="fa fa-edit "></i></a>-->
                                    <a href="<?php echo base_url()?>dmr/removeBeneficary/<?php echo $dl->ben_id;?>/<?php echo $dl->card_no;?>/<?php echo $dl->beneid;?>" class="red" title="Remove"><i class="fa fa-trash-o "></i></a>
                                </td>
                                
                           </tr>
                           <?php }?>
                       </tbody>
                    </table>
               </div>

            </div>
        </div>            
    </div>
 </section>