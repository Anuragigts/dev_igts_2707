<section>
    <!-- Page content-->
    <div class="content-wrapper">
        <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
              <li><a href="<?php echo base_url();?>dashboard">Dashboard</a></li> 
             <li class="active">Create Package</li>
          </ol> Create Package
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">For the creation of Package</span>
          <!-- Breadcrumb below title-->

        </h3>
        <div class="row">
            <?php   $this->load->view("layout/success_error");?>
           <div class="col-sm-3"></div>
           <div class="col-sm-6">
            <!-- START panel-->
                  <div class="panel panel-default">
<!--                     <div class="panel-heading">Create Package</div>-->
                       <div class="panel-body">
                           <form role="form" action="" method="post">
                               <div class="form-group">
                                   <label>User Type<span class="red">*</span></label>
                                    <select class="form-control" name="usertype" >
                                      <option value="Select user type"> Select User Type </option>
                                      <?php if(count($usertype) > 0){ 
                                            foreach ($usertype as $val ){ ?>
                                                <option value="<?= $val->user_type_id;?>" <?php  echo set_select('usertype',$val->user_type_id);?>><?= $val->user_type;?></option>
                                            <?php }
                                      }?>
                                    </select>
                                    <span class="red"><?= form_error('usertype');?></span>
                               </div>
                               <div class="form-group">
                                   <label>Package Name<span class="red">*</span></label>
                                   <input type="text" placeholder="Package Name" class="form-control" name="package_name"  value="<?= set_value('package_name');?>" maxlength="100">
                                    <span class="red"><?= form_error('package_name');?></span>
                               </div>
                               <div class="form-group">
                                  <label>Package Remarks<span class="red">*</span></label>
                                  <textarea class="form-control" name="package_remarks" placeholder="Package Remarks" maxlength="500"><?= set_value('package_remarks');?></textarea>
                                  <span class="red"><?= form_error('package_remarks');?></span>
                               </div>
                               <input type="submit" class="btn btn-sm btn-info" value="Create Package" name="create_package">
                           </form>
                       </div>
                  </div>
            </div>
            <div class="col-sm-3"></div>
            <!-- END panel-->
          </div>
    </div>
 </section>