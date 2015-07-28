<aside class="aside">
         <!-- START Sidebar (left)-->
         <div class="aside-inner">
            <nav data-sidebar-anyclick-close="" class="sidebar">
               <!-- START sidebar nav-->
               <ul class="nav">
                  <!-- START user info-->
                  <li class="has-user-block">
                     <div id="user-block" class="collapse">
                        <div class="item user-block">
                           <!-- User picture-->
                           <div class="user-block-picture">
                              <div class="user-block-status">
                                 <img src="<?php echo $this->config->item('assets_url') ?>app/img/user/02.jpg" alt="Avatar" width="60" height="60" class="img-thumbnail img-circle">
                                 <div class="circle circle-success circle-lg"></div>
                              </div>
                           </div>
                           <!-- Name and Job-->
                           <div class="user-block-info">
                              <span class="user-block-name">Hello, Mike</span>
                              <span class="user-block-role">Designer</span>
                           </div>
                        </div>
                     </div>
                  </li>
                  <!-- END user info-->
                  <!-- Iterates over all sidebar items-->
                  <li class="nav-heading ">
                     <span data-localize="sidebar.heading.HEADER">Main Navigation</span>
                  </li>
                  <li class="active ">
                     <a href="<?php echo base_url()?>dashboard" title="Dashboard">
                        <em class="fa fa-dashboard "></em>
                        <div class="pull-right label label-info">4</div>
                        <span data-localize="sidebar.nav.DASHBOARD">Dashboard</span>
                     </a>                    
                  </li>  
                   <li class="nav-heading ">
                     <span data-localize="sidebar.heading.COMPONENTS">Users</span>
                  </li>
                  <li class=" ">
                     <a href="#master" title="Layouts" data-toggle="collapse">
                        <em class="fa fa-user"></em>
                        <span>Master Distributor</span>
                     </a>
                     <ul id="master" class="nav sidebar-subnav collapse">
                        <li class="sidebar-subnav-header">Master Distributor</li>
                        <li class=" ">
                           <a href="#" title="Horizontal">                               
                              <span>Create</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="#" title="Horizontal">
                              <span>View</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                 
                  <li class=" ">
                     <a href="#super" title="Layouts" data-toggle="collapse">
                        <em class="fa fa-user"></em>
                        <span>Super Distributor</span>
                     </a>
                     <ul id="super" class="nav sidebar-subnav collapse">
                        <li class="sidebar-subnav-header">Super Distributor</li>
                        <li class=" ">
                           <a href="#" title="Horizontal">
                              <span>Create</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="#" title="Horizontal">
                              <span>View</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class=" ">
                     <a href="#dist" title="Layouts" data-toggle="collapse">
                        <em class="fa fa-male"></em>
                        <span>Distributor</span>
                     </a>
                     <ul id="dist" class="nav sidebar-subnav collapse">
                        <li class="sidebar-subnav-header">Distributor</li>
                        <li class=" ">
                           <a href="#" title="Horizontal">
                              <span>Create</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="#" title="Horizontal">
                              <span>View</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class=" ">
                     <a href="#agent" title="Layouts" data-toggle="collapse">
                        <em class="fa fa-child"></em>
                        <span>Agent</span>
                     </a>
                     <ul id="agent" class="nav sidebar-subnav collapse">
                        <li class="sidebar-subnav-header">Agent</li>
                        <li class=" ">
                           <a href="#" title="Horizontal">
                              <span>Create</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="#" title="Horizontal">
                              <span>View</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="nav-heading ">
                     <span data-localize="sidebar.heading.COMPONENTS">Package & Commission</span>
                  </li>
                   <li class=" ">
                     <a href="#pack" title="Layouts" data-toggle="collapse">
                        <em class="fa fa-database"></em>
                        <span>Package</span>
                     </a>
                     <ul id="pack" class="nav sidebar-subnav collapse">
                        <li class="sidebar-subnav-header">Package</li>
                        <li class=" ">
                           <a href="#" title="Horizontal">
                              <span>Create</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="#" title="Horizontal">
                              <span>View</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                   <li class=" ">
                     <a href="#services" title="Layouts" data-toggle="collapse">
                        <em class="fa fa-cogs"></em>
                        <span>Services Type</span>
                     </a>
                     <ul id="services" class="nav sidebar-subnav collapse">
                        <li class="sidebar-subnav-header">Services Type</li>
                        <li class=" ">
                           <a href="#" title="Horizontal">
                              <span>Create</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="#" title="Horizontal">
                              <span>View</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class=" ">
                     <a href="#" title="View Modules">
                         <em class="fa fa-cubes"></em>                        
                        <span data-localize="sidebar.nav.DASHBOARD">View Modules</span>
                     </a>                    
                  </li>  
                  
                   <li class="nav-heading ">
                     <span data-localize="sidebar.heading.COMPONENTS">Services</span>
                  </li>
                   <li class=" ">
                     <a href="#recharge" title="Layouts" data-toggle="collapse">
                        <em class="fa fa-mobile"></em>
                        <span>Recharge</span>
                     </a>
                     <ul id="recharge" class="nav sidebar-subnav collapse">
                        <li class="sidebar-subnav-header">Recharge</li>
                        <li class=" ">
                           <a href="#" title="Horizontal">
                              <span>Mobile</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="#" title="Horizontal">
                              <span>DTH</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class=" ">
                     <a href="#utility" title="Layouts" data-toggle="collapse">
                        <em class="fa fa-plug"></em>
                        <span>Utility</span>
                     </a>
                     <ul id="utility" class="nav sidebar-subnav collapse">
                        <li class="sidebar-subnav-header">Utility</li>
                        <li class=" ">
                           <a href="#" title="Horizontal">
                              <span>Electricity</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="#" title="Horizontal">
                              <span>Gas</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class=" ">
                     <a href="#dmr" title="Layouts" data-toggle="collapse">
                        <em class="fa fa-rupee"></em>
                        <span>DMR</span>
                     </a>
                     <ul id="dmr" class="nav sidebar-subnav collapse">
                        <li class="sidebar-subnav-header">DMR</li>
                        <li class=" ">
                           <a href="#" title="Horizontal">
                              <span>Register For DMR</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="#" title="Horizontal">
                              <span>Add Beneficiary</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="#" title="Horizontal">
                              <span>Money Transfer</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  
                  <li class="nav-heading ">
                     <span data-localize="sidebar.heading.COMPONENTS">Settings</span>
                  </li>
                  <li class=" ">
                     <a href="#" title="Profile">
                         <em class="fa fa-file-picture-o"></em>                        
                        <span data-localize="sidebar.nav.DASHBOARD">Profile</span>
                     </a>                    
                  </li>  
                  <li class=" ">
                     <a href="#" title="Change Password">
                         <em class="fa fa-gavel"></em>                        
                        <span data-localize="sidebar.nav.DASHBOARD">Change Password</span>
                     </a>                    
                  </li>  
                   <li class=" ">
                     <a href="#" title="Log-Out">
                         <em class="fa fa-sign-out"></em>                        
                        <span data-localize="sidebar.nav.DASHBOARD">Log-Out</span>
                     </a>                    
                  </li>  
                  
                  
               </ul>
               <!-- END sidebar nav-->
            </nav>
         </div>
         <!-- END Sidebar (left)-->
      </aside>