<script type="text/javascript">
//////////////////////// Validate for only int /////////////////////////////////////////////////
  function validateR(element,replacement)
   {
     //  IE
     if(! element)
      element = window.event.srcElement;
      element.value = element.value.replace(new RegExp(element.getAttribute('ruleset'), 'gi'), replacement);
   }


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
   
    $('.select-oprator').change(function(){       
        var code = $('option:selected', this).attr('op_code');
        $('#code').val(code);
    });
    
    $('#mobile-ope-find').keyup(function(){
        var num = $('#mobile-ope-find').val();
        if(num.length == 10){
            $.post('<?php echo base_url();?>recharge/getAjaxOperator',{'number':num},function(response){
            //alert(response);
            if(response !=''){
               var res = response.split("@@");
                    $('.select-oprator').html(res[0]);   
                    $('#code').val(res[1]);  						
                    $('#circle').val(res[2]);  						
                }else{
                        return false;	
                }					
            });
        }
    });
    
</script>