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
                                       <option value="BOM">BOM</option>
                                       <option value="DXB">DXB</option>
                                       <option value="MAA">MAA</option>
                                       <option value="CMB">CMB</option>
                                       <option value="MLE">MLE</option>
                                   </select>
                                   <span class="red"><?=  form_error('from');?></span>
                               </div>
                               <div class="col-lg-3">
                                    <label for="Mobile">To Location<font class="red">*</font> </label>
                                   <select name="to" class="form-control">
                                       <option value="">Select</option>
                                       <option value="BOM">BOM</option>
                                       <option value="DXB">DXB</option>
                                       <option value="MAA">MAA</option>
                                       <option value="CMB">CMB</option>
                                       <option value="MLE">MLE</option>                                       
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
                                                <option value="<?php echo $i;?>"><?php echo $i;?></option>
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
                                                <option value="<?php echo $i;?>"><?php echo $i;?></option>
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
                                                <option value="<?php echo $i;?>"><?php echo $i;?></option>
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
                <?php foreach($details->FlightDetails as $di){
                    foreach($di->AirlineSegment as $st){
                    foreach($st->ITEM as $it){
                    foreach($it->AirlineDetails as $al){?>
                        <!-- START panel-->
                        <div class="col-md-12">
                            <div id="panelDemo8" class="panel panel-primary">
                                <div class="panel-heading"><?php echo $al->CarrierCode.'-'.$al->FlightNo;?> &nbsp;&nbsp;<b>From :</b><?php echo $al->Source;?>&nbsp;&nbsp;<b>To :</b><?php echo $al->Destination;?></div>
                               <div class="panel-body">
                                   <div class="col-md-4">
                                       <b>Departure Date Time</b> <?php echo $al->DepartureDateTime;?>
                                   </div>
                                    <div class="col-md-4">
                                       <b>Arrival Date Time</b> <?php echo $al->ArrivalDateTime;?>
                                   </div>
                                    <div class="col-md-4">
                                       <b>Duration</b> <?php echo $al->Duration;?>
                                   </div>
                                    <div class="col-md-4">
                                       <b>Stops</b> <?php echo $al->NumberofStops;?>
                                   </div>
                                   <?php //foreach($al->SegmentDetails as $sg){?>
                                    <div class="col-md-4">
                                        <b>Total Amount</b> <?php print($al->SegmentDetails->item->TotalAmount) ;?>
                                   </div>
                                    <div class="col-md-4">
                                       <b>Gross Amount</b> <?php echo $al->GrossAmount;?>
                                   </div>
                               </div>
                               <div class="panel-footer"><b>Commission</b> <?php echo $al->Commission;?></div>
                                   <?php //}?>
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
 </script>