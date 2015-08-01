<table id="datatable1" class="table table-striped table-hover">
    <thead>
       <tr>
          <th>Package Name</th>
          <th>Name</th>
          <th width="20%">Mobile No.</th>
          <th width="35%">Email</th>
          <th></th>
       </tr>
    </thead>
    <tbody>
        <?php                                                                        
          foreach ($get as $super){
            $supername = ucfirst($super->first_name." ".$super->middle_name." ".$super->last_name);
            ?>
              <tr>

                  <th><?= ucfirst($super->package_name);?></th>
                  <th><?= $supername;?></th>
                  <th><?= $super->mobile;?></th>
                  <th><?= ucfirst($super->login_email);?></th>
                  <th>
                      <a href="javascript:void(0);" onclick="showAgents(<?= $super->login_id;?>,'<?= $supername;?>')">View All Agents</a>
                  </th>
               </tr>
          <?php }?>
    </tbody>
 </table>