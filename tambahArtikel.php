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

    if(isset($_POST["kode_artikel"]) && isset($_POST["teks"])){
        $kode = $_POST["kode_artikel"];
        $teks = $_POST["teks"];
    }
    $sql = "INSERT INTO artikel (kode_artikel, teks)
    VALUES ('" . $kode . "', '" . $teks . "')";

    if (mysqli_query($conn, $sql)) {
        header( "Location: dataArtikel.php" );
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
?>