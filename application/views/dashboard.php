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
                  <li class="active">Dashboard</li>
               </ol>Dashboard
               <!-- Small text for title-->
               <span class="text-sm hidden-xs">Quick View of Application</span>
               <!-- Breadcrumb below title-->
              
            </h3>
            <!-- START widgets box-->
            <div class="row">
                          <div class="col-md-12 text-center">
                              <h2> Our Products </h2>
                          </div>
           </div>
           <!-- START carousel-->
            <div id="carousel-example-captions" data-ride="carousel" class="carousel slide">
               
               <div role="listbox" class="carousel-inner">
                  <div class="item active">
                      <div class="row">
                          
                          <div class="col-md-1"></div>
                          <div class="col-md-10">
                              <div class="row">
                                <?php //if($this->session->userdata('recharge') == 1){?>
                                <div class="col-lg-4 col-sm-6 text-center">
                                  <!-- START widget-->
                                  <a href="<?php echo base_url();?>recharge/mobile_recharge" style="text-decoration: none;">
                                      <div class=" bg-orange" style="">
                                        <div class="row row-table" >                                          
                                          <div class="col-xs-8 pv-lg">
                                             <div class="h2 mt0">Pre paid</div>
                                             <div class="text-uppercase">Mobile Recharge</div>
                                          </div>
                                       </div>
                                    </div>
                                  </a>
                               </div>
                                  <div class="col-lg-4 col-sm-6 text-center">
                                  <!-- START widget-->
                                  <a href="<?php echo base_url();?>recharge/post_recharge" style="text-decoration: none;">
                                    <div class=" bg-orange" style="">
                                        <div class="row row-table" >                                          
                                          <div class="col-xs-8 pv-lg">
                                             <div class="h2 mt0">Post paid</div>
                                             <div class="text-uppercase">Mobile Recharge</div>
                                          </div>
                                       </div>
                                    </div>
                                  </a>
                               </div>
                                <div class="col-lg-4 col-sm-6 text-center">
                                  <!-- START widget-->
                                  <a href="<?php echo base_url();?>recharge/dth_recharge" style="text-decoration: none;">
                                    <div class=" bg-orange" style="">
                                        <div class="row row-table" >                                          
                                          <div class="col-xs-8 pv-lg">
                                             <div class="h2 mt0">DTH</div>
                                             <div class="text-uppercase">Mobile Recharge</div>
                                          </div>
                                       </div>
                                    </div>
                                  </a>
                               </div>
                                  <div class="col-md-12">&nbsp;</div>
                                  <div class="col-lg-4 col-sm-6 text-center">
                                  <!-- START widget-->
                                  <a href="<?php echo base_url();?>dmr/dmrUserSearch" style="text-decoration: none;">
                                      <div class=" bg-orange" style="">
                                        <div class="row row-table" >                                          
                                          <div class="col-xs-8 pv-lg">
                                             <div class="h2 mt0">Money Transfer</div>
                                             <div class="text-uppercase">DMR</div>
                                          </div>
                                       </div>
                                    </div>
                                  </a>
                               </div>
                                  <div class="col-lg-4 col-sm-6 text-center">
                                  <!-- START widget-->
                                  <a href="<?php echo base_url();?>dmr/topup" style="text-decoration: none;">
                                    <div class=" bg-orange" style="">
                                        <div class="row row-table" >                                          
                                          <div class="col-xs-8 pv-lg">
                                             <div class="h2 mt0">Money Top-up</div>
                                             <div class="text-uppercase">DMR</div>
                                          </div>
                                       </div>
                                    </div>
                                  </a>
                               </div>
                                <div class="col-lg-4 col-sm-6 text-center">
                                  <!-- START widget-->
                                  <a href="<?php echo base_url();?>recharge/dth_recharge" style="text-decoration: none;">
                                    <div class=" bg-orange" style="">
                                        <div class="row row-table" >                                          
                                          <div class="col-xs-8 pv-lg">
                                             <div class="h2 mt0">Transection Details</div>
                                             <div class="text-uppercase">DMR</div>
                                          </div>
                                       </div>
                                    </div>
                                  </a>
                               </div>

                                 <?php //} ?>
                              </div>
                          </div>
                          <div class="col-md-1"></div>
                          
                      </div>
                  </div>
                  <div class="item">
                      <div class="row">
                          
                          <div class="col-md-1"></div>
                          <div class="col-md-10">
                              <div class="row">
                                <?php //if($this->session->userdata('recharge') == 1){?>
                                <div class="col-lg-4 col-sm-6 text-center">
                                  <!-- START widget-->
                                  <a href="#<?php echo base_url();?>dmr/dmrUserSearch" style="text-decoration: none;">
                                      <div class=" bg-orange" style="">
                                        <div class="row row-table" >                                          
                                          <div class="col-xs-8 pv-lg">
                                             <div class="h2 mt0">Search Flight</div>
                                             <div class="text-uppercase">Flight</div>
                                          </div>
                                       </div>
                                    </div>
                                  </a>
                               </div>
                                  <div class="col-lg-4 col-sm-6 text-center">
                                  <!-- START widget-->
                                  <a href="#<?php echo base_url();?>dmr/topup" style="text-decoration: none;">
                                    <div class=" bg-orange" style="">
                                        <div class="row row-table" >                                          
                                          <div class="col-xs-8 pv-lg">
                                             <div class="h2 mt0">Book Flight</div>
                                             <div class="text-uppercase">Flight</div>
                                          </div>
                                       </div>
                                    </div>
                                  </a>
                               </div>
                                <div class="col-lg-4 col-sm-6 text-center">
                                  <!-- START widget-->
                                  <a href="#<?php echo base_url();?>recharge/dth_recharge" style="text-decoration: none;">
                                    <div class=" bg-orange" style="">
                                        <div class="row row-table" >                                          
                                          <div class="col-xs-8 pv-lg">
                                             <div class="h2 mt0">View History</div>
                                             <div class="text-uppercase">Flight</div>
                                          </div>
                                       </div>
                                    </div>
                                  </a>
                               </div>
                                   <div class="col-md-12">&nbsp;</div>
                                  <div class="col-lg-4 col-sm-6 text-center">
                                  <!-- START widget-->
                                  <a href="<?php echo base_url();?>dmr/dmrUserSearch" style="text-decoration: none;">
                                      <div class=" bg-orange" style="">
                                        <div class="row row-table" >                                          
                                          <div class="col-xs-8 pv-lg">
                                             <div class="h2 mt0">Cancel Flight</div>
                                             <div class="text-uppercase">Flight</div>
                                          </div>
                                       </div>
                                    </div>
                                  </a>
                               </div>
                                  <div class="col-lg-4 col-sm-6 text-center">
                                  <!-- START widget-->
                                  <a href="<?php echo base_url();?>dmr/topup" style="text-decoration: none;">
                                    <div class=" bg-orange" style="">
                                        <div class="row row-table" >                                          
                                          <div class="col-xs-8 pv-lg">
                                             <div class="h2 mt0">View Status</div>
                                             <div class="text-uppercase">Flight</div>
                                          </div>
                                       </div>
                                    </div>
                                  </a>
                               </div>
                                <div class="col-lg-4 col-sm-6 text-center">
                                  
                               </div>

                                 <?php //} ?>
                              </div>
                          </div>
                          <div class="col-md-1"></div>
                          
                      </div>
                  </div>
                   <div class="item">
                      <div class="row">
                          
                          <div class="col-md-1"></div>
                          <div class="col-md-10">
                              <div class="row">
                                <?php //if($this->session->userdata('recharge') == 1){?>
                                <div class="col-lg-4 col-sm-6 text-center">
                                  <!-- START widget-->
                                  <a href="#<?php echo base_url();?>dmr/dmrUserSearch" style="text-decoration: none;">
                                      <div class=" bg-orange" style="">
                                        <div class="row row-table" >                                          
                                          <div class="col-xs-8 pv-lg">
                                             <div class="h2 mt0">Search Bus</div>
                                             <div class="text-uppercase">Bus</div>
                                          </div>
                                       </div>
                                    </div>
                                  </a>
                               </div>
                                  <div class="col-lg-4 col-sm-6 text-center">
                                  <!-- START widget-->
                                  <a href="#<?php echo base_url();?>dmr/topup" style="text-decoration: none;">
                                    <div class=" bg-orange" style="">
                                        <div class="row row-table" >                                          
                                          <div class="col-xs-8 pv-lg">
                                             <div class="h2 mt0">Book Bus</div>
                                             <div class="text-uppercase">Bus</div>
                                          </div>
                                       </div>
                                    </div>
                                  </a>
                               </div>
                                <div class="col-lg-4 col-sm-6 text-center">
                                  <!-- START widget-->
                                  <a href="#<?php echo base_url();?>recharge/dth_recharge" style="text-decoration: none;">
                                    <div class=" bg-orange" style="">
                                        <div class="row row-table" >                                          
                                          <div class="col-xs-8 pv-lg">
                                             <div class="h2 mt0">View Bus</div>
                                             <div class="text-uppercase">Bus</div>
                                          </div>
                                       </div>
                                    </div>
                                  </a>
                               </div>
                                   <div class="col-md-12">&nbsp;</div>
                                  <div class="col-lg-4 col-sm-6 text-center">
                                  <!-- START widget-->
                                  <a href="<?php echo base_url();?>dmr/dmrUserSearch" style="text-decoration: none;">
                                      <div class=" bg-orange" style="">
                                        <div class="row row-table" >                                          
                                          <div class="col-xs-8 pv-lg">
                                             <div class="h2 mt0">Cancel Bus</div>
                                             <div class="text-uppercase">Bus</div>
                                          </div>
                                       </div>
                                    </div>
                                  </a>
                               </div>
                                  <div class="col-lg-4 col-sm-6 text-center">
                                  <!-- START widget-->
                                  <a href="<?php echo base_url();?>dmr/topup" style="text-decoration: none;">
                                    <div class=" bg-orange" style="">
                                        <div class="row row-table" >                                          
                                          <div class="col-xs-8 pv-lg">
                                             <div class="h2 mt0">View Status</div>
                                             <div class="text-uppercase">Bus</div>
                                          </div>
                                       </div>
                                    </div>
                                  </a>
                               </div>
                                <div class="col-lg-4 col-sm-6 text-center">
                                  
                               </div>

                                 <?php //} ?>
                              </div>
                          </div>
                          <div class="col-md-1"></div>
                          
                      </div>
                  </div>
                   <div class="item">
                      <div class="row">
                          
                          <div class="col-md-1"></div>
                          <div class="col-md-10">
                              <div class="row">
                                <?php //if($this->session->userdata('recharge') == 1){?>
                                <div class="col-lg-4 col-sm-6 text-center">
                                  <!-- START widget-->
                                  <a href="#<?php echo base_url();?>dmr/dmrUserSearch" style="text-decoration: none;">
                                      <div class=" bg-orange" style="">
                                        <div class="row row-table" >                                          
                                          <div class="col-xs-8 pv-lg">
                                             <div class="h2 mt0">Search Hotels</div>
                                             <div class="text-uppercase">Hotels</div>
                                          </div>
                                       </div>
                                    </div>
                                  </a>
                               </div>
                                  <div class="col-lg-4 col-sm-6 text-center">
                                  <!-- START widget-->
                                  <a href="#<?php echo base_url();?>dmr/topup" style="text-decoration: none;">
                                    <div class=" bg-orange" style="">
                                        <div class="row row-table" >                                          
                                          <div class="col-xs-8 pv-lg">
                                             <div class="h2 mt0">Book Hotels</div>
                                             <div class="text-uppercase">Hotels</div>
                                          </div>
                                       </div>
                                    </div>
                                  </a>
                               </div>
                                <div class="col-lg-4 col-sm-6 text-center">
                                  <!-- START widget-->
                                  <a href="#<?php echo base_url();?>recharge/dth_recharge" style="text-decoration: none;">
                                    <div class=" bg-orange" style="">
                                        <div class="row row-table" >                                          
                                          <div class="col-xs-8 pv-lg">
                                             <div class="h2 mt0">View Hotels</div>
                                             <div class="text-uppercase">Hotels</div>
                                          </div>
                                       </div>
                                    </div>
                                  </a>
                               </div>
                                   <div class="col-md-12">&nbsp;</div>
                                  <div class="col-lg-4 col-sm-6 text-center">
                                  <!-- START widget-->
                                  <a href="<?php echo base_url();?>dmr/dmrUserSearch" style="text-decoration: none;">
                                      <div class=" bg-orange" style="">
                                        <div class="row row-table" >                                          
                                          <div class="col-xs-8 pv-lg">
                                             <div class="h2 mt0">Cancel Hotels</div>
                                             <div class="text-uppercase">Hotels</div>
                                          </div>
                                       </div>
                                    </div>
                                  </a>
                               </div>
                                  <div class="col-lg-4 col-sm-6 text-center">
                                  <!-- START widget-->
                                  <a href="<?php echo base_url();?>dmr/topup" style="text-decoration: none;">
                                    <div class=" bg-orange" style="">
                                        <div class="row row-table" >                                          
                                          <div class="col-xs-8 pv-lg">
                                             <div class="h2 mt0">View Hotels</div>
                                             <div class="text-uppercase">Hotels</div>
                                          </div>
                                       </div>
                                    </div>
                                  </a>
                               </div>
                                <div class="col-lg-4 col-sm-6 text-center">
                                  
                               </div>

                                 <?php //} ?>
                              </div>
                          </div>
                          <div class="col-md-1"></div>
                          
                      </div>
                  </div>
                 
               </div>
               <a href="#carousel-example-captions" role="button" data-slide="prev" class="left carousel-control">
                  <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
                  <span class="sr-only">Previous</span>
               </a>
               <a href="#carousel-example-captions" role="button" data-slide="next" class="right carousel-control">
                  <span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span>
                  <span class="sr-only">Next</span>
               </a>
            </div>
            <!-- END widgets box-->
            
