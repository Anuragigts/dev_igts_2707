<section>
         <!-- Page content-->
         <div class="content-wrapper">
            <h3>
               <!-- Breadcrumb right aligned-->
               <ol class="breadcrumb pull-right">

                  <li class="active">Dashboard</li>
               </ol>Dashboard
               <!-- Small text for title-->
               <span class="text-sm hidden-xs">Quick View of Application</span>
               <!-- Breadcrumb below title-->
              
            </h3>
              <?php if($this->session->flashdata('err') != ''){?>
                 <div class="alert alert-block alert-danger fade in">
                     <button data-dismiss="alert" class="close" type="button">
                       ×
                     </button>
                     <p>
                       <?php echo ($this->session->flashdata('err'))?$this->session->flashdata('err'):''?>
                     </p>
                 </div>
             <br>
             <?php }?>

             <?php if($this->session->flashdata('msg') != ''){?>
                 <div class="alert alert-block alert-info fade in no-margin">
                   <button data-dismiss="alert" class="close" type="button">
                     ×
                   </button>
                   <p>
                     <?php echo ($this->session->flashdata('msg'))?$this->session->flashdata('msg'):''?>
                   </p>
                 </div>
                 </br>
             <?php }?>           
             <br>
             <?php if($this->session->userdata('my_type') == 4 || $this->session->userdata('my_type') == 5 ){?>
            <!-- START widgets box-->
           <div class="row">
               <div class="col-md-6 ">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2> Our Products </h2>
                    </div>
               </div>
           <!-- START carousel-->
           
                <div class="row">
                    <div class="col-sm-12 visible-xs">
                       <!-- START widget-->
                       <div class="panel widget">
                          <div class="row row-table">
                             <div class="col-xs-4 text-center bg-green pv-lg">                          
                                 <em class="fa fa-inr fa-3x"></em>
                             </div>
                             <div class="col-xs-8 pv-lg">
                                <div class="h2 mt0">Balance</div>
                                <div class="text-uppercase"><span style="font-family:rupee;font-size:16px">R</span> <span class="vamt">0.00</span></div>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
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
                    <div class="col-lg-6 col-sm-6">
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
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
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
                    <div class="col-lg-6 col-md-6 col-sm-12">
                       <!-- START date widget-->
                       <div class="panel widget bg-warning">
                           <a href="<?php echo base_url();?>dmr/dmrUserSearch" style="text-decoration: none;color:#fff;">
                          <div class="row row-table">
                             <div class="col-xs-4 text-center bg-orange-dark pv-lg ">
                                <em class="fa fa-inr fa-3x fa-spin "></em>
                             </div>
                             <div class="col-xs-8 pv-lg">
                                <div class="h2 mt0">DMR</div>
                                <div class="text-uppercase">Transfer</div>
                             </div>
                          </div>
                           </a>
                       </div>
                       <!-- END date widget    -->
                    </div>
                 </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                       <!-- START widget-->
                       <div class="panel widget bg-purple">
                          <div class="row row-table">
                             <div class="col-xs-4 text-center bg-purple-dark pv-lg">
                                <em class="fa fa-send-o fa-3x"></em>
                             </div>
                             <div class="col-xs-8 pv-lg">
                                <div class="h2 mt0">flight
                                </div>
                                <div class="text-uppercase">Booking</div>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                       <!-- START widget-->
                       <div class="panel widget bg-green">
                          <div class="row row-table">
                             <div class="col-xs-4 text-center bg-green-dark pv-lg">
                                <em class="fa fa-building fa-3x"></em>
                             </div>
                             <div class="col-xs-8 pv-lg">
                                <div class="h2 mt0">hotel</div>
                                <div class="text-uppercase">Booking</div>
                             </div>
                          </div>
                       </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                       <!-- START widget-->
                       <div class="panel widget">
                          <div class="row row-table">
                             <div class="col-xs-4 text-center bg-green pv-lg">                          
                                 <em class="fa fa-bus fa-3x"></em>
                             </div>
                              <div class="col-xs-8 pv-lg " style="background-color: #B7D0BC">
                                <div class="h2 mt0">bus</div>
                                <div class="text-uppercase">Booking</div>
                             </div>
                          </div>
                       </div>
                    </div>
                     <div class="col-lg-6 col-md-6 col-sm-12">
                       <!-- START date widget-->
                       <div class="panel widget">
                       <div class="row row-table">
                          <div class="col-xs-4 text-center bg-green pv-lg">                          
                             <div data-now="" data-format="MMMM" class="text-sm"></div>
                             <br>
                             <div data-now="" data-format="D" class="h2 mt0"></div>
                          </div>
                          <div class="col-xs-8 pv-lg" style="background-color: #B7D0BC">
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
           
           
             </div>
               <div class="col-md-6 ">
                   <div class="row">
                        <div class="col-md-12 text-center">
                            <h2> Notice Board </h2>
                        </div>
                   </div>
                   <div class="row">
                       <div class="col-md-12  ">
                           <div class="greenboard ">
                               <div class="my-title text-center"><h3><font face="Comic Sans MS"><u><?php echo $note->title;?></u></font></h3></div>
                               <div class="my-content">
                                    <p>Hi Mr. <?php echo $this->session->userdata('first_name') ;?> <?php echo $this->session->userdata('middle_name') ;?> <?php echo $this->session->userdata('last_name') ;?>,<p>
                                     <p><?php echo $note->msg;?>
                                     </p>
                                     <p>
                                         For More access you need to contact with support team. You are free to call or email,
                                     </p>
                                     <p> <i class="icon icon-call-end"></i>&nbsp;&nbsp; +91 9666 580220<br>
                                      <i class="icon icon-call-end"></i>&nbsp;&nbsp; +91 9666 580540<br>
                                      <i class="fa fa-envelope-o"></i>&nbsp;&nbsp; support@esytopup.com
                                     </p>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
         </div>
            <!-- END widgets box-->
           
             <?php  }?>
            <!-- END widgets box-->
            

