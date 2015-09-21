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
             <li class="active">Create Commission</li>
          </ol> Create Commission
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">For the creation of Commissions</span>
          <!-- Breadcrumb below title-->

        </h3>
        <div class="row">
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
                           <div id="accordion">
                                <h3>Recharge</h3>
                                <div>
                                    <p class="success"></p>
                                    <p class="error"></p>
                                    <?php if(count($recharge) > 0){ 
                                            foreach ($recharge as $rec){
                                        ?>
                                        <div class="row padding-3">
                                            <div class="col-sm-3 col-xs-3"><?= ucfirst($rec->modules_obj_name);?></div>
                                            <div class="col-sm-3 col-xs-3"><?= ucfirst($rec->module_name);?></div>
                                            <div class="col-sm-3 col-xs-3"><?= ucfirst($rec->sub_module_name);?></div>
                                            <div class="col-sm-3 col-xs-3">
                                                <input type="text" class="form-control val_comm" name="commission-<?= $rec->modules_obj_id;?>"  value="<?= set_value('commission-'.$rec->modules_obj_id);?>"  onkeyup="validateR(this, '')" ruleset="[^0-9.]" maxlength="20" placeholder="Commission Amount"/>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <!--- END RECHARGE --->
                                <!--- START UTILITY --->
                                <h3>Utility</h3>
                                <div>
                                  <?php if(count($utility) > 0){ 
                                            foreach ($utility as $ut){
                                        ?>
                                        <div class="row padding-3">
                                            <div class="col-sm-3 col-xs-3"><?= $ut->modules_obj_name;?></div>
                                            <div class="col-sm-3 col-xs-3"><?= $ut->module_name;?></div>
                                            <div class="col-sm-3 col-xs-3"><?= $ut->sub_module_name;?></div>
                                            <div class="col-sm-3 col-xs-3">
                                                <input type="text" class="form-control" name="commission-<?=$ut->modules_obj_id;?>"  value="<?= set_value('commission-'.$ut->modules_obj_id);?>"  onkeyup="validateR(this, '')" ruleset="[^0-9.]" maxlength="20" placeholder="Commission Amount"/>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <!--- END UTILITY --->
                                <!--- START DMR --->
                                <h3>DMR</h3>
                                <div>
                                  <?php if(count($dmr) > 0){ 
                                            foreach ($dmr as $dr){
                                        ?>
                                        <div class="row padding-3">
                                            <div class="col-sm-3 col-xs-3"><?= $dr->modules_obj_name;?></div>
                                            <div class="col-sm-3 col-xs-3"><?= $dr->module_name;?></div>
                                            <div class="col-sm-3 col-xs-3"><?= $dr->sub_module_name;?></div>
                                            <div class="col-sm-3 col-xs-3">
                                                <input type="text" class="form-control" name="commission-<?=$dr->modules_obj_id;?>"   value="<?= set_value('commission-'.$dr->modules_obj_id);?>"  onkeyup="validateR(this, '')" ruleset="[^0-9.]" maxlength="20" placeholder="Commission Amount"/>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <!--- END DMR --->
                              </div>  
                            
                                <div class="row">
                                    <div class="col-sm-2 col-xs-4 text-center">
                                        <input type="submit" class="form-control" value="Save" name="save"/>
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
<!--
  <script>
  $(function() {
    $( "#accordion" ).accordion();
  });
  </script>         -->