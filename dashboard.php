
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

            $sql2 = "SELECT COUNT(nama) as jumlah_user FROM user";
            $result2 = mysqli_query($conn, $sql2);

            $row2 = mysqli_fetch_assoc($result2);

            $sql3 = "SELECT COUNT(nama_produk) as jumlah_produk FROM produk";
            $result3 = mysqli_query($conn, $sql3);

            $row3 = mysqli_fetch_assoc($result3);

            $sql4 = "SELECT COUNT(jenis_kelamin) as jumlah_laki FROM user WHERE jenis_kelamin=1";
            $result4 = mysqli_query($conn, $sql4);

            $row4 = mysqli_fetch_assoc($result4);

            function month($month) {
                if ($month==1){
                    return "January";
                }
                elseif($month==2){
                    return "February";
                }
                elseif($month==3){
                    return "March";
                }
                elseif($month==4){
                    return "April";
                }
                elseif($month==5){
                    return "May";
                }
                elseif($month==6){
                    return "June";
                }
                elseif($month==7){
                    return "July";
                }
                elseif($month==8){
                    return "August";
                }
                elseif($month==9){
                    return "September";
                }
                elseif($month==10){
                    return "October";
                }
                elseif($month==11){
                    return "November";
                }
                elseif($month==12){
                    return "December";
                }
              }

            if (isset($_POST['month'])){
                $tot = $_POST['month'];
                $sql14 = "SELECT SUM(profit) as penjualan FROM transaksi WHERE MONTH(bulan) = $tot";
                $result14 = mysqli_query($GLOBALS['conn'], $sql14);
    
                $row14 = mysqli_fetch_assoc($result14);
                $penjualantot = "Rp ";
                $penjualantot = $penjualantot.= number_format($row14['penjualan'], 2, ',','.');
            }
            else{
                $sql5 = "SELECT SUM(profit) as penjualan_tot FROM transaksi";
                $result5 = mysqli_query($conn, $sql5);

                $row5 = mysqli_fetch_assoc($result5);
                $penjualantot = "Rp ";
                $penjualantot = $penjualantot.= number_format($row5['penjualan_tot'], 2, ',','.');

            }

            

            $sql6 = "SELECT MAX(MONTH(bulan)) as bulan_terakhir FROM transaksi";
            $result6 = mysqli_query($conn, $sql6);

            $row6 = mysqli_fetch_assoc($result6);
            
            $bulankedua = $row6['bulan_terakhir']-1;
            $bulanketiga = $row6['bulan_terakhir']-2;

            $sql10 = "SELECT SUM(profit) as tigabln FROM transaksi WHERE MONTH(bulan) = $row6[bulan_terakhir]";
            $sql11 = "SELECT SUM(profit) as tigabln FROM transaksi WHERE MONTH(bulan) = $row6[bulan_terakhir]-1";
            $sql12 = "SELECT SUM(profit) as tigabln FROM transaksi WHERE MONTH(bulan) = $row6[bulan_terakhir]-2";
            
            $result10 = mysqli_query($conn, $sql10);
            $result11 = mysqli_query($conn, $sql11);
            $result12 = mysqli_query($conn, $sql12);

            $row10= mysqli_fetch_assoc($result10);
            $row11= mysqli_fetch_assoc($result11);
            $row12= mysqli_fetch_assoc($result12);
            
            $jumlah="Rp";
            $jumlah =$jumlah.= number_format($row10["tigabln"]+$row11["tigabln"]+$row12["tigabln"], 2, ',','.');
            
            $pertama = "Rp ";
            $pertama = $pertama.= number_format($row10["tigabln"]);
            $kedua = "Rp ";
            $kedua = $kedua.= number_format($row11["tigabln"]);
            $ketiga = "Rp ";
            $ketiga = $ketiga.= number_format($row12["tigabln"]);

            function bulan(){
                $sql5 = "SELECT count(bulan) as jumlah from pendapatan";
                $result5 = mysqli_query($GLOBALS['conn'], $sql5);
                $row5 = mysqli_fetch_assoc($result5);

                $sql6 = "SELECT bulan from pendapatan";
                $result6 = mysqli_query($GLOBALS['conn'], $sql6);
                $output = '';
                $count = 1;
                while($row6 = mysqli_fetch_assoc($result6)){
                    if($count < $row5['jumlah']){
                        $output.= "&quot;".$row6['bulan']."&quot;,";
                    }else{
                        $output.= "&quot;".$row6['bulan']."&quot;";
                    }
                    $count += 1 ;
                }
                return $output;
            }
            function profit(){
                $sql6 = "SELECT profit from pendapatan";
                $result6 = mysqli_query($GLOBALS['conn'], $sql6);

                $sql7 = "SELECT count(profit) as jumlah from pendapatan";
                $result7 = mysqli_query($GLOBALS['conn'], $sql7);
                $row7 = mysqli_fetch_assoc($result7);

                $output = '';
                $count = 1;

                while($row6 = mysqli_fetch_assoc($result6)){
                    if($count < $row7['jumlah']){
                        $output.= "&quot;".$row6['profit']."&quot;,";
                    }else{
                        $output.= "&quot;".$row6['profit']."&quot;";
                    }
                    $count += 1 ;
                }

                return $output;
            }
            function produk(){
                $sql8 = "SELECT nama_produk from produk";
                $result8 = mysqli_query($GLOBALS['conn'], $sql8);

                $sql9 = "SELECT count(nama_produk) as jumlah from produk";
                $result9 = mysqli_query($GLOBALS['conn'], $sql9);
                $row9 = mysqli_fetch_assoc($result9);

                $output = '';
                $count = 1;

                while($row8 = mysqli_fetch_assoc($result8)){
                    if($count < $row9['jumlah']){
                        $output.= "&quot;".$row8['nama_produk']."&quot;,";
                    }else{
                        $output.= "&quot;".$row8['nama_produk']."&quot;";
                    }
                    $count += 1 ;
                }
                return $output;
            }
            function terjual(){
                $sql8 = "SELECT terjual from produk";
                $result8 = mysqli_query($GLOBALS['conn'], $sql8);

                $sql9 = "SELECT count(nama_produk) as jumlah from produk";
                $result9 = mysqli_query($GLOBALS['conn'], $sql9);
                $row9 = mysqli_fetch_assoc($result9);

                $output = '';
                $count = 1;

                while($row8 = mysqli_fetch_assoc($result8)){
                    if($count < $row9['jumlah']){
                        $output.= "&quot;".$row8['terjual']."&quot;,";
                    }else{
                        $output.= "&quot;".$row8['terjual']."&quot;";
                    }
                    $count += 1 ;
                }
                return $output;
            }
            function warna(){
                $sql8 = "SELECT warna from produk";
                $result8 = mysqli_query($GLOBALS['conn'], $sql8);

                $sql9 = "SELECT count(nama_produk) as jumlah from produk";
                $result9 = mysqli_query($GLOBALS['conn'], $sql9);
                $row9 = mysqli_fetch_assoc($result9);

                $output = '';
                $count = 1;

                while($row8 = mysqli_fetch_assoc($result8)){
                    if($count < $row9['jumlah']){
                        $output.= "&quot;".$row8['warna']."&quot;,";
                    }else{
                        $output.= "&quot;".$row8['warna']."&quot;";
                    }
                    $count += 1 ;
                }
                return $output;
            }
            function label(){
                $sql8 = "SELECT warna, nama_produk from produk";
                $result8 = mysqli_query($GLOBALS['conn'], $sql8);

                $output = '';
                while($row8 = mysqli_fetch_assoc($result8)){
                    $output.= "<span class='me-2'><i class='fas fa-circle' style='color: ".$row8['warna']."'></i>&nbsp;".$row8['nama_produk']."</span>";
                }
                return $output;
                // <i class="fas fa-circle" style="color: #fc94af"></i>&nbsp;Perempuan</span>
            }
    ?>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
            <title>Dashboard</title>
 
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
                            <li class="nav-item"><a class="nav-link active" href="dashboard.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="profile.php"><i class="fas fa-user"></i><span>Profile</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="dataUser.php"><i class="fas fa-table"></i><span>User</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="dataProduk.php"><i class="fas fa-table"></i><span>Produk</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="dataArtikel.php"><i class="fas fa-table"></i><span>Artikel</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="dataImage.php"><i class="fas fa-table"></i><span>Image</span></a></li>
                        </ul>
                        <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
                    </div>
                </nav>
                <div class="d-flex flex-column" id="content-wrapper">
                    <div id="content">
                        <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                            <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                                <ul class="navbar-nav flex-nowrap ms-auto">
                                    <li class="nav-item dropdown no-arrow">
                                        <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small"><?=$row['nama']?></span><img class="border rounded-circle img-profile" src="<?=$row['foto']?>"></a>
                                            <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="profile.php"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a>
                                                <div class="dropdown-divider"></div><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <div class="container-fluid">
                            <div class="d-sm-flex justify-content-between align-items-center mb-4">
                                <h3 class="text-dark mb-0">Dashboard</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate Report</a>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-xl-3 mb-4">
                                    <div class="card shadow border-start-primary py-2">
                                        <div class="card-body">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col me-2">
                                                    <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Jumlah User</span></div>
                                                    <div class="text-dark fw-bold h5 mb-0"><span><?=$row2['jumlah_user']?></span></div>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-user fa-2x text-gray-300"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3 mb-4">
                                    <div class="card shadow border-start-success py-2">
                                        <div class="card-body">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col me-2">
                                                    <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>Jumlah Produk</span></div>
                                                    <div class="text-dark fw-bold h5 mb-0"><span><?=$row3['jumlah_produk']?></span></div>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-plane fa-2x text-gray-300"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3 mb-4">
                                    <div class="card shadow border-start-primary py-2">
                                        <div class="card-body">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col me-2">
                                                        
                                                    <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Penjualan total</span></div>
                                                    <div class="text-dark fw-bold h5 mb-0"><span><?=$penjualantot?></span></div>
                                                          
                                                        
                                                </div>
                                            </div>
                                            <!-- <div class="dropdown">
                                            <span>Filter Month</span>
                                            <div class="dropdown-content">
                                                
                                            </div>
                                            </div> -->
                                           
                                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method = 'post'> 
                                            <select class="custom-select" name ="month">
                                            <option selected>Filter By Month</option>
                                                <option value="1">January</option>
                                                <option value="2">February</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                                <option value="5">May</option>
                                                <option value="6">June</option>
                                                <option value="7">July</option>
                                                <option value="8">August</option>
                                                <option value="9">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                            <button type = 'submit'>apply</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3 mb-4">
                                    <div class="card shadow border-start-success py-2">
                                        <div class="card-body">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col me-2">
                                                    <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>Penjualan 3 bulan Terakhir</span></div>
                                                    <div class="text-dark fw-bold h5 mb-0"><span><?=$jumlah?></span></div>
                                                    <div class="text-uppercase text-success fw-bold text-xs mb-1"><span> <?=month($row6['bulan_terakhir'])?></span></div>
                                                    <div class="text-dark fw-bold h5 mb-0"><span><?=$pertama?></span></div>
                                                    <div class="text-uppercase text-success fw-bold text-xs mb-1"><span> <?= month($row6['bulan_terakhir']-1)?></span></div>
                                                    <div class="text-dark fw-bold h5 mb-0"><span><?=$kedua?></span></div>
                                                    <div class="text-uppercase text-success fw-bold text-xs mb-1"><span> <?= month($row6['bulan_terakhir']-2)?></span></div>
                                                    <div class="text-dark fw-bold h5 mb-0"><span><?=$ketiga?></span></div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-7 col-xl-8">
                                    <div class="card shadow mb-4">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h6 class="text-primary fw-bold m-0">Pendapatan perbulan</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart-area">
                                                <canvas id="lineChart" 
                                                    data-bss-chart="
                                                        {&quot;type&quot;:&quot;line&quot;,
                                                        &quot;data&quot;:{
                                                            &quot;labels&quot;:[<?=bulan()?>],
                                                            &quot;datasets&quot;:[{
                                                                &quot;label&quot;:&quot;Earnings&quot;,
                                                                &quot;fill&quot;:true,
                                                                &quot;data&quot;:[<?=profit()?>],
                                                                &quot;backgroundColor&quot;:&quot;rgba(78, 115, 223, 0.05)&quot;,
                                                                &quot;borderColor&quot;:&quot;rgba(78, 115, 223, 1)&quot;}]},
                                                        &quot;options&quot;:{
                                                            &quot;maintainAspectRatio&quot;:false,
                                                            &quot;legend&quot;:{
                                                                &quot;display&quot;:false,
                                                                &quot;labels&quot;:{
                                                                    &quot;fontStyle&quot;:&quot;normal&quot;}},
                                                                &quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;},&quot;scales&quot;:{&quot;xAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;],&quot;drawOnChartArea&quot;:false},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;fontStyle&quot;:&quot;normal&quot;,&quot;padding&quot;:20}}],&quot;yAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;]},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;fontStyle&quot;:&quot;normal&quot;,&quot;padding&quot;:20}}]}}}">
                                                </canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-xl-4">
                                    <div class="card shadow mb-4">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h6 class="text-primary fw-bold m-0">Hasil Penjualan</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart-area">
                                                <canvas data-bss-chart="{&quot;type&quot;:&quot;doughnut&quot;,&quot;data&quot;:{
                                                    &quot;labels&quot;:[<?=produk()?>],
                                                    &quot;datasets&quot;:[{&quot;label&quot;:&quot;&quot;,
                                                    &quot;backgroundColor&quot;:[<?=warna()?>],&quot;borderColor&quot;:[&quot;#ffffff&quot;,&quot;#ffffff&quot;],
                                                    &quot;data&quot;:[<?=terjual()?>]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}}}">
                                                </canvas>
                                            </div>
                                            <div class="text-center small mt-4"><?=label()?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-xl-4">
                                    <div class="card shadow mb-4">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h6 class="text-primary fw-bold m-0">Jumlah Jenis Kelamin</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart-area">
                                                <canvas data-bss-chart="{&quot;type&quot;:&quot;doughnut&quot;,&quot;data&quot;:{&quot;labels&quot;:[<?=produk()?>],&quot;datasets&quot;:[{&quot;label&quot;:&quot;&quot;,&quot;backgroundColor&quot;:[&quot;#4e73df&quot;,&quot;#fc94af&quot;],&quot;borderColor&quot;:[&quot;#ffffff&quot;,&quot;#ffffff&quot;],&quot;data&quot;:[&quot;<?=$row4['jumlah_laki']?>&quot;,&quot;<?=($row2['jumlah_user']-$row4['jumlah_laki'])?>&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}}}"></canvas></div>
                                            <div class="text-center small mt-4"><span class="me-2"><i class="fas fa-circle text-primary"></i>&nbsp;Laki - laki</span><span class="me-2"><i class="fas fa-circle" style="color: #fc94af"></i>&nbsp;Perempuan</span></div>
                                        </div>
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
            <script src="assets/bootstrap/js/bootstrap.min.js"></script>
            <script src="assets/js/chart.min.js"></script>
            <script src="assets/js/bs-init.js"></script>
            <script src="assets/js/theme.js"></script>
        </body>                
    <?php
        mysqli_close($conn);
        }
        else{
            header( "Location: index.php" );
        }
    }
?>
