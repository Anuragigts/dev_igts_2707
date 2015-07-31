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
             <li class="active">View Distributors</li>
          </ol> View Distributors
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">For viewing Distributors</span>
          <!-- Breadcrumb below title-->

        </h3>
        <div class="row">
            <!-- START DATATABLE 1 -->
               <div class="row">
                  <div class="col-lg-12">
                        <div class="panel-body">
                           <table id="datatable1" class="table table-striped table-hover">
                              <thead>
                                 <tr>
                                    <th>Package Name</th>
                                    <th>Name</th>
                                    <th width="20%">Mobile No.</th>
                                    <th width="35%">Email</th>
                                 </tr>
                              </thead>
                              <tbody>
                                  <?php foreach ($view_dis as $view){?>
                                        <tr>
                                           
                                            <th><?= ucfirst($view->package_name);?></th>
                                            <th><?= ucfirst($view->first_name." ".$view->middle_name." ".$view->last_name);?></th>
                                            <th><?= $view->mobile;?></th>
                                            <th><?= ucfirst($view->login_email);?></th>
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