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
    
    // Get city by ajax
    $('#state').change(function(){
        var id =  $('option:selected', this).attr('state_id');//$('#state').val();
       
        $.post('<?php echo base_url();?>dmr/getCity',{'state':id},function(response){
                //alert(response);
                if(response != ""){
                        $('#city').html(response);							
                }else{
                      $('#city').html("<option value=''>Select</option>");
                }					
            });
    });
     
    
$(function(){
        $('#country-id').change(function(){
		var country    =    $("#country-id").val();
                if(country != "Select Country" ) {
                    $.post('<?=base_url()?>common/state',
                            {'country':country},function(response){
                                $('#state-id').html(response);
                    });
                }else{
                        $('#state-id').html('<option value="Select State"> Select State </option>');
                        $('#city-id').html('<option value="Select City"> Select City </option>');
                }                
	});
        $('#state-id').change(function(){
		var state    =    $("#state-id").val();
                if(state != "Select State" ) {
                    $.post('<?=base_url()?>common/city',
                            {'state':state},function(response){
                                $('#city-id').html(response);
                    });
                }else{
                        $('#city-id').html('<option value="Select City"> Select City </option>');
                }                
	});
});
</script>