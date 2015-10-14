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
                       <div class="panel panel-default">                            
                           <div class="panel-body">
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
                                       <option value="BOM" <?php echo set_select('from','BOM', ( !empty($data) && $data == "BOM") ? TRUE : FALSE )?>>BOM</option>
                                       <option value="DXB" <?php echo set_select('from','DXB', ( !empty($data) && $data == "DXB") ? TRUE : FALSE )?>>DXB</option>
                                       <option value="MAA" <?php echo set_select('from','MAA', ( !empty($data) && $data == "MAA") ? TRUE : FALSE )?>>MAA</option>
                                       <option value="CMB" <?php echo set_select('from','CMB', ( !empty($data) && $data == "CMB") ? TRUE : FALSE )?>>CMB</option>
                                       <option value="MLE" <?php echo set_select('from','MLE', ( !empty($data) && $data == "MLE") ? TRUE : FALSE )?>>MLE</option>
                                   </select>
                                   <span class="red"><?=  form_error('from');?></span>
                               </div>
                               <div class="col-lg-3">
                                    <label for="Mobile">To Location<font class="red">*</font> </label>
                                   <select name="to" class="form-control">
                                       <option value="">Select</option>
                                       <option value="BOM" <?php echo set_select('to','BOM', ( !empty($data) && $data == "BOM") ? TRUE : FALSE )?>>BOM</option>
                                       <option value="DXB" <?php echo set_select('to','DXB', ( !empty($data) && $data == "DXB") ? TRUE : FALSE )?>>DXB</option>
                                       <option value="MAA" <?php echo set_select('to','MAA', ( !empty($data) && $data == "MAA") ? TRUE : FALSE )?>>MAA</option>
                                       <option value="CMB" <?php echo set_select('to','CMB', ( !empty($data) && $data == "CMB") ? TRUE : FALSE )?>>CMB</option>
                                       <option value="MLE" <?php echo set_select('to','MLE', ( !empty($data) && $data == "MLE") ? TRUE : FALSE )?>>MLE</option>                                       
                                   </select>
                                   <span class="red"><?=  form_error('to');?></span>
                               </div>
                           </div>
                            <div class="row">
                                <div class="col-lg-2">
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
                                <div class="col-lg-2">
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
                                <div class="col-lg-2">
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
                                <div class="col-lg-3">
                                     <div class="form-group">
                                         <label for="Mobile"><br><br/><br/></label>
                                         <label class="radio-inline c-radio">
                                            <input id="inlineradio1" type="radio"  name="type" value="O">
                                            <span class="fa fa-circle"></span>
                                           One Way
                                        </label>
                                         <label class="radio-inline c-radio">
                                            <input id="inlineradio2" type="radio" name="type" value="R" checked="checked">
                                            <span class="fa fa-circle"></span>
                                           Round Trip
                                        </label>
                                        
                                         <span class="red"><?=  form_error('type');?></span>
                                     </div>
                                 </div>
                            </div>
                               <div class="col-lg-10 ">
                                  
                               </div>
                               <div class="col-lg-2 text-right">
                                   <input type="submit" id="searchload" name="search" value="Search" class="btn btn-info" />
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
                <?php 
                $track = $details->UserTrackId;
                $me=0;foreach($details->FlightDetails as $di){
                    foreach($di->AirlineSegment as $st){
                    foreach($st->ITEM as $it){
                    foreach($it->AirlineDetails as $al){$me++;?>
                        <?php //echo "<pre>"; print_r($al);?>
                        <!-- START panel-->
                        <div class="col-md-12 panel mypad">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md-2 text-center">
                                              
                                             <?php $cc = 0; foreach($logos as $logo){
                                                if($al->CarrierCode == $logo->cc){ $cc = 1;
                                                    echo "<center><img src='".  base_url()."assets/logo/".$logo->logo."' class='img img-responsive center' /></center>";
                                                    echo $logo->name."<br>";
                                                    echo "<span class='dull1'>".$al->CarrierCode.'-'.$al->FlightNo."</span>";
                                                }
                                            }if($cc == 0){
                                                echo "<center><img src='".  base_url()."assets/logo/plane4.png' class='img img-responsive center' /></center>";
                                                echo "<span class='dull1'>".$al->CarrierCode.'-'.$al->FlightNo."</span>";
                                            }?>
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
                                        <div class="col-md-2 text-center"><?php echo $al->GrossAmount;?>
                                            <i class="icon-list fa-2x dull"></i><br>
                                            <span class='dull1'>No Service</span>
                                        </div>
                                        <div class="col-md-2 text-center">
                                            <span class="heading-a" style="font-size: 20px;"><b> <?php if($al->SegmentDetails->item->GrossAmount != ''){echo '<em class="fa fa-rupee"></em> '.$al->SegmentDetails->item->GrossAmount;}else{echo "N/A";}?></b></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 text-center">
                                    <button  class="btn btn-labeled btn-success" type="button">
                                        <span class="btn-label">
                                            <i class="fa fa-send-o "></i>
                                        </span>
                                        Book Ticket
                                    </button>
                                    <br><br>
                                    <a href="javascript:void(0);" class="getfare"     id="show_<?php echo $me;?>" fatch="<?php echo $me;?>" AirlineId="<?php echo $al->CarrierCode;?>" FlightId="<?php echo $al->FlightId;?>" ClassCode="<?php echo $al->SegmentDetails->item->ClassCode;?>" track="<?php echo $track;?>" BasicAmount="<?php echo $al->SegmentDetails->item->GrossAmount;?>" adult="<?php echo $pos['adult'];?>" child="<?php echo $pos['child'];?>" infant="<?php echo $pos['infant'];?>">+ Show Fare Details</a>
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
                        
                   <?php }}}}?>               
               <?php }?>
           </table>
       </div>
    </div>
 </section>
<script>
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
          $("#loading").modal('show');
            $.post('<?php echo base_url();?>flight/fare',{'infant':infant,'child':child,'adult':adult,'AirlineId':AirlineId,'FlightId':FlightId,'ClassCode':ClassCode,'track':track,'BasicAmount':BasicAmount},function(response){
                alert(response);
                if(response !=''){                        
                        $('#detail_'+fatch).html(response);
                        $("#loading").modal('hide');
                    }else{
                        
                        $("#loading").modal('hide');
                    }					
                });
        $('#yes_'+fatch).css('display','inline');
        $('#hide_'+fatch).css('display','inline');
        $('#show_'+fatch).css('display','none');
    });
 </script>