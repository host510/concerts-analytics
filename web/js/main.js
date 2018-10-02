$(document).ready(function(){
	$('input[type=text], input[type=number], input[type=password]').click(function() {
		$(this).attr('value', '');
	});
});