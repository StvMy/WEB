





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