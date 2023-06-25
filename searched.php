<?php
    //mulai session
    session_start();

    //cek lagi apakah session telah terdaftar untuk username tersebut
    if(!isset($_SESSION['username'])){
        //dan jika terdaftar
        header( "Location: login.html" );
    }
    //connection
    $conn = mysqli_connect('localhost', 'root', '', 'mydatabase');
    ?>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
            <title>Search Result</title>
            <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
            <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
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
                            <li class="nav-item"><a class="nav-link" href="dataUser.php"><i class="fas fa-table"></i><span>User</span></a></li>
                            <li class="nav-item"><a class="nav-link active" href="dataProduk.php"><i class="fas fa-table"></i><span>Produk</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="dataArtikel.php"><i class="fas fa-table"></i><span>Artikel</span></a></li>
                        </ul>
                        <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
                    </div>
                </nav>
                <div class="d-flex flex-column" id="content-wrapper">
                    <div id="content">
                        <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                            <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                                <form  class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search" action =" " method = "post" >
                                    <div class="input-group"><input class="bg-light form-control border-0 small" name = "search" type="text" placeholder="Search for ..."><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                </form>
                                <ul class="navbar-nav flex-nowrap ms-auto">
                                    <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                        <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                            
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <!-- Table -->
                        <?php
                        if (isset($_POST['search'])){
                        $cari = $_POST['search'];
                        }
                        ?>
		                <meta charset="utf-8">
		                <link rel="stylesheet" type="text/css" href="asset/bootstrap4/css/bootstrap.min.css">
		                <link rel="stylesheet" type="text/css" href="asset/swal2/sweetalert2.min.css">
		                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
		                </style>

                        <div class="container">
                            <h1 class="text-center mt20">Search Result</h1>
                            <div class="text-center" style="margin-top:10px;margin-bottom:20px;"><b>Hasil pencarian : <?=$cari?></b></div>
                            
                            <div class="row justify-content-center">
                                <div class="col-sm-8">
                                    <table class="table table-hover">
                                        <thead style="border: 0px">
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Nama Produk</th>
                                            <th>Jumlah Stok</th>
                                            <th>Harga</th>
                                            <th>Action</th>
                                        </tr>
                                        <?php 
                                        if(isset($_POST['search'])){
                                            $cari = $_POST['search'];
                                            $data = mysqli_query($conn,"SELECT * FROM produk WHERE nama_produk LIKE '%".$cari."%'");				
                                        }else{
                                            $data = mysqli_query($conn,"SELECT * FROM produk");
                                        }
                                        $no = 1;
                                        while($d = mysqli_fetch_array($data)){
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><a href="viewProductDetail.php?kode_produk=<?=$d['kode_produk']?>"><?=$d['kode_produk']?></a></td>
                                            <td><?php echo $d['nama_produk']; ?></td>
                                            <td><?php echo $d['jumlah_stok']; ?></td>
                                            <td><?php echo $d['harga']; ?></td>
                                            <td><a class='btn btn-sm btn-primary delete_product' href="viewProductDetail.php?kode_produk=<?=$d['kode_produk']?>">Edit</a>
                                            <button class='btn btn-sm btn-primary delete_product' data-id='<?=$d['kode_produk']?>'>Delete</button></td>
                                        </tr>
                                        <?php } 
                                        ?>
                                        </thead>
                                        <tbody id="tbody">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <script src="asset/jquery.min.js"></script>
                        <script src="asset/bootstrap4/js/bootstrap.min.js"></script>
                        <script src="asset/swal2/sweetalert2.min.js"></script>
                        <?php
    
                    ?>    
                    </div>
                    <footer class="bg-white sticky-footer">
                        <div class="container my-auto">
                            <div class="text-center my-auto copyright"><span>Copyright © Brand 2022</span></div>
                        </div>
                    </footer>
                </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
            </div>
            <script src="assets/bootstrap/js/bootstrap.min.js"></script>
            <script src="assets/js/chart.min.js"></script>
            <script src="assets/js/bs-init.js"></script>
            <script src="assets/js/theme.js"></script>
        </body>                

