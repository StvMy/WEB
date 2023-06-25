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
		$sql = "SELECT * FROM artikel";
		$query = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($query)){
			$output .= "
				<tr>
					<td>".$row['kode_artikel']."</td>
					<td>".$row['teks']."</td>
					<td><a href='viewArtikel.php?kode_artikel=".$row['kode_artikel']."' class='btn btn-sm btn-success'>Edit</a>
					<button class='btn btn-sm btn-primary delete_product' data-id='".$row['kode_artikel']."'>Delete</button></td>
				</tr>
			";
		}
 
		echo json_encode($output);
	}
 
	if($action == 'delete'){
		$kode = $_POST['id'];
		$output = array();
		$sql = "DELETE FROM artikel WHERE kode_artikel = '$kode'";
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