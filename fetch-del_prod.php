<?php
	//connection
	$conn = mysqli_connect('localhost', 'root', '', 'mydatabase');
	
	//default action
	$action = 'fetch';
 
	if(isset($_GET['action'])){
		$action = $_GET['action'];
	}
 
	if($action == 'fetch'){
		$output = '';
		$sql = "SELECT * FROM produk";
		$query = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($query)){
			
			
			$output .= "
				<tr>
					<td>".$row['kode_produk']."</td>
					<td>".$row['nama_produk']."</td>
					<td>".$row['jumlah_stok']."</td>
					<td>Rp".number_format($row['harga'], 2, ',','.')."</td>
					<td><button class='btn btn-sm btn-success edit_product' data-id='".$row['kode_produk']."' data-nama='".$row['nama_produk']."' data-jmlh='".$row['jumlah_stok']."' data-harga='".$row['harga']."'>Edit</button>
					<td><button class='btn btn-sm btn-success upload' data-id='".$row['kode_produk']."'>Upload Image</button>
					<button class='btn btn-sm btn-primary delete_product' data-id='".$row['kode_produk']."'>Delete</button></td>
				</tr>
			";
		}
 
		echo json_encode($output);
	}
 
	if($action == 'delete'){
		$username = $_POST['id'];
		$output = array();
		$sql = "DELETE * FROM produk WHERE kode_produk = '$username'";
		if(mysqli_query($conn, $sql)){
			$output['status'] = 'success';
			$output['message'] = 'Member deleted successfully';
		}
		else{
			$output['status'] = 'error';
			$output['message'] = 'Something went wrong in deleting the member';
		}
 
		echo json_encode($output);
	}

 ?>

