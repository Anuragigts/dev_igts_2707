<section>
    <!-- Page content-->
    <div class="content-wrapper">
        <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
              <li><a href="<?php echo base_url();?>dashboard">Dashboard</a></li> 
              <li><a href="<?php echo base_url();?>flight/searchFlight">Search Flight</a></li> 
             <li class="active">Flight ticket Cancellation</li>
          </ol>Flight ticket Cancellation
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">Cancel the flight ticket</span>
          <!-- Breadcrumb below title-->

        </h3>
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
            <!-- START DATATABLE 1 -->
               <div class="row">
                  <div class="col-lg-12">
                        <p class="success"></p>
                        <p class="error"></p>
                        <div class="panel-body" style="background:#fff;">
                            <form method="post" action="">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>EsyTopup PNR<span class="red">*</span></label>
                                            <input type="text" placeholder="EsyTopup PNR" class="form-control" name="esyPNR" value="<?= set_value('esyPNR');?>">
                                            <span class="red"><?= form_error('esyPNR');?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                           <label>Airline PNR<span class="red">*</span></label>
                                            <input type="text" placeholder="Airline PNR" class="form-control" name="airPNR" value="<?= set_value('airPNR');?>">
                                            <span class="red"><?= form_error('airPNR');?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                           <label>Cancellation Type<span class="red">*</span></label>
                                             <select name="cancType" class="form-control">
                                                <option value="">Select</option>
                                                <option value="0" <?php echo set_select('cancType','0', ( !empty($data) && $data == "0") ? TRUE : FALSE )?>>Partial Cancellation</option>
                                                <option value="1" <?php echo set_select('cancType','1', ( !empty($data) && $data == "1") ? TRUE : FALSE )?>>Full Cancellation</option>
                                             </select>
                                                
                                                <span class="red"><?= form_error('cancType');?></span>
                                        </div>
                                    </div>
                                   
                                    <div class="col-sm-3">
                                        <div class="pull-right"><br>
                                            <input type="submit" class="btn btn-sm btn-info " name="cancel" value="Cancel" />
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                     </div>
               </div>
                 <div class="row">
                    <div class="col-md-12  ">
                            &nbsp;
                    </div>
                     <?php if(count($forcncl)>0){?>
                    <div class="col-md-12  ">
                            <style>
                            @media 
                  only screen and (max-width: 760px),
                  (min-device-width: 768px) and (max-device-width: 1024px)  {
                          .td:nth-of-type(1):before { content: "S.No."; }
                          .td:nth-of-type(2):before { content: "Airline ID"; }
                          .td:nth-of-type(3):before { content: "EsyTopup PNR"; }
                          .td:nth-of-type(4):before { content: "Ticket No"; }
                          .td:nth-of-type(5):before { content: "Name"; }
                          .td:nth-of-type(6):before { content: "Passenger Type"; }
                          .td:nth-of-type(7):before { content: "Status"; }
                          .td:nth-of-type(8):before { content: "Action"; }
                  }
               </style>
            <div class="row">  
               <div class="col-lg-12">
                   <div class="panel-body">
                        <table id="datatable1" class="table table-striped table-hover" >
                           <thead>
                              <tr>
                                 <th>S.No.</th>
                                 <th>Airline ID</th>
                                 <th>EsyTopup PNR</th>
                                 <th>Ticket No</th>
                                 <th>Name</th>
                                 <th>Passenger Type</th>
                                 <th>Status</th>                                 
                                 <th>Action</th> 
                              </tr>
                           </thead>
                           <tbody>
                               <?php $i = 1; foreach($forcncl->PassengerDetails->item as $itm){ ?>
                               <tr>
                                   <td><?php echo $i;?></td>
                                   <td><?php echo $forcncl->AirlineID.' - '.$itm->TicketDetails->item->FlightNumber;?></td>
                                   <td><?php echo $forcncl->HermesPNR;?></td>
                                   <td><?php echo $itm->TicketDetails->item->TicketNo;?></td>
                                   <td><?php echo $itm->First_Name .' '.$itm->Last_Name ;?></td>
                                   <td><?php if($itm->PassengerType == 1){
                                       echo "Adult";
                                   }else if($itm->PassengerType == 2){
                                       echo "Child";
                                   }else{echo "Infant";}?></td>
                                   <td><?php echo $itm->TicketDetails->item->CancelStatus;?></td>
                                   <td>
                                       <form method="post">
                                           <input type="hidden" name="HermesPNR" value="<?php echo $forcncl->HermesPNR;?>">
                                           <input type="hidden" name="AirlinePNR" value="<?php echo $forcncl->AilinePNR;?>">
                                           <input type="hidden" name="PaxNo" value="<?php echo $itm->PaxNo;?>">
                                           <input type="hidden" name="TicketNo" value="<?php echo $itm->TicketDetails->item->TicketNo;?>">
                                           <input type="hidden" name="SegmentId" value="<?php echo $itm->TicketDetails->item->Segmentid;?>">
                                           <input type="hidden" name="FlightNo" value="<?php echo $itm->TicketDetails->item->FlightNumber;?>">
                                           <input type="hidden" name="Source" value="<?php echo $itm->TicketDetails->item->Origin;?>">
                                           <input type="hidden" name="Destiantion" value="<?php echo $itm->TicketDetails->item->Destination;?>">
                                           <input type="submit" name="cancle-it" value="Cancle It" class="btn btn-danger">
                                       </form>
                                   </td>
                               </tr>
                              <?php $i++;}?>
                           </tbody>
                        </table>
                        </div>
                    </div>
            </div>
        </div>
       <?php  }?>
    </div>
</section>