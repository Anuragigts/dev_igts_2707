<section>
         <!-- Page content-->
    <div class="content-wrapper">
       <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
             <li><a href="<?php echo base_url();?>dashboard">Dashboard</a>
             </li>                  
                              
             <li class="active">Flight</li>                 
          </ol>Search Flight
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">Search the flight for traveling </span>
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
                        <div class="panel panel-default" style="border-bottom: 1px solid #000;">                            
                           <div class="panel-body">
                               <div class="row">
                                   <div class="col-lg-3">
                                     <div class="form-group">
                                         <label for="Mobile"><br><br/><br/></label>
                                         <label class="radio-inline c-radio">
                                            <input  type="radio"  class="fType" name="fType" value="D" <?php if($ttype['fType'] == 'D'){echo 'checked="checked"';}?>>
                                            <span class="fa fa-circle"></span>
                                           Domestic
                                        </label>
                                         <label class="radio-inline c-radio">
                                            <input  type="radio" class="fType" name="fType" value="I" <?php if($ttype['fType'] == 'I'){echo 'checked="checked"';}?>>
                                            <span class="fa fa-circle"></span>
                                           International
                                        </label>
                                        
                                         <span class="red"><?=  form_error('type');?></span>
                                     </div>
                                 </div>
                                   <div class="col-lg-3">
                                     <div class="form-group">
                                         <label for="Mobile"><br><br/><br/></label>
                                         <label class="radio-inline c-radio">
                                            <input id="inlineradio1" type="radio"  name="type" value="O" <?php if($ttype['type'] == 'O'){echo 'checked="checked"';}?>>
                                            <span class="fa fa-circle"></span>
                                           One Way
                                        </label>
                                         <label class="radio-inline c-radio">
                                            <input id="inlineradio2" type="radio" name="type" value="R" <?php if($ttype['type'] == 'R'){echo 'checked="checked"';}?>>
                                            <span class="fa fa-circle"></span>
                                           Round Trip
                                        </label>
                                        
                                         <span class="red"><?=  form_error('type');?></span>
                                     </div>
                                 </div>
                               </div>
                               <div class="row">
                               <div class="col-lg-3">
                                   <div class="form-group">
                                      <label for="Mobile" >Departure Date<font class="red">*</font></label>
                                      <input name="departure" class="form-control datepicker" placeholder="mm/dd/yyyy" type="text" value="<?= set_value("departure"); ?>" >
                                       <span class="red"><?=  form_error('departure');?></span>
                                   </div>
                               </div>
                               <div class="col-lg-3">
                                   <div class="form-group">
                                      <label for="code" >Return Date<font class="red round">*</font></label>
                                       <input name="return" id="code" placeholder="mm/dd/yyyy" class="form-control datepicker round-text" type="text" value="<?= set_value("return"); ?>" >
                                       <span class="red"><?=  form_error('return');?></span>
                                   </div>
                               </div>
                               <div class="col-lg-3">
                                   <label for="Mobile">From Location<font class="red">*</font> </label>
                                   <select name="from" class="form-control">
                                       <option value="">Select</option>
                                       <option value="BOM"  <?php echo set_select('from','BOM', ( !empty($data) && $data == "BOM") ? TRUE : FALSE )?>>MUMBAI(BOM)</option>
                                       <option value="DXB" class="i" <?php echo set_select('from','DXB', ( !empty($data) && $data == "DXB") ? TRUE : FALSE )?>>DXB</option>
                                       <option value="MAA" <?php echo set_select('from','MAA', ( !empty($data) && $data == "MAA") ? TRUE : FALSE )?>>CHENNAI(MAA)</option>
                                       <option value="CMB" class="i" <?php echo set_select('from','CMB', ( !empty($data) && $data == "CMB") ? TRUE : FALSE )?>>CMB</option>
                                       <option value="MLE" class="i" <?php echo set_select('from','MLE', ( !empty($data) && $data == "MLE") ? TRUE : FALSE )?>>MLE</option>
                                   </select>
                                   <span class="red"><?=  form_error('from');?></span>
                               </div>
                               <div class="col-lg-3">
                                    <label for="Mobile">To Location<font class="red">*</font> </label>
                                   <select name="to" class="form-control">
                                       <option value="">Select</option>
                                       <option value="BOM" <?php echo set_select('to','BOM', ( !empty($data) && $data == "BOM") ? TRUE : FALSE )?>>MUMBAI(BOM)</option>
                                       <option value="DXB" class="i" <?php echo set_select('to','DXB', ( !empty($data) && $data == "DXB") ? TRUE : FALSE )?>>DXB</option>
                                       <option value="MAA" <?php echo set_select('to','MAA', ( !empty($data) && $data == "MAA") ? TRUE : FALSE )?>>CHENNAI(MAA)</option>
                                       <option value="CMB" class="i" <?php echo set_select('to','CMB', ( !empty($data) && $data == "CMB") ? TRUE : FALSE )?>>CMB</option>
                                       <option value="MLE" class="i" <?php echo set_select('to','MLE', ( !empty($data) && $data == "MLE") ? TRUE : FALSE )?>>MLE</option>                                       
                                       <option value="BLR" class="d" <?php echo set_select('to','BLR', ( !empty($data) && $data == "BLR") ? TRUE : FALSE )?>>BANGALORE(BLR)</option>                                       
                                       <option value="DEL" class="d" <?php echo set_select('to','DEL', ( !empty($data) && $data == "DEL") ? TRUE : FALSE )?>>DELHI(DEL)</option>                                       
                                   </select>
                                   <span class="red"><?=  form_error('to');?></span>
                               </div>
                           </div>
                            <div class="row">
                                <div class="col-lg-3">
                                     <div class="form-group">
                                         <label for="Mobile">Adult (12+ Year)<font class="red">*</font></label>
                                            <select name="adult" class="form-control">  
                                                <?php for($i =1; $i<15; $i++){?>
                                                <option value="<?php echo $i;?>" <?php echo set_select('adult',"$i", ( !empty($data) && $data == "$i") ? TRUE : FALSE )?>><?php echo $i;?></option>
                                                <?php }?>                          
                                            </select>
                                            <span class="red"><?=  form_error('adult');?></span>
                                     </div>
                                 </div>
                                <div class="col-lg-3">
                                     <div class="form-group">
                                         <label for="Mobile">Child (2-11Year)</label>
                                            <select name="child" class="form-control">  
                                                <?php for($i =0; $i<15; $i++){?>
                                                <option value="<?php echo $i;?>" <?php echo set_select('child',"$i", ( !empty($data) && $data == "$i") ? TRUE : FALSE )?>><?php echo $i;?></option>
                                                <?php }?>                          
                                            </select>
                                            <span class="red"><?=  form_error('child');?></span>
                                     </div>
                                 </div>
                                <div class="col-lg-3">
                                     <div class="form-group">
                                         <label for="Mobile">Infant (0-2- Year)</label>
                                            <select name="infant" class="form-control">  
                                                <?php for($i =0; $i<9; $i++){?>
                                                <option value="<?php echo $i;?>" <?php echo set_select('infant',"$i", ( !empty($data) && $data == "$i") ? TRUE : FALSE )?>><?php echo $i;?></option>
                                                <?php }?>                          
                                            </select>
                                            <span class="red"><?=  form_error('infant');?></span>
                                     </div>
                                 </div>
                                <div class="col-lg-3">
                                     <div class="form-group">
                                         <label for="Mobile">Class<font class="red">*</font></label>
                                            <select name="class" class="form-control">                                               
                                                <option value="Economy">Economy</option>
                                                <option value="Business">Business</option>                           
                                            </select>
                                            <span class="red"><?=  form_error('class');?></span>
                                     </div>
                                 </div>
                                
                            </div>
                               <div class="col-lg-10 ">
                                  
                               </div>
                               <div class="col-lg-2 text-right">
                                   <input type="submit" id="searchload" name="search" value="International Search" class="btn btn-info i" />
                                   <input type="submit" id="searchload" name="d-search" value="Doemstic Search" class="btn btn-info d" />
                               </div>
                           </div>
                       </div>
                  </form>
                </div>
            </div>
       </div>   
       <div class="row">
           <table>
               <?php if(count($details)>0){?>           
                <?php //echo "<pre>"; print_r($details);
                $track = $details->UserTrackId;
                $me=0;foreach($details->FlightDetails as $di){
                    foreach($di->AirlineSegment as $st){
                    foreach($st->ITEM as $it){
                  if( $pos['type'] == 'P'){
                    foreach($it->AirlineDetails as $al){$me++; $logo1 = '';?>
                        <!-- START panel-->
                      
                       <?php if($al->SegmentDetails->item->GrossAmount != ''){?>
                        <?php //echo "<pre>"; print_r($al);?>
                        <div class="col-md-12 panel mypad">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md-2 text-center">
                                              
                                             <?php $cc = 0; foreach($logos as $logo){
                                                if($al->CarrierCode == $logo->cc){ $cc = 1;
                                                    $logo1 =  base_url()."assets/logo/".$logo->logo;
                                                    echo "<center><img src='".  base_url()."assets/logo/".$logo->logo."' class='img img-responsive center' /></center>";
                                                    echo $logo->name."<br>";
                                                    echo "<span class='dull1'>".$al->CarrierCode.'-'.$al->FlightNo."</span>";
                                                }
                                            }if($cc == 0){
                                                $logo = base_url()."assets/logo/plane4.png";
                                                echo "<center><img src='".  base_url()."assets/logo/plane4.png' class='img img-responsive center' /></center>";
                                                echo "<span class='dull1'>".$al->CarrierCode.'-'.$al->FlightNo."</span>";
                                            }?>
                                        </div>
                                         <div class="col-md-2 text-center"><?php echo $al->GrossAmount;?>
                                            <center>
                                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span class="btn-label">
                                                <i class="fa fa-send-o "></i>
                                            </span><br>
                                            </center>
                                            Flight ID<br>
                                            <span class='dull1'><?php echo  $al->FlightId;?></span>
                                        </div>
                                        <div class="col-md-2 text-center">
                                            <span class="heading-a"><b><?php echo $al->DepartureDateTime;?></b></span>
                                            <br>
                                            <span class='dull1'><?php echo $al->Source;?></span>
                                           
                                        </div>
                                        <div class="col-md-2 text-center">
                                            <span class="heading-a"><b><?php echo $al->ArrivalDateTime;?></b></span>
                                            <br>
                                            <span class='dull1'><?php echo $al->Destination;?></span>
                                            
                                        </div>
                                        <div class="col-md-2 text-center">
                                            <span class="heading-a"><b><?php echo $al->Duration;?></b></span>
                                            <br>
                                            <span class='dull1'><?php if($al->NumberofStops == 0){echo "Non Stop";}else{ echo $al->NumberofStops." Stop";}?>
                                            <?php if($al->NumberofStops != 0){echo ",<br>Via: ".$al->Via;}?>
                                            </span>
                                        </div>
                                       
                                        <div class="col-md-2 text-center">
                                            <span class="heading-a" style="font-size: 20px;"><b> <?php if($al->SegmentDetails->item->GrossAmount != ''){echo '<em class="fa fa-rupee"></em> '.$al->SegmentDetails->item->GrossAmount;}else{echo "N/A";}?></b></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 text-center">
                                   
                                    <form method="post" action="<?php echo base_url();?>flight/book">
                                        <input type="hidden" name="AirlineId" value="<?php echo $al->CarrierCode;?>">
                                        <input type="hidden" name="FlightId" value="<?php echo $al->FlightId;?>">
                                        <input type="text" name="ClassCode" value="<?php echo $al->SegmentDetails->item->ClassCode;?>">
                                        <input type="hidden" name="Track" value="<?php echo $track;?>">
                                        <input type="hidden" name="BasicAmount" value="<?php echo $al->SegmentDetails->item->GrossAmount?>">
                                        <input type="hidden" name="Adult" value="<?php echo $pos['adult'];?>">
                                        <input type="hidden" name="Child" value="<?php echo $pos['child'];?>">
                                        <input type="hidden" name="Infrunt" value="<?php echo $pos['infant'];?>">
                                        
                                        <input type="hidden" name="tourType" value="<?php echo $ttype['type'];?>">
                                        
                                        <input type="hidden" name="logo" value="<?php echo $logo1;?>">
                                        <input type="hidden" name="name" value="<?php echo $al->CarrierCode.'-'.$al->FlightNo;?>">
                                        <input type="hidden" name="dep" value="<?php echo $al->DepartureDateTime;?>">
                                        <input type="hidden" name="source" value="<?php echo $al->Source;?>">
                                        <input type="hidden" name="arr" value="<?php echo $al->ArrivalDateTime;?>">
                                        <input type="hidden" name="dest" value="<?php echo $al->Destination;?>">
                                        <input type="hidden" name="dur" value="<?php echo $al->Duration;?>">
                                        <input type="hidden" name="stop" value="<?php if($al->NumberofStops == 0){echo "Non Stop";}else{ echo $al->NumberofStops." Stop";}?>">
                                        <input type="hidden" name="type" value="<?php echo $pos['type'];?>">
                                        <input type="hidden" name="class" value="<?php echo $pos['class'];?>">
                                        <input type="hidden" name="flight_i" value="<?php echo  $al->FlightId;?>">
                                        
                                        
                                        <?php if($al->SegmentDetails->item->GrossAmount != ''){?>
                                        <input type="submit" name="book" class="btn  btn-success" value="Book Ticket" />
                                        <?php }?>
                                    </form>
                                    <br><br>
                                    
                                    <a href="javascript:void(0);" class="getfare"     id="show_<?php echo $me;?>" fatch="<?php echo $me;?>" AirlineId="<?php echo $al->CarrierCode;?>" FlightId="<?php echo $al->FlightId;?>" ClassCode="<?php echo $al->SegmentDetails->item->ClassCode;?>" track="<?php echo $track;?>" BasicAmount="<?php echo $al->SegmentDetails->item->GrossAmount;?>" adult="<?php echo $pos['adult'];?>" child="<?php echo $pos['child'];?>" infant="<?php echo $pos['infant'];?>" tourType="<?php echo $ttype['type'];?>">+ Show Fare Details</a>
                                    <a href="javascript:void(0);" class="hidefare no" id="hide_<?php echo $me;?>" fatch="<?php echo $me;?>">- Hide Fare Details</a>
                                    
                                </div>
                            </div>
                            
                            <div class="col-md-12 no" id="yes_<?php echo $me;?>">
                                <hr>
                                
                                <div class="row">
                                    <div class="col-md-5" id="detail_<?php echo $me;?>">
                                        
                                    </div>
                                    <div class="col-md-7" id="rule_<?php echo $me;?>">
                                        
                                    </div>
                                </div>
                            </div>

                        </div>
                  <!-- END panel-->
                        
                  <?php }}}else{$logo1 = '';
                           ?>
                  <?php //echo "<pre>"; print_r($al);?>
                   
                            <div class="col-md-12 panel mypad">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md-2 text-center">
                                              
                                             <?php $cc = 0; foreach($logos as $logo){
                                                if($it->AirlineDetails->CarrierCode == $logo->cc){ $cc = 1;
                                                    $logo1 =  base_url()."assets/logo/".$logo->logo;
                                                    echo "<center><img src='".  base_url()."assets/logo/".$logo->logo."' class='img img-responsive center' /></center>";
                                                    echo $logo->name."<br>";
                                                   // echo "<span class='dull1'>".$al->CarrierCode.'-'.$al->FlightNo."</span>";
                                                }
                                            }if($cc == 0){
                                                $logo = base_url()."assets/logo/plane4.png";
                                                echo "<center><img src='".  base_url()."assets/logo/plane4.png' class='img img-responsive center' /></center>";
                                                //echo "<span class='dull1'>".$it['0']->CarrierCode.'-'.$it['0']->FlightNo."</span>";
                                            }?>
                                        </div>
                                        <div class="col-md-8 text-center">
                                             <?php foreach($it->AirlineDetails as $al){$me++; ?>
                                            <div class="row">
                                                 <div class="col-md-3 text-center"><?php echo $al->GrossAmount;?>
                                                        <center>
                                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span class="btn-label">
                                                            <i class="fa fa-send-o "></i>
                                                        </span><br>
                                                        </center>
                                                        Flight ID<br>
                                                        <span class='dull1'><?php echo  $al->FlightId;?></span>
                                                    </div>
                                                    <div class="col-md-3 text-center">
                                                        <span class="heading-a"><b><?php echo $al->DepartureDateTime;?></b></span>
                                                        <br>
                                                        <span class='dull1'><?php echo $al->Source;?></span>

                                                    </div>
                                                    <div class="col-md-3 text-center">
                                                        <span class="heading-a"><b><?php echo $al->ArrivalDateTime;?></b></span>
                                                        <br>
                                                        <span class='dull1'><?php echo $al->Destination;?></span>

                                                    </div>
                                                    <div class="col-md-3 text-center">
                                                        <span class="heading-a"><b><?php echo $al->Duration;?></b></span>
                                                        <br>
                                                        <span class='dull1'><?php if($al->NumberofStops == 0){echo "Non Stop";}else{ echo $al->NumberofStops." Stop";}?>
                                                        <?php if($al->NumberofStops != 0){echo ",<br>Via: ".$al->Via;}?>
                                                        </span>
                                                    </div>
                                            </div>                                        
                                             <?php }?>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                  <span class="heading-a" style="font-size: 20px;"><b> <?php if($al->SegmentDetails->item->GrossAmount != ''){echo '<em class="fa fa-rupee"></em> '.$al->SegmentDetails->item->GrossAmount;}else{echo "N/A";}?></b></span>
                                             </div>
                                        </div>
                                    </div>
                                     <div class="col-md-2 text-center">
                                   <form method="post" action="<?php echo base_url();?>flight/book">
                                      
                                       <?php $ffid='';$alid='';$cccode=''; foreach($it->AirlineDetails as $al){
                                           $ffid .= $al->FlightId.',';
                                           $alid .= $al->CarrierCode.',';
                                           $cccode .= $al->SegmentDetails->item->ClassCode.',';
                                           
                                           ?>
                                        <input type="hidden" name="AirlineId[]" value="<?php echo $al->CarrierCode;?>">
                                        <input type="hidden" name="FlightId[]" value="<?php echo $al->FlightId;?>">
                                        <input type="hidden" name="ClassCode[]" value="<?php echo $al->SegmentDetails->item->ClassCode;?>">
                                        
                                        
                                        <input type="hidden" name="name[]" value="<?php echo $al->CarrierCode.'-'.$al->FlightNo;?>">
                                        <input type="hidden" name="dep[]" value="<?php echo $al->DepartureDateTime;?>">
                                        <input type="hidden" name="source[]" value="<?php echo $al->Source;?>">
                                        <input type="hidden" name="arr[]" value="<?php echo $al->ArrivalDateTime;?>">
                                        <input type="hidden" name="dest[]" value="<?php echo $al->Destination;?>">
                                        <input type="hidden" name="dur[]" value="<?php echo $al->Duration;?>">
                                        <input type="hidden" name="stop[]" value="<?php if($al->NumberofStops == 0){echo "Non Stop";}else{ echo $al->NumberofStops." Stop";}?>">
                                       
                                        
                                        <input type="hidden" name="flight_i[]" value="<?php echo  $al->FlightId;?>">
                                        <?php if($al->SegmentDetails->item->GrossAmount != ''){?>
                                            <input type="hidden" name="BasicAmount" value="<?php echo $al->SegmentDetails->item->GrossAmount?>">
                                            <input type="hidden" name="Adult" value="<?php echo $pos['adult'];?>">
                                            <input type="hidden" name="Child" value="<?php echo $pos['child'];?>">
                                            <input type="hidden" name="Infrunt" value="<?php echo $pos['infant'];?>">
                                            <input type="hidden" name="tourType" value="<?php echo $ttype['type'];?>">
                                            <input type="hidden" name="logo" value="<?php echo $logo1;?>">
                                             <input type="hidden" name="type" value="<?php echo $pos['type'];?>">
                                             <input type="hidden" name="Track" value="<?php echo $track;?>">
                                             <input type="hidden" name="class" value="<?php echo $pos['class'];?>">
                                         <?php }?>
                                        
                                        <?php if($al->SegmentDetails->item->GrossAmount != ''){?>
                                        <input type="submit" name="book" class="btn  btn-success" value="Book Ticket" />
                                            <br><br>
                                            <a href="javascript:void(0);" class="getfare"     id="show_<?php echo $me;?>" fatch="<?php echo $me;?>" AirlineId="<?php echo $alid;?>" FlightId="<?php echo $ffid;?>" ClassCode="<?php echo $cccode;?>" track="<?php echo $track;?>" BasicAmount="<?php echo $al->SegmentDetails->item->GrossAmount;?>" adult="<?php echo $pos['adult'];?>" child="<?php echo $pos['child'];?>" infant="<?php echo $pos['infant'];?>" tourType="<?php echo $ttype['type'];?>">+ Show Fare Details</a>
                                            <a href="javascript:void(0);" class="hidefare no" id="hide_<?php echo $me;?>" fatch="<?php echo $me;?>">- Hide Fare Details</a>
                                    
                                        <?php }?>
                                        
                                       <?php }?>
                                    </form> 
                                    
                                    
                                </div>
                                <div class="col-md-12 no" id="yes_<?php echo $me;?>">
                                <hr>
                                
                                <div class="row">
                                    <div class="col-md-5" id="detail_<?php echo $me;?>">
                                        
                                    </div>
                                    <div class="col-md-7" id="rule_<?php echo $me;?>">
                                        
                                    </div>
                                </div>
                            </div>
                                </div>
                                 
                            </div>
                            
                           

                        </div>
                      <?php }}}}?>               
               <?php }?>
           </table>
       </div>
         
        <!------------------------------- Domestic ------------------------>
        <div class="row">
               <?php if(count($details_domestic)>0){
                   $track = $details_domestic->UserTrackId;
                   $me=0;
                   if($ttype['type'] != 'R'){
                   foreach($details_domestic->AvailabilityOutput->AvailableFlights->OngoingFlights as $dome){
                       $logo1 = '';
                       if(count($dome->AvailSegments) == 1 ){
                ?>
                    <div class="col-md-12 panel mypad">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                       
                                              
                                        <?php foreach($dome->AvailSegments as $al){
                                            
                                            $me++; ?>
                                        
                                        <div class="col-md-1 text-center">
                                              
                                             <?php $cc = 0; foreach($logos as $logo){
                                                if($al->AirlineCode == $logo->cc){ $cc = 1;
                                                    $logo1 =  base_url()."assets/logo/".$logo->logo;
                                                    echo "<center><img src='".  base_url()."assets/logo/".$logo->logo."' class='img img-responsive center' /></center>";
                                                    echo $logo->name."<br>";
                                                   // echo "<span class='dull1'>".$al->CarrierCode.'-'.$al->FlightNo."</span>";
                                                }
                                            }if($cc == 0){
                                                $logo = base_url()."assets/logo/plane4.png";
                                                echo "<center><img src='".  base_url()."assets/logo/plane4.png' class='img img-responsive center' /></center>";
                                                //echo "<span class='dull1'>".$it['0']->CarrierCode.'-'.$it['0']->FlightNo."</span>";
                                            }?>
                                                <?php echo $al->FlightNumber;?>
                                        </div>
                                        <div class="col-md-7 text-center">
                                             
                                            <div class="row">
                                                 <div class="col-md-3 text-center">
                                                        <center>
                                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span class="btn-label">
                                                            <i class="fa fa-send-o "></i>
                                                        </span><br>
                                                        </center>
                                                        Flight ID<br>
                                                        <span class='dull1'><?php echo  $al->AirlineCode.'-'.$al->FlightId;?></span>
                                                    </div>
                                                    <div class="col-md-3 text-center">
                                                        <span class="heading-a"><b><?php echo $al->DepartureDateTime;?></b></span>
                                                        <br>
                                                        <span class='dull1'><?php echo $al->Origin;?></span>
                                                        
                                                    </div>
                                                    <div class="col-md-3 text-center">
                                                        <span class="heading-a"><b><?php echo $al->ArrivalDateTime;?></b></span>
                                                        <br>
                                                        <span class='dull1'><?php echo $al->Destination;?></span>

                                                    </div>
                                                    <div class="col-md-3 text-center">
                                                        <span class="heading-a"><b><?php echo $al->Duration;?></b></span>
                                                        <br>
                                                        <span class='dull1'><?php if($al->NumberofStops == 0){echo "Non Stop";}else{ echo $al->NumberofStops." Stop";}?>
                                                        <?php if($al->NumberofStops != 0){echo ",<br>Via: ".$al->Via;}?>
                                                        </span>
                                                    </div>
                                            </div>   
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <div class="row">
                                                    
                                                <?php foreach($al->AvailPaxFareDetails as $pric){
                                                            $pp = 0;
                                                            ?>
                                                            <?php 
                                                            if(count($pric->Adult)>0){
                                                               $pp = $pp + $pric->Adult->GrossAmount;
                                                            }
                                                            if(count($pric->Child)>0){
                                                                $pp = $pp + $pric->Child->GrossAmount;
                                                            }
                                                            if(count($pric->Infant)>0){
                                                                $pp = $pp + $pric->Infant->GrossAmount;
                                                            }
                                                            
                                                            ?>
                                                    <div class="col-md-6">
                                                            <?php if( $pp ==0){
                                                                echo "N/A<br><br><br><br>";
                                                            }else{?>
                                                                <p> <span class="heading-a" style="font-size: 20px;"><b> <em class="fa fa-rupee"></em><?php echo $pp;?></b></span></p>
                                                    </div>
                                                    <div class="col-md-6 text-center">
                                                        <?php $ffid='';$alid='';$cccode='';
                                                         $ffid .= $al->FlightId.',';
                                                           $alid .= $al->AirlineCode.',';
                                                            $cccode .= $pric->ClassCode.',';
                                                           ?>
                                                        <form method="post" action="<?php echo base_url();?>flight/domBbook">
                                                            <input type="hidden" name="AirlineId[]" value="<?php echo $al->AirlineCode;?>">
                                                            <input type="hidden" name="FlightId[]" value="<?php echo $al->FlightId;?>">
                                                            <input type="hidden" name="ClassCode[]" value="<?php echo $pric->ClassCode;?>">


                                                            <input type="hidden" name="name[]" value="<?php echo  $al->AirlineCode.'-'.$al->FlightId;?>">
                                                            <input type="hidden" name="dep[]" value="<?php echo $al->DepartureDateTime;?>">
                                                            <input type="hidden" name="source[]" value="<?php echo $al->Origin;?>">
                                                            <input type="hidden" name="arr[]" value="<?php echo $al->ArrivalDateTime;?>">
                                                            <input type="hidden" name="dest[]" value="<?php echo $al->Destination;?>">
                                                            <input type="hidden" name="dur[]" value="<?php echo $al->Duration;?>">
                                                            <input type="hidden" name="stop[]" value="<?php if($al->NumberofStops == 0){echo "Non Stop";}else{ echo $al->NumberofStops." Stop";}?>">


                                                            <input type="hidden" name="flight_i[]" value="<?php echo  $al->FlightId;?>">
                                                            <?php if($pp != ''){?>
                                                                <input type="hidden" name="BasicAmount" value="<?php echo $pp?>">
                                                                <input type="hidden" name="Adult" value="<?php echo $pos['adult'];?>">
                                                                <input type="hidden" name="Child" value="<?php echo $pos['child'];?>">
                                                                <input type="hidden" name="Infrunt" value="<?php echo $pos['infant'];?>">
                                                                <input type="hidden" name="tourType" value="<?php echo $ttype['type'];?>">
                                                                <input type="hidden" name="logo" value="<?php echo $logo1;?>">
                                                                 <input type="hidden" name="type" value="<?php echo $pos['type'];?>">
                                                                 <input type="hidden" name="Track" value="<?php echo $track;?>">
                                                                 <input type="hidden" name="class" value="<?php echo $pos['class'];?>">
                                                             <?php }?>
                                                            <input type="submit" name="dombook" class="btn  btn-success" value="Book Ticket" />
                                                            <br>
                                                            <a href="javascript:void(0);" class="domgetfare"     id="show_<?php echo $me;?>" fatch="<?php echo $me;?>" AirlineId="<?php echo $alid;?>" FlightId="<?php echo $ffid;?>" ClassCode="<?php echo $cccode;?>" track="<?php echo $track;?>" BasicAmount="<?php echo $pp;?>" adult="<?php echo $pos['adult'];?>" child="<?php echo $pos['child'];?>" infant="<?php echo $pos['infant'];?>" tourType="<?php echo $ttype['type'];?>"> Show Fare Details +</a>
                                                            <a href="javascript:void(0);" class="hidefare no" id="hide_<?php echo $me;?>" fatch="<?php echo $me;?>">Hide Fare Details -</a>
                                                        </form>
                                                    </div>
                                                <?php }}?>
                                                    
                                                    
                                                </div>
                                                </div>
                   <?php }?>
                                            
                                        </div>
                                    </div>
                                    
                                
                                <div class="col-md-12 no" id="yes_<?php echo $me;?>">
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-5" id="detail_<?php echo $me;?>">

                                        </div>
                                        <div class="col-md-7" id="rule_<?php echo $me;?>">

                                        </div>
                                    </div>
                                </div>
                            </div>
                                 
                        </div>
               <?php 
                   }}
               }else{
                   /*********** ROUND ************/
                   $var = 0;
                   $check = (COUNT($details_domestic->AvailabilityOutput->AvailableFlights->ReturnFlights) - 1);
                   foreach($details_domestic->AvailabilityOutput->AvailableFlights->OngoingFlights as $dome){
                       
                       $logo1 = '';
                       if(count($dome->AvailSegments) == 1 && $check > $var){
                ?>
                    <div class="col-md-12 panel mypad">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                       
                                              
                                        <?php foreach($dome->AvailSegments as $al){
                                            
                                            $me++; ?>
                                        
                                        <div class="col-md-1 text-center">
                                              
                                             <?php $cc = 0; foreach($logos as $logo){
                                                if($al->AirlineCode == $logo->cc){ $cc = 1;
                                                    $logo1 =  base_url()."assets/logo/".$logo->logo;
                                                    echo "<center><img src='".  base_url()."assets/logo/".$logo->logo."' class='img img-responsive center' /></center>";
                                                    echo $logo->name."<br>";
                                                   // echo "<span class='dull1'>".$al->CarrierCode.'-'.$al->FlightNo."</span>";
                                                }
                                            }if($cc == 0){
                                                $logo = base_url()."assets/logo/plane4.png";
                                                echo "<center><img src='".  base_url()."assets/logo/plane4.png' class='img img-responsive center' /></center>";
                                                //echo "<span class='dull1'>".$it['0']->CarrierCode.'-'.$it['0']->FlightNo."</span>";
                                            }?>
                                                <?php echo $al->FlightNumber;?>
                                        </div>
                                        <div class="col-md-7 text-center">
                                             
                                            <div class="row">
                                                 <div class="col-md-3 text-center">
                                                        <center>
                                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span class="btn-label">
                                                            <i class="fa fa-send-o "></i>
                                                        </span><br>
                                                        </center>
                                                        Flight ID<br>
                                                        <span class='dull1'><?php echo  $al->AirlineCode.'-'.$al->FlightId;?></span>
                                                    </div>
                                                    <div class="col-md-3 text-center">
                                                        <span class="heading-a"><b><?php echo $al->DepartureDateTime;?></b></span>
                                                        <br>
                                                        <span class='dull1'><?php echo $al->Origin;?></span>
                                                        
                                                    </div>
                                                    <div class="col-md-3 text-center">
                                                        <span class="heading-a"><b><?php echo $al->ArrivalDateTime;?></b></span>
                                                        <br>
                                                        <span class='dull1'><?php echo $al->Destination;?></span>

                                                    </div>
                                                    <div class="col-md-3 text-center">
                                                        <span class="heading-a"><b><?php echo $al->Duration;?></b></span>
                                                        <br>
                                                        <span class='dull1'><?php if($al->NumberofStops == 0){echo "Non Stop";}else{ echo $al->NumberofStops." Stop";}?>
                                                        <?php if($al->NumberofStops != 0){echo ",<br>Via: ".$al->Via;}?>
                                                        </span>
                                                    </div>
                                            </div>   
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <div class="row">
                                                    
                                                <?php 
                                                //foreach($al->AvailPaxFareDetails as $pric){
                                                            $pp = 0;
                                                            ?>
                                                     <?php 
                                                            if(count($al->AvailPaxFareDetails['0']->Adult)>0){
                                                               $pp = $pp + $al->AvailPaxFareDetails['0']->Adult->GrossAmount ;
                                                            }
                                                            if(count($al->AvailPaxFareDetails['0']->Child)>0){
                                                                $pp = $pp + $al->AvailPaxFareDetails['0']->Child->GrossAmount ;
                                                            }
                                                            if(count($al->AvailPaxFareDetails['0']->Infant)>0){
                                                                $pp = $pp + $al->AvailPaxFareDetails['0']->Infant->GrossAmount ;
                                                            }
                                                            
                                                            ?>
                                                    <div class="col-md-6">
                                                        <?php if( $pp ==0){
                                                                echo "N/A<br><br><br><br>";
                                                            }else{?>
                                                                <p> <span class="heading-a" style="font-size: 20px;"><b> <em class="fa fa-rupee"></em><?php echo $pp;?></b></span></p>
                                                                 <?php }//}
                                                ?>
                                                     </div>
                                                    <div class="col-md-6 text-center">
                                                        <?php $ffid='';$alid='';$cccode='';
                                                            $ffid .= $al->FlightId.',';
                                                            $alid .= $al->AirlineCode.',';
                                                            $cccode .= $al->AvailPaxFareDetails['0']->ClassCode.',';
                                                        ?>
                                                       
                                                    </div>
                                               
                                                    
                                                    
                                                </div>
                                                </div>
                   <?php }?>
                                            
                                        </div>
                                    </div>
                                
                                <div class="col-md-12">
                                    <div class="row">
                                       
                                              
                                        <?php foreach($details_domestic->AvailabilityOutput->AvailableFlights->ReturnFlights[$var]->AvailSegments as $al1){
                                            
                                            $me++; ?>
                                        
                                        <div class="col-md-1 text-center">
                                              
                                             <?php $cc = 0; foreach($logos as $logo){
                                                if($al1->AirlineCode == $logo->cc){ $cc = 1;
                                                    $logo1 =  base_url()."assets/logo/".$logo->logo;
                                                    echo "<center><img src='".  base_url()."assets/logo/".$logo->logo."' class='img img-responsive center' /></center>";
                                                    echo $logo->name."<br>";
                                                   // echo "<span class='dull1'>".$al1->CarrierCode.'-'.$al1->FlightNo."</span>";
                                                }
                                            }if($cc == 0){
                                                $logo = base_url()."assets/logo/plane4.png";
                                                echo "<center><img src='".  base_url()."assets/logo/plane4.png' class='img img-responsive center' /></center>";
                                                //echo "<span class='dull1'>".$it['0']->CarrierCode.'-'.$it['0']->FlightNo."</span>";
                                            }?>
                                                <?php echo $al1->FlightNumber;?>
                                        </div>
                                        <div class="col-md-7 text-center">
                                             
                                            <div class="row">
                                                 <div class="col-md-3 text-center">
                                                        <center>
                                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span class="btn-label">
                                                            <i class="fa fa-send-o "></i>
                                                        </span><br>
                                                        </center>
                                                        Flight ID<br>
                                                        <span class='dull1'><?php echo  $al1->AirlineCode.'-'.$al1->FlightId;?></span>
                                                    </div>
                                                    <div class="col-md-3 text-center">
                                                        <span class="heading-a"><b><?php echo $al1->DepartureDateTime;?></b></span>
                                                        <br>
                                                        <span class='dull1'><?php echo $al1->Origin;?></span>
                                                        
                                                    </div>
                                                    <div class="col-md-3 text-center">
                                                        <span class="heading-a"><b><?php echo $al1->ArrivalDateTime;?></b></span>
                                                        <br>
                                                        <span class='dull1'><?php echo $al1->Destination;?></span>

                                                    </div>
                                                    <div class="col-md-3 text-center">
                                                        <span class="heading-a"><b><?php echo $al1->Duration;?></b></span>
                                                        <br>
                                                        <span class='dull1'><?php if($al1->NumberofStops == 0){echo "Non Stop";}else{ echo $al->NumberofStops." Stop";}?>
                                                        <?php if($al1->NumberofStops != 0){echo ",<br>Via: ".$al1->Via;}?>
                                                        </span>
                                                    </div>
                                            </div>   
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <div class="row">
                                                    
                                                <?php  $pp1 = 0;
                                                //foreach($al1->AvailPaxFareDetails as $pric){                                                            
                                                            ?>
                                                            <?php 
                                                            if(count($al1->AvailPaxFareDetails['0']->Adult)>0){
                                                               $pp1 = $pp1  + $al1->AvailPaxFareDetails['0']->Adult->GrossAmount;
                                                            }
                                                            if(count($al1->AvailPaxFareDetails['0']->Child)>0){
                                                                $pp1 = $pp1  + $al1->AvailPaxFareDetails['0']->Child->GrossAmount;
                                                            }
                                                            if(count($al1->AvailPaxFareDetails['0']->Infant)>0){
                                                                $pp1 =  $pp1  + $al1->AvailPaxFareDetails['0']->Infant->GrossAmount;
                                                            }
                                                            
                                                            ?>
                                                    <div class="col-md-6">
                                                            <?php if( $pp1 ==0){
                                                                echo "N/A<br><br><br><br>";
                                                            }else{?>
                                                                <p> <span class="heading-a" style="font-size: 20px;"><b> <em class="fa fa-rupee"></em><?php echo $pp1;?></b></span></p>
                                                    </div>
                                                    <div class="col-md-6 text-center">
                                                        <?php 
                                                            $ffid .= $al1->FlightId.',';
                                                            $alid .= $al1->AirlineCode.',';
                                                            $cccode .= $al1->AvailPaxFareDetails['0']->ClassCode.',';
                                                           ?>
                                                        <form method="post" action="<?php echo base_url();?>flight/domBbook">
                                                            <input type="hidden" name="AirlineId[]" value="<?php echo $al->AirlineCode;?>">
                                                            <input type="hidden" name="AirlineId[]" value="<?php echo $al1->AirlineCode;?>">
                                                            <input type="hidden" name="FlightId[]" value="<?php echo $al->FlightId;?>">
                                                            <input type="hidden" name="FlightId[]" value="<?php echo $al1->FlightId;?>">
                                                            <input type="hidden" name="ClassCode[]" value="<?php echo $cccode;?>">


                                                            <input type="hidden" name="name[]" value="<?php echo  $al->AirlineCode.'-'.$al->FlightId;?>">
                                                            <input type="hidden" name="name[]" value="<?php echo  $al1->AirlineCode.'-'.$al1->FlightId;?>">
                                                            <input type="hidden" name="dep[]" value="<?php echo $al->DepartureDateTime;?>">
                                                            <input type="hidden" name="dep[]" value="<?php echo $al1->DepartureDateTime;?>">
                                                            <input type="hidden" name="source[]" value="<?php echo $al->Origin;?>">
                                                            <input type="hidden" name="source[]" value="<?php echo $al1->Origin;?>">
                                                            <input type="hidden" name="arr[]" value="<?php echo $al->ArrivalDateTime;?>">
                                                            <input type="hidden" name="arr[]" value="<?php echo $al1->ArrivalDateTime;?>">
                                                            <input type="hidden" name="dest[]" value="<?php echo $al->Destination;?>">
                                                            <input type="hidden" name="dest[]" value="<?php echo $al1->Destination;?>">
                                                            <input type="hidden" name="dur[]" value="<?php echo $al->Duration;?>">
                                                            <input type="hidden" name="dur[]" value="<?php echo $al1->Duration;?>">
                                                            <input type="hidden" name="stop[]" value="<?php if($al->NumberofStops == 0){echo "Non Stop";}else{ echo $al->NumberofStops." Stop";}?>">
                                                            <input type="hidden" name="stop[]" value="<?php if($al1->NumberofStops == 0){echo "Non Stop";}else{ echo $al->NumberofStops." Stop";}?>">


                                                            <input type="hidden" name="flight_i[]" value="<?php echo  $al->FlightId;?>">
                                                            <input type="hidden" name="flight_i[]" value="<?php echo  $al1->FlightId;?>">
                                                            <?php if($pp != ''){?>
                                                                <input type="hidden" name="BasicAmount" value="<?php echo $pp.','.$pp1?>">
                                                                <input type="hidden" name="Adult" value="<?php echo $pos['adult'];?>">
                                                                <input type="hidden" name="Child" value="<?php echo $pos['child'];?>">
                                                                <input type="hidden" name="Infrunt" value="<?php echo $pos['infant'];?>">
                                                                <input type="hidden" name="tourType" value="<?php echo $ttype['type'];?>">
                                                                <input type="hidden" name="logo" value="<?php echo $logo1;?>">
                                                                 <input type="hidden" name="type" value="<?php echo $pos['type'];?>">
                                                                 <input type="hidden" name="Track" value="<?php echo $track;?>">
                                                                 <input type="hidden" name="class" value="<?php echo $pos['class'];?>">
                                                             <?php }?>
                                                            <input type="submit" name="dombook" class="btn  btn-success" value="Book Ticket" />
                                                            <br>
                                                            <a href="javascript:void(0);" class="domgetfare"     id="show_<?php echo $me;?>" fatch="<?php echo $me;?>" AirlineId="<?php echo $alid;?>" FlightId="<?php echo $ffid;?>" ClassCode="<?php echo $cccode;?>" track="<?php echo $track;?>" BasicAmount="<?php echo $pp.','.$pp1;?>" adult="<?php echo $pos['adult'];?>" child="<?php echo $pos['child'];?>" infant="<?php echo $pos['infant'];?>" tourType="<?php echo $ttype['type'];?>"> Show Fare Details +</a>
                                                            <a href="javascript:void(0);" class="hidefare no" id="hide_<?php echo $me;?>" fatch="<?php echo $me;?>">Hide Fare Details -</a>
                                                        </form>
                                                    </div>
                                                <?php }//}
                                                ?>
                                                    
                                                    
                                                </div>
                                                </div>
                   <?php } $var++;?>
                                            
                                        </div>
                                    </div>
                                <div class="col-md-12 no" id="yes_<?php echo $me;?>">
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-5" id="detail_<?php echo $me;?>">

                                        </div>
                                        <div class="col-md-7" id="rule_<?php echo $me;?>">

                                        </div>
                                    </div>
                                </div>
                            </div>
                                 
                        </div>
                        
               <?php 
                   }}
                   
               }
                   }?>
           </div>
        <!------------------------------- End Domestic ------------------------>
    
 </section>
