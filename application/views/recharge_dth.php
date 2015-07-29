<section>
         <!-- Page content-->
    <div class="content-wrapper">
       <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
             <li><a href="<?php echo base_url();?>dashboard">Dashboard</a>
             </li>                  
             <li class="active">Recharge</li>                 
          </ol>Mobile
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">For mobile recharge</span>
          <!-- Breadcrumb below title-->
       </h3>
       <!-- START widgets box-->
       
       <div class="row">
           <div class="col-lg-6">
                  <!-- START panel tab-->
                  <div role="tabpanel" class="panel panel-transparent">
                     <!-- Nav tabs-->
                     <ul role="tablist" class="nav nav-tabs nav-justified">
                        <li role="presentation" >
                           <a href="<?php echo base_url();?>recharge/mobile_recharge"  class="bb0">
                              <em class="fa fa-mobile-phone fa-fw"></em>Mobile</a>
                        </li>
                        <li role="presentation " class="active">
                           <a href="<?php echo base_url();?>recharge/dth_recharge#dth_tab" aria-controls="home" role="tab" data-toggle="tab" class="bb0 ">
                              <em class="fa fa-rss fa-fw"></em>DTH</a>
                        </li>
                       
                     </ul>
                     <!-- Tab panes-->
                     <div class="tab-content p0 bg-white">                        
                        <div id="dth_tab" role="tabpanel" class="tab-pane active">
                           <!-- START table responsive-->
                           DTH
                           <!-- END table responsive-->
                          
                        </div>
                     </div>
                  </div>
                  <!-- END panel tab-->
               </div>
       </div>            
    </div>
 </section>