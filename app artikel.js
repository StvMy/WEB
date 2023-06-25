$(document).ready(function(){
	fetch();
 
	$(document).on('click', '.delete_product', function(){
		var kode = $(this).data('id');
 
		swal.fire({
		  	title: 'Are you sure?',
		  	text: "You won't be able to revert this!",
		  	icon: 'warning',
		  	showCancelButton: true,
		  	confirmButtonColor: '#4CAF50',
		  	cancelButtonColor: '#d33',
		  	confirmButtonText: 'Yes, delete it!',
		}).then((result) => {
		  	if (result.value){
		  		$.ajax({
			   		url: 'fetch-del artikel.php?action=delete',
			    	type: 'POST',
			       	data: 'id='+kode,
			       	dataType: 'json'
			    })
			    .done(function(response){
			     	swal.fire('Deleted!', response.message, response.status);
					fetch();
			    })
			    .fail(function(){
			     	swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
			    });
		  	}
 
		})
 
	});
});
 
function fetch(){
	$.ajax({
		method: 'POST',
		url: 'fetch-del artikel.php',
		dataType: 'json',
		success: function(response){
			$('#tbody').html(response);
		}
	});
}