<!--            <div class="row">
                <?php if($this->session->userdata('recharge') == 1){?>
                <div class="col-lg-3 col-sm-6">
                   START widget
                  <a href="<?php echo base_url();?>recharge/mobile_recharge" style="text-decoration: none;">
                    <div class="panel widget bg-orange">
                       <div class="row row-table">
                          <div class="col-xs-4 text-center bg-orange-dark pv-lg">
                             <em class="fa fa-mobile fa-3x fa-spin"></em>
                          </div>
                          <div class="col-xs-8 pv-lg">
                             <div class="h2 mt0">Mobile</div>
                             <div class="text-uppercase">Recharge</div>
                          </div>
                       </div>
                    </div>
                  </a>
               </div>
                <div class="col-lg-3 col-sm-6">
                   START widget
                  <a href="<?php echo base_url();?>recharge/dth_recharge" style="text-decoration: none;">
                    <div class="panel widget bg-orange">
                       <div class="row row-table">
                          <div class="col-xs-4 text-center bg-orange-dark pv-lg">
                             <em class="fa fa-rss fa-3x "></em>
                          </div>
                          <div class="col-xs-8 pv-lg glow">
                             <div class="h2 mt0">DTH</div>
                             <div class="text-uppercase">Recharge</div>
                          </div>
                       </div>
                    </div>
                  </a>
               </div>
                
                 <?php }if($this->session->userdata('dmr') == 1){?>
                <div class="col-lg-3 col-sm-6">
                   START widget
                  <a href="<?php echo base_url();?>dmr/dmrUserSearch" style="text-decoration: none;">
                    <div class="panel widget bg-orange">
                       <div class="row row-table">
                          <div class="col-xs-4 text-center bg-orange-dark pv-lg">
                             <em class="fa fa-rupee fa-3x fa-spin"></em>
                          </div>
                          <div class="col-xs-8 pv-lg">
                             <div class="h2 mt0">DMR</div>
                             <div class="text-uppercase">Transfer</div>
                          </div>
                       </div>
                    </div>
                  </a>
               </div>               
                <div class="col-lg-3 col-sm-6">
                   START widget
                  <a href="<?php echo base_url();?>dmr/topup" style="text-decoration: none;">
                    <div class="panel widget bg-orange">
                       <div class="row row-table">
                          <div class="col-xs-4 text-center bg-orange-dark pv-lg">
                             <em class="fa fa-text-width fa-3x "></em>
                          </div>
                          <div class="col-xs-8 pv-lg">
                             <div class="h2 mt0">Top-Up</div>
                             <div class="text-uppercase">DMR</div>
                          </div>
                       </div>
                    </div>
                  </a>
               </div>
                <?php }?>
              
            </div>
            -----------------
            <div class="row">               
                <div class="col-lg-3 col-sm-6">
                   START widget
                  <a href="#" style="text-decoration: none;">
                    <div class="panel widget bg-orange">
                       <div class="row row-table">
                          <div class="col-xs-4 text-center bg-orange-dark pv-lg">
                             <em class="fa fa-plane fa-3x "></em>
                          </div>
                          <div class="col-xs-8 pv-lg">
                             <div class="h2 mt0">Flight</div>
                             <div class="text-uppercase">Coming Soon</div>
                          </div>
                       </div>
                    </div>
                  </a>
               </div>
                <div class="col-lg-3 col-sm-6">
                   START widget
                  <a href="#" style="text-decoration: none;">
                    <div class="panel widget bg-orange">
                       <div class="row row-table">
                          <div class="col-xs-4 text-center bg-orange-dark pv-lg">
                             <em class="fa fa-bus fa-3x fa-spin"></em>
                          </div>
                          <div class="col-xs-8 pv-lg glow">
                             <div class="h2 mt0">Bus</div>
                             <div class="text-uppercase">Coming Soon</div>
                          </div>
                       </div>
                    </div>
                  </a>
               </div>
                <div class="col-lg-3 col-sm-6">
                   START widget
                  <a href="#" style="text-decoration: none;">
                    <div class="panel widget bg-orange">
                       <div class="row row-table">
                          <div class="col-xs-4 text-center bg-orange-dark pv-lg">
                             <em class="fa fa-plug fa-3x "></em>
                          </div>
                          <div class="col-xs-8 pv-lg">
                             <div class="h2 mt0">Electricity</div>
                             <div class="text-uppercase">Coming Soon</div>
                          </div>
                       </div>
                    </div>
                  </a>
               </div>               
                <div class="col-lg-3 col-sm-6">
                   START widget
                  <a href="#" style="text-decoration: none;">
                    <div class="panel widget bg-orange">
                       <div class="row row-table">
                          <div class="col-xs-4 text-center bg-orange-dark pv-lg">
                             <em class="fa fa-fire-extinguisher fa-3x fa-spin"></em>
                          </div>
                          <div class="col-xs-8 pv-lg">
                             <div class="h2 mt0">GAS</div>
                             <div class="text-uppercase">Coming Soon</div>
                          </div>
                       </div>
                    </div>
                  </a>
               </div>
              
            </div>-->
           <hr> <div class="row">
                          
            <div class="col-md-1"></div>
            <div class="col-md-10">
            <div class="row">
               <div class="col-lg-3 col-sm-6">
                  <!-- START widget-->
                  <div class="panel bg-l-1 pt b0 widget">
                     <div class="ph">
                        <em class="icon-cloud-upload fa-lg pull-right"></em>
                        <div class="h2 mt0"><?php echo $master;?>
                        <span class="text-sm text-white">M.D.</span>
                        </div>
                        <div class="text-uppercase">Master Distributors</div>
                     </div>
                     <div data-sparkline="" data-type="line" data-width="100%" data-height="75px" data-line-color="#23b7e5" data-chart-range-min="0" data-fill-color="#23b7e5" data-spot-color="#23b7e5" data-min-spot-color="#23b7e5" data-max-spot-color="#23b7e5"
                     data-highlight-spot-color="#23b7e5" data-highlight-line-color="#23b7e5" values="2,5,3,7,4,5" style="margin-bottom: -2px" data-resize="true"></div>
                  </div>
               </div>
               <div class="col-lg-3 col-sm-6">
                  <!-- START widget-->
                  <div class="panel widget bg-l-2 pt b0 widget">
                     <div class="ph">
                        <em class="icon-globe fa-lg pull-right"></em>
                        <div class="h2 mt0"><?php echo $super;?>
                           <span class="text-sm text-white">S.D.</span>
                        </div>
                        <div class="text-uppercase">Super Distributors</div>
                     </div>
                     <div data-sparkline="" data-type="line" data-width="100%" data-height="75px" data-line-color="#7266ba" data-chart-range-min="0" data-fill-color="#7266ba" data-spot-color="#7266ba" data-min-spot-color="#7266ba" data-max-spot-color="#7266ba"
                     data-highlight-spot-color="#7266ba" data-highlight-line-color="#7266ba" values="1,4,5,4,8,7,10" style="margin-bottom: -2px" data-resize="true"></div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-12">
                  <!-- START widget-->
                  <div class="panel widget bg-l-3 pt b0 widget">
                     <div class="ph">
                        <em class="icon-bubbles fa-lg pull-right"></em>
                        <div class="h2 mt0"><?php echo $dis;?>
                           <span class="text-sm text-white">D.</span>
                        </div>
                        <div class="text-uppercase">Distributors</div>
                     </div>
                     <div data-sparkline="" data-type="line" data-width="100%" data-height="75px" data-line-color="#23b7e5" data-chart-range-min="0" data-fill-color="#23b7e5" data-spot-color="#23b7e5" data-min-spot-color="#23b7e5" data-max-spot-color="#23b7e5"
                     data-highlight-spot-color="#23b7e5" data-highlight-line-color="#23b7e5" values="4,5,3,10,7,15" style="margin-bottom: -2px" data-resize="true"></div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-12">
                  <!-- START widget-->
                  <div class="panel widget bg-l-4 pt b0 widget">
                     <div class="ph">
                        <em class="icon-pencil fa-lg pull-right"></em>
                        <div class="h2 mt0"><?php echo $ag;?>
                           <span class="text-sm text-white">A.</span>
                        </div>
                        <div class="text-uppercase">Agents</div>
                     </div>
                     <div data-sparkline="" data-type="line" data-width="100%" data-height="75px" data-line-color="#7266ba" data-chart-range-min="0" data-fill-color="#7266ba" data-spot-color="#7266ba" data-min-spot-color="#7266ba" data-max-spot-color="#7266ba"
                     data-highlight-spot-color="#7266ba" data-highlight-line-color="#7266ba" values="1,3,4,5,7,8" style="margin-bottom: -2px" data-resize="true"></div>
                  </div>
               </div>
            </div>
            </div>
            <div class="col-md-1"></div>
           </div>
           
           
            
            <!-- START Widgets-->
