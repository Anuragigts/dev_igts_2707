<section>
    <!-- Page content-->
    <div class="content-wrapper">
        <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
              <li><a href="<?php echo base_url();?>dashboard">Dashboard</a></li> 
             <li class="active">Send Request</li>
          </ol>Send Request
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">For Send Request</span>
          <!-- Breadcrumb below title-->

        </h3>
        <div class="row">
                 <?php   $this->load->view("layout/success_error");?>
            <!-- START DATATABLE 1 -->
               <div class="row">
                    <div class="col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form method="post" action="">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Amount<span class="red">*</span></label>
                                                <input type="text" placeholder="Amount" class="form-control" name="amount" value="<?= set_value('amount');?>" onkeyup="validateR(this, '')" ruleset="[^0-9]" maxlength="10">
                                                <span class="red"><?= form_error('amount');?></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Date<span class="red">*</span></label>
                                                <input type="text" placeholder="mm/dd/yyyy" class="form-control datepicker" name="date" value="<?= set_value('date');?>">
                                                <span class="red"><?= form_error('date');?></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Bank Name<span class="red">*</span></label>
                                                <input type="text" placeholder="Bank Name" class="form-control" name="bank_name" value="<?= set_value('bank_name');?>">
                                                <span class="red"><?= form_error('bank_name');?></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Payment Type<span class="red">*</span></label>
                                                <select  class="form-control" name="ptype">
                                                    <option value="">Select Payment Type</option>
                                                    <option value="1">Draft</option>
                                                    <option value="2">Cash</option>
                                                    <option value="3">Cheque</option>
                                                    <option value="4">NEFT</option>
                                                    <option value="5">Online</option>
                                                </select>
                                                <span class="red"><?= form_error('ptype');?></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Cheque No. (or) Transaction No.</label>
                                                <input type="text" placeholder="Cheque No. (or) Transaction No." class="form-control" name="cheque" value="<?= set_value('cheque');?>">
                                                <span class="red"><?= form_error('cheque');?></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="pull-left">
                                                <input type="submit" class="btn btn-sm btn-info " name="send" value="Submit" />
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
               </div>
               <!-- END DATATABLE 1 -->
        </div>
 </section>