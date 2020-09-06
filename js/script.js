$(function(){
	$('#form').on('submit',function(event){
		$('input:not([type="submit"])').each(function(){
			if ($(this).val() == '') {
				$('#error').html('Minden mező kitöltése kötelező!');
				event.preventDefault();
			}
		});
	});
});