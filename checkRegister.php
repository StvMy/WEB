<!DOCTYPE html>
<html>
<head>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE-edge"/>
    <meta name="viewport" content="width-device-width, initial-scale=1.0" />
    <link href="/dist/output.css" rel="stylesheet" />
    <style>
        .neon {
            color: #fff;
            text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 20px #fff, 
            0 0 40px #0FF, 0 0 80px #0FF, 0 0 90px #0FF;
        }
    </style>
</head>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydatabase";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . $conn->connect_error);
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
        header( "Location: login.html" );
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
?> 

</html> 