<script>
    $(function(){
      var typ =  $('input:radio[name=fType]:checked').val(); 
      if(typ == 'I'){
          $('.i').show();
          $('.d').hide();
      }else{
          $('.i').hide();
          $('.d').show();
      }
    });
    
    $('.fType').click(function(){
        var typ =  $('input:radio[name=fType]:checked').val();
        if(typ == 'I'){
          $('.i').show();
          $('.d').hide();
      }else{
          $('.i').hide();
          $('.d').show();
      }
    });
    
    $('#inlineradio1').click(function(){
        $('.round').hide();
        $('.roundtext').val('');
    });
     $('#inlineradio2').click(function(){
        $('.round').show();
        //$('.roundtext').val('');
    });
    if ($("#inlineradio1").prop("checked")) {
        $('.round').hide();
        $('.roundtext').val('');
    }
    $('#searchload').click(function(){
         $("#loading").modal('show');
    });
    
    $('.hidefare').click(function(){
        var fatch = $(this).attr('fatch');
        $('#yes_'+fatch).css('display','none');
        $('#hide_'+fatch).css('display','none');
        $('#show_'+fatch).css('display','inline');
    });
    $('.getfare').click(function(){
        var fatch = $(this).attr('fatch');
        var AirlineId = $(this).attr('AirlineId');
        var FlightId = $(this).attr('FlightId');
        var ClassCode = $(this).attr('ClassCode');
        var track = $(this).attr('track');
        var BasicAmount = $(this).attr('BasicAmount');
        var infant = $(this).attr('infant');
        var child = $(this).attr('child');
        var adult = $(this).attr('adult');
        var tourType = $(this).attr('tourType');
       // alert(FlightId);
          $("#loading").modal('show');
            $.post('<?php echo base_url();?>flight/fare',{'tourType':tourType,'infant':infant,'child':child,'adult':adult,'AirlineId':AirlineId,'FlightId':FlightId,'ClassCode':ClassCode,'track':track,'BasicAmount':BasicAmount},function(response){
               // alert(response);
                if(response !=''){   
                        $('#yes_'+fatch).css('display','inline');
                        $('#hide_'+fatch).css('display','inline');
                        $('#show_'+fatch).css('display','none');
                        
                        $('#detail_'+fatch).html(response);
                        $("#loading").modal('hide');
                    }else{
                        
                        $("#loading").modal('hide');
                    }					
                });
        
    });
    $('.domgetfare').click(function(){
        var fatch = $(this).attr('fatch');
        var AirlineId = $(this).attr('AirlineId');
        var FlightId = $(this).attr('FlightId');
        var ClassCode = $(this).attr('ClassCode');
        var track = $(this).attr('track');
        var BasicAmount = $(this).attr('BasicAmount');
        var infant = $(this).attr('infant');
        var child = $(this).attr('child');
        var adult = $(this).attr('adult');
        var tourType = $(this).attr('tourType');
      //  alert(BasicAmount);return false;
          $("#loading").modal('show');
            $.post('<?php echo base_url();?>flight/domFare',{'tourType':tourType,'infant':infant,'child':child,'adult':adult,'AirlineId':AirlineId,'FlightId':FlightId,'ClassCode':ClassCode,'track':track,'BasicAmount':BasicAmount},function(response){
               // alert(response);
                if(response !=''){   
                        $('#yes_'+fatch).css('display','inline');
                        $('#hide_'+fatch).css('display','inline');
                        $('#show_'+fatch).css('display','none');
                        
                        $('#detail_'+fatch).html(response);
                        $("#loading").modal('hide');
                    }else{
                        
                        $("#loading").modal('hide');
                    }					
                });
        
    });
 </script>