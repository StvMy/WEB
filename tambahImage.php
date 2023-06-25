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

    if(isset($_POST["kode_produk"]) && isset($_POST["img_name"])){
        $kode = $_POST["kode_produk"];
        $teks = $_POST["img_name"];
    }
    $sql = "INSERT INTO image (kode_produk, img_name)
    VALUES ('" . $kode . "', '" . $teks . "')";

    if (mysqli_query($conn, $sql)) {
        header( "Location: dataImage.php" );
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
?>