<?php if($this->session->userdata('my_type') == 1 ){?>
            <div class="row">
            <div class="col-md-12">
                <div class="row">
                        <div class="col-md-12 text-center">
                            <h2> View Users </h2>
                        </div>
                   </div>
            <div class="row">
                <div class="col-sm-12 visible-xs">
                       <!-- START widget-->
                       <div class="panel widget">
                          <div class="row row-table">
                             <div class="col-xs-4 text-center bg-green pv-lg">                          
                                 <em class="fa fa-inr fa-3x"></em>
                             </div>
                             <div class="col-xs-8 pv-lg">
                                <div class="h2 mt0">Balance</div>
                                <div class="text-uppercase"><span style="font-family:rupee;font-size:16px">R</span> <span id="phy" class="phy"></span></div>
                             </div>
                          </div>
                       </div>
                    </div>
               <div class="col-lg-3 col-sm-6">
                  <!-- START widget-->
                  <div class="panel bg-l-1 pt b0 widget">
                      <a href="<?php echo base_url();?>master_distributor/view_master_distributor" style="text-decoration: none;color:#fff;">
                     <div class="ph">
                        <em class="fa fa-user fa-lg pull-right"></em>
                        <div class="h2 mt0"><?php echo $master;?>
                        <span class="text-sm text-white">Master Distributors</span>
                        </div>
                        <div class="text-uppercase">Total Amount &nbsp; <span style="font-family:rupee;font-size:16px">R</span> <?php echo $mamt;?></div>
                     </div>
                      </a>
                  </div>
               </div>
               <div class="col-lg-3 col-sm-6">
                  <!-- START widget-->
                  <div class="panel widget bg-l-2 pt b0 widget">
                      <a href="<?php echo base_url();?>super_distributor/view_super_distributor" style="text-decoration: none;color:#fff;">
                     <div class="ph">
                        <em class="fa fa-user fa-lg pull-right"></em>
                        <div class="h2 mt0"><?php echo $super;?>
                           <span class="text-sm text-white">Super Distributors</span>
                        </div>
                        <div class="text-uppercase">Total Amount &nbsp; <span style="font-family:rupee;font-size:16px">R</span> <?php echo $samt;?></div>
                     </div>
                      </a>
                  </div>
               </div>
            
               <div class="col-lg-3 col-md-6 col-sm-12">
                  <!-- START widget-->
                  <div class="panel widget bg-l-3 pt b0 widget">
                      <a href="<?php echo base_url();?>distributor/view_distributor" style="text-decoration: none;color:#fff;">
                     <div class="ph">
                        <em class="fa fa-male fa-lg pull-right"></em>
                        <div class="h2 mt0"><?php echo $dis;?>
                           <span class="text-sm text-white">Distributors</span>
                        </div>
                        <div class="text-uppercase">Total Amount &nbsp; <span style="font-family:rupee;font-size:16px">R</span> <?php echo $damt;?></div>
                     </div>
                      </a>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-12">
                  <!-- START widget-->
                  <div class="panel widget bg-l-4 pt b0 widget">
                       <a href="<?php echo base_url();?>agent/view_agent" style="text-decoration: none;color:#fff;">
                     <div class="ph">
                        <em class="fa fa-child fa-lg pull-right"></em>
                        <div class="h2 mt0"><?php echo $ag;?>
                           <span class="text-sm text-white">Agents</span>
                        </div>
                        <div class="text-uppercase">Total Amount &nbsp; <span style="font-family:rupee;font-size:16px">R</span> <?php echo $aamt;?></div>
                     </div>
                       </a>
                  </div>
               </div>
                
                
            </div>
               
            </div>
               
            
           </div>
<?php }?>  
            
            <?php if($this->session->userdata('my_type') == 2 ){?>
            <div class="row">
            <div class="col-md-6">
                <div class="row">
                        <div class="col-md-12 text-center">
                            <h2> View Users Quick View</h2>
                        </div>
                   </div>
                    <div class="row">
                        <div class="col-sm-12 visible-xs">
                               <!-- START widget-->
                               <div class="panel widget">
                                  <div class="row row-table">
                                     <div class="col-xs-4 text-center bg-green pv-lg">                          
                                         <em class="fa fa-inr fa-3x"></em>
                                     </div>
                                     <div class="col-xs-8 pv-lg">
                                        <div class="h2 mt0">Balance</div>
                                        <div class="text-uppercase"><span style="font-family:rupee;font-size:16px">R</span> <span class="vamt">0.00</span></div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                       <div class="col-lg-6 col-sm-6">
                          <!-- START widget-->
                          <div class="panel widget bg-l-2 pt b0 widget">
                              <a href="<?php echo base_url();?>super_distributor/view_super_distributor" style="text-decoration: none;color:#fff;">
                             <div class="ph">
                                <em class="fa fa-user fa-lg pull-right"></em>
                                <div class="h2 mt0"><?php echo $super;?>
                                   <span class="text-sm text-white">Super Distributors</span>
                                </div>
                                <div class="text-uppercase">Total Amount &nbsp; <span style="font-family:rupee;font-size:16px">R</span> <?php echo $msamt;?></div>
                             </div>
                              </a>
                          </div>
                       </div>

                       <div class="col-lg-6 col-md-6 col-sm-12">
                          <!-- START widget-->
                          <div class="panel widget bg-l-3 pt b0 widget">
                              <a href="<?php echo base_url();?>distributor/view_distributor" style="text-decoration: none;color:#fff;">
                             <div class="ph">
                                <em class="fa fa-male fa-lg pull-right"></em>
                                <div class="h2 mt0"><?php echo $dis;?>
                                   <span class="text-sm text-white">Distributors</span>
                                </div>
                                <div class="text-uppercase">Total Amount &nbsp; <span style="font-family:rupee;font-size:16px">R</span> <?php echo $mdamt;?></div>
                             </div>
                              </a>
                          </div>
                       </div>
                       <div class="col-lg-6 col-md-6 col-sm-12">
                          <!-- START widget-->
                          <div class="panel widget bg-l-4 pt b0 widget">
                               <a href="<?php echo base_url();?>agent/view_agent" style="text-decoration: none;color:#fff;">
                             <div class="ph">
                                <em class="fa fa-child fa-lg pull-right"></em>
                                <div class="h2 mt0"><?php echo $ag;?>
                                   <span class="text-sm text-white">Agents</span>
                                </div>
                                <div class="text-uppercase">Total Amount &nbsp; <span style="font-family:rupee;font-size:16px">R</span> <?php echo $maamt;?></div>
                             </div>
                               </a>
                          </div>
                       </div>
                         <div class="col-lg-6 col-md-6 col-sm-12">
                       <!-- START date widget-->
                       <div class="panel widget">
                       <div class="row row-table">
                          <div class="col-xs-4 text-center bg-green pv-lg">                          
                             <div data-now="" data-format="MMMM" class="text-sm"></div>
                             <br>
                             <div data-now="" data-format="D" class="h2 mt0"></div>
                          </div>
                          <div class="col-xs-8 pv-lg" style="background-color: #B7D0BC">
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
               </div>
                   <div class="col-md-6 ">
                   <div class="row">
                        <div class="col-md-12 text-center">
                            <h2> Notice Board </h2>
                        </div>
                   </div>
                   <div class="row">
                       <div class="col-md-12  ">
                           <div class="greenboard ">
                               <div class="my-title text-center"><h3><font face="Comic Sans MS"><u><?php echo $note->title;?></u></font></h3></div>
                               <div class="my-content">
                                    <p>Hi Mr. <?php echo $this->session->userdata('first_name') ;?> <?php echo $this->session->userdata('middle_name') ;?> <?php echo $this->session->userdata('last_name') ;?>,<p>
                                     <p><?php echo $note->msg;?>
                                     </p>
                                     <p>
                                         For More access you need to contact with support team. You are free to call or email,
                                     </p>
                                     <p> <i class="icon icon-call-end"></i>&nbsp;&nbsp; +91 9666 580220<br>
                                      <i class="icon icon-call-end"></i>&nbsp;&nbsp; +91 9666 580540<br>
                                      <i class="fa fa-envelope-o"></i>&nbsp;&nbsp; support@esytopup.com
                                     </p>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               
               
            
               
            
           </div>
<?php }?>  
            <?php if($this->session->userdata('my_type') == 3 ){?>
            <div class="row">
            <div class="col-md-6">
                <div class="row">
                        <div class="col-md-12 text-center">
                            <h2> View Users Quick View</h2>
                        </div>
                   </div>
                    <div class="row">
                       
                       <div class="col-lg-6 col-md-6 col-sm-12">
                          <!-- START widget-->
                          <div class="panel widget bg-l-3 pt b0 widget">
                              <a href="<?php echo base_url();?>distributor/view_distributor" style="text-decoration: none;color:#fff;">
                             <div class="ph">
                                <em class="fa fa-male fa-lg pull-right"></em>
                                <div class="h2 mt0"><?php echo $dis;?>
                                   <span class="text-sm text-white">Distributors</span>
                                </div>
                                <div class="text-uppercase">Total Amount &nbsp; <span style="font-family:rupee;font-size:16px">R</span> <?php echo $sdamt;?></div>
                             </div>
                              </a>
                          </div>
                       </div>
                       <div class="col-lg-6 col-md-6 col-sm-12">
                          <!-- START widget-->
                          <div class="panel widget bg-l-4 pt b0 widget">
                               <a href="<?php echo base_url();?>agent/view_agent" style="text-decoration: none;color:#fff;">
                             <div class="ph">
                                <em class="fa fa-child fa-lg pull-right"></em>
                                <div class="h2 mt0"><?php echo $ag;?>
                                   <span class="text-sm text-white">Agents</span>
                                </div>
                                <div class="text-uppercase">Total Amount &nbsp; <span style="font-family:rupee;font-size:16px">R</span> <?php echo $saamt;?></div>
                             </div>
                               </a>
                          </div>
                       </div>
                         <div class="col-lg-6 col-sm-12 ">
                               <!-- START widget-->
                               <div class="panel widget">
                                  <div class="row row-table">
                                     <div class="col-xs-4 text-center bg-green pv-lg">                          
                                         <em class="fa fa-inr fa-3x"></em>
                                     </div>
                                     <div class="col-xs-8 pv-lg">
                                        <div class="h2 mt0">Balance</div>
                                        <div class="text-uppercase"><span style="font-family:rupee;font-size:16px">R</span> <span class="vamt">0.00</span></div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         <div class="col-lg-6 col-md-6 col-sm-12">
                       <!-- START date widget-->
                       <div class="panel widget">
                       <div class="row row-table">
                          <div class="col-xs-4 text-center bg-green pv-lg">                          
                             <div data-now="" data-format="MMMM" class="text-sm"></div>
                             <br>
                             <div data-now="" data-format="D" class="h2 mt0"></div>
                          </div>
                          <div class="col-xs-8 pv-lg" style="background-color: #B7D0BC">
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
               </div>
                   <div class="col-md-6 ">
                   <div class="row">
                        <div class="col-md-12 text-center">
                            <h2> Notice Board </h2>
                        </div>
                   </div>
                   <div class="row">
                       <div class="col-md-12  ">
                           <div class="greenboard ">
                               <div class="my-title text-center"><h3><font face="Comic Sans MS"><u><?php echo $note->title;?></u></font></h3></div>
                               <div class="my-content">
                                    <p>Hi Mr. <?php echo $this->session->userdata('first_name') ;?> <?php echo $this->session->userdata('middle_name') ;?> <?php echo $this->session->userdata('last_name') ;?>,<p>
                                     <p><?php echo $note->msg;?>
                                     </p>
                                     <p>
                                         For More access you need to contact with support team. You are free to call or email,
                                     </p>
                                     <p> <i class="icon icon-call-end"></i>&nbsp;&nbsp; +91 9666 580220<br>
                                      <i class="icon icon-call-end"></i>&nbsp;&nbsp; +91 9666 580540<br>
                                      <i class="fa fa-envelope-o"></i>&nbsp;&nbsp; support@esytopup.com
                                     </p>
                               </div>
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