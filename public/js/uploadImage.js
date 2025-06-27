$(document).ready(function(){
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$(document).on('change','#images',function(){
		let files = this.files;
		uploadImage(files,$(this).attr('data-id'));
	});
});



function uploadImage(files,id) {
	$('#images').addClass('hidden');
	$('#loading').removeClass('hidden');
	let data = new FormData();
	$.each(files, function(index,file) {
		data.append('images[]',file);
	});

	data.append('id',id);


	url = "/administrator/imageAjax";
	$.ajax({
        url: url,
        type: 'POST',
        data: data,
        contentType: false,
        processData: false,
        success: function (response) {
            response.details.forEach(function(obj) {
		        $('#productImages').append(
		            `<div class="w-20" id=${obj.id}>
			      		<a href=/storage/${obj.path} target="_blank">
				      		<img src=/storage/${obj.path} class="rounded-md">
			      		</a>
			      		<p class="text-sm text-pink-400 cursor-pointer text-center imageRemover" 
			      		data-id=${obj.id}>
			      			Delete this image 
			      			<i class="bi bi-exclamation-diamond-fill"></i>
			      		</p>
			      	</div>`
		        );
		    });
		    $('#images').removeClass('hidden');
		    $('#images').val('');
			$('#loading').addClass('hidden');
        },
        error: function (xhr) {
            console.error("Upload Error:", xhr.responseText);
		    $('#images').val('');
            $('#images').removeClass('hidden');
			$('#loading').addClass('hidden');
        }
    });
}