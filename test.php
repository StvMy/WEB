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

      $sql = "SELECT produk.nama_produk, image.img_name, produk.category, produk.url, produk.artikel FROM produk INNER JOIN image ON produk.kode_produk = image.kode_produk WHERE produk.nama_produk='A330-200F';";
      $result = mysqli_query($conn, $sql);
      
      // SELECT nama_produk, category, url, artikel FROM produk WHERE produk.nama_produk='A330-200F';

      $row = mysqli_fetch_assoc($result);

      echo $row['img_name'];
     
    ?>