<!--            <div class="row">
               <div class="col-lg-3">
                 
                  <div class="panel panel-default">
                     <div class="panel-heading">
                        <div class="panel-title">Recharge</div>
                     </div>
                    
                     <div class="list-group">
                      
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
                       
                       
                     </div>
                    
                     <div class="panel-footer clearfix">
                        <a href="#" class="pull-left">
                           <small>Load more</small>
                        </a>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3">
                  <div class="panel panel-default">
                     <div class="panel-heading">
                        <div class="panel-title">Utility</div>
                     </div>
                     <div class="list-group">
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
                       
                     </div>
                     <div class="panel-footer clearfix">
                        <a href="#" class="pull-left">
                           <small>Load more</small>
                        </a>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3">
                  <div class="panel panel-default">
                     <div class="panel-heading">
                        <div class="panel-title">DMR</div>
                     </div>
                     <div class="list-group">
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
                        </div
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
                        
                     </div>
                     <div class="panel-footer clearfix">
                        <a href="#" class="pull-left">
                           <small>Load more</small>
                        </a>
                     </div>
                  </div>
                  
                   <div class="col-lg-3">
                  <div class="panel panel-default">
                     <div class="panel-heading">
                        <div class="panel-title">Travel</div>
                     </div>
                     <div class="list-group">
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
                     </div>
                     <div class="panel-footer clearfix">
                        <a href="#" class="pull-left">
                           <small>Load more</small>
                        </a>
                     </div>
                  </div>
               </div>
                   
                   
               </div>-->
                
                
            </div>
            <!-- END Widgets-->
         </div>
      </section>