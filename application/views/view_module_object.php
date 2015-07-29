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
             <li class="active">View Module Object</li>
          </ol> View Module Object
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">Quick View of Module Objects</span>
          <!-- Breadcrumb below title-->

        </h3>
        <div class="row">
            <!-- START DATATABLE 1 -->
               <div class="row">
                  <div class="col-lg-12">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           Module Objects
                            <!--| <small>Zero Configuration</small>-->
                        </div>
                        <div class="panel-body">
                           <table id="datatable1" class="table table-striped table-hover">
                              <thead>
                                 <tr>
                                    <th>Module Name</th>
                                    <th>Sub Module Name</th>
                                    <th>Module Object Name</th>
                                    <!--<th class="sort-numeric">Engine version</th>-->
                                 </tr>
                              </thead>
                              <tbody>
                                  <?php foreach ($view_module as $view){?>
                                        <tr>
                                            <th><?= $view->module_name;?></th>
                                            <th><?= $view->sub_module_name;?></th>
                                            <th><?= $view->modules_obj_name;?></th>
                                         </tr>
                                  <?php }?>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- END DATATABLE 1 -->
        </div>
    </div>
 </section>