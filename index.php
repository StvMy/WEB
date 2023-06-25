<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>AC</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
    .head{
      position: relative;
    }
    .text{
      position: absolute;
      bottom: 50px;
      left: 20px;
    }
    .buttondll{
      position: absolute;
      bottom: 20px;
      left: 20px;
    }
  </style>

  <!-- =======================================================
  * Template Name: eNno - v4.9.0
  * Template URL: https://bootstrapmade.com/enno-free-simple-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= database connect =======-->
  <?php
    function openDB($from, $where_asal, $where_cari, $search) {
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

        $sql = "SELECT * FROM $from WHERE $where_asal = '$where_cari'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        mysqli_close($conn);

        return $row[$search];
    } 

    ?>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">Airbus Catalog</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#products">Products</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li>
            <a>
              <form  class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search" action ="userSearch.php" method = "post" >
                <div class="input-group"><input class="bg-light form-control border-0 small" name = "search" type="text" placeholder="Search for ..."><button class="btn btn-primary py-0" type="submit"><i class="fas fa-search"></i></button></div>
              </form>
            </a>
          </li>
          <li><a class="getstarted scrollto" href="#about">Get Started</a></li>
          <?php
          session_start();
          if(!isset($_SESSION['username'])){?>
            <li><a href="login.html">Login</a></li>
          <?php
          }else{?>
            <li><a href="logout.php">Logout</a></li>
          <?php
          }
          ?>
          
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="head">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <img src="<?=openDB("landing_page", "item_id", 1, "item_url")?>"  alt="" width="1120px" >
          <div class="text-block">
            <div class="text">
              <h1 style="color: white;"> <?=openDB("landing_page", "item_id", 3, "item_name")?> </h1>
              <h2 style="color: white;">All your aviation needs</h2>
            </div>
            <div class="buttondll">
              <a href="#about" class="btn-get-started scrollto" style="color: white;">Get Started</a>
              <a href="https://www.youtube.com/watch?v=ERcwLt1alJY" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span style="color: white;">Watch Video</span></a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6">
            <img src="<?=openDB("landing_page", "item_id", 2, "item_url")?>" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content">
            <h3><?=openDB("landing_page", "item_id", 3, "item_name")?></h3>
            <p class="fst-italic">
              <?=openDB("landing_page", "item_id", 3, "item_url")?>
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="<?=openDB("landing_page", "item_id", 4, "item_url")?>" data-purecounter-duration="1" class="purecounter"></span>
            <p><?=openDB("landing_page", "item_id", 4, "item_name")?></p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="<?=openDB("landing_page", "item_id", 5, "item_url")?>" data-purecounter-duration="1" class="purecounter"></span>
            <p><?=openDB("landing_page", "item_id", 5, "item_name")?></p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="<?=openDB("landing_page", "item_id", 6, "item_url")?>" data-purecounter-duration="1" class="purecounter"></span>
            <p><?=openDB("landing_page", "item_id", 6, "item_name")?></p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="<?=openDB("landing_page", "item_id", 7, "item_url")?>" data-purecounter-duration="1" class="purecounter"></span>
            <p><?=openDB("landing_page", "item_id", 7, "item_name")?></p>
          </div>
        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="products" class="portfolio">
      <div class="container">

        <div class="section-title">
          <span>Products</span>
          <h2>Products</h2>
          <p>All our products</p>
        </div>
        
        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-plane">Plane</li>
              <li data-filter=".filter-helic">Helicopter</li>
              <li data-filter=".filter-jet">Jet</li>          
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">

          <div class="col-lg-4 col-md-6 portfolio-item filter-plane">
            <img src="<?=openDB("image", "img_id", 4, "img_name")?>" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4><?=openDB("produk", "kode_produk", 100100006, "nama_produk")?></h4>
              <p>Plane</p>
              <a href="<?=openDB("image", "img_id", 4, "img_name")?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" 
              title="The A330-200F features an optimised fuselage cross-section, offering flexibility to carry a wide variety of pallet and container sizes. The aircraft offers 30% more volume than any freighter in its class, and is based on the proven and technologically-advanced A330 platform, for which Airbus has over 1,000 orders and already more than 650 aircraft in service."><i class="bx bx-plus"></i></a>
              <a href="detailProduct.php?produk=A330-200F&kode=100100006" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-jet">
            <img src="<?=openDB("image", "img_id", 17, "img_name")?>" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4><?=openDB("produk", "kode_produk", 100100012, "nama_produk")?></h4>
              <p>Jet</p>
              <a href="<?=openDB("image", "img_id", 17, "img_name")?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" 
              title="It is powered by two EJ200 engines that give the Eurofighter Typhoon its impressive thrust-to-weight ratio and maneuverability. The core of this state-of-the-art weapon system is its identification capability and sensor fusion, based on the CAPTOR-E AESA radar and the PIRATE FLIR sensor while being protected by the PRAETORIAN Electronic Defensive Aid Sub System (DASS). No other fighter aircraft has integrated a comparably high number of European and U.S. weapons and is thus combat ready whatever the mission.">
              <i class="bx bx-plus"></i></a>
              <a href="detailProduct.php?produk=Eurofighter&kode=100100012" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-plane">
            <img src="<?=openDB("image", "img_id", 12, "img_name")?>" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4><?=openDB("produk", "kode_produk", 100100007, "nama_produk")?></h4>
              <p>Plane</p>
              <a href="<?=openDB("image", "img_id", 12, "img_name")?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" 
              title="The BelugaXL performed its maiden flight in 2018, and received the type certification in November 2019 from the European Union Aviation Safety Agency (EASA) airworthiness authority. This paved the way for the first BelugaXL’s service entry in January 2020.
              As with the BelugaST, the BelugaXL fleet will operate across 11 destinations in Europe, continuing to strengthen Airbus’ industrial capabilities and enabling the company to meet its production and delivery commitments."><i class="bx bx-plus"></i></a>
              <a href="detailProduct.php?produk=Beluga XL&kode=100100007" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-jet">
            <img src="<?=openDB("image", "img_id", 1, "img_name")?>" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4><?=openDB("produk", "kode_produk", 100100010, "nama_produk")?></h4>
              <p>Jet</p>
              <a href="<?=openDB("image", "img_id", 1, "img_name")?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
              <a href="detailProduct.php?produk=A330-MRT&kode=100100010" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-plane">
            <img src="<?=openDB("image", "img_id", 8, "img_name")?>" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4><?=openDB("produk", "kode_produk", 100100004, "nama_produk")?></h4>
              <p>Plane</p>
              <a href="<?=openDB("image", "img_id", 8, "img_name")?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" 
              title="With more than 20 years of reliable service, the BelugaST delivers a high level of customer satisfaction with loading, unloading, and delivery designed to be fast, safe, flexible, and reliable – as demonstrated by successful operations throughout the world."><i class="bx bx-plus"></i></a>
              <a href="detailProduct.php?produk=Beluga ST&kode=100100004" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-helic">
            <img src="<?=openDB("image", "img_id", 22, "img_name")?>" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4><?=openDB("produk", "kode_produk", 100100011, "nama_produk")?></h4>
              <p>Helicopter</p>
              <a href="<?=openDB("image", "img_id", 22, "img_name")?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" 
              title="Airbus' H130 offers excellent payload lift performance and cost efficiency, along with a demonstrated ability to operate in the world’s harshest environments."><i class="bx bx-plus"></i></a>
              <a href="detailProduct.php?produk=H130&kode=100100011" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>


        </div>

      </div>
    </section><!-- End Portfolio Section -->

            
    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container">

        <div class="text-center">
          <h3>Call To Action</h3>
          <p>Contact Us</p>
          <a class="cta-btn" href="#contact">Call To Action</a>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container">

        <div class="section-title">
          <span>Team</span>
          <h2>Team</h2>
          <p>Sit sint consectetur velit quisquam cupiditate impedit suscipit alias</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="assets/img/team/team-1.jpg" alt="" width="210px">
              <h4><?=openDB("admin", "admin_id", 10001, "admin_name")?></h4>
              <span><?=openDB("admin", "admin_id", 10001, "jabatan")?></span>
              <p>
                <?=openDB("admin", "admin_id", 10001, "deskripsi")?>
              </p>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="assets/img/team/team-2.jpg" alt="" width="210px">
              <h4><?=openDB("admin", "admin_id", 20001, "admin_name")?></h4>
              <span><?=openDB("admin", "admin_id", 20001, "jabatan")?></span>
              <p>
                <?=openDB("admin", "admin_id", 20001, "deskripsi")?>
              </p>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="assets/img/team/team-3.jpg" alt="" width="200px">
              <h4><?=openDB("admin", "admin_id", 30001, "admin_name")?></h4>
              <span><?=openDB("admin", "admin_id", 30001, "jabatan")?></span>
              <p>
                <?=openDB("admin", "admin_id", 30001, "deskripsi")?>
              </p>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <span>Contact</span>
          <h2>Contact</h2>
          <p>Sit sint consectetur velit quisquam cupiditate impedit suscipit alias</p>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@example.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+1 5589 55488 55s</p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6 mt-3 mt-md-0">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group mt-3">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">

      <div class="container">

        <div class="row  justify-content-center">
          <div class="col-lg-6">
            <h3>eNno</h3>
            <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi placeat.</p>
          </div>
        </div>

        <div class="row footer-newsletter justify-content-center">
          <div class="col-lg-6">
            <form action="" method="post">
              <input type="email" name="email" placeholder="Enter your Email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>

        <div class="social-links">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>

      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Team</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/enno-free-simple-bootstrap-template/ -->
        Designed by <a href="#team">Us</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  
  <?php
    mysqli_close($conn);
  ?>

</body>