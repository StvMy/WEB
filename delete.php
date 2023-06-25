<?php
    $del = $_POST['delete'];
    $sql = "DELETE FROM user WHERE username=$del";

    $con = mysqli_connect("localhost", "root", "", "mydatabase");
    if (!$con) {
        die("Connection failed: " . mysqli_error($con));
    }

    mysqli_query($con, $sql);

    mysqli_close($con);

?>
