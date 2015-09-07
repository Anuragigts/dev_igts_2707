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
             <?php if($this->session->userdata('my_type') != 1 ){?>
            <!-- START widgets box-->
            <div class="row">
                          <div class="col-md-12 text-center">
                              <h2> Our Products </h2>
                          </div>
           </div>
           <!-- START carousel-->
           
           <div class="row">
               <div class="col-lg-3 col-sm-6">
                  <!-- START widget-->
                  <div class="panel widget bg-primary">
                      <a href="<?php echo base_url();?>recharge/mobile_recharge" style="text-decoration: none;color:#fff;">
                     <div class="row row-table">
                        <div class="col-xs-4 text-center bg-primary-dark pv-lg">
                           <em class="fa fa-fax fa-3x"></em>
                        </div>
                        <div class="col-xs-8 pv-lg">
                           <div class="h2 mt0">pre paid</div>
                           <div class="text-uppercase">Recharge</div>
                        </div>
                     </div>
                      </a>
                  </div>
               </div>
               <div class="col-lg-3 col-sm-6">
                  <!-- START widget-->
                  <div class="panel widget bg-purple">
                      <a href="<?php echo base_url();?>recharge/dth_recharge" style="text-decoration: none;color:#fff;">
                     <div class="row row-table">
                        <div class="col-xs-4 text-center bg-purple-dark pv-lg">
                           <em class="fa fa-rss fa-3x"></em>
                        </div>
                        <div class="col-xs-8 pv-lg">
                           <div class="h2 mt0">DTH
                           </div>
                           <div class="text-uppercase">Recharge</div>
                        </div>
                     </div>
                      </a>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-12">
                  <!-- START widget-->
                  <div class="panel widget bg-green">
                      <a href="<?php echo base_url();?>recharge/post_recharge" style="text-decoration: none;color:#fff;">
                     <div class="row row-table">
                        <div class="col-xs-4 text-center bg-green-dark pv-lg">
                           <em class="fa fa-money fa-3x"></em>
                        </div>
                        <div class="col-xs-8 pv-lg">
                           <div class="h2 mt0">post paid</div>
                           <div class="text-uppercase">Bill Payment</div>
                        </div>
                     </div>
                      </a>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-12">
                  <!-- START date widget-->
                  <div class="panel widget">
                      <a href="<?php echo base_url();?>recharge/post_recharge" style="text-decoration: none;color:#000">
                     <div class="row row-table">
                        <div class="col-xs-4 text-center bg-green pv-lg">                          
                           <em class="fa fa-money fa-3x"></em>
                        </div>
                        <div class="col-xs-8 pv-lg">
                           <div class="h2 mt0">Land Line</div>
                           <div class="text-uppercase">Bill Payment</div>
                        </div>
                     </div>
                      </a>
                  </div>
                  <!-- END date widget    -->
               </div>
            </div>
           <div class="row">
               <div class="col-lg-3 col-sm-6">
                  <!-- START widget-->
                  <div class="panel widget bg-primary">
                      <a href="<?php echo base_url();?>dmr/dmrUserSearch" style="text-decoration: none;color:#fff;">
                     <div class="row row-table">
                        <div class="col-xs-4 text-center bg-primary-dark pv-lg">
                           <em class="fa fa-inr fa-3x"></em>
                        </div>
                        <div class="col-xs-8 pv-lg">
                           <div class="h2 mt0">DMR</div>
                           <div class="text-uppercase">Transfer</div>
                        </div>
                     </div>
                      </a>
                  </div>
               </div>
               <div class="col-lg-3 col-sm-6">
                  <!-- START widget-->
                  <div class="panel widget bg-purple">
                     <div class="row row-table">
                        <div class="col-xs-4 text-center bg-purple-dark pv-lg">
                           <em class="fa fa-send-o fa-3x"></em>
                        </div>
                        <div class="col-xs-8 pv-lg">
                           <div class="h2 mt0">Flight
                           </div>
                           <div class="text-uppercase">Booking</div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-12">
                  <!-- START widget-->
                  <div class="panel widget bg-green">
                     <div class="row row-table">
                        <div class="col-xs-4 text-center bg-green-dark pv-lg">
                           <em class="fa fa-building fa-3x"></em>
                        </div>
                        <div class="col-xs-8 pv-lg">
                           <div class="h2 mt0">Hotel</div>
                           <div class="text-uppercase">Booking</div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-12">
                  <!-- START date widget-->
                  <div class="panel widget">
                     <div class="row row-table">
                        <div class="col-xs-4 text-center bg-green pv-lg">                          
                           <div data-now="" data-format="MMMM" class="text-sm"></div>
                           <br>
                           <div data-now="" data-format="D" class="h2 mt0"></div>
                        </div>
                        <div class="col-xs-8 pv-lg">
                           <div data-now="" data-format="dddd" class="text-uppercase"></div>
                           <br>
                           <div data-now="" data-format="h:mm" class="h2 mt0"></div>
                           <div data-now="" data-format="a" class="text-muted text-sm"></div>
                        </div>
                     </div>
                  </div>
                  <!-- END date widget    -->
               </div>
            </div>
            <!-- END widgets box-->
            <br>
            <div id="carousel-example-captions" data-ride="carousel" class="carousel slide">
               
               <div role="listbox" class="carousel-inner">
                  <div class="item active">
                      <div class="row">
                          <div class="col-md-12">
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
                                
                                  

                                 <?php //} ?>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="item">
                      <div class="row">
                          <div class="col-md-12">
                              <div class="row">
                                <?php //if($this->session->userdata('recharge') == 1){?>
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
                                 
                                 <?php //} ?>
                              </div>
                          </div>
                        
                      </div>
                  </div>
                   <div class="item">
                      <div class="row">
                         
                          <div class="col-md-12">
                              <div class="row">
                                <?php //if($this->session->userdata('recharge') == 1){?>
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

                                 <?php //} ?>
                              </div>
                          </div>
                          
                      </div>
                  </div>
                   <div class="item">
                      <div class="row">
                          <div class="col-md-12">
                              <div class="row">
                                <?php //if($this->session->userdata('recharge') == 1){?>
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
                                 <?php //} ?>
                              </div>
                          </div>
                          
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
             <?php  }?>
            <!-- END widgets box-->
            

