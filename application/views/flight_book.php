<section>
         <!-- Page content-->
    <div class="content-wrapper">
       <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
             <li><a href="<?php echo base_url();?>dashboard">Dashboard</a>
             </li>                  
              <li><a href="<?php echo base_url();?>flight/searchFlight">Search Flight</a>
             </li>               
             <li class="active">Book Ticket</li>                 
          </ol>Book Ticket
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">Book flight ticket </span>
          <!-- Breadcrumb below title-->
       </h3>
       <!-- START widgets box-->
       
       <div class="row">
           <div class="col-md-8"><br>
               <div class="row panel mypad">
                    <div class="col-md-3 text-center">
                        <center><img src="<?php echo $flight['logo'];?>" class='img img-responsive center' /></center>
                         <?php echo "<span class='dull1'>".$flight['name']."</span>";?>
                    </div>
                    <div class="col-md-3 text-center">
                        <span class="he1">Source</span><br>
                        <span class=""><b><?php echo $flight['dep'];?></b></span>
                        <br>
                        <span class='dull1'><?php echo $flight['source'];?></span>

                    </div>
                    <div class="col-md-3 text-center">
                        <span class="he1">Destination</span><br>
                        <span class=""><b><?php echo $flight['arr'];?></b></span>
                        <br>
                        <span class='dull1'><?php echo $flight['dest'];?></span>

                    </div>
                    <div class="col-md-3 text-center">
                        <span class="he1">Duration</span><br>
                        <span class=""><b><?php echo $flight['dur'];?></b></span><br>
                        <span class='dull1'>
                        <?php echo $flight['stop'];?>
                        </span>
                    </div>
                   
                   <div class="row">
                       <div class="panel panel-default">
                            <div class="panel-body">
                                <form role="form" action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>First Name<span class="red">*</span></label>
                                                <input type="text" placeholder="First Name" class="form-control" name="first_name" value="<?= set_value('first_name');?>" onkeypress="return onlyAlpha(event);" maxlength="50">
                                                <span class="red"><?= form_error('first_name');?></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Last Name<span class="red">*</span></label>
                                                <input type="text" placeholder="Last Name" class="form-control" name="last_name" value="<?= set_value('last_name');?>" onkeypress="return onlyAlpha(event);" maxlength="50">
                                                <span class="red"><?= form_error('last_name');?></span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                       </div>
                   </div>
                    
                </div>
           </div>
           <div class="col-md-4 top-5">
               <?php echo $get_details;?>
           </div>
       </div>
    </div>
</section>