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
		$sql = "SELECT * FROM user";
		$query = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($query)){
			$level = ($row['userLevel']==1)?'Admin':'User';
			$output .= "
				<tr>
					<td>".$row['nama']."</td>
					<td>".$row['email']."</td>
					<td>".$row['username']."</td>
					<td>".$row['pass']."</td>
					<td>".$level."</td>
					<td>
					<button class='btn btn-sm btn-success edit_product' data-id='".$row['username']."' data-nama='".$row['nama']."' data-email='".$row['email']."' data-pass='".$row['pass']."' data-level='".$row['userLevel']."'>Edit</button>
					<button class='btn btn-sm btn-primary delete_product' data-id='".$row['username']."'>Delete</button></td>
				</tr>
			";
		}
 
		echo json_encode($output);
	}
 
	if($action == 'delete'){
		$username = $_POST['id'];
		$output = array();
		$sql = "DELETE FROM user WHERE username = '$username'";
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