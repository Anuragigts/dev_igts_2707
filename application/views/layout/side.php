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
                              <span class="user-block-name">Hello, <?php echo $this->session->userdata('first_name') ;?> <?php echo $this->session->userdata('middle_name') ;?> <?php echo $this->session->userdata('last_name') ;?> </span>
                              <span class="user-block-role"><?php echo $this->session->userdata('user_type');?></span>
                           </div>
                        </div>
                     </div>
                  </li>
                  <!-- END user info-->
                  <!-- Iterates over all sidebar items-->
                  <li class="nav-heading ">
                     <span data-localize="sidebar.heading.HEADER">Main Navigation</span>
                  </li>

                  <li class="dashboard">
					<a href="<?php echo base_url()?>dashboard" title="Dashboard">
                        <em class="fa fa-dashboard "></em>
                        <div class="pull-right label label-info">4</div>
                        <span data-localize="sidebar.nav.DASHBOARD">Dashboard</span>
                     </a>                    
                  </li>  
                  <?php if($this->session->userdata('my_type') != 5){?>
                   <li class="nav-heading ">
                     <span data-localize="sidebar.heading.COMPONENTS">Users</span>
                  </li>
                  <?php if($this->session->userdata('my_type') == 1 ){?>
                  <li class="master_distributor create_master_distributor view_master_distributor edit_master_distributor master_distributor_details module_access">
                     <a href="#master" title="Layouts" data-toggle="collapse">
                        <em class="fa fa-user"></em>
                        <span>Master Distributor</span>
                     </a>
                     <ul id="master" class="nav sidebar-subnav collapse">
                        <li class="sidebar-subnav-header">Master Distributor</li>
                        <li class="create_master_distributor ">
                           <a href="<?=base_url();?>master_distributor/create_master_distributor" title="Create Master Distributor">                               
                              <span>Create</span>
                           </a>
                        </li>
                        <li class="view_master_distributor edit_master_distributor master_distributor_details module_access">
                           <a href="<?=base_url();?>master_distributor/view_master_distributor" title="View Master Distributor">
                              <span>View</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <?php }?>
                  
                  <?php if($this->session->userdata('my_type') == 1 || $this->session->userdata('my_type') == 2){?>
                  <li class="super_distributor view_super_distributor super_distributor_details create_super_distributor edit_super_distributor module_access_super">
                     <a href="#super" title="Layouts" data-toggle="collapse">
                        <em class="fa fa-user"></em>
                        <span>Super Distributor</span>
                     </a>
                     <ul id="super" class="nav sidebar-subnav collapse">
                        <li class="sidebar-subnav-header">Super Distributor</li>
                        <li class="create_super_distributor">
                           <a href="<?= base_url();?>super_distributor/create_super_distributor" title="Create Super Distributor">
                              <span>Create</span>
                           </a>
                        </li>
                        <li class="view_super_distributor edit_super_distributor super_distributor_details module_access_super">
                           <a href="<?= base_url();?>super_distributor/view_super_distributor" title="View Super Distributor">
                              <span>View</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <?php }?>
                   <?php if($this->session->userdata('my_type') == 1 || $this->session->userdata('my_type') == 2 ||  $this->session->userdata('my_type') == 3){?>
                  <li class="distributor create_distributor view_distributor edit_distributor distributor_details module_access_dis">
                     <a href="#dist" title="Layouts" data-toggle="collapse">
                        <em class="fa fa-male"></em>
                        <span>Distributor</span>
                     </a>
                     <ul id="dist" class="nav sidebar-subnav collapse">
                        <li class="sidebar-subnav-header">Distributor</li>
                        <li class="create_distributor">
                           <a href="<?= base_url();?>distributor/create_distributor" title="Create Distributor">
                              <span>Create</span>
                           </a>
                        </li>
                        <li class="view_distributor  edit_distributor distributor_details module_access_dis">
                           <a href="<?= base_url();?>distributor/view_distributor" title="View Distributor">
                              <span>View</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                   <?php }?>
                  <?php if($this->session->userdata('my_type') == 1 || $this->session->userdata('my_type') == 2 ||  $this->session->userdata('my_type') == 3 ||  $this->session->userdata('my_type') == 4){?>
                  <li class="agent create_agent view_agent  edit_agent module_access_agent">
                     <a href="#agent" title="Layouts" data-toggle="collapse">
                        <em class="fa fa-child"></em>
                        <span>Agent</span>
                     </a>
                     <ul id="agent" class="nav sidebar-subnav collapse">
                        <li class="sidebar-subnav-header">Agent</li>
                        <li class="create_agent">
                           <a href="<?= base_url();?>agent/create_agent" title="Create Agent">
                              <span>Create</span>
                           </a>
                        </li>
                        <li class="view_agent edit_agent module_access_agent">
                           <a href="<?= base_url();?>agent/view_agent" title="View Agent">
                              <span>View</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <?php }?>
                  <?php }?>
                   <li class="nav-heading ">
                     <span data-localize="sidebar.heading.COMPONENTS">Services</span>
                  </li>
                   <li class="recharge ">
                     <a href="#recharge" title="Layouts" data-toggle="collapse">
                        <em class="fa fa-mobile"></em>
                        <span>Recharge</span>
                     </a>
                     <ul id="recharge" class="nav sidebar-subnav collapse">
                        <li class="sidebar-subnav-header">Recharge</li>
                        <li class="mobile_recharge ">
                           <a href="<?php echo base_url();?>recharge/mobile_recharge" title="Mobile Recharge">
                              <span>Mobile</span>
                           </a>
                        </li>
                        <li class="dth_recharge ">
                           <a href="<?php echo base_url();?>recharge/dth_recharge" title="DTH Recharge">
                              <span>DTH</span>
                           </a>
                        </li>
                        <li class="recharge_details ">
                           <a href="<?php echo base_url();?>recharge/recharge_details" title="Recharge Details">
                              <span>Details</span>
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
                           <a href="#" title="Electricity Payment">
                              <span>Electricity</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="#" title="Gas Payment">
                              <span>Gas</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="dmr">
                     <a href="#dmr" title="Layouts" data-toggle="collapse">
                        <em class="fa fa-rupee"></em>
                        <span>DMR</span>
                     </a>
                     <ul id="dmr" class="nav sidebar-subnav collapse">
                        <li class="sidebar-subnav-header">DMR</li>

                        <li class="topup ">
                           <a href="<?php echo base_url();?>dmr/topup" title="Topup">
                              <span>Topup</span>
                           </a>
                        </li>
                        <li class="dmrUserSearch ">
                           <a href="<?php echo base_url();?>dmr/dmrUserSearch" title="Money Transfer">
                              <span>Money Transfer</span>
                           </a>
                        </li>
                        <li class="senderList ">
                           <a href="<?php echo base_url();?>dmr/senderList" title="Sender List">
                              <span>Sender List</span>
                           </a>
                        </li>
