$(document).ready(function(){
	$(document).on('click', '.imageRemover',function(){
		deleteImage($(this).attr('data-id'));
	});
});



function deleteImage(id){
	confirmed = confirm("Are you sure ?");
	if(confirmed)
	{
		url = '/administrator/deleteImage/' + id;
		$.get(url, {}, function(response){
			if(response)
			{
				$('#'+id).remove();
			}
			else
				alert("Error on deleting image!");
		});
	}
}