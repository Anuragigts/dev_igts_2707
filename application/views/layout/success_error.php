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
<?php if($this->session->flashdata('war') != ''){?>
    <div class="alert alert-block alert-warning fade in no-margin">
      <button data-dismiss="alert" class="close" type="button">
        ×
      </button>
      <p>
        <?php echo ($this->session->flashdata('war'))?$this->session->flashdata('war'):''?>
      </p>
    </div>
    </br>
<?php }?> 