<!--                        <li class="dmrAgents">
                           <a href="<?php //echo base_url();?>dmr/dmrAgents" title="DMR Agents">
                              <span>DMR Agents</span>
                           </a>
                        </li>-->
                     </ul>
                  </li>
                  <?php if($this->session->userdata('my_type') != 5){?>
                  <li class="nav-heading ">
                     <span data-localize="sidebar.heading.COMPONENTS">Package & Commission</span>
                  </li>
                   <li class="package create_package view_package">
                     <a href="#pack" title="Package" data-toggle="collapse">
                        <em class="fa fa-database"></em>
                        <span>Package</span>
                     </a>
                     <ul id="pack" class="nav sidebar-subnav collapse">
                        <li class="sidebar-subnav-header">Package</li>
                        <li class="create_package">
                           <a href="<?= base_url()?>package/create_package" title="Create Package">
                              <span>Create</span>
                           </a>
                        </li>
                        <li class="view_package">
                           <a href="<?= base_url()?>package/view_package" title="View Package">
                              <span>View</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                   
                   <li class="module_object create_module_object view_module_object">
                     <a href="#services" title="Layouts" data-toggle="collapse">
                        <em class="fa fa-cogs"></em>
                        <span>Services Type</span>
                     </a>
                     <ul id="services" class="nav sidebar-subnav collapse">
                        <li class="sidebar-subnav-header module_object create_module_object">Services Type</li>
                        <li class="create_module_object">
                           <a href="<?= base_url()?>module_object/create_module_object" title="Create Module Object">
                              <span>Create</span>
                           </a>
                        </li>
                        <li class="view_module_object">
                           <a href="<?= base_url()?>module_object/view_module_object" title="View Module Objects">
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
                   <?php }?>
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