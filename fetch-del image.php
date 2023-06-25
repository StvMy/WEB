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
		$sql = "SELECT kode_produk, img_name, img_id FROM image";
		$query = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($query)){
			$output .= "
				<tr>
					<td>".$row['kode_produk']."</td>
					<td>".$row['img_name']."</td>
					
					<td><button class='btn btn-sm btn-primary delete_product' data-id='".$row['img_id']."'>Delete</button></td>
				</tr>
			";
		}
 
		echo json_encode($output);
	}
 
	if($action == 'delete'){
		$kode = $_POST['id'];
		$output = array();
		$sql = "DELETE FROM image WHERE img_id = '$kode'";
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