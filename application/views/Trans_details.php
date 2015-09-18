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
                              
             <li class="active">Transaction details</li>                 
          </ol>Print Transaction 
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">print the transaction details</span>
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
           <div class="col-lg-offset-3 col-lg-6">
                  <!-- START panel tab-->
                 
                     
                     <!-- Tab panes-->
                     <div class=" p0 bg-white">                        
                        <div id="dth_tab" role="tabpanel" class="tab-pane active">
                           <!-- START table responsive-->
                           <div class="list-group mb0">
                               <div class="panel panel-default">
                                   <div class="panel-heading"><h4> Transaction detail of  <?php echo $detail->ben_name;?> : <?php echo date('d/m/Y');?></h4></div>
                                    <div class="panel-body">   
                                        <table class="table">
                                            <tr>
                                                <th><b>Sender Name</b></th>
                                                  <td>
                                                      : <?php echo $detail->SENDERNAME;?>
                                                  </td>
                                             </tr>
                                            <tr>
                                                <th><b>Sender Mobile</b></th>
                                                  <td>
                                                      : <?php echo $detail->SENDERMOBILE;?>
                                                  </td>
                                             </tr>
                                            <tr>
                                                <th><b>Receiver Name</b></th>
                                                  <td>
                                                      : <?php echo $detail->RECEIVERNAME;?>
                                                  </td>
                                             </tr>
                                             <?php if($detail->RECEIVERBANKNAME != ''){?>
                                            <tr>
                                                <th><b>Receiver Bank</b></th>
                                                  <td>
                                                      : <?php echo $detail->RECEIVERBANKNAME;?>
                                                  </td>
                                             </tr>
                                             <?php }?>
                                            <tr>
                                                <th><b>Receiver Account</b></th>
                                                  <td>
                                                      : <?php echo $detail->RECEIVERACCOUNTNO;?>
                                                  </td>
                                             </tr>
                                        
                                        <tr>
                                           <th><b>Amount</b></th>
                                             <td>
                                                : <?php echo $detail->TRANSFERAMOUNT;?>
                                             </td>
                                        </tr>
                                        <tr>
                                           <th><b>Transaction ID</b></th>
                                             <td>
                                                : <?php echo $detail->TRANSID;?>
                                             </td>
                                        </tr>
                                        
                                         <tr>
                                           <td></td>
                                             <td>
                                                <button type="button" onclick="window.print();" class="btn btn-info pull-left">Print</button>
                                             </td>
                                        </tr>
                                        </table>
                                    </div>
                                 </div>
                                 <!-- END panel-->
                           </div>
                           <!-- END table responsive-->
                          
                        </div>
                     </div>
                  
                  <!-- END panel tab-->
               </div>
       </div>            
    </div>
 </section>