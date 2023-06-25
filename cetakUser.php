<?php
    require_once __DIR__ . '/vendor/autoload.php'

    require 'functions.php'
    $user = query("SELECT * FROM user")
    $query = mysqli_query($conn, $user);
    $row = mysqli_fetch_assoc($query)
    $mpdf = new \Mpdf\Mpdf();

    $html = "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <title>Daftar User</title>
    </head>
    <body>
        <h1>Daftar User</h1>

        <?php 
        
        ?>
        <tr>
            <td>" . $row['nama'] . "</td>
            <td>" . $row['email'] . "</td>
            <td>" . $row['username'] . "</td>
            <td>" . $row['pass'] . "</td>
            <td>" . $row['userLevel'] . "</td>
        </tr>
    </body>
    </html>"
?>