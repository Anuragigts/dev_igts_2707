<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<section>
         <!-- Page content-->
    <div class="content-wrapper">
       <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
             <li><a href="<?php echo base_url();?>dashboard">Dashboard</a>
             </li>                  
             <li class="active">Post paid </li>                 
          </ol>Post Paid Bill payment
          <!-- Small text for title-->
          
          <span class="text-sm hidden-xs">For Post Paid Bill payment</span>
           <?php if($this->session->userdata('my_type') == 1 ){?>
		   Recharge Amount : <?php echo $amt->REMAININGAMOUNT;?>
           <?php }?>
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
                                   <div class="panel-heading"><h4> Payment detail of   <?php echo $detail->number;?> : <?php echo $detail->cur_time;?></h4></div>
                                    <div class="panel-body">   
                                        <table class="table">
                                            <tr>
                                                <th><b>Mobile Number</b></th>
                                                  <td>
                                                      : <?php echo $detail->number;?>
                                                  </td>
                                             </tr>
                                            <tr>
                                                <th><b>Amount</b></th>
                                                  <td>
                                                      : <?php echo $detail->amount;?>
                                                  </td>
                                             </tr>
                                            <tr>
                                                <th><b>Operator name</b></th>
                                                  <td>
                                                      : <?php echo $detail->op_name;?>
                                                  </td>
                                             </tr>
                                           
                                            <tr>
                                                <th><b>Transaction number</b></th>
                                                  <td>
                                                      : <?php echo $detail->trans_no;?>
                                                  </td>
                                             </tr>
                                        
                                        <tr>
                                           <th><b>Agent Name</b></th>
                                             <td>
                                                : <?php echo $this->session->userdata('first_name') ;?> <?php echo $this->session->userdata('middle_name') ;?> <?php echo $this->session->userdata('last_name') ;?>
                                             </td>
                                        </tr>
                                        <tr>
                                           <th><b>Tracking ID</b></th>
                                             <td>
                                                : <?php echo $detail->hrm_track;?>
                                             </td>
                                        </tr>
                                        
                                         <tr>
                                           <td></td>
                                             <td>
                                                 <input type='button' class='btn btn-sm btn-info tkt_print' id="btnPrint"   name='print' value='Print' />
                                                <!--<button type="button" onclick="window.print();" class="btn btn-info pull-left">Print</button>-->
                                                &nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>recharge/post_recharge" class="btn  btn-default">Do Another Recharge</a>
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
 <style>
    .none{display: none;}
</style>
<div class="row" id="dvContainer">        
            <div class="col-md-12 none">        
                <div >
                    <style>
                      th{padding-left:5px; }  
                      td{padding-left:5px;}  
                    </style>
                    <center><img src="<?php echo base_url();?>assets/app/img/logoa.png">
                        <h3><u>DMR Slip</u> </h3>
                     </center>
                    
                        <div style="margin:20px; border:1px solid #ccc; padding: 10px;">
                            <h4><h4> Transaction detail of  <?php echo $detail->number;?> : <?php echo date('d/m/Y');?></h4></h4>
                            
                            
                            <div class="panel-body">   
                                        <table class="table">
                                            <tr>
                                                <th><b>Mobile Number</b></th>
                                                  <td>
                                                      : <?php echo $detail->number;?>
                                                  </td>
                                             </tr>
                                            <tr>
                                                <th><b>Amount</b></th>
                                                  <td>
                                                      : <?php echo $detail->amount;?>
                                                  </td>
                                             </tr>
                                            <tr>
                                                <th><b>Operator name</b></th>
                                                  <td>
                                                      : <?php echo $detail->op_name;?>
                                                  </td>
                                             </tr>
                                             
                                            <tr>
                                                <th><b>Transaction number</b></th>
                                                  <td>
                                                      : <?php echo $detail->trans_no;?>
                                                  </td>
                                             </tr>
                                        
                                        <tr>
                                           <th><b>Agent Name</b></th>
                                             <td>
                                                : <?php echo $this->session->userdata('first_name') ;?> <?php echo $this->session->userdata('middle_name') ;?> <?php echo $this->session->userdata('last_name') ;?>
                                             </td>
                                        </tr>
                                        <tr>
                                           <th><b>Tracking ID</b></th>
                                             <td>
                                                : <?php echo $detail->hrm_track;?>
                                             </td>
                                        </tr>
                                        
                                        
                                        </table>
                                    </div>
                            
                          
                            
                             <div style="padding-top:30px;">
                                 <table width="100%" >
                                    <tr >
                                        <th style="float:left;">esytopup.com</th>
                                        <th style="float:right;"> </th>
                                    </tr>
                                    <tr>
                                       
                                    </tr>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
         </div>

<script type="text/javascript">
        $("#btnPrint").live("click", function () {
            var divContents = $("#dvContainer").html();
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title></title>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });
    </script>