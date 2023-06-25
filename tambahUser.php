<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydatabase";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if(isset($_POST["nama"]) && isset($_POST["username"]) && isset($_POST["email"])  && isset($_POST["password"])){
        $nama = $_POST["nama"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
    }
    $sql = "INSERT INTO user (nama, email, username, pass)
    VALUES ('" . $nama . "', '" . $email . "', '" . $username . "', '" . $password . "')";

    if (mysqli_query($conn, $sql)) {
        header( "Location: dataUser.php" );
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
?>