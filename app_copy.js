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
			   		url: 'fetch-del_prod.php?action=delete',
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
		var id = $(this).data('id');
		var nama = $(this).data('nama');
		var jmlh = $(this).data('jmlh');
		var harga = $(this).data('harga');

		swal.fire({
			title: 'Edit Data',
			html:
			'<form action="updateProduk.php" method="post">' +
			'<label for="kode" class="form-label">Kode Produk</label>' +
			'<h6>' + id + '</h6>' +
			'<input class="form-control" name="kode" value="' + id + '" style="display: none">' +

			'<label for="nama_produk" class="form-label">Nama Produk</label>' +
			'<input class="form-control" name="nama_produk" value="' + nama +'">' +

			'<label for="jumlah_stok" class="form-label">Jumlah Stok</label>' +
			'<input class="form-control" name="jumlah_stok" value="' + jmlh +'">' +

			'<label for="harga" class="form-label">Harga</label>' +
			'<input class="form-control" name="harga" value="' + harga +'">' +
			'<div class="modal-footer">'+
                '<button type="submit" class="btn btn-success">Confirm Edit</button>'+
            '</div>'+
			'</form>',
			confirmButtonColor: '#d33',
			confirmButtonText: 'Cancel',
			//showCancelButton: true,
			//confirmButtonColor: '#4CAF50',
			//cancelButtonColor: '#d33',
			//confirmButtonText: 'Confirm Update!',
	  	}).then((result) => {
			if (result.value){
				$.ajax({
					url: 'updateProduk.php?kode_produk='+id,
					type: 'POST',
					data: 'kode='+id+'nama_produk='+nama+' jumlah_stok='+jmlh+' harga='+harga,
					dataType: 'json'
		})
		}

	  }) 
		
	});

	$(document).on('click', '.upload', function(){
		var id = $(this).data('id');
	

		swal.fire({
			title: 'Upload Image',
			html:
			'<form action="upPhoto.php" method="post" enctype="multipart/form-data">'+  
			                          
				'<div class="mb-3">'+
					'<input type="text" name="kode" value='+ id +'></input>'+
					'<input class="btn btn-primary btn-sm" name="fileToUpload" type="file">'+
				'</div>'+ 
				'<button type="submit" class="btn btn-success">Confirm Edit</button>'+                           
			'</form>',

			confirmButtonColor: '#d33',
			confirmButtonText: 'Cancel',
			//showCancelButton: true,
			//confirmButtonColor: '#4CAF50',
			//cancelButtonColor: '#d33',
			//confirmButtonText: 'Confirm Update!',
	  	}).then((result) => {
			if (result.value){
				$.ajax({
					url: 'upPhoto.php?kode_produk='+id,
					type: 'POST',
					data: 'kode='+id,
					dataType: 'json'
		})
		}

	  }) 
		
	});
});
 
function fetch(){
	$.ajax({
		method: 'POST',
		url: 'fetch-del_prod.php',
		dataType: 'json',
		success: function(response){
			$('#tbody').html(response);
		}
	});
}