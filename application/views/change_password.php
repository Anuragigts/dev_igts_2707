<section>
    <!-- Page content-->
    <div class="content-wrapper">
        <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
              <li><a href="<?php echo base_url();?>dashboard">Dashboard</a></li> 
             <li class="active">Change Password</li>
          </ol> Change Password
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">For the resetting your Password</span>
          <!-- Breadcrumb below title-->

        </h3>
        <div class="row">
           <?php   $this->load->view("layout/success_error");?> 
           <div class="col-sm-3"></div>
           <div class="col-sm-6">
            <!-- START panel-->
                  <div class="panel panel-default">
                       <div class="panel-body">
                           <form role="form" action="" method="post" id="theform">
                               <div class="form-group">
                                  <label>New Password<span class="red">*</span></label>
                                  <input type="password" placeholder="Password" class="form-control" name="pass" id="strpassword">
                                  <span class="red "><?= form_error('pass');?></span>
                               </div>
                               <div class="form-group">
                                  <label>Confirm Password<span class="red">*</span></label>
                                  <input type="password" placeholder="Confirm Password" class="form-control" name="con_pass">
                                   <span class="red"><?= form_error('con_pass');?></span>
                               </div>
                               <input type="submit" class="btn btn-sm btn-info" value="Change Password" name="change_password">
                           </form>
                       </div>
                  </div>
            </div>
            <div class="col-sm-3"></div>
            <!-- END panel-->
          </div>
    </div>
 </section>