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

    if(isset($_POST["kode"]) && isset($_POST["nama_produk"]) && isset($_POST["jumlah_stok"])  && isset($_POST["harga"])){
        $kode = $_POST["kode"];
        $nama = $_POST["nama_produk"];
        $stok = $_POST["jumlah_stok"];
        $harga = $_POST["harga"];
    }
    $sql = "INSERT INTO produk (kode_produk, nama_produk, jumlah_stok, harga)
    VALUES ('" . $kode . "', '" . $nama . "', '" . $stok . "', '" . $harga . "')";

    if (mysqli_query($conn, $sql)) {
        header( "Location: dataProduk.php" );
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
?>