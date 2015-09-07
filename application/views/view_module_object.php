<section>
    <!-- Page content-->
    <div class="content-wrapper">
        <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
              <li><a href="<?php echo base_url();?>dashboard">Dashboard</a></li> 
             <li class="active">View Module Object</li>
          </ol> View Module Object
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">For viewing Module Objects</span>
          <!-- Breadcrumb below title-->

        </h3>
        <div class="row">
            <!-- START DATATABLE 1 -->
               <div class="row">
                  <div class="col-lg-12">
                        <div class="panel-body">
                           <?php   $this->load->view("layout/success_error");?>
                           <table id="datatable1" class="table table-striped table-hover">
                              <thead>
                                 <tr>
                                     <th>S.No.</th>
                                    <th>Module Name</th>
                                    <th>Service Type</th>
                                    <th>Service Name</th>
                                    <?php 
                                    $id =   $this->session->userdata("login_id");
                                    if($id == 1){ ?>
                                    <th>Delete</th>
                                    <?php }?>
                                 </tr>
                              </thead>
                              <tbody>
                                  <?php 
                                        $i  =   1;
                                        foreach ($view_module as $view){?>
                                        <tr>
                                            <th><?= $i++;?></th>
                                            <th><?= ucfirst($view->module_name);?></th>
                                            <th><?= ucfirst($view->sub_module_name);?></th>
                                            <th><?= ucfirst($view->modules_obj_name);?></th>
                                            <?php if($id == 1){ ?>
                                            <th>
                                                <a href="<?=base_url();?>module_object/delete_module_project/<?=$view->modules_obj_id;?>" class="red">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                            </th>
                                            <?php }?>
                                         </tr>
                                  <?php }?>
                              </tbody>
                           </table>
                        </div>
                  </div>
               </div>
               <!-- END DATATABLE 1 -->
        </div>
    </div>
 </section>