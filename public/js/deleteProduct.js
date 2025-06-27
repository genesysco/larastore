$(document).ready(function() {
	$('.removeProduct').click(function(){
		remove($(this).attr('data-id'),$(this).attr('data-pName'));
	});
});



function remove(id,pName) {
	let confirmed = confirm(`Do you really want to remove product : ${pName} ?`);
	if(confirmed)
	{
		selectedProduct = $("#" + id);
		// selectedProduct.remove();

		url = "/administrator/deleteProduct/" + id;
		$.get(url,{},function(response){
			if(response)
			{
				selectedProduct.remove();
				alert(`${pName} deleted successfully!`);
			}
			else
				alert("Error! try again.");
		});
	}
}