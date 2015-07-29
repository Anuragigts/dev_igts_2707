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
        $('.rec-data').html('');
        var code = $('option:selected', this).attr('op_code');
        $('#code').val(code);
    });
    // get operator - anurag
    $('#mobile-ope-find').keyup(function(){
        var num = $('#mobile-ope-find').val();
        if(num.length < 4){
             $('.rec-data').html('');
        }
        if(num.length == 10){
            $("#loading").modal('show');
            $.post('<?php echo base_url();?>recharge/getAjaxOperator',{'number':num},function(response){
            //alert(response);
            if(response !=''){
               var res = response.split("@@");
                    $('.select-oprator').html(res[0]);   
                    $('#code').val(res[1]);  						
                    $('#circle').val(res[2]); 
                    $("#loading").modal('hide');
                }else{
                    $("#loading").modal('hide');
                    return false;	
                }					
            });
        }
    });
    // Get tariff plans - anurag
   $('#get-plans').click(function(){
        var operator = $('.select-oprator').val();
        var circle = $('#circle').val();
        if(operator == '' || circle== ''){
            $('.alert-er').show();
        }else{
            $('.alert-er').hide();
             $("#loading").modal('show');
            $.post('<?php echo base_url();?>recharge/getAjaxPlans',{'operator':operator,'circle':circle},function(response){
               // alert(response);
                if(response !=''){                        
                        var res = response.split("@@@@");
                        $('#pln-full').html(res[0]);
                        $('#pln-top').html(res[1]);
                        $('#pln-special').html(res[2]);
                        $('#pln-tog').html(res[3]);
                        $('#pln-thg').html(res[4]);
                        $('#pln-rom').html(res[5]);
                        $("#loading").modal('hide');
                    }else{
                            $('.alert-er').show();
                            $("#loading").modal('hide');
                    }					
                });
        }
    });
    //keep plans - Anurag
    

    $(document).on('click', '.get-pl', function(){ 
        var amt = $(this).attr('get-pl-val');
        $('#amount').val(amt);
    });
   
     
    
</script>