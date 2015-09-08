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
          </ol>Transaction Details
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">Get the Transaction details</span>
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
                             <th >From</th>
                             <th >To</th>
                             <th >Amount</th>
                             <th>Date</th>
                             <th>Debit/credit</th>
                             <th>Remarks</th>                                                         
                          </tr>
                       </thead>
                       <tbody>
                           <?php $i=1;foreach($debit as $d){?>
                           <tr>
                               <td><?php echo $i; $i++;?></td>
                               <td><?php echo $d->from_name;?></td>
                               <td><?php echo $d->to_name;?></td>
                               <td><?php echo $d->trans_amt;?></td>
                               <td><?php echo $d->trans_date;?></td>
                               <td>Credit</td>
                               <td><?php echo $d->trans_remark;?></td>
                           </tr>                           
                           <?php }?>
                           <?php foreach($credit as $d1){?>
                           <tr>
                               <td><?php echo $i; $i++;?></td>
                               <td><?php echo $d1->from_name;?></td>
                               <td><?php echo $d1->to_name;?></td>
                               <td><?php echo $d1->trans_amt;?></td>
                               <td><?php echo $d1->trans_date;?></td>
                               <td>Debit</td>
                               <td><?php echo $d1->trans_remark;?></td>
                           </tr>                           
                           <?php }?>
                       </tbody>
                    </table>
               </div>

            </div>
        </div>            
    </div>
 </section>