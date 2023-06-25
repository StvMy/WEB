$(document).ready(function(){
	fetch();
 
	$(document).on('click', '.delete_product', function(){
		var uname = $(this).data('id');
 
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
			   		url: 'fetch-del.php?action=delete',
			    	type: 'POST',
			       	data: 'id='+uname,
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

	$(document).on('click', '.edit_product', function(){
		var uname = $(this).data('id');
		var hide = $(this).data('id');
        var nama = $(this).data('nama');
		var email = $(this).data('email');
		var pass = $(this).data('pass');
		var lvl = $(this).data('level');

		swal.fire({
			title: 'Edit Data User',
			html:
			'<form action="updateUser.php" method="post">' +
			'<label for="nama" class="form-label">Nama</label>' +
			'<input class="form-control" name="nama" value="' + nama + '">' +

			'<label for="email" class="form-label">Email</label>' +
			'<input class="form-control" name="email" value="' + email +'">' +

			'<label for="username" class="form-label">User Name</label>' +
			'<input class="form-control" name="username" value="' + uname +'">' +
			'<label for="hide" class="form-label" style="display: none">User Name</label>' +
			'<input class="form-control" name="hide" value="' + hide +'" style="display: none">' +

			'<label for="pass" class="form-label" style="display: none">Password</label>' +
			'<input class="form-control" name="pass" value="' + pass +'" style="display: none">' +

			'<label for="userLevel" class="form-label">User Level</label>' +
			'<input class="form-control" name="userLevel" value="' + lvl +'">' +

			'<div class="modal-footer">'+
                '<button type="submit" class="btn btn-success">Confirm Edit</button>'+
            '</div>'+
			'</form>',
			confirmButtonColor: '#d33',
			confirmButtonText: 'Cancle',
	  	}).then((result) => {
			if (result.value){
				$.ajax({
					url: 'updateUser.php?username='+hide,
					type: 'POST',
					data: 'hide='+hide+' nama='+nama+' email='+email+' username='+username+' pass='+pass+' userLevel='+level,
					dataType: 'json'
		})
		}

	  }) 
		
	});
});
 
function fetch(){
	$.ajax({
		method: 'POST',
		url: 'fetch-del.php',
		dataType: 'json',
		success: function(response){
			$('#tbody').html(response);
		}
	});
}