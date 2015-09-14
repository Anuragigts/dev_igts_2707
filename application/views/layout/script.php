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
    $('#mobile-ope-find').on('keyup  change', function() {
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
               //alert( $( res ).size());
               if($( res ).size() > 2){
                    $('.select-oprator').html(res[0]);   
                    $('#code').val(res[1]);  						
                    $('#circle').val(res[2]); 
                    $("#loading").modal('hide');
                    $("#amount").focus();
                     $('.circle1').hide();
                    $('.circle2').show();
                }else{
                   $("#loading").modal('hide');
                    return false; 
                }
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
      // alert(id);
        $.post('<?php echo base_url();?>common/city',{'state':id},function(response){
                //alert(response);
                if(response != ""){
                        $('#city').html(response);							
                }else{
                      $('#city').html("<option value=''>Select</option>");
                }					
            });
    });
     
    
$(function(){
     $.ajax({url:'<?php echo base_url();?>recharge/getamt',success:function(result){
                $('.phy').html(result);
            }
        });
        $.ajax({url:'<?php echo base_url();?>settings/getVirtual',success:function(result){
                $('.vamt').html(result);
            }
        });
    
        $( ".state_id" ).change(function() {
                var str = $(".state_id option:selected" ).val();
                var str1 = $(".city-id-val option:selected" ).val();
                if(str != "Select State" && str1 == "Select City" ) {
                        $.post('<?=base_url()?>common/city',
                                    {'state':str},function(response){
                                    $('.city-id-val').html(response);
                        });
                } 
        }).trigger( "change" );
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
        
        $( ".master-id" ).change(function() {
                var master    =    $(".master-id option:selected").val();
		var valdist   =    $(this).attr("val-dis");
                
                var str1 = $("#package option:selected" ).val();
                if(master != "Select Master Distributor" && str1 == "Select Package" ) {
//                if(master != "Select Master Distributor" ) {
                        $.post('<?=base_url()?>common/packages',
                                    {'master':master,'valdist':valdist},function(response){
                                    $('#package').html(response);
                        });
                }
        }).trigger( "change" );
        $('#master-id1').change(function(){
		var master    =    $("#master-id1").val();
		var valdist   =    $(this).attr("val-dis");
                if(master != "Select Master Distributor") {
                        $.post('<?=base_url()?>common/packages',
                                    {'master':master,'valdist':valdist},function(response){
                                    $('#package').html(response);
                        });
                }             
	});
        $('#master-id-super').change(function(){
		var master    =    $("#master-id-super").val();
                if(master != "Select Master Distributor" ) {
                        $.post('<?=base_url()?>common/superdistributors',
                                    {'master':master},function(response){
                                    $('#super-id').html(response);
                        });
                }else{
                        $('#super-id').html('<option value="Select Super Distributor"> Select Super Distributor </option>');
                }                
	});
        $('#super-id').change(function(){
                var master    =    $("#master-id-super").val();
		var super1     =    $("#super-id").val();
		var valdist   =    $(this).attr("val-dis");
                if(super1 != "Select Super Distributor" ) {
                        $.post('<?=base_url()?>common/packages',
                                    {'master':master,'super1':super1,'valdist':valdist},function(response){
                                    $('#package').html(response);
                        });
                }else{
                        $('#package').html('<option value="Select Package"> Select Package </option>');
                }                
	});
        $('#master-id-super-val').change(function(){
		var master    =    $("#master-id-super-val").val();
                if(master != "Select Master Distributor" ) {
                        $.post('<?=base_url()?>common/superdistributors',
                                    {'master':master},function(response){
                                    $('#super-id-val').html(response);
                        });
                }else{
                        $('#super-id-val').html('<option value="Select Super Distributor"> Select Super Distributor </option>');
                }                
	});
        $('#super-id-val').change(function(){
		var master    =    $("#super-id-val").val();
		var valdist   =    $(this).attr("val-dis");
                if(master != "Select Distributor" ) {
                        $.post('<?=base_url()?>common/distributors',
                                    {'master':master,'valdist':valdist},function(response){
                                    $('#distributor').html(response);
                        });
                }else{
                        $('#distributor').html('<option value="Select Distributor"> Select Distributor </option>');
                }                
	});
        $('#distributor').change(function(){
		var master    =    $("#distributor").val();
		var valdist   =    $(this).attr("val-dis");
                if(master != "Select Distributor" ) {
                        $.post('<?=base_url()?>common/packages',
                                    {'master':master,'valdist':valdist},function(response){
                                    $('#package').html(response);
                        });
                }else{
                        $('#package').html('<option value="Select Package"> Select Package </option>');
                }                           
	});
});
    $('.activate').click(function(){
            var login         =   $(this).attr("login");
            var user_name     =   $(this).attr("user_name");
//            var avr = $(".activate").is(':checked') ? 1 : 0;
            var status      =   1;
             $.post('<?=base_url()?>common/common_off_actdeact',
                {'status':status,'login':login},function(response){
                        if(response == 1){
                               $(".success").html(user_name+" has been Activated");
                               $(".error").html("");
                               setTimeout(function(){
                                        location.reload();
                                }, 3000);
                        }
                        else{
                                $(".error").html(user_name+" has been not activated");
                                $(".success").html("");
                        }
            });
    });
    
    $('.deactivate').click(function(){
            var login         =   $(this).attr("login");
            var user_name     =   $(this).attr("user_name");
//            var avr = $(".activate").is(':checked') ? 1 : 0;
            var status      =   0;
             $.post('<?=base_url()?>common/common_off_actdeact',
                {'status':status,'login':login},function(response){
                        if(response == 1){
                               $(".success").html(user_name+" has been Deactivated");
                               $(".error").html("");
                               setTimeout(function(){
                                        location.reload();
                                }, 3000);
                        }
                        else{
                                $(".error").html(user_name+" has been not Deactivated");
                                $(".success").html("");
                        }
            });
    });
