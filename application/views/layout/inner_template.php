<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <meta name="description" content="<?php echo $metadesc;?>">
   <meta name="keywords" content="<?php echo $metakeyword;?>">
   <meta name="author" content="iGravitas Technosoft India Pvt. Ltd.">
   <title><?php echo $title;?></title>
   <!-- =============== VENDOR STYLES ===============-->
   <!-- FONT AWESOME-->
   <link rel="stylesheet" href="<?php echo $this->config->item('assets_url') ?>vendor/fontawesome/css/font-awesome.min.css">
   <!-- SIMPLE LINE ICONS-->
   <link rel="stylesheet" href="<?php echo $this->config->item('assets_url') ?>vendor/simple-line-icons/css/simple-line-icons.css">
   <!-- ANIMATE.CSS-->
   <link rel="stylesheet" href="<?php echo $this->config->item('assets_url') ?>vendor/animate.css/animate.min.css">
   <!-- WHIRL (spinners)-->
   <link rel="stylesheet" href="<?php echo $this->config->item('assets_url') ?>vendor/whirl/dist/whirl.css">
   <!-- =============== PAGE VENDOR STYLES ===============-->
   <!-- WEATHER ICONS-->
   <link rel="stylesheet" href="<?php echo $this->config->item('assets_url') ?>vendor/weather-icons/css/weather-icons.min.css">
   <!-- =============== BOOTSTRAP STYLES ===============-->
   <link rel="stylesheet" href="<?php echo $this->config->item('assets_url') ?>app/css/bootstrap.css" id="bscss">
   <!-- =============== APP STYLES ===============-->
   <link rel="stylesheet" href="<?php echo $this->config->item('assets_url') ?>app/css/app.css" id="maincss">
</head>

