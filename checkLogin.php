<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (!isset($username) || !isset($password)) {
        echo 'tidak di set';
        header( "Location: login.html" );
    }
    elseif (empty($username) || empty($password)) {
        header( "Location: login.html" );
    }
        
    else{
        // $user = addslashes($_POST['username']);
        // $pass = md5($_POST['password']);

        $user = $_POST['username'];
        $pass = $_POST['password'];


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

        $sql = "SELECT * FROM user WHERE username='".$user."' AND pass='".$pass."'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                session_start();
                $_SESSION['username'] = $row['username'];
                $_SESSION['level'] = $row['userLevel'];
          
                header( "Location: welcome.php" );
            }
        } else {
            echo "0 results, invalid username or password";
        }

    }
?>
