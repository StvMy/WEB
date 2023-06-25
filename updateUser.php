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

    if(isset($_POST["hide"]) && isset($_POST["nama"]) && isset($_POST["email"]) && isset($_POST["username"])  && isset($_POST["pass"]) && isset($_POST["userLevel"])){
        $hide = $_POST['hide'];  
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $level = $_POST['userLevel'];
    }

    $sql = "UPDATE user SET nama='$nama', email='$email', username='$username', pass='$pass', userLevel='$level' where username='$hide'";

    if (mysqli_query($conn, $sql)) {
        header( "Location: dataUser.php" );
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
?>