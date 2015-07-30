/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function(){
        /*  Not to allow special characters for email */
	$('.email').keyup(function()
	{
		var yourInput = $(this).val();
		re = /[` ~!#$%^&*()|+\-=?;:'",<>\{\}\[\]\\\/]/gi;
		var isSplChar = re.test(yourInput);
		if(isSplChar)
		{
			var no_spl_char = yourInput.replace(/[` ~!#$%^&*()|+\-=?;:'",<>\{\}\[\]\\\/]/gi, '');
			$(this).val(no_spl_char);
		}
	});
 
});
 function validateR(element,replacement){
        //  IE
        if(! element)
         element = window.event.srcElement;
         element.value = element.value.replace(new RegExp(element.getAttribute('ruleset'), 'gi'), replacement);
}
 function onlyAlpha(evt) {
        evt = (evt) ? evt : event;
            var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
              ((evt.which) ? evt.which : 0));
            if (charCode == 32)
                    return true;
            if (charCode > 31 && (charCode < 65 || charCode > 90) &&
              (charCode < 97 || charCode > 122)) {
                    return false;
            }
            else
                    return true;
}