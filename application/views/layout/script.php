<script>

var main = "<?php echo $this->uri->segment(2);?>";
var sub = "<?php echo $this->uri->segment(3);?>";

if(sub !=''){
    $('.'+sub).addClass('active');
}
if(main !=''){
    $('.'+main).addClass('active');
}else{
    $('.dashboard').addClass('active');
}
</script>