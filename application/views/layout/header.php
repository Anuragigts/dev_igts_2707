<header class="topnavbar-wrapper">
         <!-- START Top Navbar-->
         <nav role="navigation" class="navbar topnavbar">
            <!-- START navbar header-->
            <div class="navbar-header">
               <a href="<?php echo base_url()?>dashboard" class="navbar-brand">
                  <div class="brand-logo">
                     <img src="<?php echo $this->config->item('assets_url') ?>app/img/logo.png" alt="App Logo" class="img-responsive">
                  </div>
                  <div class="brand-logo-collapsed">
                     <img src="<?php echo $this->config->item('assets_url') ?>app/img/logo-single.png" alt="App Logo" class="img-responsive">
                  </div>
               </a>
            </div>
            <!-- END navbar header-->
            <!-- START Nav wrapper-->
            <div class="nav-wrapper">
               <!-- START Left navbar-->
               <ul class="nav navbar-nav">
                 <li>                    
                     <!-- Button to show/hide the sidebar on mobile. Visible on mobile only.-->
                     <a href="#" data-toggle-state="aside-toggled" data-no-persist="true" class="visible-xs sidebar-toggle">
                        <em class="fa fa-navicon"></em>
                     </a>
                  </li>
                  <!-- START User avatar toggle-->
                  <li>
                     <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                     <a id="user-block-toggle" href="#user-block" data-toggle="collapse">
                        <em class="icon-user"></em>
                     </a>
                  </li>
                  <!-- END User avatar toggle-->
                  <!-- START lock screen-->
                  <li>
                     <a href="javascript:void(0);" >
                         <b><?php echo $this->session->userdata('user_type');?> [ <?php echo $this->session->userdata('first_name') ;?> <?php echo $this->session->userdata('middle_name') ;?> <?php echo $this->session->userdata('last_name') ;?> ]</b>
                     </a>
                  </li>
                  <!-- END lock screen-->
               </ul>
               <!-- END Left navbar-->
             
               <!-- START Right Navbar-->
               <ul class="nav navbar-nav navbar-right">
                   <li class="visible-lg">
                      <button class='btn btn-labeled btn-warning' style="margin-top: 16px;">
                        <?php 
                        date_default_timezone_set("Asia/Kolkata"); 
                        echo date('d/m/Y - h:i:s');?>
                      </button>
                  </li>
                   <?php if($this->session->userdata('my_type') == 1 ){?>
                  <li class="visible-lg">
                      <button class='btn btn-labeled btn-success' style="margin-top: 16px;">
                          <b>Recharge Balance</b> : <span id="phy" class="phy"></span>
                      </button>
                  </li>
                  
                   <?php }else{?>
                  
                  <li class="visible-lg">
                      <button class='btn btn-labeled btn-success' style="margin-top: 16px;">
                          <b>Main Balance</b> : <span class="vamt">0.00</span>
                      </button>
                  </li>
                   <?php }?>
                   
                  <li class="visible-lg">
                     <a href="#" data-toggle-fullscreen="">
                        <em class="fa fa-expand"></em>
                     </a>
                  </li>
                 
                  <li>
                      <a href="<?= base_url();?>dashboard/logout" title="Logout">
                        <em class="fa fa-sign-out"></em>
                     </a>
                  </li>
                  <!-- END Contacts menu-->
               </ul>
               <!-- END Right Navbar-->
            </div>
            <!-- END Nav wrapper-->
            
         </nav>
         <!-- END Top Navbar-->
      </header>