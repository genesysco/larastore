$(document).ready(function(){
	$(document).on('change','#categories',function() {
		showSubcategory($(this).val());
	})
});



function showSubcategory(id) {
	if(id != 0)
		$('#subCategory').removeClass('hidden');
	else
		$('#subCategory').addClass('hidden');
	
	$('#selectedSubcategory').val('');
	
	$('.subCategories').each(function() {
		if($(this).attr('data-parentId') == id)
		{
			$(this).removeClass('hidden');
		}
		else
			$(this).addClass('hidden');
	});
	
}