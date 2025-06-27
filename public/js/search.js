$(document).ready(function(){
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});


	$('#search').click(function() {
		search();
	});


	$(document).on('change', '#category',function(){
		c = $(this).val();
		showSubcategories(c);
	});


	$('#clearResult').click(function(){
		hideSearchResult();
	});
});



function search(){
	pName = $('#pName').val().trim();
	c = $('#category').val();
	s = $('#subCategory').val();
	myCSRF = $('#myCSRF').val();
	datas = {
		"pName":pName,
		"category":c,
		"subCategory":s
	};
	url = "/search";
	if(pName.length > 0 || c != '' || s != '')
	{
		$('#searchBox').removeClass('hidden');
		$('#loading').removeClass('hidden');
		$('#search').attr('disabled',true);
		$('#searchResult').html('');
		$('.noProducts').addClass('hidden');
		$('.searchResult').addClass('hidden');
		$('#searchResult').addClass('hidden');
		$('#clearResult').addClass('hidden');

		$.post(url,datas,function(response){
		if(response.length == 0)
		{
			$('#loading').addClass('hidden');
			$('#search').attr('disabled',false);
			$('.noProducts').removeClass('hidden');
			$('.searchResult').addClass('hidden');
			$('#searchResult').addClass('hidden');
			$('#clearResult').removeClass('hidden');
		}
		else
		{
			$('#loading').addClass('hidden');
			$('#search').attr('disabled',false);
			$('.noProducts').addClass('hidden');
			$('.searchResult').removeClass('hidden');
			$('#searchResult').removeClass('hidden');
			$('#clearResult').removeClass('hidden');

			response.forEach(function(p){
				product = `<div class="bg-white dark:!bg-sky-900 rounded-md shadow-sm overflow-hidden">
							<!-- Product Image -->
								<img 
								  class="w-full h-48 object-cover" 
								  src="/storage/${p.images[0].image_path}" 
								  alt="Product Image"
								/>

								<div class="p-6">
								  <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-300 mb-2">
									${p.name}
								  </h2>
								  
								  <p class="text-gray-600 text-sm mb-4 dark:text-gray-400">
								    ${p.short_description}
								  </p>
								  <div class="flex items-center justify-between">
								    <span class="text-lg font-bold text-gray-900 dark:text-gray-300">
									$${p.price}
								    </span>
								    
								    <div class="flex">
									    <a href="/singleProduct/${p.id}" 
									    class="bg-sky-200 text-sky-400 hover:text-sky-600 
									    p-2 rounded hover:bg-sky-300 me-1">
									      <span class="bi bi-eye"></span>
									    </a>

										<form action="/cart/add/${p.id}" method="POST">
										    <input type="hidden" name="_token" value=${myCSRF}>
										    <input type="hidden" name="quantity" value="1" min="1">
										    <button type="submit" class="bg-green-200 text-green-400 hover:text-green-600 p-2 rounded hover:bg-green-300">
										    	<span class="bi bi-cart"></span>
										    </button>
										</form>
								    </div>
								  </div>
									<div class="mt-2">
										<span class="text-white text-sm bg-gray-400 rounded-md p-1 me-1">
											${p.category.name}
										</span>
										<span class="text-white text-sm bg-gray-400 rounded-md p-1">
											${p.sub_category.name}
										</span>
									</div>
								</div>
							</div>`;

				$('#searchResult').append(product);
			});
		}
	});
	}
}



function showSubcategories(id){
	$('#subCategory').val('');
	$('.subCategories').each(function(){
		let parent = $(this).attr('data-parentId');
		if(parent == id)
			$(this).removeClass('hidden');
		else
			$(this).addClass('hidden');
	});
}



function hideSearchResult() {
	$('#searchBox').addClass('hidden');
	$('#searchResult').html('');
}