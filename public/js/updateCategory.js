$(document).ready(function() {
	let _html = $('html');
	$('#editCategory').click(function(){
		if(_html.attr('dir') == 'rtl' )
		{
			$('#newFaCategory').attr('name','catName');
		}
		else
		{
			$('#newEnCategory').attr('name','catName');
		}
	});
})