function showSupers(str,user) {
    $("#user_val_super").html("Super Distributors under this "+user);
    if (str.length == 0) { 
        document.getElementById("txtSuperval").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtSuperval").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "<?=base_url();?>common/getallSupers/" + str, true);
        xmlhttp.send();
    }
}
function showDistributors(str,user) {
    $("#user_val").html("Distributors   under this "+user);
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "<?=base_url();?>common/getallDistributors/" + str, true);
        xmlhttp.send();
    }
}
function showAgents(str,user) {
    $("#dis_user_val").html("Agents under this "+user);
    if (str.length == 0) { 
        document.getElementById("txtHint_val").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint_val").innerHTML = xmlhttp.responseText;
            }
        }       
        xmlhttp.open("GET", "<?=base_url();?>common/getAgents/" + str, true);
        xmlhttp.send();
    }
}


$("#user_type").change(function(){
        var id =  $('option:selected', this).val();//$('#state').val();
       $.post('<?php echo base_url();?>reports/getUsers',{'user':id},function(response){
               //alert(response);
               if(response != ""){
                       $('#fname').html(response);							
               }else{
                     $('#fname').html("<option value=''> Select  User type</option>");
               }					
           }); 
 });
 $('.approvefund').click(function(){
            var fund         =   $(this).attr("fund");
            var login         =   $(this).attr("login");
            var user_name     =   $(this).attr("user_name");
            var amount      =   $(this).attr("amount");
            var status      =   1;
             $.post('<?=base_url()?>funds/fund_actdeact',
                {'status':status,'fund':fund,'login':login,'amount':amount},function(response){
                    
                    //alert(response);
                        if(response == 1){
                               $(".success").html(user_name+" has been Approved");
                               $(".error").html("");
                               setTimeout(function(){
                                        location.reload();
                                }, 3000);
                        }
                        else{
                                $(".error").html(user_name+" has been not Approved");
                                $(".success").html("");
                        }
            });
    });
 $('.notapprovefund').click(function(){
            var fund         =   $(this).attr("fund");
            var login         =   $(this).attr("login");
            var user_name     =   $(this).attr("user_name");
             var amount      =   $(this).attr("amount");
            var status      =   2;
             $.post('<?=base_url()?>funds/fund_actdeact',
               {'status':status,'fund':fund,'login':login,'amount':amount},function(response){
                        if(response == 1){
                               $(".success").html(user_name+" has been Rejected");
                               $(".error").html("");
                               setTimeout(function(){
                                        location.reload();
                                }, 3000);
                        }
                        else{
                                $(".error").html(user_name+" has been not Rejected");
                                $(".success").html("");
                        }
            });
    });
 $('.ref_fund').click(function(){
            var fund         =   $(this).attr("fund");
            var login         =   $(this).attr("login");
            var user_name     =   $(this).attr("user_name");
             var amount      =   $(this).attr("amount");
            var status      =  1;
             $.post('<?=base_url()?>funds/reffund_actdeact',
               {'status':status,'fund':fund,'login':login,'amount':amount},function(response){
                        if(response == 1){
                               $(".success").html(user_name+" has been Approved");
                               $(".error").html("");
                               setTimeout(function(){
                                        location.reload();
                                }, 3000);
                        }
                        else{
                                $(".error").html(user_name+" has been not Approved");
                                $(".success").html("");
                        }
            });
    });
 $('.noref_fund').click(function(){
            var fund         =   $(this).attr("fund");
            var login         =   $(this).attr("login");
            var user_name     =   $(this).attr("user_name");
             var amount      =   $(this).attr("amount");
            var status      =  2;
             $.post('<?=base_url()?>funds/reffund_actdeact',
               {'status':status,'fund':fund,'login':login,'amount':amount},function(response){
                        if(response == 1){
                               $(".success").html(user_name+" has been Rejected");
                               $(".error").html("");
                               setTimeout(function(){
                                        location.reload();
                                }, 3000);
                        }
                        else{
                                $(".error").html(user_name+" has been not Rejected");
                                $(".success").html("");
                        }
            });
    });
 $('.refund_req').click(function(){
            var reid         =   $(this).attr("recharge_id");
             var amount      =   $(this).attr("amount");
            var status      =   0;
             $.post('<?=base_url()?>reports/refund_req',
               {'status':status,'reid':reid,'amount':amount},function(response){
                        if(response == 1){
                               $(".success").html("Your complaint has been succefully transferred to admin");
                               $(".error").html("");
                               setTimeout(function(){
                                        location.reload();
                                }, 3000);
                        }
                        else{
                                $(".error").html("Your complaint has not been transferred to admin");
                                $(".success").html("");
                        }
            });
    });
</script>