<body>
   <div class="wrapper">
      <!-- top navbar-->
      <header class="topnavbar-wrapper">
         <!-- START Top Navbar-->
         <nav role="navigation" class="navbar topnavbar">
            <!-- START navbar header-->
            <div class="navbar-header">
               <a href="#/" class="navbar-brand">
                  <div class="brand-logo">
                     <img src="img/logo.png" alt="App Logo" class="img-responsive">
                  </div>
                  <div class="brand-logo-collapsed">
                     <img src="img/logo-single.png" alt="App Logo" class="img-responsive">
                  </div>
               </a>
            </div>
            <!-- END navbar header-->
            <!-- START Nav wrapper-->
            <div class="nav-wrapper">
               <!-- START Left navbar-->
               <ul class="nav navbar-nav">
                  <li>
                     <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                     <a href="#" data-toggle-state="aside-collapsed" class="hidden-xs">
                        <em class="fa fa-navicon"></em>
                     </a>
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
                     <a href="lock.html" title="Lock screen">
                        <em class="icon-lock"></em>
                     </a>
                  </li>
                  <!-- END lock screen-->
               </ul>
               <!-- END Left navbar-->
               <!-- START Right Navbar-->
               <ul class="nav navbar-nav navbar-right">
                  <!-- Search icon-->
                  <li>
                     <a href="#" data-search-open="">
                        <em class="icon-magnifier"></em>
                     </a>
                  </li>
                  <!-- Fullscreen (only desktops)-->
                  <li class="visible-lg">
                     <a href="#" data-toggle-fullscreen="">
                        <em class="fa fa-expand"></em>
                     </a>
                  </li>
                  <!-- START Alert menu-->
                  <li class="dropdown dropdown-list">
                     <a href="#" data-toggle="dropdown">
                        <em class="icon-bell"></em>
                        <div class="label label-danger">11</div>
                     </a>
                     <!-- START Dropdown menu-->
                     <ul class="dropdown-menu animated flipInX">
                        <li>
                           <!-- START list group-->
                           <div class="list-group">
                              <!-- list item-->
                              <a href="#" class="list-group-item">
                                 <div class="media-box">
                                    <div class="pull-left">
                                       <em class="fa fa-twitter fa-2x text-info"></em>
                                    </div>
                                    <div class="media-box-body clearfix">
                                       <p class="m0">New followers</p>
                                       <p class="m0 text-muted">
                                          <small>1 new follower</small>
                                       </p>
                                    </div>
                                 </div>
                              </a>
                              <!-- list item-->
                              <a href="#" class="list-group-item">
                                 <div class="media-box">
                                    <div class="pull-left">
                                       <em class="fa fa-envelope fa-2x text-warning"></em>
                                    </div>
                                    <div class="media-box-body clearfix">
                                       <p class="m0">New e-mails</p>
                                       <p class="m0 text-muted">
                                          <small>You have 10 new emails</small>
                                       </p>
                                    </div>
                                 </div>
                              </a>
                              <!-- list item-->
                              <a href="#" class="list-group-item">
                                 <div class="media-box">
                                    <div class="pull-left">
                                       <em class="fa fa-tasks fa-2x text-success"></em>
                                    </div>
                                    <div class="media-box-body clearfix">
                                       <p class="m0">Pending Tasks</p>
                                       <p class="m0 text-muted">
                                          <small>11 pending task</small>
                                       </p>
                                    </div>
                                 </div>
                              </a>
                              <!-- last list item -->
                              <a href="#" class="list-group-item">
                                 <small>More notifications</small>
                                 <span class="label label-danger pull-right">14</span>
                              </a>
                           </div>
                           <!-- END list group-->
                        </li>
                     </ul>
                     <!-- END Dropdown menu-->
                  </li>
                  <!-- END Alert menu-->
                  <!-- START Contacts button-->
                  <li>
                     <a href="#" data-toggle-state="offsidebar-open" data-no-persist="true">
                        <em class="icon-notebook"></em>
                     </a>
                  </li>
                  <!-- END Contacts menu-->
               </ul>
               <!-- END Right Navbar-->
            </div>
            <!-- END Nav wrapper-->
            <!-- START Search form-->
            <form role="search" action="search.html" class="navbar-form">
               <div class="form-group has-feedback">
                  <input type="text" placeholder="Type and hit enter ..." class="form-control">
                  <div data-search-dismiss="" class="fa fa-times form-control-feedback"></div>
               </div>
               <button type="submit" class="hidden btn btn-default">Submit</button>
            </form>
            <!-- END Search form-->
         </nav>
         <!-- END Top Navbar-->
      </header>
      <!-- sidebar-->
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
                                 <img src="img/user/02.jpg" alt="Avatar" width="60" height="60" class="img-thumbnail img-circle">
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
                  <li class=" ">
                     <a href="#dashboard" title="Dashboard" data-toggle="collapse">
                        <em class="icon-speedometer"></em>
                        <div class="pull-right label label-info">3</div>
                        <span data-localize="sidebar.nav.DASHBOARD">Dashboard</span>
                     </a>
                     <ul id="dashboard" class="nav sidebar-subnav collapse">
                        <li class="sidebar-subnav-header">Dashboard</li>
                        <li class=" ">
                           <a href="dashboard.html" title="Dashboard v1">
                              <span>Dashboard v1</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="dashboard_v2.html" title="Dashboard v2">
                              <span>Dashboard v2</span>
                           </a>
                        </li>
                        <li class=" active">
                           <a href="dashboard_v3.html" title="Dashboard v3">
                              <span>Dashboard v3</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class=" ">
                     <a href="widgets.html" title="Widgets">
                        <em class="icon-grid"></em>
                        <div class="pull-right label label-success">30</div>
                        <span data-localize="sidebar.nav.WIDGETS">Widgets</span>
                     </a>
                  </li>
                  <li class=" ">
                     <a href="#layout" title="Layouts" data-toggle="collapse">
                        <em class="icon-layers"></em>
                        <span>Layouts</span>
                     </a>
                     <ul id="layout" class="nav sidebar-subnav collapse">
                        <li class="sidebar-subnav-header">Layouts</li>
                        <li class=" ">
                           <a href="dashboard_h.html" title="Horizontal">
                              <span>Horizontal</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="nav-heading ">
                     <span data-localize="sidebar.heading.COMPONENTS">Components</span>
                  </li>
                  <li class=" ">
                     <a href="#elements" title="Elements" data-toggle="collapse">
                        <em class="icon-chemistry"></em>
                        <span data-localize="sidebar.nav.element.ELEMENTS">Elements</span>
                     </a>
                     <ul id="elements" class="nav sidebar-subnav collapse">
                        <li class="sidebar-subnav-header">Elements</li>
                        <li class=" ">
                           <a href="buttons.html" title="Buttons">
                              <span data-localize="sidebar.nav.element.BUTTON">Buttons</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="notifications.html" title="Notifications">
                              <span data-localize="sidebar.nav.element.NOTIFICATION">Notifications</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="sweetalert.html" title="Sweet Alert">
                              <div class="pull-right label label-purple">new</div>
                              <span>Sweet Alert</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="tour.html" title="Tour">
                              <div class="pull-right label label-purple">new</div>
                              <span>Tour</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="carousel.html" title="Carousel">
                              <span data-localize="sidebar.nav.element.INTERACTION">Carousel</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="spinners.html" title="Spinners">
                              <span data-localize="sidebar.nav.element.SPINNER">Spinners</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="animations.html" title="Animations">
                              <span data-localize="sidebar.nav.element.ANIMATION">Animations</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="dropdown-animations.html" title="Dropdown">
                              <span data-localize="sidebar.nav.element.DROPDOWN">Dropdown</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="nestable.html" title="Nestable">
                              <span>Nestable</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="sortable.html" title="Sortable">
                              <span>Sortable</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="panels.html" title="Panels">
                              <span data-localize="sidebar.nav.element.PANEL">Panels</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="portlets.html" title="Portlets">
                              <span data-localize="sidebar.nav.element.PORTLET">Portlets</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="grid.html" title="Grid">
                              <span data-localize="sidebar.nav.element.GRID">Grid</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="grid-masonry.html" title="Grid Masonry">
                              <span data-localize="sidebar.nav.element.GRID_MASONRY">Grid Masonry</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="typo.html" title="Typography">
                              <span data-localize="sidebar.nav.element.TYPO">Typography</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="icons-font.html" title="Font Icons">
                              <div class="pull-right label label-success">+400</div>
                              <span data-localize="sidebar.nav.element.FONT_ICON">Font Icons</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="icons-weather.html" title="Weather Icons">
                              <div class="pull-right label label-success">+100</div>
                              <span data-localize="sidebar.nav.element.WEATHER_ICON">Weather Icons</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="colors.html" title="Colors">
                              <span data-localize="sidebar.nav.element.COLOR">Colors</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class=" ">
                     <a href="#forms" title="Forms" data-toggle="collapse">
                        <em class="icon-note"></em>
                        <span data-localize="sidebar.nav.form.FORM">Forms</span>
                     </a>
                     <ul id="forms" class="nav sidebar-subnav collapse">
                        <li class="sidebar-subnav-header">Forms</li>
                        <li class=" ">
                           <a href="form-standard.html" title="Standard">
                              <span data-localize="sidebar.nav.form.STANDARD">Standard</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="form-extended.html" title="Extended">
                              <span data-localize="sidebar.nav.form.EXTENDED">Extended</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="form-validation.html" title="Validation">
                              <span data-localize="sidebar.nav.form.VALIDATION">Validation</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="form-wizard.html" title="Wizard">
                              <span>Wizard</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="form-upload.html" title="Upload">
                              <span>Upload</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="form-xeditable.html" title="xEditable">
                              <span>xEditable</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class=" ">
                     <a href="#charts" title="Charts" data-toggle="collapse">
                        <em class="icon-graph"></em>
                        <span data-localize="sidebar.nav.chart.CHART">Charts</span>
                     </a>
                     <ul id="charts" class="nav sidebar-subnav collapse">
                        <li class="sidebar-subnav-header">Charts</li>
                        <li class=" ">
                           <a href="chart-flot.html" title="Flot">
                              <span data-localize="sidebar.nav.chart.FLOT">Flot</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="chart-radial.html" title="Radial">
                              <span data-localize="sidebar.nav.chart.RADIAL">Radial</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="chart-js.html" title="Chart JS">
                              <span>Chart JS</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="chart-rickshaw.html" title="Rickshaw">
                              <span>Rickshaw</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="chart-morris.html" title="MorrisJS">
                              <span>MorrisJS</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="chart-chartist.html" title="Chartist">
                              <span>Chartist</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class=" ">
                     <a href="#tables" title="Tables" data-toggle="collapse">
                        <em class="icon-grid"></em>
                        <span data-localize="sidebar.nav.table.TABLE">Tables</span>
                     </a>
                     <ul id="tables" class="nav sidebar-subnav collapse">
                        <li class="sidebar-subnav-header">Tables</li>
                        <li class=" ">
                           <a href="table-standard.html" title="Standard">
                              <span data-localize="sidebar.nav.table.STANDARD">Standard</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="table-extended.html" title="Extended">
                              <span data-localize="sidebar.nav.table.EXTENDED">Extended</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="table-datatable.html" title="DataTables">
                              <span data-localize="sidebar.nav.table.DATATABLE">DataTables</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="table-jqgrid.html" title="jqGrid">
                              <span>jqGrid</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class=" ">
                     <a href="#maps" title="Maps" data-toggle="collapse">
                        <em class="icon-map"></em>
                        <span data-localize="sidebar.nav.map.MAP">Maps</span>
                     </a>
                     <ul id="maps" class="nav sidebar-subnav collapse">
                        <li class="sidebar-subnav-header">Maps</li>
                        <li class=" ">
                           <a href="maps-google.html" title="Google Maps">
                              <span data-localize="sidebar.nav.map.GOOGLE">Google Maps</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="maps-vector.html" title="Vector Maps">
                              <span data-localize="sidebar.nav.map.VECTOR">Vector Maps</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="nav-heading ">
                     <span data-localize="sidebar.heading.MORE">More</span>
                  </li>
                  <li class=" ">
                     <a href="#pages" title="Pages" data-toggle="collapse">
                        <em class="icon-doc"></em>
                        <span data-localize="sidebar.nav.pages.PAGES">Pages</span>
                     </a>
                     <ul id="pages" class="nav sidebar-subnav collapse">
                        <li class="sidebar-subnav-header">Pages</li>
                        <li class=" ">
                           <a href="login.html" title="Login">
                              <span data-localize="sidebar.nav.pages.LOGIN">Login</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="register.html" title="Sign up">
                              <span data-localize="sidebar.nav.pages.REGISTER">Sign up</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="recover.html" title="Recover Password">
                              <span data-localize="sidebar.nav.pages.RECOVER">Recover Password</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="lock.html" title="Lock">
                              <span data-localize="sidebar.nav.pages.LOCK">Lock</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="template.html" title="Starter Template">
                              <span data-localize="sidebar.nav.pages.STARTER">Starter Template</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="404.html" title="404">
                              <span>404</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class=" ">
                     <a href="#extras" title="Extras" data-toggle="collapse">
                        <em class="icon-cup"></em>
                        <div class="pull-right label label-success">new</div>
                        <span data-localize="sidebar.nav.extra.EXTRA">Extras</span>
                     </a>
                     <ul id="extras" class="nav sidebar-subnav collapse">
                        <li class="sidebar-subnav-header">Extras</li>
                        <li class=" ">
                           <a href="#blog" title="Blog" data-toggle="collapse">
                              <em class="fa fa-angle-right"></em>
                              <div class="pull-right label label-success">new</div>
                              <span>Blog</span>
                           </a>
                           <ul id="blog" class="nav sidebar-subnav collapse">
                              <li class="sidebar-subnav-header">Blog</li>
                              <li class=" ">
                                 <a href="blog.html" title="List">
                                    <span>List</span>
                                 </a>
                              </li>
                              <li class=" ">
                                 <a href="blog-post.html" title="Post">
                                    <span>Post</span>
                                 </a>
                              </li>
                              <li class=" ">
                                 <a href="blog-articles.html" title="Articles">
                                    <span>Articles</span>
                                 </a>
                              </li>
                              <li class=" ">
                                 <a href="blog-article-view.html" title="Article View">
                                    <span>Article View</span>
                                 </a>
                              </li>
                           </ul>
                        </li>
                        <li class=" ">
                           <a href="#ecommerce" title="eCommerce" data-toggle="collapse">
                              <em class="fa fa-angle-right"></em>
                              <div class="pull-right label label-success">new</div>
                              <span>eCommerce</span>
                           </a>
                           <ul id="ecommerce" class="nav sidebar-subnav collapse">
                              <li class="sidebar-subnav-header">eCommerce</li>
                              <li class=" ">
                                 <a href="ecommerce-orders.html" title="Orders">
                                    <div class="pull-right label label-info">10</div>
                                    <span>Orders</span>
                                 </a>
                              </li>
                              <li class=" ">
                                 <a href="ecommerce-order-view.html" title="Order View">
                                    <span>Order View</span>
                                 </a>
                              </li>
                              <li class=" ">
                                 <a href="ecommerce-products.html" title="Products">
                                    <span>Products</span>
                                 </a>
                              </li>
                              <li class=" ">
                                 <a href="ecommerce-product-view.html" title="Product View">
                                    <span>Product View</span>
                                 </a>
                              </li>
                           </ul>
                        </li>
                        <li class=" ">
                           <a href="#forum" title="Forum" data-toggle="collapse">
                              <em class="fa fa-angle-right"></em>
                              <div class="pull-right label label-success">new</div>
                              <span>Forum</span>
                           </a>
                           <ul id="forum" class="nav sidebar-subnav collapse">
                              <li class="sidebar-subnav-header">Forum</li>
                              <li class=" ">
                                 <a href="forum-categories.html" title="Categories">
                                    <span>Categories</span>
                                 </a>
                              </li>
                              <li class=" ">
                                 <a href="forum-topics.html" title="Topics">
                                    <span>Topics</span>
                                 </a>
                              </li>
                              <li class=" ">
                                 <a href="forum-discussion.html" title="Discussion">
                                    <span>Discussion</span>
                                 </a>
                              </li>
                           </ul>
                        </li>
                        <li class=" ">
                           <a href="mailbox.html" title="Mailbox">
                              <span data-localize="sidebar.nav.extra.MAILBOX">Mailbox</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="timeline.html" title="Timeline">
                              <span data-localize="sidebar.nav.extra.TIMELINE">Timeline</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="calendar.html" title="Calendar">
                              <span data-localize="sidebar.nav.extra.CALENDAR">Calendar</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="invoice.html" title="Invoice">
                              <span data-localize="sidebar.nav.extra.INVOICE">Invoice</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="search.html" title="Search">
                              <span data-localize="sidebar.nav.extra.SEARCH">Search</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="todo.html" title="Todo List">
                              <span data-localize="sidebar.nav.extra.TODO">Todo List</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="profile.html" title="Profile">
                              <span data-localize="sidebar.nav.extra.PROFILE">Profile</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class=" ">
                     <a href="#multilevel" title="Multilevel" data-toggle="collapse">
                        <em class="fa fa-folder-open-o"></em>
                        <span>Multilevel</span>
                     </a>
                     <ul id="multilevel" class="nav sidebar-subnav collapse">
                        <li class="sidebar-subnav-header">Multilevel</li>
                        <li class=" ">
                           <a href="#level1" title="Level 1" data-toggle="collapse">
                              <span>Level 1</span>
                           </a>
                           <ul id="level1" class="nav sidebar-subnav collapse">
                              <li class="sidebar-subnav-header">Level 1</li>
                              <li class=" ">
                                 <a href="multilevel-1.html" title="Level1 Item">
                                    <span>Level1 Item</span>
                                 </a>
                              </li>
                              <li class=" ">
                                 <a href="#level2" title="Level 2" data-toggle="collapse">
                                    <span>Level 2</span>
                                 </a>
                                 <ul id="level2" class="nav sidebar-subnav collapse">
                                    <li class="sidebar-subnav-header">Level 2</li>
                                    <li class=" ">
                                       <a href="#level3" title="Level 3" data-toggle="collapse">
                                          <span>Level 3</span>
                                       </a>
                                       <ul id="level3" class="nav sidebar-subnav collapse">
                                          <li class="sidebar-subnav-header">Level 3</li>
                                          <li class=" ">
                                             <a href="multilevel-3.html" title="Level3 Item">
                                                <span>Level3 Item</span>
                                             </a>
                                          </li>
                                       </ul>
                                    </li>
                                 </ul>
                              </li>
                           </ul>
                        </li>
                     </ul>
                  </li>
                  <li class=" ">
                     <a href="documentation.html" title="Documentation">
                        <em class="icon-graduation"></em>
                        <span data-localize="sidebar.nav.DOCUMENTATION">Documentation</span>
                     </a>
                  </li>
               </ul>
               <!-- END sidebar nav-->
            </nav>
         </div>
         <!-- END Sidebar (left)-->
      </aside>
      <!-- offsidebar-->
      <aside class="offsidebar hide">
         <!-- START Off Sidebar (right)-->
         <nav>
            <div role="tabpanel">
               <!-- Nav tabs-->
               <ul role="tablist" class="nav nav-tabs nav-justified">
                  <li role="presentation" class="active">
                     <a href="#app-settings" aria-controls="app-settings" role="tab" data-toggle="tab">
                        <em class="icon-equalizer fa-lg"></em>
                     </a>
                  </li>
                  <li role="presentation">
                     <a href="#app-chat" aria-controls="app-chat" role="tab" data-toggle="tab">
                        <em class="icon-users fa-lg"></em>
                     </a>
                  </li>
               </ul>
               <!-- Tab panes-->
               <div class="tab-content">
                  <div id="app-settings" role="tabpanel" class="tab-pane fade in active">
                     <h3 class="text-center text-thin">Settings</h3>
                     <div class="p">
                        <h4 class="text-muted text-thin">Themes</h4>
                        <div class="table-grid mb">
                           <div class="col mb">
                              <div class="setting-color">
                                 <label data-load-css="css/theme-a.css">
                                    <input type="radio" name="setting-theme" checked="checked">
                                    <span class="icon-check"></span>
                                    <span class="split">
                                       <span class="color bg-info"></span>
                                       <span class="color bg-info-light"></span>
                                    </span>
                                    <span class="color bg-white"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col mb">
                              <div class="setting-color">
                                 <label data-load-css="css/theme-b.css">
                                    <input type="radio" name="setting-theme">
                                    <span class="icon-check"></span>
                                    <span class="split">
                                       <span class="color bg-green"></span>
                                       <span class="color bg-green-light"></span>
                                    </span>
                                    <span class="color bg-white"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col mb">
                              <div class="setting-color">
                                 <label data-load-css="css/theme-c.css">
                                    <input type="radio" name="setting-theme">
                                    <span class="icon-check"></span>
                                    <span class="split">
                                       <span class="color bg-purple"></span>
                                       <span class="color bg-purple-light"></span>
                                    </span>
                                    <span class="color bg-white"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col mb">
                              <div class="setting-color">
                                 <label data-load-css="css/theme-d.css">
                                    <input type="radio" name="setting-theme">
                                    <span class="icon-check"></span>
                                    <span class="split">
                                       <span class="color bg-danger"></span>
                                       <span class="color bg-danger-light"></span>
                                    </span>
                                    <span class="color bg-white"></span>
                                 </label>
                              </div>
                           </div>
                        </div>
                        <div class="table-grid mb">
                           <div class="col mb">
                              <div class="setting-color">
                                 <label data-load-css="css/theme-e.css">
                                    <input type="radio" name="setting-theme">
                                    <span class="icon-check"></span>
                                    <span class="split">
                                       <span class="color bg-info-dark"></span>
                                       <span class="color bg-info"></span>
                                    </span>
                                    <span class="color bg-gray-dark"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col mb">
                              <div class="setting-color">
                                 <label data-load-css="css/theme-f.css">
                                    <input type="radio" name="setting-theme">
                                    <span class="icon-check"></span>
                                    <span class="split">
                                       <span class="color bg-green-dark"></span>
                                       <span class="color bg-green"></span>
                                    </span>
                                    <span class="color bg-gray-dark"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col mb">
                              <div class="setting-color">
                                 <label data-load-css="css/theme-g.css">
                                    <input type="radio" name="setting-theme">
                                    <span class="icon-check"></span>
                                    <span class="split">
                                       <span class="color bg-purple-dark"></span>
                                       <span class="color bg-purple"></span>
                                    </span>
                                    <span class="color bg-gray-dark"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col mb">
                              <div class="setting-color">
                                 <label data-load-css="css/theme-h.css">
                                    <input type="radio" name="setting-theme">
                                    <span class="icon-check"></span>
                                    <span class="split">
                                       <span class="color bg-danger-dark"></span>
                                       <span class="color bg-danger"></span>
                                    </span>
                                    <span class="color bg-gray-dark"></span>
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="p">
                        <h4 class="text-muted text-thin">Layout</h4>
                        <div class="clearfix">
                           <p class="pull-left">Fixed</p>
                           <div class="pull-right">
                              <label class="switch">
                                 <input id="chk-fixed" type="checkbox" data-toggle-state="layout-fixed">
                                 <span></span>
                              </label>
                           </div>
                        </div>
                        <div class="clearfix">
                           <p class="pull-left">Boxed</p>
                           <div class="pull-right">
                              <label class="switch">
                                 <input id="chk-boxed" type="checkbox" data-toggle-state="layout-boxed">
                                 <span></span>
                              </label>
                           </div>
                        </div>
                        <div class="clearfix">
                           <p class="pull-left">RTL</p>
                           <div class="pull-right">
                              <label class="switch">
                                 <input id="chk-rtl" type="checkbox">
                                 <span></span>
                              </label>
                           </div>
                        </div>
                     </div>
                     <div class="p">
                        <h4 class="text-muted text-thin">Aside</h4>
                        <div class="clearfix">
                           <p class="pull-left">Collapsed</p>
                           <div class="pull-right">
                              <label class="switch">
                                 <input id="chk-collapsed" type="checkbox" data-toggle-state="aside-collapsed">
                                 <span></span>
                              </label>
                           </div>
                        </div>
                        <div class="clearfix">
                           <p class="pull-left">Float</p>
                           <div class="pull-right">
                              <label class="switch">
                                 <input id="chk-float" type="checkbox" data-toggle-state="aside-float">
                                 <span></span>
                              </label>
                           </div>
                        </div>
                        <div class="clearfix">
                           <p class="pull-left">Hover</p>
                           <div class="pull-right">
                              <label class="switch">
                                 <input id="chk-hover" type="checkbox" data-toggle-state="aside-hover">
                                 <span></span>
                              </label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div id="app-chat" role="tabpanel" class="tab-pane fade">
                     <h3 class="text-center text-thin">Connections</h3>
                     <ul class="nav">
                        <!-- START list title-->
                        <li class="p">
                           <small class="text-muted">ONLINE</small>
                        </li>
                        <!-- END list title-->
                        <li>
                           <!-- START User status-->
                           <a href="#" class="media-box p mt0">
                              <span class="pull-right">
                                 <span class="circle circle-success circle-lg"></span>
                              </span>
                              <span class="pull-left">
                                 <!-- Contact avatar-->
                                 <img src="img/user/05.jpg" alt="Image" class="media-box-object img-circle thumb48">
                              </span>
                              <!-- Contact info-->
                              <span class="media-box-body">
                                 <span class="media-box-heading">
                                    <strong>Juan Sims</strong>
                                    <br>
                                    <small class="text-muted">Designeer</small>
                                 </span>
                              </span>
                           </a>
                           <!-- END User status-->
                           <!-- START User status-->
                           <a href="#" class="media-box p mt0">
                              <span class="pull-right">
                                 <span class="circle circle-success circle-lg"></span>
                              </span>
                              <span class="pull-left">
                                 <!-- Contact avatar-->
                                 <img src="img/user/06.jpg" alt="Image" class="media-box-object img-circle thumb48">
                              </span>
                              <!-- Contact info-->
                              <span class="media-box-body">
                                 <span class="media-box-heading">
                                    <strong>Maureen Jenkins</strong>
                                    <br>
                                    <small class="text-muted">Designeer</small>
                                 </span>
                              </span>
                           </a>
                           <!-- END User status-->
                           <!-- START User status-->
                           <a href="#" class="media-box p mt0">
                              <span class="pull-right">
                                 <span class="circle circle-danger circle-lg"></span>
                              </span>
                              <span class="pull-left">
                                 <!-- Contact avatar-->
                                 <img src="img/user/07.jpg" alt="Image" class="media-box-object img-circle thumb48">
                              </span>
                              <!-- Contact info-->
                              <span class="media-box-body">
                                 <span class="media-box-heading">
                                    <strong>Billie Dunn</strong>
                                    <br>
                                    <small class="text-muted">Designeer</small>
                                 </span>
                              </span>
                           </a>
                           <!-- END User status-->
                           <!-- START User status-->
                           <a href="#" class="media-box p mt0">
                              <span class="pull-right">
                                 <span class="circle circle-warning circle-lg"></span>
                              </span>
                              <span class="pull-left">
                                 <!-- Contact avatar-->
                                 <img src="img/user/08.jpg" alt="Image" class="media-box-object img-circle thumb48">
                              </span>
                              <!-- Contact info-->
                              <span class="media-box-body">
                                 <span class="media-box-heading">
                                    <strong>Tomothy Roberts</strong>
                                    <br>
                                    <small class="text-muted">Designer</small>
                                 </span>
                              </span>
                           </a>
                           <!-- END User status-->
                        </li>
                        <!-- START list title-->
                        <li class="p">
                           <small class="text-muted">OFFLINE</small>
                        </li>
                        <!-- END list title-->
                        <li>
                           <!-- START User status-->
                           <a href="#" class="media-box p mt0">
                              <span class="pull-right">
                                 <span class="circle circle-lg"></span>
                              </span>
                              <span class="pull-left">
                                 <!-- Contact avatar-->
                                 <img src="img/user/09.jpg" alt="Image" class="media-box-object img-circle thumb48">
                              </span>
                              <!-- Contact info-->
                              <span class="media-box-body">
                                 <span class="media-box-heading">
                                    <strong>Lawrence Robinson</strong>
                                    <br>
                                    <small class="text-muted">Developer</small>
                                 </span>
                              </span>
                           </a>
                           <!-- END User status-->
                           <!-- START User status-->
                           <a href="#" class="media-box p mt0">
                              <span class="pull-right">
                                 <span class="circle circle-lg"></span>
                              </span>
                              <span class="pull-left">
                                 <!-- Contact avatar-->
                                 <img src="img/user/10.jpg" alt="Image" class="media-box-object img-circle thumb48">
                              </span>
                              <!-- Contact info-->
                              <span class="media-box-body">
                                 <span class="media-box-heading">
                                    <strong>Tyrone Owens</strong>
                                    <br>
                                    <small class="text-muted">Designer</small>
                                 </span>
                              </span>
                           </a>
                           <!-- END User status-->
                        </li>
                        <li>
                           <div class="p-lg text-center">
                              <!-- Optional link to list more users-->
                              <a href="#" title="See more contacts" class="btn btn-purple btn-sm">
                                 <strong>Load more..</strong>
                              </a>
                           </div>
                        </li>
                     </ul>
                     <!-- Extra items-->
                     <div class="p">
                        <p>
                           <small class="text-muted">Tasks completion</small>
                        </p>
                        <div class="progress progress-xs m0">
                           <div role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-success progress-80">
                              <span class="sr-only">80% Complete</span>
                           </div>
                        </div>
                     </div>
                     <div class="p">
                        <p>
                           <small class="text-muted">Upload quota</small>
                        </p>
                        <div class="progress progress-xs m0">
                           <div role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-warning progress-40">
                              <span class="sr-only">40% Complete</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </nav>
         <!-- END Off Sidebar (right)-->
      </aside>
      <!-- Main section-->
      <section>
         <!-- Page content-->
         <div class="content-wrapper">
            <div class="content-heading">
               <!-- START Language list-->
               <div class="pull-right">
                  <div class="btn-group">
                     <button type="button" data-toggle="dropdown" class="btn btn-default">English</button>
                     <ul role="menu" class="dropdown-menu dropdown-menu-right animated fadeInUpShort">
                        <li><a href="#" data-set-lang="en">English</a>
                        </li>
                        <li><a href="#" data-set-lang="es">Spanish</a>
                        </li>
                     </ul>
                  </div>
               </div>
               <!-- END Language list    -->
               Dashboard
               <small data-localize="dashboard.WELCOME"></small>
            </div>
            <!-- START widgets box-->
            <div class="row">
               <div class="col-lg-3 col-sm-6">
                  <!-- START widget-->
                  <div class="panel bg-info-light pt b0 widget">
                     <div class="ph">
                        <em class="icon-cloud-upload fa-lg pull-right"></em>
                        <div class="h2 mt0">1700</div>
                        <div class="text-uppercase">Uploads</div>
                     </div>
                     <div data-sparkline="" data-type="line" data-width="100%" data-height="75px" data-line-color="#23b7e5" data-chart-range-min="0" data-fill-color="#23b7e5" data-spot-color="#23b7e5" data-min-spot-color="#23b7e5" data-max-spot-color="#23b7e5"
                     data-highlight-spot-color="#23b7e5" data-highlight-line-color="#23b7e5" values="2,5,3,7,4,5" style="margin-bottom: -2px" data-resize="true"></div>
                  </div>
               </div>
               <div class="col-lg-3 col-sm-6">
                  <!-- START widget-->
                  <div class="panel widget bg-purple-light pt b0 widget">
                     <div class="ph">
                        <em class="icon-globe fa-lg pull-right"></em>
                        <div class="h2 mt0">700
                           <span class="text-sm text-white">GB</span>
                        </div>
                        <div class="text-uppercase">Quota</div>
                     </div>
                     <div data-sparkline="" data-type="line" data-width="100%" data-height="75px" data-line-color="#7266ba" data-chart-range-min="0" data-fill-color="#7266ba" data-spot-color="#7266ba" data-min-spot-color="#7266ba" data-max-spot-color="#7266ba"
                     data-highlight-spot-color="#7266ba" data-highlight-line-color="#7266ba" values="1,4,5,4,8,7,10" style="margin-bottom: -2px" data-resize="true"></div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-12">
                  <!-- START widget-->
                  <div class="panel widget bg-info-light pt b0 widget">
                     <div class="ph">
                        <em class="icon-bubbles fa-lg pull-right"></em>
                        <div class="h2 mt0">500</div>
                        <div class="text-uppercase">Reviews</div>
                     </div>
                     <div data-sparkline="" data-type="line" data-width="100%" data-height="75px" data-line-color="#23b7e5" data-chart-range-min="0" data-fill-color="#23b7e5" data-spot-color="#23b7e5" data-min-spot-color="#23b7e5" data-max-spot-color="#23b7e5"
                     data-highlight-spot-color="#23b7e5" data-highlight-line-color="#23b7e5" values="4,5,3,10,7,15" style="margin-bottom: -2px" data-resize="true"></div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-12">
                  <!-- START widget-->
                  <div class="panel widget bg-purple-light pt b0 widget">
                     <div class="ph">
                        <em class="icon-pencil fa-lg pull-right"></em>
                        <div class="h2 mt0">35</div>
                        <div class="text-uppercase">Annotations</div>
                     </div>
                     <div data-sparkline="" data-type="line" data-width="100%" data-height="75px" data-line-color="#7266ba" data-chart-range-min="0" data-fill-color="#7266ba" data-spot-color="#7266ba" data-min-spot-color="#7266ba" data-max-spot-color="#7266ba"
                     data-highlight-spot-color="#7266ba" data-highlight-line-color="#7266ba" values="1,3,4,5,7,8" style="margin-bottom: -2px" data-resize="true"></div>
                  </div>
               </div>
            </div>
            <!-- END widgets box-->
            <!-- START chart-->
            <div class="row">
               <div class="col-lg-12">
                  <!-- START widget-->
                  <div id="panelChart9" ng-controller="FlotChartController" class="panel panel-default">
                     <div class="panel-heading">
                        <div class="panel-title">Website Performance</div>
                     </div>
                     <div collapse="panelChart9" class="panel-wrapper">
                        <div class="panel-body">
                           <div class="chart-splinev3 flot-chart"></div>
                        </div>
                     </div>
                  </div>
                  <!-- END widget-->
               </div>
            </div>
            <!-- END chart-->
            <div class="row">
               <div class="col-lg-6">
                  <!-- START panel tab-->
                  <div role="tabpanel" class="panel panel-transparent">
                     <!-- Nav tabs-->
                     <ul role="tablist" class="nav nav-tabs nav-justified">
                        <li role="presentation" class="active">
                           <a href="#home" aria-controls="home" role="tab" data-toggle="tab" class="bb0">
                              <em class="fa fa-clock-o fa-fw"></em>Tasks Panel</a>
                        </li>
                        <li role="presentation">
                           <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" class="bb0">
                              <em class="fa fa-money fa-fw"></em>Transactions Panel</a>
                        </li>
                     </ul>
                     <!-- Tab panes-->
                     <div class="tab-content p0 bg-white">
                        <div id="home" role="tabpanel" class="tab-pane active">
                           <!-- START list group-->
                           <div class="list-group mb0">
                              <a href="#" class="list-group-item bt0">
                                 <span class="label label-purple pull-right">just now</span>
                                 <em class="fa fa-fw fa-calendar mr"></em>Calendar updated</a>
                              <a href="#" class="list-group-item">
                                 <span class="label label-purple pull-right">4 minutes ago</span>
                                 <em class="fa fa-fw fa-comment mr"></em>Commented on a post</a>
                              <a href="#" class="list-group-item">
                                 <span class="label label-purple pull-right">23 minutes ago</span>
                                 <em class="fa fa-fw fa-truck mr"></em>Order 392 shipped</a>
                              <a href="#" class="list-group-item">
                                 <span class="label label-purple pull-right">46 minutes ago</span>
                                 <em class="fa fa-fw fa-money mr"></em>Invoice 653 has been paid</a>
                              <a href="#" class="list-group-item">
                                 <span class="label label-purple pull-right">1 hour ago</span>
                                 <em class="fa fa-fw fa-user mr"></em>A new user has been added</a>
                              <a href="#" class="list-group-item">
                                 <span class="label label-purple pull-right">2 hours ago</span>
                                 <em class="fa fa-fw fa-check mr"></em>Completed task: "pick up dry cleaning"</a>
                              <a href="#" class="list-group-item">
                                 <span class="label label-purple pull-right">yesterday</span>
                                 <em class="fa fa-fw fa-globe mr"></em>Saved the world</a>
                              <a href="#" class="list-group-item">
                                 <span class="label label-purple pull-right">two days ago</span>
                                 <em class="fa fa-fw fa-check mr"></em>Completed task: "fix error on sales page"</a>
                              <a href="#" class="list-group-item">
                                 <span class="label label-purple pull-right">two days ago</span>
                                 <em class="fa fa-fw fa-check mr"></em>Completed task: "fix error on sales page"</a>
                           </div>
                           <!-- END list group-->
                           <div class="panel-footer text-right"><a href="#" class="btn btn-default btn-sm">View All Activity </a>
                           </div>
                        </div>
                        <div id="profile" role="tabpanel" class="tab-pane">
                           <!-- START table responsive-->
                           <div class="table-responsive">
                              <table class="table table-bordered table-hover table-striped">
                                 <thead>
                                    <tr>
                                       <th>Order #</th>
                                       <th>Order Date</th>
                                       <th>Order Time</th>
                                       <th>Amount (USD)</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td>3326</td>
                                       <td>10/21/2013</td>
                                       <td>3:29 PM</td>
                                       <td>$321.33</td>
                                    </tr>
                                    <tr>
                                       <td>3325</td>
                                       <td>10/21/2013</td>
                                       <td>3:20 PM</td>
                                       <td>$234.34</td>
                                    </tr>
                                    <tr>
                                       <td>3324</td>
                                       <td>10/21/2013</td>
                                       <td>3:03 PM</td>
                                       <td>$724.17</td>
                                    </tr>
                                    <tr>
                                       <td>3323</td>
                                       <td>10/21/2013</td>
                                       <td>3:00 PM</td>
                                       <td>$23.71</td>
                                    </tr>
                                    <tr>
                                       <td>3322</td>
                                       <td>10/21/2013</td>
                                       <td>2:49 PM</td>
                                       <td>$8345.23</td>
                                    </tr>
                                    <tr>
                                       <td>3321</td>
                                       <td>10/21/2013</td>
                                       <td>2:23 PM</td>
                                       <td>$245.12</td>
                                    </tr>
                                    <tr>
                                       <td>3320</td>
                                       <td>10/21/2013</td>
                                       <td>2:15 PM</td>
                                       <td>$5663.54</td>
                                    </tr>
                                    <tr>
                                       <td>3319</td>
                                       <td>10/21/2013</td>
                                       <td>2:13 PM</td>
                                       <td>$943.45</td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                           <!-- END table responsive-->
                           <div class="panel-footer text-right"><a href="#" class="btn btn-default btn-sm">View All Transactions</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- END panel tab-->
               </div>
               <div ng-controller="VectorMapController" class="col-lg-6">
                  <div class="panel panel-transparent">
                     <div data-vector-map="" data-height="450" data-scale='0' data-map-name="world_mill_en"></div>
                  </div>
               </div>
            </div>
            <!-- START Widgets-->
            <div class="row">
               <div class="col-lg-3">
                  <!-- START loader widget-->
                  <div class="panel panel-default">
                     <div class="panel-body">
                        <a href="#" class="text-muted pull-right">
                           <em class="fa fa-arrow-right"></em>
                        </a>
                        <div class="text-info">Average Monthly Uploads</div>
                        <canvas data-classyloader="" data-percentage="70" data-speed="20" data-font-size="40px" data-diameter="70" data-line-color="#23b7e5" data-remaining-line-color="rgba(200,200,200,0.4)" data-line-width="10"
                        data-rounded-line="true" class="center-block"></canvas>
                        <div data-sparkline="" data-bar-color="#23b7e5" data-height="30" data-bar-width="5" data-bar-spacing="2" values="5,4,8,7,8,5,4,6,5,5,9,4,6,3,4,7,5,4,7" class="text-center"></div>
                     </div>
                     <div class="panel-footer">
                        <p class="text-muted">
                           <em class="fa fa-upload fa-fw"></em>
                           <span>This Month</span>
                           <span class="text-dark">1000 Gb</span>
                        </p>
                     </div>
                  </div>
                  <!-- END loader widget-->
               </div>
               <div class="col-lg-3">
                  <!-- START messages and activity-->
                  <div class="panel panel-default">
                     <div class="panel-heading">
                        <div class="panel-title">Latest activities</div>
                     </div>
                     <!-- START list group-->
                     <div class="list-group">
                        <!-- START list group item-->
                        <div class="list-group-item">
                           <div class="media-box">
                              <div class="pull-left">
                                 <span class="fa-stack">
                                    <em class="fa fa-circle fa-stack-2x text-purple"></em>
                                    <em class="fa fa-cloud-upload fa-stack-1x fa-inverse text-white"></em>
                                 </span>
                              </div>
                              <div class="media-box-body clearfix">
                                 <small class="text-muted pull-right ml">15m</small>
                                 <div class="media-box-heading"><a href="#" class="text-purple m0">NEW FILE</a>
                                 </div>
                                 <p class="m0">
                                    <small><a href="#">Bootstrap.xls</a>
                                    </small>
                                 </p>
                              </div>
                           </div>
                        </div>
                        <!-- END list group item-->
                        <!-- START list group item-->
                        <div class="list-group-item">
                           <div class="media-box">
                              <div class="pull-left">
                                 <span class="fa-stack">
                                    <em class="fa fa-circle fa-stack-2x text-info"></em>
                                    <em class="fa fa-file-text-o fa-stack-1x fa-inverse text-white"></em>
                                 </span>
                              </div>
                              <div class="media-box-body clearfix">
                                 <small class="text-muted pull-right ml">2h</small>
                                 <div class="media-box-heading"><a href="#" class="text-info m0">NEW DOCUMENT</a>
                                 </div>
                                 <p class="m0">
                                    <small><a href="#">Bootstrap.doc</a>
                                    </small>
                                 </p>
                              </div>
                           </div>
                        </div>
                        <!-- END list group item-->
                        <!-- START list group item-->
                        <div class="list-group-item">
                           <div class="media-box">
                              <div class="pull-left">
                                 <span class="fa-stack">
                                    <em class="fa fa-circle fa-stack-2x text-danger"></em>
                                    <em class="fa fa-exclamation fa-stack-1x fa-inverse text-white"></em>
                                 </span>
                              </div>
                              <div class="media-box-body clearfix">
                                 <small class="text-muted pull-right ml">5h</small>
                                 <div class="media-box-heading"><a href="#" class="text-danger m0">BROADCAST</a>
                                 </div>
                                 <p class="m0"><a href="#">Read</a>
                                 </p>
                              </div>
                           </div>
                        </div>
                        <!-- END list group item-->
                        <!-- START list group item-->
                        <div class="list-group-item">
                           <div class="media-box">
                              <div class="pull-left">
                                 <span class="fa-stack">
                                    <em class="fa fa-circle fa-stack-2x text-success"></em>
                                    <em class="fa fa-clock-o fa-stack-1x fa-inverse text-white"></em>
                                 </span>
                              </div>
                              <div class="media-box-body clearfix">
                                 <small class="text-muted pull-right ml">15h</small>
                                 <div class="media-box-heading"><a href="#" class="text-success m0">NEW MEETING</a>
                                 </div>
                                 <p class="m0">
                                    <small>On
                                       <em>10/12/2015 09:00 am</em>
                                    </small>
                                 </p>
                              </div>
                           </div>
                        </div>
                        <!-- END list group item-->
                     </div>
                     <!-- END list group-->
                     <!-- START panel footer-->
                     <div class="panel-footer clearfix">
                        <a href="#" class="pull-left">
                           <small>Load more</small>
                        </a>
                     </div>
                     <!-- END panel-footer-->
                  </div>
                  <!-- END messages and activity-->
               </div>
               <div class="col-lg-6">
                  <div class="panel panel-default">
                     <div class="panel-heading">
                        <div class="pull-right label label-danger">5</div>
                        <div class="pull-right label label-success">12</div>
                        <div class="panel-title">Team messages</div>
                     </div>
                     <!-- START list group-->
                     <div data-height="230" data-scrollable="" class="list-group">
                        <!-- START list group item-->
                        <a href="#" class="list-group-item">
                           <div class="media-box">
                              <div class="pull-left">
                                 <img src="img/user/02.jpg" alt="Image" class="media-box-object img-circle thumb32">
                              </div>
                              <div class="media-box-body clearfix">
                                 <small class="pull-right">2h</small>
                                 <strong class="media-box-heading text-primary">
                                    <span class="circle circle-success circle-lg text-left"></span>Catherine Ellis</strong>
                                 <p class="mb-sm">
                                    <small>Cras sit amet nibh libero, in gravida nulla. Nulla...</small>
                                 </p>
                              </div>
                           </div>
                        </a>
                        <!-- END list group item-->
                        <!-- START list group item-->
                        <a href="#" class="list-group-item">
                           <div class="media-box">
                              <div class="pull-left">
                                 <img src="img/user/03.jpg" alt="Image" class="media-box-object img-circle thumb32">
                              </div>
                              <div class="media-box-body clearfix">
                                 <small class="pull-right">3h</small>
                                 <strong class="media-box-heading text-primary">
                                    <span class="circle circle-success circle-lg text-left"></span>Jessica Silva</strong>
                                 <p class="mb-sm">
                                    <small>Cras sit amet nibh libero, in gravida nulla. Nulla facilisi.</small>
                                 </p>
                              </div>
                           </div>
                        </a>
                        <!-- END list group item-->
                        <!-- START list group item-->
                        <a href="#" class="list-group-item">
                           <div class="media-box">
                              <div class="pull-left">
                                 <img src="img/user/09.jpg" alt="Image" class="media-box-object img-circle thumb32">
                              </div>
                              <div class="media-box-body clearfix">
                                 <small class="pull-right">4h</small>
                                 <strong class="media-box-heading text-primary">
                                    <span class="circle circle-danger circle-lg text-left"></span>Jessie Wells</strong>
                                 <p class="mb-sm">
                                    <small>Cras sit amet nibh libero, in gravida nulla. Nulla...</small>
                                 </p>
                              </div>
                           </div>
                        </a>
                        <!-- END list group item-->
                        <!-- START list group item-->
                        <a href="#" class="list-group-item">
                           <div class="media-box">
                              <div class="pull-left">
                                 <img src="img/user/12.jpg" alt="Image" class="media-box-object img-circle thumb32">
                              </div>
                              <div class="media-box-body clearfix">
                                 <small class="pull-right">1d</small>
                                 <strong class="media-box-heading text-primary">
                                    <span class="circle circle-danger circle-lg text-left"></span>Rosa Burke</strong>
                                 <p class="mb-sm">
                                    <small>Cras sit amet nibh libero, in gravida nulla. Nulla...</small>
                                 </p>
                              </div>
                           </div>
                        </a>
                        <!-- END list group item-->
                        <!-- START list group item-->
                        <a href="#" class="list-group-item">
                           <div class="media-box">
                              <div class="pull-left">
                                 <img src="img/user/10.jpg" alt="Image" class="media-box-object img-circle thumb32">
                              </div>
                              <div class="media-box-body clearfix">
                                 <small class="pull-right">2d</small>
                                 <strong class="media-box-heading text-primary">
                                    <span class="circle circle-danger circle-lg text-left"></span>Michelle Lane</strong>
                                 <p class="mb-sm">
                                    <small>Mauris eleifend, libero nec cursus lacinia...</small>
                                 </p>
                              </div>
                           </div>
                        </a>
                        <!-- END list group item-->
                     </div>
                     <!-- END list group-->
                     <!-- START panel footer-->
                     <div class="panel-footer clearfix">
                        <div class="input-group">
                           <input type="text" placeholder="Search message .." class="form-control input-sm">
                           <span class="input-group-btn">
                              <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-search"></i>
                              </button>
                           </span>
                        </div>
                     </div>
                     <!-- END panel-footer-->
                  </div>
               </div>
               <!-- END dashboard sidebar-->
            </div>
            <!-- END Widgets-->
         </div>
      </section>
      <!-- Page footer-->
      <footer>
         <span>&copy; 2015 - Angle</span>
      </footer>
   </div>
   <!-- =============== VENDOR SCRIPTS ===============-->
   <!-- MODERNIZR-->
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/modernizr/modernizr.js"></script>
   <!-- JQUERY-->
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/jquery/dist/jquery.js"></script>
   <!-- BOOTSTRAP-->
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/bootstrap/dist/js/bootstrap.js"></script>
   <!-- STORAGE API-->
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/jQuery-Storage-API/jquery.storageapi.js"></script>
   <!-- JQUERY EASING-->
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/jquery.easing/js/jquery.easing.js"></script>
   <!-- ANIMO-->
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/animo.js/animo.js"></script>
   <!-- SLIMSCROLL-->
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/slimScroll/jquery.slimscroll.min.js"></script>
   <!-- SCREENFULL-->
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/screenfull/dist/screenfull.js"></script>
   <!-- LOCALIZE-->
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/jquery-localize-i18n/dist/jquery.localize.js"></script>
   <!-- RTL demo-->
   <script src="<?php echo $this->config->item('assets_url') ?>app/js/demo/demo-rtl.js"></script>
   <!-- =============== PAGE VENDOR SCRIPTS ===============-->
   <!-- FLOT CHART-->