<?php if($this->session->userdata('my_type') == 1 ){?>
            <div class="row">
            <div class="col-md-12">
            <div class="row">
               <div class="col-lg-3 col-sm-6">
                  <!-- START widget-->
                  <div class="panel bg-l-1 pt b0 widget">
                      <a href="<?php echo base_url();?>master_distributor/create_master_distributor" style="text-decoration: none;color:#fff;">
                     <div class="ph">
                        <em class="fa fa-user fa-lg pull-right"></em>
                        <div class="h2 mt0"><?php echo $master;?>
                        <span class="text-sm text-white">M.D. (Create)</span>
                        </div>
                        <div class="text-uppercase">Master Distributors</div>
                     </div>
                      </a>
                  </div>
               </div>
               <div class="col-lg-3 col-sm-6">
                  <!-- START widget-->
                  <div class="panel widget bg-l-2 pt b0 widget">
                      <a href="<?php echo base_url();?>super_distributor/create_super_distributor" style="text-decoration: none;color:#fff;">
                     <div class="ph">
                        <em class="fa fa-user fa-lg pull-right"></em>
                        <div class="h2 mt0"><?php echo $super;?>
                           <span class="text-sm text-white">S.D. (Create)</span>
                        </div>
                        <div class="text-uppercase">Super Distributors</div>
                     </div>
                      </a>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-12">
                  <!-- START widget-->
                  <div class="panel widget bg-l-3 pt b0 widget">
                      <a href="<?php echo base_url();?>distributor/create_distributor" style="text-decoration: none;color:#fff;">
                     <div class="ph">
                        <em class="fa fa-male fa-lg pull-right"></em>
                        <div class="h2 mt0"><?php echo $dis;?>
                           <span class="text-sm text-white">D. (Create)</span>
                        </div>
                        <div class="text-uppercase">Distributors</div>
                     </div>
                      </a>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-12">
                  <!-- START widget-->
                  <div class="panel widget bg-l-4 pt b0 widget">
                       <a href="<?php echo base_url();?>agent/create_agent" style="text-decoration: none;color:#fff;">
                     <div class="ph">
                        <em class="fa fa-child fa-lg pull-right"></em>
                        <div class="h2 mt0"><?php echo $ag;?>
                           <span class="text-sm text-white">A. (Create)</span>
                        </div>
                        <div class="text-uppercase">Agents</div>
                     </div>
                       </a>
                  </div>
               </div>
            </div>
            </div>
            
           </div>
<?php }?>   
                
            </div>
            <!-- END Widgets-->
         </div>
      </section>