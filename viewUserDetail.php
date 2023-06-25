<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        img{
            width: 150px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .btn {
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            background-color: Blue;
        } 
        .btn-primary:hover{
            padding: 4px;
            background-color: white; 
            color: black; 
            border: 2px solid #008CBA;
        }.btn-success:hover{
            padding: 4px;
            background-color: white; 
            color: black; 
            border: 2px solid #4CAF50;
        }.btn-danger:hover{
            padding: 4px;
            background-color: white; 
            color: black; 
            border: 2px solid #f44336;
        }
    </style>
</head>
<body>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydatabase";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if(isset($_GET["nama"])){
        $nama = $_GET["nama"];
    }

    $sql = "SELECT nama, email, username, pass, userLevel, foto FROM user WHERE nama='$nama'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result) ?>

    
    <div style="margin-top: 2%; margin-left: 30%; margin-right: 30%;">
    <ul class="list-group">
    
    <li class="list-group-item active" aria-current="true">
        <div class="position-absolute top-50 start-0 translate-middle-y">
            <button class="btn" onclick="document.location='dataUser.php'">
                <img style="width: 70%;" alt="sss" src="asset/back.png">
            </button>
        </div>
        <h2 style="text-align: center; margin-top: 5px; margin-bottom: 5px;">Profil <?=$row["nama"]?></h2>
    </li>
 
    <li class="list-group-item">
    <img src='<?=$row["foto"]?>'>
    
    <div style=" margin-right: 30%; margin-left: 30%;">
        <button id="edit" class="btn btn-primary" style="margin-top: 3%; width: 100%; display: block" type="button" onclick="edit()">Edit</button>
        <div id="save-cancel" style="display: none">
            <form method="POST" action="updateUser.php">
            <button class="btn btn-success" style="margin-top: 3%; width: 48%;" type="submit" onclick="save()">Save</button>
            <button class="btn btn-danger" style="margin-top: 3%; width: 48%;" type="button" onclick="cancel()">Cancel</button>
        </div>
    </div>

    
    <div style="margin-top: 3%">
        <table class="table table-striped table-hover">
            <tr>
                <th width="20%">Nama</th>
                <td id="td1"><?=$row["nama"]?></td>
                <td id="input1" style="display: none">
                    <input type="text" name="nama" value="<?=$row["nama"]?>">
                    <input style="display: none" type="text" name="hidden" value="<?=$row["nama"]?>">
                </td>
            </tr>
            <tr>
                <th>Email</th>
                <td id="td2"><?=$row["email"]?></td>
                <td id="input2" style="display: none">
                    <input type="text" name="email" value="<?=$row["email"]?>">
                </td>
            </tr>
            <tr>
                <th>Username</th>
                <td id="td3"><?=$row["username"]?></td>
                <td id="input3" style="display: none">
                    <input type="text" name="username" value="<?=$row["username"]?>">
                </td>
            </tr>
            <tr>
                <th>Password</th>
                <td id="td4"><?=$row["pass"]?></td>
                <td id="input4" style="display: none">
                    <input type="text" name="pass" value="<?=$row["pass"]?>">
                </td>
            </tr>
            <tr>
                <th>User Level</th>
                <td id="td5"><?=$row["userLevel"]?></td>
                <td id="input5" style="display: none">
                    <input type="text" name="level" value="<?=$row["userLevel"]?>">
                </td>
            </tr>
        </table>
    </div>
    </li>
    </ul>
    </div>

    <script>
       function editing(){
            document.getElementById("td1").style.display = "none";
            document.getElementById("td2").style.display = "none";
            document.getElementById("td3").style.display = "none";
            document.getElementById("td4").style.display = "none";
            document.getElementById("td5").style.display = "none";
            
            document.getElementById("input1").style.display = "block";
            document.getElementById("input2").style.display = "block";
            document.getElementById("input3").style.display = "block";
            document.getElementById("input4").style.display = "block";
            document.getElementById("input5").style.display = "block";
        }
        function stopEdit(){
            document.getElementById("td1").style.display = "block";
            document.getElementById("td2").style.display = "block";
            document.getElementById("td3").style.display = "block";
            document.getElementById("td4").style.display = "block";
            document.getElementById("td5").style.display = "block";

            document.getElementById("input1").style.display = "none";
            document.getElementById("input2").style.display = "none";
            document.getElementById("input3").style.display = "none";
            document.getElementById("input4").style.display = "none";
            document.getElementById("input5").style.display = "none";
        }
        function edit(){
            editing();
            document.getElementById("edit").style.display = "none";
            document.getElementById("save-cancel").style.display = "block";
        }
        function cancel(){
            stopEdit();
            document.getElementById("edit").style.display = "block";
            document.getElementById("save-cancel").style.display = "none";
        }
        function save(){
            document.getElementById("edit").style.display = "block";
            document.getElementById("save-cancel").style.display = "none";
        }
    </script>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <?php
    mysqli_close($conn);
    ?>
</body>
</html> 