<!--   <script src="<?php //echo $this->config->item('assets_url') ?>vendor/Flot/jquery.flot.js"></script>
   <script src=".<?php //echo $this->config->item('assets_url') ?>vendor/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
   <script src="<?php //echo $this->config->item('assets_url') ?>vendor/Flot/jquery.flot.resize.js"></script>
   <script src="<?php //echo $this->config->item('assets_url') ?>vendor/Flot/jquery.flot.pie.js"></script>
   <script src="<?php //echo $this->config->item('assets_url') ?>vendor/Flot/jquery.flot.time.js"></script>
   <script src="<?php //echo $this->config->item('assets_url') ?>vendor/Flot/jquery.flot.categories.js"></script>
   <script src="<?php //echo $this->config->item('assets_url') ?>vendor/flot-spline/js/jquery.flot.spline.min.js"></script>-->
   <!-- CLASSY LOADER-->
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/jquery-classyloader/js/jquery.classyloader.min.js"></script>
   <!-- MOMENT JS-->
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/moment/min/moment-with-locales.min.js"></script>
   <!-- SKYCONS-->
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/skycons/skycons.js"></script>
   <!-- DEMO-->
   <script src="<?php echo $this->config->item('assets_url') ?>app/js/demo/demo-flot.js"></script>
   <!-- VECTOR MAP-->
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/ika.jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/ika.jvectormap/jquery-jvectormap-world-mill-en.js"></script>
   <script src="<?php echo $this->config->item('assets_url') ?>vendor/ika.jvectormap/jquery-jvectormap-us-mill-en.js"></script>
   <script src="<?php echo $this->config->item('assets_url') ?>app/js/demo/demo-vector-map.js"></script>
   <!-- =============== APP SCRIPTS ===============-->
   <script src="<?php echo $this->config->item('assets_url') ?>app/js/app.js"></script>
</body>

</html>