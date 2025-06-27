$(document).ready(function(){
	$('.smallImage').click(function(){
		let selectedImage = $(this);
		changeImage(selectedImage);
	});
});


function changeImage(selectedImage){
	big = $('#bigImage');
	big.attr('src', selectedImage.attr('src'));
	big.attr('data-id', selectedImage.attr('data-id'));
	$('.smallImage').addClass('opacity-50');
	selectedImage.removeClass('opacity-50');
}