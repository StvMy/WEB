<?php
    //mulai session
    session_start();

    //cek lagi apakah session telah terdaftar untuk username tersebut
    if(!isset($_SESSION['username'])){
        //dan jika terdaftar
        header( "Location: login.html" );
    }
    else{
        if($_SESSION['level'] == 1){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "mydatabase";

            $conn = mysqli_connect($servername, $username, $password, $dbname);

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $user = $_SESSION['username'];

            $sql = "SELECT * FROM user WHERE username='$user'";
            $result = mysqli_query($conn, $sql);

            $row = mysqli_fetch_assoc($result);
    ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Data User</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
	<link rel="stylesheet" type="text/css" href="asset/swal2/sweetalert2.min.css">
    <style type="text/css">
		.mt20{
			margin-top:20px;
			margin-bottom:20px;
			color:rgb(0, 0, 0);
		}
		table{
			border-radius: 2% 2% 2% 2%;
			box-shadow: 5px 5px 8px 8px #d6d4d4;
		}
        .btn-success{
            color: rgb(255, 255, 255);  
        }.btn-success:hover{
            color: rgb(255, 255, 255);  
        }.form-label{
            margin-top: 10px;
            margin-bottom: 10px;
        }
	</style>
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>Brand</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="dashboard.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php"><i class="fas fa-user"></i><span>Profile</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="dataUser.php"><i class="fas fa-table"></i><span>User</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="dataProduk.php"><i class="fas fa-table"></i><span>Produk</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="dataArtikel.php"><i class="fas fa-user-circle"></i><span>Artikel</span></a></li>
                    
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ..."><button class="btn btn-primary py-0" type="submit"><i class="fas fa-search"></i></button></div>
                        </form>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <form  class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search" action ="search.php" method = "post" >
                                            <div class="input-group"><input class="bg-light form-control border-0 small" name = "search" type="text" placeholder="Search for ..."><button class="btn btn-primary py-0" type="submit"><i class="fas fa-search"></i></button></div>
                                        </form>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small"><?=$row['nama']?></span><img class="border rounded-circle img-profile" src="assets/img/avatars/avatar1.jpeg"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Settings</a><a class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Activity log</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Data User</h3>
                    
                    <div class="container">
                        <button class='btn btn-sm btn-warning' data-bs-toggle="modal" data-bs-target="#modalTambah" style="margin-bottom: 20px; color: white">
                        <i class="fas fa-user"></i> Tambah User</button>

                        <a href="exportDataUser.php" class='btn btn-sm btn-success' style="margin-bottom: 20px; color: white">
                        <i class="fas fa-download"></i> Export</a>

                        <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="pdfUser.php" style="margin-bottom: 20px; color: white"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Export As PDF</a>

                        <div class="modal fade" id="modalTambah">
                            <form action="tambahUser.php" method="post">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-title">Tambah User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="text" class="form-control" name="nama">

                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email">

                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" class="form-control" name="username">

                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-success">Tambah Data</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
        
                        <div class="row justify-content-left">
                            <div class="col-sm-12">
                                <table class="table table-hover">
                                    <thead style="border: 0px">
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>User Level</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody id="tbody">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Brand 2022</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="asset/jquery.min.js"></script>
    <script src="asset/swal2/sweetalert2.min.js"></script>
    <script src="app user.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>
<?php
        }
        else{
            header( "Location: index.php" );
        }
    }
?>
