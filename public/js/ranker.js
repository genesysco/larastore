$(document).ready(function(){
	$('.deposer').click(function(){
		let id = $(this).attr('data-depose');
		let name = $(this).attr('data-name');
		deposer(id,name);
	});

	$('.promoter').click(function(){
		let id = $(this).attr('data-promote');
		let name = $(this).attr('data-name');
		promoter(id,name);
	});

	$('.deleteUser').click(function(){
		let id = $(this).attr('data-delete');
		let name = $(this).attr('data-name');
		deleteUser(id,name);
	});
});



function deposer(id, name){
	let url = "/administrator/deposeUser/" + id;
	let confirmed = confirm("Do you really want to make user " + name + " Depose?");
	if(confirmed)
	{
		$.get(url, {}, function(data){
			if(data)
				location.reload(false);
			else
				alert("Error on Deposing Operations!");
		});
	}
}



function promoter(id, name){
	let url = "/administrator/promoteUser/" + id;
	let confirmed = confirm("Do you really want to make user " + name + " Admin?");
	if(confirmed)
	{
		$.get(url, {}, function(data){
			if(data)
				location.reload(true);
			else
				alert("Error on Promotion Operations!");
		});
	}
}



function deleteUser(id,name){
	let url = "/administrator/deleteUser/" + id;
	let userRow = $('#'+id);
	let confirmed = confirm(`Are you sure want to delete user ${name} ?`);
	if(confirmed)
	{
		$.get(url, {}, function(data){
			if(data)
				userRow.remove();
			else
				alert("Error on deleting user " + name);
		});
	}
}