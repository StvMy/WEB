<?php 
    $conn = mysqli_connect('localhost', 'root', '', 'mydatabase');
    $user = $_POST["username"];
    $sql = "SELECT * FROM user WHERE username='$user'";
	$query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);

    mysqli_close($conn);
?>