<section>
         <!-- Page content-->
    <div class="content-wrapper">
       <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
             <li><a href="<?php echo base_url();?>dashboard">Dashboard</a>
             </li>                  
              <li><a href="<?php echo base_url();?>dmr/dmrUserSearch">Transfer Money</a>
             </li>                   
                       
          </ol>Transaction History of 
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">(Name: <?php echo $this->session->userdata('dmrname');?> <?php echo $this->session->userdata('dmrlastname');?> ) 
              <b>Mobile:</b> <?php echo $this->session->userdata('dmrmo');?>, 
              <b>card:</b> <?php echo $this->session->userdata('dmrcard');?>, 
              <b>Transaction Limit:</b> <?php echo $this->session->userdata('dmrtranslimit');?>,&nbsp;
				<?php  if($this->session->userdata('dmrkyc') =="KYC Not Collected"){?>
				<a href="<?php echo base_url()?>dmr/doKyc"><b>Do KYC</b></a>&nbsp; | 
				<?php }; ?>
			  &nbsp;
              <a href="<?php echo base_url()?>dmr/dmrLogout"><b>DMR Logout</b></a> </span>
          <!-- Breadcrumb below title-->
       </h3>
       <!-- START widgets box-->
       
       <div class="row">           
                <?php if($this->session->flashdata('err') != ''){?>
                 <div class="alert alert-block alert-danger fade in">
                     <button data-dismiss="alert" class="close" type="button">
                       ×
                     </button>
                     <p>
                       <?php echo ($this->session->flashdata('err'))?$this->session->flashdata('err'):''?>
                     </p>
                 </div>
             <br>
             <?php }?>

             <?php if($this->session->flashdata('msg') != ''){?>
                 <div class="alert alert-block alert-info fade in no-margin">
                   <button data-dismiss="alert" class="close" type="button">
                     ×
                   </button>
                   <p>
                     <?php echo ($this->session->flashdata('msg'))?$this->session->flashdata('msg'):''?>
                   </p>
                 </div>
                 </br>
             <?php }?>           
             <br>
             
           
              <div class=" col-lg-12">
                  <form method="post">
                    <div class="row">
                       <div class="panel panel-default">                            
                           <div class="panel-body">
                               <div class="col-lg-3">
                                   <div class="form-group">
                                      <label for="Mobile" >From Date</label>
                                      <input name="from" class="form-control datepicker" placeholder="mm/dd/yyyy" type="text" value="<?= set_value("from"); ?>" >
                                       <span class="red"><?=  form_error('from');?></span>
                                   </div>
                               </div>
                               <div class="col-lg-3">
                                   <div class="form-group">
                                      <label for="code" >To Date</label>
                                       <input name="to" id="code" placeholder="mm/dd/yyyy" class="form-control datepicker" type="text" value="<?= set_value("to"); ?>" >
                                       <span class="red"><?=  form_error('to');?></span>
                                   </div>
                               </div>
                               <div class="col-lg-3">
                                   <label for="Mobile">Transaction Type </label>
                                   <select name="t_type" class="form-control">
                                       <option value="0">All</option>
                                       <option value="3">Remitted</option>
                                       <option value="5">Rejection</option>
                                       <option value="6">Refund</option>
                                   </select>
                                   <span class="red"><?=  form_error('t_type');?></span>
                               </div>
                               <div class="col-lg-3">
                                    <label for="Mobile">Transaction Mode </label>
                                   <select name="m_type" class="form-control">
                                       <option value="0">All</option>
                                       <option value="1">IMPS(MMID)</option>
                                       <option value="2">IMPS(IFSC)</option>
                                       <option value="8">NEFT</option>
                                       
                                   </select>
                                   <span class="red"><?=  form_error('t_type');?></span>
                               </div>
                               <div class="col-lg-10 ">
                                   <?php echo $filter_by;?>
                               </div>
                               <div class="col-lg-2 text-right">
                                   <input type="submit" name="search" value="Search" class="btn btn-info" />
                               </div>
                           </div>
                       </div>
                  </form>
                </div>
                  
                 
            </div>
             <?php if(COUNT($searched)>0){?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-body">
                             <table id="datatable1" class="table table-striped table-hover">
                                <thead>
                                   <tr>
                                      <th >S.No.</th>
                                      <th >Transaction ID</th>
                                      
                                      <th >Receiver</th>
                                      
                                      <th >Receiver Mobile</th>
                                      <th >Time</th>
                                      <th>Type</th>
                                      <th>MMID/Acc</th>
                                      <th >From Acc</th>
                                      <th >Amount</th>
                                      <th >Service Charge</th> 
                                      <th >Status</th>                             
                                   </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; $j=1;foreach($searched as $sc){
                                        if($i>2){
                                        ?>
                                     <tr>
                                         <td><?php echo $j;$j++; ?></td>
                                         <td><?php echo $sc->TRANSACTIONID;?></td>
                                        
                                         <td><?php echo $sc->BENENAME;?></td>
                                         
                                         <td><?php echo ($sc->BENEMOBILE!="?>")?$sc->BENEMOBILE:'N/A';?></td>
                                         <td><?php echo $sc->DATETIME;?></td>
                                         <td><?php if($sc->MMID !=''){echo "MMID";}else{echo "IFSC";}?></td>                                         
                                         <td><?php if($sc->MMID !=''){echo $sc->MMID;}else{echo $sc->TOACCOUNTNO;}?></td>
                                         <td><?php echo $sc->FROMACCOUNTNO;?></td>
                                         <td><?php echo $sc->TRANSACTIONAMOUNT;?></td>
                                         <td><?php echo $sc->SERVICECHARGE;?></td>
                                         <td><?php echo $sc->TRANSACTIONSTATUS;?></td>
                                     </tr>
                                        <?php }$i++;}?>
                                </tbody>
                             </table>
                        </div>

                     </div>
                 </div> 
             <?php }?>
       </div>            
    </div>
 </section>