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
             <li class="active">Create Module Object</li>
          </ol> Create Module Object
          <!-- Small text for title-->
          <span class="text-sm hidden-xs">Quick View of Create Module Object</span>
          <!-- Breadcrumb below title-->

        </h3>
        <div class="row">
           <div class="col-sm-3"></div>
           <div class="col-sm-6">
            <!-- START panel-->
                  <div class="panel panel-default">
                     <div class="panel-heading">Create Module Object form</div>
                       <div class="panel-body">
                           <form role="form" action="" method="post">
                               <div class="form-group">
                                   <label>Module Name <span class="red">*</span></label>
                                  <select class="form-control" name="module_name" class="module_name">
                                      <option value="Select Module"> Select Module </option>
                                  </select>
                               </div>
                               <div class="form-group">
                                  <label>Sub Module Name <span class="red">*</span></label>
                                  <select class="form-control">
                                      <option value="Select Sub Module"> Select Sub Module </option>
                                  </select>
                               </div>
                               <div class="form-group">
                                  <label>Module Object Name <span class="red">*</span></label>
                                  <input type="text" placeholder="Module Object Name" class="form-control">
                               </div>
                               <input type="submit" class="btn btn-sm btn-default" value="Create Module Object" name="create_module_object">
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
//    $(".module_name").change(function(){
//        var  module_name = $(".module_name").val();
//        alert(module_name);
//    });
</script>