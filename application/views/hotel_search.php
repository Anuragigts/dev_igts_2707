<section>
         <!-- Page content-->
    <div class="content-wrapper">
       <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
             <li><a href="<?php echo base_url();?>dashboard">Dashboard</a>
             </li>                  
                              
             <li class="active">Hotels</li>                 
          </ol>Search Hotels
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">Search the Hotels for staying </span>
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
                                            <input  type="radio"  name="hType" value="D" <?php if($pos['hType'] == 'D'){echo 'checked="checked"';}?>>
                                            <span class="fa fa-circle"></span>
                                           Domestic
                                        </label>
                                         <label class="radio-inline c-radio">
                                            <input  type="radio" name="hType" value="I" <?php if($pos['hType'] == 'I'){echo 'checked="checked"';}?>>
                                            <span class="fa fa-circle"></span>
                                           International
                                        </label>
                                        
                                         <span class="red"><?=  form_error('type');?></span>
                                     </div>
                                 </div>                                   
                               </div>
                               <div class="row">
                                   <div class="col-lg-6">
                                    <label for="Mobile">Location<font class="red">*</font> </label>
                                    <select name="loc" class="form-control">
                                        <option value="">Select</option>
                                        <?php foreach($cityLoc['soapBody']['getAllCitiesResponse']['getAllCitiesResult']['CityNames']['City'] as $cit){  ?>
                                             <option> <?php echo $cit['CityName']; ;?></option>
                                         <?php }?>
                                    </select>
                                    <span class="red"><?=  form_error('loc');?></span>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                       <label for="Mobile" >CheckIn Date<font class="red">*</font></label>
                                       <input name="in" class="form-control datepicker" placeholder="mm/dd/yyyy" type="text" value="<?= set_value("departure"); ?>" >
                                        <span class="red"><?=  form_error('in');?></span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                       <label for="code" >CheckOut Date<font class="red round">*</font></label>
                                        <input name="out" id="code" placeholder="mm/dd/yyyy" class="form-control datepicker round-text" type="text" value="<?= set_value("return"); ?>" >
                                        <span class="red"><?=  form_error('out');?></span>
                                    </div>
                                </div>                              
                           </div>
                               <div class="row">
                                  <div class="col-lg-3">
                                         <div class="form-group">
                                              <label for="Mobile">Room<font class="red">*</font></label>
                                            
                                                <select name="room" class="form-control">  
                                                    <?php for($i =1; $i<15; $i++){?>
                                                    <option value="<?php echo $i;?>" <?php echo set_select('room',"$i", ( !empty($data) && $data == "$i") ? TRUE : FALSE )?>><?php echo $i;?></option>
                                                    <?php }?>                          
                                                </select>
                                                <span class="red"><?=  form_error('room');?></span>
                                         </div>
                                     </div>
                                   
                                    <div class="col-lg-3">
                                         <div class="form-group">
                                             <label for="Mobile">Adult<font class="red">*</font></label>
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
                                              <label for="Mobile">Child (0-12 Year)</label>
                                                <select name="child" class="form-control">  
                                                    <?php for($i =0; $i<9; $i++){?>
                                                    <option value="<?php echo $i;?>" <?php echo set_select('child',"$i", ( !empty($data) && $data == "$i") ? TRUE : FALSE )?>><?php echo $i;?></option>
                                                    <?php }?>                          
                                                </select>
                                                <span class="red"><?=  form_error('child');?></span>
                                         </div>
                                     </div>
                                    <div class="col-lg-3 text-right">
                                        <br>
                                          <input type="submit" id="searchload" name="search" value="Search" class="btn btn-info" />
                                     </div>
                                   
                               </div>
                               
                            
                               
                           </div>
                       </div>
                  </form>
                </div>
            </div>
       </div>   
       <div class="row">
          
       </div>
    </div>
 </section>
