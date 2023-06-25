<?php
    //function start lagi
    session_start();

    //cek apakah session terdaftar
    if(isset($_SESSION['username'])){
        //session terdaftar, saatnya logout
        session_unset();
        session_destroy();
        header( "Location: index.php" );
    }
    else{
        //variabel session salah, user tidak seharusnya ada dihalaman ini. Kembalikan ke login
        header( "Location: login.html" );
    }
?>