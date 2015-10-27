<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<section>
         <!-- Page content-->
    <div class="content-wrapper">
       <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
             <li><a href="<?php echo base_url();?>dashboard">Dashboard</a>
             </li>                  
              <li><a href="<?php echo base_url();?>flight/searchFlight">Search Flight</a>
             </li>               
              <li><a href="<?php echo base_url();?>flight/flightHistory">Flight History</a>
             </li>               
             <li class="active">Booking Status</li>                 
          </ol>Booking Status
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">Get the booking status and print ticket </span>
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
           
                 <form method="post" id="topup-form">
           <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-5">
                    <div class="panel panel-default">                            
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4> Ticket summary's:</h4>
                                    <table border="1" width="100%">
                                        <tr>
                                            <th>
                                                <span class="text-gray-dark"> Ticket Status : </span> &nbsp;
                                            </th>
                                            <td>
                                                <?php if($status == 1){
                                                    echo "Successfully";
                                                }else if($status == 0){
                                                     echo "Pending, Please refresh this page. ";
                                                }else if($status == 2){
                                                     echo "Pending, Please refresh this page ";
                                                }else{
                                                    echo "Booking Failed ";
                                                }?>
                                            </td>
                                        </tr>
                                        <?php if(count($ticket_details)>0){?>
                                         <tr>
                                            <th>
                                                <span class="text-gray-dark"> Ticket Booked By : </span> &nbsp;
                                            </th>
                                            <td>
                                                <?php echo $ticket_details->BookedByCusomter;?>
                                            </td>
                                        </tr>
                                        <?php }?>
                                </table>
                            </div>
                            <div class="col-lg-12 top-5">
                                <?php if(count($ticket) > 0){?>
                                    <span class="text-gray-darker "> Ticket number:</span>
                                    <table border="1" width="100%">
                                        <?php  foreach ($ticket as $tkt){?>
                                            <tr>
                                                <th class="text-gray-dark">Name </th>
                                                <th class="text-gray-dark"><?php echo $tkt->FirstName.' '.$tkt->Lastname;?> </th>
                                            </tr>
                                            <tr>
                                                <td>Ticket No. </td>
                                                <td><?php echo $tkt->TicketNo;?> </td>
                                            </tr>
                                            <tr>
                                                <td>Flight No. </td>
                                                <td><?php echo $tkt->FlightNumber;?> </td>
                                            </tr>
                                        <?php }?>
                                    </table>
                                <?php }?>
                            </div>
                            <div class="col-lg-6 text-center">
                                <br>
                                <input type='button' class='btn btn-sm btn-info tkt_print' id="btnPrint"   name='print' value='Print Ticket Details' />
                            </div>
                             <div class="col-lg-6 text-center">
                                 <br>
                                 <a href="<?php echo base_url();?>flight/searchFlight" class="btn btn-sm btn-default">Search An Other flight</a>
                             </div>
                        </div>
                    </div>
                 </div>
           </div>
       </form> 
        <style>
             .none{display: none;}
           </style>
           <?php if(count($ticket) > 0){?>
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
                              <tr >
                                    <th>Ticket No.</th>
                                    <th>Type</th>
                                    <th>Name</th>
                                    <th>Flight</th>
                                    <th>Departs</th>
                                    <th>Arrives</th>
                                    <th>Trip</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                           <tbody>
                                <?php $i =1; foreach ($ticket as $tkt){?>
                                
                                <tr>
                                    <td><?php echo $tkt->TicketNo;?></td>
                                    <td><?php if($tkt->TYPE == 1){echo "Adult";}else if($tkt->TYPE == 2){echo "Child";}else{echo "Infant";}?></td>
                                    <td><?php echo $tkt->FirstName.' '.$tkt->Lastname;?></td>
                                    <td><?php echo $tkt->CarrierAirLineCode;?> &nbsp;&nbsp; <?php echo $tkt->FlightNumber;?></td>
                                    <td><?php echo $tkt->Departuredatetime;?></td>
                                    <td><?php echo $tkt->Arrivaldatetime;?></td>
                                    <td><?php if( $ticket_details->BookingType == 'O'){echo "Oneway";}else{echo "Roundtrip";}?></td>
                                    <th><b><?php if($tkt->Status == 1){echo "Booked";}else if($tkt->Status == 2){echo "canceled";}else{echo "N/A";}?></b></th>
                                </tr>
                                <?php  }?>
                           </tbody>
                        </table>
                        </div>
                    </div>
           
         <div class="row" id="dvContainer">        
            <div class="col-md-12 none">        
                <div >
                    <style>
                      th{padding-left:5px; }  
                      td{padding-left:5px;}  
                    </style>
                    <center><img src="<?php echo base_url();?>assets/app/img/logoa.png">
                        <h3><u>Flight Ticket</u> </h3>
                     </center>
                    
                        <div style="margin:20px; border:1px solid #ccc; padding: 10px;">
                            <h4><?php echo $ticket_details->AirlineName;?> Passenger (s):</h4>
                            <table width="100%">
                                <tr style="background-color: #E6E6E6;">
                                    <?php $i =1; foreach ($ticket as $tkt){
                                        
                                        echo "<th>".$i.": ".$tkt->Title." ".$tkt->FirstName.' '.$tkt->Lastname."</th>";
                                    $i++;}?>
                                </tr>
                            </table>
                            <div style="padding-top:10px;">
                                <b><?php echo $ticket_details->AirlineName;?>  Flight(s):   <?php if( $ticket_details->BookingType == 'O'){echo "Oneway";}else{echo "Roundtrip";}?></b>
                            </div>
                            <table width="100%" border="1">
                                <tr style="background-color: #E6E6E6;">
                                    <th>Ticket No.</th>
                                    <th>Type</th>
                                    <th>Name</th>
                                    <th>Flight</th>
                                    <th>Departs</th>
                                    <th>Arrives</th>
                                </tr>
                                <?php $i =1; foreach ($ticket as $tkt){?>
                                <?php if($tkt->Status == 1){?>
                                <tr>
                                    <td><?php echo $tkt->TicketNo;?></td>
                                    <td><?php if($tkt->TYPE == 1){echo "Adult";}else if($tkt->TYPE == 2){echo "Child";}else{echo "Infant";}?></td>
                                    <td><?php echo $tkt->FirstName.' '.$tkt->Lastname;?></td>
                                    <td><?php echo $tkt->CarrierAirLineCode;?> &nbsp;&nbsp; <?php echo $tkt->FlightNumber;?></td>
                                    <td><?php echo $tkt->Departuredatetime;?></td>
                                    <td><?php echo $tkt->Arrivaldatetime;?></td>
                                    
                                </tr>
                                <?php }else{
                                    echo "<tr><td colspan='6'>Ticket cancled for ". $tkt->FirstName.' '.$tkt->Lastname."</td></tr>";
                                } }?>
                            </table>
                            
                             <div style="padding-top:10px;">
                                 <table width="100%" style="border:1px solid #ccc;">
                                    <tr style="background-color: #E6E6E6; font-size: 16px;">
                                        <th>Booking Reference</th>
                                        <th>Status</th>
                                        <th>Booking Date</th>
                                        <th>Payment Status</th>
                                        <th>From</th>
                                        <th>To</th>
                                    </tr>
                                    <tr style="font-size: 18px;">
                                        <td><?php echo $ticket_details->Refrence;?></td>
                                        <td><?php if($ticket_details->stat == 1){echo "Success";}else{echo "pending";} ;?></td>
                                        <td><?php echo $ticket_details->IssueDate;?></td>
                                        <td><?php if($ticket_details->stat == 1){echo "Approved";}else{echo "pending";} ;?></td>
                                        <td><?php echo $ticket['0']->Origin;?></td>
                                        <td><?php echo $ticket['0']->Destination;?></td>
                                    </tr>
                                </table>
                            </div>
                            
                             <div style="padding-top:10px;">
                                 <table width="100%" style="border:1px solid #ccc;">
                                    <tr style="background-color: #E6E6E6; font-size: 16px;">
                                        <th>Airline PNR</th>
                                        <th>EsyTopup PNR</th>
                                        <th>Adult</th>
                                        <th>Child</th>
                                        <th>Infant</th>
                                        <th>Booking</th>
                                        <th>Type</th>
                                    </tr>
                                    <tr style="font-size: 18px;">
                                        <td><?php echo $ticket_details->AirlinePNR;?></td>
                                        <td><?php echo $ticket_details->HermesPNR;?></td>
                                        <td><?php echo $ticket_details->Adults;?></td>
                                        <td><?php echo $ticket_details->Child;?></td>
                                        <td><?php echo $ticket_details->Infants;?></td>
                                        <td><?php if($ticket_details->BookingType == "O"){echo "One Way";}else{echo " Round Trip ";} ;?></td>
                                        <td><?php echo $ticket['0']->ClassCodeDesc;?></td>
                                    </tr>
                                </table>
                            </div>
                             <div style="padding-top:10px;">
                                 <b>Note:</b><br>
                                   1) Please treat this as a valid invoice for the purpose of service tax.<br>
                                   2) PSF/UDF/ADF are collected on behalf of Airport Authority of India (AAI).<br>
                                   3)Airfare Charges include Base Fare, Fuel Charge, CUTE Charge and Agency Commission payable to travel agents (if applicable).<br>
                            </div>
                            
                            <div style="padding-top:10px;">
                                
                                 <table width="100%" style="border:1px solid #ccc;">
                                    <tr style="background-color: #E6E6E6; font-size: 16px;">
                                        <th colspan="2">Terms and Conditions</th>
                                    </tr>
                                    <tr style="font-size: 12px;">
                                        <td width="50%">
                                            <ul>
                                               <li>We recommend you check-in AT LEAST 2 Hours prior to departure for domestic sectors and AT LEAST 3 Hours prior to departure for international sectors.</li>
                                               <li> Please obtain your boarding pass from Check-in counter, 75min (international sector) / 45min (domestic sector) prior to departure. Failure to do so will result in your booking being cancelled and the fares and surcharges retained. Report early for hassle free check-in.</li>
                                               <li> Boarding gates close 30 minutes prior to the scheduled time of departure for domestic sectors and 45 minutes prior to the scheduled time for international sectors. Please report at your departure gate at the indicated boarding time. Any passenger failing to report in time, may be refused boarding privileges.</li>
                                               <li>For all international flights, we accept USD/GBP/EUR or the currency of destination (except INR) for on-board purchases. INR up to denomination 500 is accepted on Kathmandu flights. This is as per Indian regulations.</li>
                                            </ul>
                                        </td>
                                        <td vslign="top">
                                            <ul>
                                                <li>Hand baggage allowance is 7kgs including duty free items, only one piece measuring not more than 55 cm X 35 cm X 25 cm, per passenger excluding infants. Hand baggage in excess of 7kgs will be charged at the applicable excess baggage rate at the Boarding Gate. IndiGo also reserves the right to retrieve hand baggage in excess of the allowance and / or size at the Boarding Gate and loading it in the cargo hold, subject to availability of space availability / aircraft weight limitations, and with Limited Liability to the airline.</li>
                                                <li>Free Checked In Baggage Allowance for all pieces combined is 15Kg ( Domestic ) / 20 Kg (International). Free checked baggage allowance for travel to and from Dubai and Muscat is up to 30kgs per adult and child. This allowance does not applies to Infants.</li>
                                                <li>For Infantsvalid birth certificate is required.</li>
                                            </ul>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            
                             <div style="padding-top:10px;">
                                 <table width="100%" >
                                    <tr >
                                        <th style="float:left;">Airport Number</th>
                                        <th style="float:right;">Airport Email</th>
                                    </tr>
                                    <tr>
                                        <td style="float:left;"><?php echo $ticket_details->AirPhoneNumber;?></td>
                                        <td style="float:right;"><?php echo $ticket_details->MailId;?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
         </div>
           <?php }?>
       </div>
    </div>
</section>
<script type="text/javascript">
        $("#btnPrint").live("click", function () {
            var divContents = $("#dvContainer").html();
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title>DIV Contents</title>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });
    </script>