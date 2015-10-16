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
             <li class="active">My Commission</li>
          </ol> My Commission
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">For the viewing of Commissions</span>
          <!-- Breadcrumb below title-->

        </h3>        
        <div class="row"> <?php   $this->load->view("layout/success_error");?>
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
                                    <?php 
                                        $j = 0;
                                        $i = 0;
                                        $q = 0;
                                        $p = 0;
                                       if($i == 0){
                                            echo "<h3>Recharge</h3>";
                                       }
                                    ?>
                                <div>
                                    <?php
                                       foreach($viw as $re){
                                            if($re->module_id == 1){ ?>
                                                <div class="row padding-3">
                                                    <div class="col-sm-3 col-xs-3"><?= ucfirst($re->modules_obj_name);?></div>
                                                    <div class="col-sm-3 col-xs-3"><?= ucfirst($re->module_name);?></div>
                                                    <div class="col-sm-3 col-xs-3"><?= ucfirst($re->sub_module_name);?></div>
                                                    <div class="col-sm-3 col-xs-3">
                                                        <input type="text" class="form-control val_comm" name="commission-<?= $re->c_detail_id;?>"  value="<?= $re->commission_amt;?>"  onkeyup="validateR(this, '')" ruleset="[^0-9.]" maxlength="20" placeholder="Commission Amount"/>
                                                    </div>
                                                </div> 
                                                <?php 
                                            }
                                        }
                                    ?>
                                </div> 
                                <?php 
                                if($i == 0){
                                        echo "<h3>Utitlity</h3>";
                                   }
                                ?>
                                <div>
                                    <?php
                                       foreach($viw as $re){
                                            if($re->module_id == 2){ ?>
                                                <div class="row padding-3">
                                                    <div class="col-sm-3 col-xs-3"><?= ucfirst($re->modules_obj_name);?></div>
                                                    <div class="col-sm-3 col-xs-3"><?= ucfirst($re->module_name);?></div>
                                                    <div class="col-sm-3 col-xs-3"><?= ucfirst($re->sub_module_name);?></div>
                                                    <div class="col-sm-3 col-xs-3">
                                                        <input type="text" class="form-control val_comm" name="commission-<?= $re->c_detail_id;?>"  value="<?= $re->commission_amt;?>"  onkeyup="validateR(this, '')" ruleset="[^0-9.]" maxlength="20" placeholder="Commission Amount"/>
                                                    </div>
                                                </div> 
                                                <?php 
                                            }
                                        }
                                    ?>
                                </div>   
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
                                                    <div class="col-sm-3 col-xs-3"><?= ucfirst($re->sub_module_name);?></div>
                                                    <div class="col-sm-3 col-xs-3">
                                                        <input type="text" class="form-control val_comm" name="commission-<?= $re->c_detail_id;?>"  value="<?= $re->commission_amt;?>"  onkeyup="validateR(this, '')" ruleset="[^0-9.]" maxlength="20" placeholder="Commission Amount"/>
                                                    </div>
                                                </div> 
                                                <?php 
                                            }
                                        }
                                    ?>
                                </div>
                            </div>    
                            <?php if($this->uri->segment(2) == "my_commission" && $this->session->userdata("my_type") == 1){ ?>
                            <div class="row">
                                <div class="col-sm-2 col-xs-4 text-center">
                                    <br/><input type="submit" class="form-control" value="Save" name="save"/>
                                </div>
                            </div>
                            <?php }?>
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