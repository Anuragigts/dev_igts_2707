<section>
    <!-- Page content-->
    <div class="content-wrapper">
        <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
<!--                  <li><a href="#">Home</a>
             </li>
             <li><a href="#">Elements</a>
             </li>-->
             <li class="active">API Switcher</li>
          </ol> API Switcher
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">For the updating of Api Switcher's</span>
          <!-- Breadcrumb below title-->

        </h3>
        <div class="row">
             <?php   $this->load->view("layout/success_error");?>
            <!-- START DATATABLE 1 -->
               <div class="row">
                  <div class="col-lg-12">
                     <div class="panel panel-default">
<!--                        <div class="panel-heading">
                           Create Commission
                            | <small>Zero Configuration</small>
                        </div>-->
                        <div class="panel-body">
                            <form method="post" action="">
                                <div class="row">
                                    <div class="col-md-12">
                                        <span class='pull-right checkbox-inline'>Check All</span> <input type='checkbox' value='1' checked="checked" class='checkapi checkbox-inline pull-right'/>
                                    </div>
                                </div>
                                <div id="accordion">
                                    <?php 
                                        $j = 0;
                                        $i = 0;
                                        $q = 0;
                                        $p = 0;
                                       if($i == 0){
                                                echo "<h3>Recharge </h3>";
                                       }
                                    ?>
                                <div>
                                    <?php
                                       foreach($viw as $re){
                                            if($re->module_id == 1){ ?>
                                                <div class="row padding-3">
                                                    <div class="col-sm-3 col-xs-3"><?= ucfirst($re->modules_obj_name);?></div>
                                                    <div class="col-sm-3 col-xs-3"><?= ucfirst($re->sub_module_name);?></div>
                                                    <div class="col-sm-3 col-xs-3">
                                                        <select class="form-control" name='<?= $re->modules_obj_id;?>_<?= $re->switch_det_id;?>_api_name'>
                                                            <?php  
                                                                  foreach($api as $ap){  ?>
                                                                        <option value="<?= $ap->api_id;?>" <?php echo ($ap->api_id == $re->api_id )?"selected=selected":" ";?> ><?= $ap->api_name;?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3 col-xs-3">
                                                        <a href="javascript:void(0);" title="<?php echo ($re->status  == 1)? 'Off':'On';?>">
                                                            <!--<i class="success fa fa-check-circle-o"></i>-->
                                                            <label class="switch switch-sm">
                                                                <input type="checkbox" value="1" name="<?= $re->modules_obj_id;?>_<?= $re->switch_det_id;?>_api_status" <?php echo ($re->status  == 1 || $re->status == "")?"checked=checked":"";?> class="api-switch">
                                                                <span></span>
                                                            </label>
                                                        </a>
                                                    </div>     
                                                </div> 
                                                <?php 
                                            }
                                        }
                                    ?>
                                </div> 
                                <?php 
                                if($i == 0){
                                        //echo "<h3>Utitlity</h3>";
                                   }
                                ?>
                                    <!--
                                <div>
                                    <?php
                                       foreach($viw as $re){
                                            if($re->module_id == 2){ ?>
                                                <div class="row padding-3">
                                                    <div class="col-sm-3 col-xs-3"><?= ucfirst($re->modules_obj_name);?></div>
                                                    <div class="col-sm-3 col-xs-3"><?= ucfirst($re->module_name);?></div>
                                                    <div class="col-sm-3 col-xs-3">
                                                        <select class="form-control" name='<?= $re->modules_obj_id;?>_<?= $re->switch_det_id;?>_api_name'>
                                                            <?php  
                                                                  foreach($api as $ap){  ?>
                                                                        <option value="<?= $ap->api_id;?>" <?php echo ($ap->api_id == $re->api_id )?"selected=selected":" ";?> ><?= $ap->api_name;?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3 col-xs-3">
                                                       <a href="javascript:void(0);" title="<?php echo ($re->status  == 1)? 'Off':'On';?>">
                                                            <i class="success fa fa-check-circle-o"></i>
                                                            <label class="switch switch-sm">
                                                                <input type="checkbox" value="1" name="<?= $re->modules_obj_id;?>_<?= $re->switch_det_id;?>_api_status" <?php echo ($re->status  == 1 || $re->status == "")?"checked=checked":"";?> class="api-switch">
                                                                <span></span>
                                                            </label>
                                                        </a>
                                                    </div>  
                                                </div> 
                                                <?php 
                                            }
                                        }
                                    ?>
                                </div>   -->
                                <?php 
                                    if($i == 0){
                                            echo "<h3>DMR</h3>";
                                       }
                                ?>
                                <div>
                                    <?php
                                       foreach($viw as $re){
                                            if($re->module_id == 3){ ?>
                                                <div class="row padding-3">
                                                    <div class="col-sm-3 col-xs-3"><?= ucfirst($re->modules_obj_name);?></div>
                                                    <div class="col-sm-3 col-xs-3"><?= ucfirst($re->module_name);?></div>
                                                    <div class="col-sm-3 col-xs-3">
                                                        <select class="form-control" name='<?= $re->modules_obj_id;?>_<?= $re->switch_det_id;?>_api_name'>
                                                            <?php  
                                                                  foreach($api as $ap){  
                                                                      if($ap->api_id == 1) { ?>
                                                                        <option value="<?= $ap->api_id;?>" <?php echo ($ap->api_id == $re->api_id )?"selected=selected":" ";?> ><?= $ap->api_name;?></option>
                                                            <?php     } 
                                                                  }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3 col-xs-3">
                                                        <a href="javascript:void(0);" title="<?php echo ($re->status  == 1)? 'Off':'On';?>">
                                                            <!--<i class="success fa fa-check-circle-o"></i>-->
                                                            <label class="switch switch-sm">
                                                                <input type="checkbox" value="1" name="<?= $re->modules_obj_id;?>_<?= $re->switch_det_id;?>_api_status" <?php echo ($re->status  == 1 || $re->status == "")?"checked=checked":"";?> class="api-switch">
                                                                <span></span>
                                                            </label>
                                                        </a>
                                                    </div>  
                                                </div> 
                                                <?php 
                                            }
                                        }
                                    ?>
                                </div>
                                <?php 
                                    if($i == 0){
                                            echo "<h3>Flight</h3>";
                                       }
                                ?>
                                <div>
                                    <?php
                                       foreach($viw as $re){
                                            if($re->module_id == 4){ ?>
                                                <div class="row padding-3">
                                                    <div class="col-sm-3 col-xs-3"><?= ucfirst($re->modules_obj_name);?></div>
                                                    <div class="col-sm-3 col-xs-3"><?= ucfirst($re->module_name);?></div>
                                                    <div class="col-sm-3 col-xs-3">
                                                        <select class="form-control" name='<?= $re->modules_obj_id;?>_<?= $re->switch_det_id;?>_api_name'>
                                                            <?php  
                                                                  foreach($api as $ap){  
                                                                      if($ap->api_id == 1) { ?>
                                                                        <option value="<?= $ap->api_id;?>" <?php echo ($ap->api_id == $re->api_id )?"selected=selected":" ";?> ><?= $ap->api_name;?></option>
                                                            <?php     } 
                                                                  }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3 col-xs-3">
                                                        <a href="javascript:void(0);" title="<?php echo ($re->status  == 1)? 'Off':'On';?>">
                                                            <!--<i class="success fa fa-check-circle-o"></i>-->
                                                            <label class="switch switch-sm">
                                                                <input type="checkbox" value="1" name="<?= $re->modules_obj_id;?>_<?= $re->switch_det_id;?>_api_status" <?php echo ($re->status  == 1 || $re->status == "")?"checked=checked":"";?> class="api-switch">
                                                                <span></span>
                                                            </label>
                                                        </a>
                                                    </div>  
                                                </div> 
                                                <?php 
                                            }
                                        }
                                    ?>
                                </div>
                                <?php 
                                    if($i == 0){
                                            echo "<h3>Hotel</h3>";
                                       }
                                ?>
                                <div>
                                    <?php
                                       foreach($viw as $re){
                                            if($re->module_id == 5){ ?>
                                                <div class="row padding-3">
                                                    <div class="col-sm-3 col-xs-3"><?= ucfirst($re->modules_obj_name);?></div>
                                                    <div class="col-sm-3 col-xs-3"><?= ucfirst($re->module_name);?></div>
                                                    <div class="col-sm-3 col-xs-3">
                                                        <select class="form-control" name='<?= $re->modules_obj_id;?>_<?= $re->switch_det_id;?>_api_name'>
                                                            <?php  
                                                                  foreach($api as $ap){  
                                                                      if($ap->api_id == 1) { ?>
                                                                        <option value="<?= $ap->api_id;?>" <?php echo ($ap->api_id == $re->api_id )?"selected=selected":" ";?> ><?= $ap->api_name;?></option>
                                                            <?php     } 
                                                                  }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3 col-xs-3">
                                                        <a href="javascript:void(0);" title="<?php echo ($re->status  == 1)? 'Off':'On';?>">
                                                            <!--<i class="success fa fa-check-circle-o"></i>-->
                                                            <label class="switch switch-sm">
                                                                <input type="checkbox" value="1" name="<?= $re->modules_obj_id;?>_<?= $re->switch_det_id;?>_api_status" <?php echo ($re->status  == 1 || $re->status == "")?"checked=checked":"";?> class="api-switch">
                                                                <span></span>
                                                            </label>
                                                        </a>
                                                    </div>  
                                                </div> 
                                                <?php 
                                            }
                                        }
                                    ?>
                                </div>
                                <?php 
                                    if($i == 0){
                                            echo "<h3>Bus</h3>";
                                       }
                                ?>
                                <div>
                                    <?php
                                       foreach($viw as $re){
                                            if($re->module_id == 6){ ?>
                                                <div class="row padding-3">
                                                    <div class="col-sm-3 col-xs-3"><?= ucfirst($re->modules_obj_name);?></div>
                                                    <div class="col-sm-3 col-xs-3"><?= ucfirst($re->module_name);?></div>
                                                    <div class="col-sm-3 col-xs-3">
                                                        <select class="form-control" name='<?= $re->modules_obj_id;?>_<?= $re->switch_det_id;?>_api_name'>
                                                            <?php  
                                                                  foreach($api as $ap){  
                                                                      if($ap->api_id == 1) { ?>
                                                                        <option value="<?= $ap->api_id;?>" <?php echo ($ap->api_id == $re->api_id )?"selected=selected":" ";?> ><?= $ap->api_name;?></option>
                                                            <?php     } 
                                                                  }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3 col-xs-3">
                                                        <a href="javascript:void(0);" title="<?php echo ($re->status  == 1)? 'Off':'On';?>">
                                                            <!--<i class="success fa fa-check-circle-o"></i>-->
                                                            <label class="switch switch-sm">
                                                                <input type="checkbox" value="1" name="<?= $re->modules_obj_id;?>_<?= $re->switch_det_id;?>_api_status" <?php echo ($re->status  == 1 || $re->status == "")?"checked=checked":"";?> class="api-switch">
                                                                <span></span>
                                                            </label>
                                                        </a>
                                                    </div>  
                                                </div> 
                                                <?php 
                                            }
                                        }
                                    ?>
                                </div>
                            </div>    
                            <div class="row">
                                <div class="col-sm-2 col-xs-4 text-center">
                                    <br/><input type="submit" class="form-control" value="Save" name="save"/>
                                </div>
                            </div>
                            </form>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- END DATATABLE 1 -->
        </div>
    </div>
 </section>
 <script>
    $(".checkapi").change(function(){
            var va = $( ".checkapi" ).is(':checked');
            if(va == false){
                    $( ".api-switch" ).prop('checked',false);
            }else{
                    $( ".api-switch" ).prop('checked',true);
            }            
    });
    $( ".api-switch" ).change(function(){
        var va = $(this).val();
        if(va == 1){
            $(this).attr("value","1");
        }else{
            $(this).attr("value","0");
        }
    });
  </script>  