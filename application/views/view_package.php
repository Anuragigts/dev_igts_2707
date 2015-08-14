<section>
    <!-- Page content-->
    <div class="content-wrapper">
        <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
              <li><a href="<?php echo base_url();?>dashboard">Dashboard</a></li> 
             <li class="active">View Package</li>
          </ol> View Package
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">For viewing all Packages</span>
          <!-- Breadcrumb below title-->

        </h3>
        <div class="row">
            <!-- START DATATABLE 1 -->
               <div class="row">
                  <div class="col-lg-12">
                        <div class="panel-body">
                            <p class="success"></p>
                            <p class="error"></p>
                           <table id="datatable1" class="table table-striped table-hover">
                              <thead>
                                 <tr>
                                    <th width="6%">S.No.</th>
                                    <th>User Type</th>
                                    <th width="20%">Package Name</th>
                                    <th width="35%">Package Remarks</th>
                                    <th width="15%">Created By</th>
                                    <th>Status</th>
                                 </tr>
                              </thead>
                              <tbody>
                                  <?php 
                                    $i = 1;
                                    foreach ($view_package as $view){?>
                                        <tr>
                                            <th><?= $i++;?></th>
                                            <th><?= $view->user_name_type;?></th>
                                            <th><?= ucfirst($view->package_name);?></th>
                                            <th><?= ucfirst($view->package_remarks);?></th>
                                            <th><?= ucfirst($view->first_name." ".$view->middle_name." ".$view->last_name);?></th>
                                            <th>
                                                <a href="javascript:void(0);" title="<?php echo ($view->status == 0)? 'Activate':'Deactivate';?>">
                                                    <!--<i class="success fa fa-check-circle-o"></i>-->
                                                    <label class="switch switch-sm">
                                                        <input type="checkbox" <?php echo ($view->status == 0)?"":"checked=checked";?> class="checkbox-inline <?php echo ($view->status == 0)?'activate':'deactivate';?>" package="<?= $view->package_id;?>" pkg_name="<?= ucfirst($view->package_name);?>">
                                                        <span></span>
                                                    </label>
                                                </a>
                                                <a href="<?= base_url();?>package/view_package_details/<?= $view->package_id;?>" title="View Complete Details">
                                                    <i class="fa fa-search-plus"></i>
                                                </a>
                                            </th>
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
<script>
    $('.activate').click(function(){
            var pkg         =   $(this).attr("package");
            var pkg_name    =   $(this).attr("pkg_name");
//            var avr = $(".activate").is(':checked') ? 1 : 0;
            var status      =   1;
             $.post('<?=base_url()?>package/package_off_actdeact',
                {'status':status,'pkg':pkg},function(response){
                        if(response == 1){
                               $(".success").html(pkg_name+" has been Activated");
                               $(".error").html("");
                               setTimeout(function(){
                                        location.reload();
                                }, 3000);
                        }
                        else{
                                $(".error").html(pkg_name+" has been not activated");
                                $(".success").html("");
                        }
            });;
    });
    $('.deactivate').click(function(){
            var pkg         =   $(this).attr("package");
            var pkg_name    =   $(this).attr("pkg_name");
            var status      =   0;
             $.post('<?=base_url()?>package/package_off_actdeact',
                {'status':status,'pkg':pkg},function(response){
                        if(response == 1){
                               $(".success").html(pkg_name+" has been Deactivated");
                               $(".error").html("");
                               setTimeout(function(){
                                        location.reload();
                                }, 3000);
                        }
                        else{
                                $(".error").html(pkg_name+" has been not Deactivated");
                                $(".success").html("");
                        }
            });;
    });
</script>