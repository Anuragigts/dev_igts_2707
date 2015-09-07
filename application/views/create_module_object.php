<section>
    <!-- Page content-->
    <div class="content-wrapper">
        <h3>
          <!-- Breadcrumb right aligned-->
          <ol class="breadcrumb pull-right">
              <li><a href="<?php echo base_url();?>dashboard">Dashboard</a></li> 
             <li class="active">Create Module Object</li>
          </ol> Create Module Object
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">For the creation of Module Object</span>
          <!-- Breadcrumb below title-->

        </h3>
        <div class="row">
           <?php   $this->load->view("layout/success_error");?> 
           <div class="col-sm-3"></div>
           <div class="col-sm-6">
            <!-- START panel-->
                  <div class="panel panel-default">
                     <!--<div class="panel-heading">Create Module Object</div>-->
                       <div class="panel-body">
                           <form role="form" action="" method="post">
                               <div class="form-group">
                                   <label>Module Name <span class="red">*</span></label>
                                    <select class="form-control" name="module_name" id="module_name">
                                      <option value="Select Module"> Select Module </option>
                                      <?php if(count($module_name1) > 0){ 
                                            foreach ($module_name1 as $val ){ ?>
                                                <!--<option value="<?= $val->module_id;?>" <?php // echo set_select('module_name',$val->module_id);?>><?= $val->module_name;?></option>-->
                                                <option value="<?= $val->module_id;?>"><?= $val->module_name;?></option>
                                            <?php }
                                      }?>
                                    </select>
                                    <span class="red"><?= form_error('module_name');?></span>
                               </div>
                               <div class="form-group">
                                  <label>Service Type <span class="red">*</span></label>
                                  <select class="form-control" name="sub_module_name" id="sub_module_name">
                                      <option value="Select Sub Module"> Select Sub Module </option>
                                  </select>
                                  <span class="red"><?= form_error('sub_module_name');?></span>
                               </div>
                               <div class="form-group">
                                  <label>Service Name <span class="red">*</span></label>
                                  <input type="text" placeholder="Module Object Name" class="form-control" name="module_object_name" value="<?= set_value('module_object_name');?>">
                                  <span class="red"><?= form_error('module_object_name');?></span>
                               </div>
                               <input type="submit" class="btn btn-sm btn-info" value="Create Module Object" name="create_module_object">
                           </form>
                       </div>
                  </div>
            </div>
            <div class="col-sm-3"></div>
            <!-- END panel-->
          </div>
    </div>
 </section>
<script>
    $("#module_name").change(function () {
    var module_name=$('#module_name').val();
        $.post('<?=base_url()?>module_object/sub_module_name',
        {'module_name':module_name},function(response){
            $('#sub_module_name').html(response);
        });
    });
</script>