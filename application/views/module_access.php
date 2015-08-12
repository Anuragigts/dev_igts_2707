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
             <li class="active">Module Access</li>
          </ol>Module Access
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">For Module Access</span>
          <!-- Breadcrumb below title-->

        </h3>
        <div class="row">
            <?php   $this->load->view("layout/success_error");?>
            <!-- START panel--> 
            <div class="panel panel-default">
<!--                    <div class="panel-heading">
                       Create Commission
                        | <small>Zero Configuration</small>
                    </div>-->
            <div class="panel-body">
                <form role="form" action="" method="post">
                    <div class="row">
                        <?php if($this->session->userdata('dmr') == 1){?>
                         <div class="col-sm-4">
                            <div class="form-group">
                                <div class="col-sm-1">
                                <input type="checkbox" <?php echo ($access->dmr == 1)?"checked=checked":"";?> name="dmr" value="1"/>
                                </div>
                                <div class="col-sm-9">
                                    <label>DMR 
                                        <ul class="padding-left-15">
                                            <li>Add Beneficiary</li>
                                            <li>Add sender</li>
                                            <li>Money Transfer</li>
                                        </ul>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <?php }if($this->session->userdata('recharge') == 1){?>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="col-sm-1">
                                <input type="checkbox" <?php echo ($access->recharge == 1)?"checked=checked":"";?> name="recharge" value="1"/>
                                </div>
                                <div class="col-sm-9">
                                    <label>Recharge
                                        <ul class="padding-left-15">
                                            <li>DATA Card</li>
                                            <li>DTH</li>
                                            <li>Postpaid Mobile</li>
                                            <li>Prepaid Mobile</li>
                                        </ul>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                        <?php if($this->session->userdata('utility') == 1){?>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="col-sm-1">
                                <input type="checkbox" <?php echo ($access->utility == 1)?"checked=checked":"";?> name="utility" value="1"/>
                                </div>
                                <div class="col-sm-5">
                                    <label>Utility Payment
                                        <ul class="padding-left-15">
                                            <li>Electricity</li>
                                            <li>Gas</li>
                                        </ul>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="submit" class="btn btn-sm btn-info" value="Save" name="save">
                        </div>
                    </div>
                    </form>
            <!-- END panel-->
                  </div>
            </div>
        </div>
    </div>
 </section>