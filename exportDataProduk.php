<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydatabase";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM produk";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $delimiter = ";";
        $filename = "Data Produk_" . date('Y-m-d') . ".csv";
        
        #create file pointer
        $f = fopen('php://memory', 'w');

        #Set column headers
        $fields = array('Kode Produk', 'Nama Produk', 'Jumlah Stok', 'Harga', 'Kategori');
        fputcsv($f, $fields, $delimiter);

        //Output each row of the data, format line as csv and write to file pointer
        while($row = mysqli_fetch_assoc($result)) {
            $lineData = array($row['kode_produk'], $row['nama_produk'], $row['jumlah_stok'], $row['harga'], $row['category']);
            fputcsv($f, $lineData, $delimiter);
        }

        //Move back to begining of the file
        fseek($f, 0);

        //set headers to download file rather than display it
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '";');

        //output all remaining data on a file pointer
        fpassthru($f);
        mysqli_close($conn);
    }
    exit;
?>