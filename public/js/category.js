$(document).ready(function(){
	
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$('#addCategory').click(function() {
		addCategory();
	});

	$(document).on('click','.removeCategory',function() {
		removeCategory($(this).attr('data-id'),$(this).attr('data-name'))
	});
});



function addCategory() {

	if($('.en').hasClass('hidden'))
		var newCat = $('#newFaCategory').val();
	else
		var newCat = $('#newEnCategory').val();

	if(newCat.length >= 3)
	{
		$('#addCategory').addClass('opacity-50');
		$('#addCategory').prop('disabled', true);
		let subCat = $('#newSubcategory').val();
		var url = "/administrator/addCategory";
		var datas = {'category':newCat, "parentId":subCat};

		$.post(url,datas, function(response){
			$('#addCategory').removeClass('opacity-50');
			$('#addCategory').prop('disabled', false);
			if(datas.parentId == '')
			{
				var tableBody = $('#tBody');
				let categoryRow = `<tr id=${response.id}>`;
				categoryRow += `<td class="px-4 py-2">${response.id}</td>`;
				categoryRow += `<td class="px-4 py-2">${response.name}`;
				categoryRow += `<i class="bi bi-trash3 mx-2 text-red-400 p-2 hover:bg-red-200 
								rounded cursor-pointer removeCategory" 
								data-id=${response.id} data-name=${response.name}></i>
				              <a href=/administrator/editCategory/${response.id} class="text-sky-400 
				              p-2 hover:bg-sky-200 rounded 
								cursor-pointer"><span class="bi bi-pencil"></span></a>`;
		        categoryRow += `</td>`;
				categoryRow += `<td></td>`;
				categoryRow += "</tr>";
				tableBody.append(categoryRow);

				let addToSelectOption = `<option value=${response.id} class=${response.id}>
										${response.name}</option>`;
				$('#newSubcategory').append(addToSelectOption);
				$('#newEnCategory').val('');
				$('#newFaCategory').val('');


				alert("Category Added Successfully!");
			}
			else
			{
				parentOfSubcategory = $('#'+subCat).find('td:last');
				if(parentOfSubcategory.html().replaceAll(' ', '').length < 10)
				{
					var subCategory = `<div class="py-1.5" id=${response.id}>
									${response.name}`;
				}
				else
				{
					var subCategory = `<div class="border-t py-1.5 dark:!border-sky-700" id=${response.id}>
									${response.name}`;
				}
				subCategory += `<i class="bi bi-trash3 mx-2 text-red-400 p-2 hover:bg-red-200 
								rounded cursor-pointer removeCategory" data-id=${response.id} 
								data-name=${response.name}></i>
		        	            <a href=/administrator/editCategory/${response.id} class="text-sky-400 
		        	            p-2 hover:bg-sky-200 rounded 
								cursor-pointer"><span class="bi bi-pencil"></span></a>
			                    </div>`;
				parentOfSubcategory.append(subCategory);
				$('#newEnCategory').val('');
				$('#newFaCategory').val('');

				alert("Subcategory Added Successfully!");
			}
		});
	}
	else
		alert("Category length must greater than 2 chars!");
}



function removeCategory(id,name){
	let confirmed = confirm("Are you sure about Category " + name + " ?");
	if(confirmed)
	{
		let url = "/administrator/removeCategory/" + id;
		$.get(url, {}, function(resp){
			if(resp)
			{
				$('#'+id).remove();
				$('.'+id).remove();
			}
		});
	}
}