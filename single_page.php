<?php

require("./config/db.php");

$users_select_query = "SELECT * FROM users";
$users_connect = mysqli_query($db_connect, $users_select_query);
$users = mysqli_fetch_assoc($users_connect);

$id = $_GET['post_id'];

$select_query = "SELECT * FROM protfolio WHERE id='$id'";
$connect = mysqli_query($db_connect,$select_query);
$protfolio = mysqli_fetch_assoc($connect);

$contact_select_query = "SELECT * FROM contact_info WHERE id='1'";
$contact_info_connect = mysqli_query($db_connect, $contact_select_query);
$contact_info = mysqli_fetch_assoc($contact_info_connect);

$link_select_query = "SELECT * FROM social_link";
$social_links = mysqli_query($db_connect,$link_select_query);

$select_query = "SELECT * FROM site_identity";
$connect = mysqli_query($db_connect,$select_query); 
$site_identity = mysqli_fetch_assoc($connect);

?>

<!doctype html>
<html class="no-js" lang="en">


<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?= $users['name'] ?> - Personal Portfolio</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" type="image/x-icon" href="./frontend_assets/img/logo/<?= $site_identity['favicon'] ?>">
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="./frontend_assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="./frontend_assets/css/animate.min.css">
        <link rel="stylesheet" href="./frontend_assets/css/magnific-popup.css">
        <link rel="stylesheet" href="./frontend_assets/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="./frontend_assets/css/flaticon.css">
        <link rel="stylesheet" href="./frontend_assets/css/slick.css">
        <link rel="stylesheet" href="./frontend_assets/css/aos.css">
        <link rel="stylesheet" href="./frontend_assets/css/default.css">
        <link rel="stylesheet" href="./frontend_assets/css/style.css">
        <link rel="stylesheet" href="./frontend_assets/css/responsive.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


        <style>
        /* Add some custom CSS for positioning the back to top button */
        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: none;
        }
        </style>
    </head>
    <body class="theme-bg">

        <!-- preloader -->
        <div id="preloader">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                </div>
            </div>
        </div>
        <!-- preloader-end -->

        <!-- header-start -->
        <header>
            <div id="header-sticky" class="transparent-header">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-menu">
                                <nav class="navbar navbar-expand-lg">
                                <a href="index.php" class="navbar-brand logo-sticky-none"><img src="./frontend_assets/img/logo/<?= $site_identity['white_logo'] ?>" alt="Logo" style="height: 30px; width: auto;"></a>
                                    <a href="index.php" class="navbar-brand s-logo-none"><img src="./frontend_assets/img/logo/<?= $site_identity['logo'] ?>" alt="Logo" style="height: 30px; width: auto;"></a>
                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarNav">
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarNav">
                                        <ul class="navbar-nav ml-auto">
                                            <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                                            <li class="nav-item"><a class="nav-link" href="index.php#about">about</a></li>
                                            <li class="nav-item"><a class="nav-link" href="index.php#service">service</a></li>
                                            <li class="nav-item"><a class="nav-link" href="index.php#portfolio">portfolio</a></li>
                                            <li class="nav-item"><a class="nav-link" href="index.php#contact">Contact</a></li>
                                        </ul>
                                    </div>
                                    <div class="header-btn">
                                        <a href="#" class="off-canvas-menu menu-tigger"><i class="flaticon-menu"></i></a>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- offcanvas-start -->
            <div class="extra-info">
                <div class="close-icon menu-close">
                    <button>
                        <i class="far fa-window-close"></i>
                    </button>
                </div>
                <div class="logo-side mb-30">
                    <a href="index-2.html">
                        <img src="./frontend_assets/img/logo/logo.png" alt="" />
                    </a>
                </div>
                <div class="side-info mb-30">
                    <div class="contact-list mb-30">
                        <h4>Office Address</h4>
                        <p><?= $contact_info['address'] ?></p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Phone Number</h4>
                        <p><?= $contact_info['phone'] ?></p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Email Address</h4>
                        <p><?= $contact_info['email'] ?></p>
                    </div>
                </div>
                <div class="social-icon-right mt-20">
                <?php foreach($social_links as $social_link) :?>
                    <a href="<?= $social_link['link']?>"><i class="<?= $social_link['icon'] ?>"></i></a>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="offcanvas-overly"></div>
            <!-- offcanvas-end -->
        </header>
        <!-- header-end -->

        <!-- main-area -->
        <main>

            

            <!-- portfolio-details-area -->
            <section class="portfolio-details-area pt-120 pb-120 mt-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10">
                            <div class="single-blog-list">
                                <div class="blog-list-thumb mb-35">
                                    <img src="./images/protfolio_images/<?= $protfolio['image'] ?>" alt="img">
                                    
                                </div>
                                <div class="blog-list-content blog-details-content portfolio-details-content">
                                    <h2><?= $protfolio['title'] ?></h2>
                                    <p><?= $protfolio['description'] ?></p>
                                    <div class="blog-list-meta">
                                        <ul>
                                            <li class="blog-post-date">
                                                <h3>Share On</h3>
                                            </li>
                                            <li class="blog-post-share">
                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="avatar-post mt-70 mb-60">
                                    <ul>
                                        <li>
                                            <div class="post-avatar-img">
                                                <img src="./images/profile_images/<?= $users['profile_image'] ?>" alt="img" style="height: 150px; width: 150px; border-radius: 50%">
                                            </div>
                                            <div class="post-avatar-content">
                                                <h5><?= $users['name'] ?></h5>
                                                <p>Web Developer</p>
                                                <div class="post-avatar-social mt-15">
                                                <?php foreach($social_links as $social_link) :?>
                                                <a href="<?= $social_link['link']?>"><i class="<?= $social_link['icon'] ?>"></i></a>
                                                <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- portfolio-details-area-end -->

        </main>
        <!-- main-area-end -->

        <!-- footer -->
        <footer>
            <div class="copyright-wrap primary-bg">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="copyright-text text-center">
                                <p>© Copyright <?= date("Y");?> <span><?= $site_identity['footer'] ?></span> | All Rights Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer-end -->

            <!-- Back to top button -->
            <a href="#" class="btn back-to-top" id="backToTop" role="button">
                <i class="fas fa-arrow-up"></i>
            </a>

		<!-- JS here -->
        <script src="./frontend_assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="./frontend_assets/js/popper.min.js"></script>
        <script src="./frontend_assets/js/bootstrap.min.js"></script>
        <script src="./frontend_assets/js/isotope.pkgd.min.js"></script>
        <script src="./frontend_assets/js/one-page-nav-min.js"></script>
        <script src="./frontend_assets/js/slick.min.js"></script>
        <script src="./frontend_assets/js/ajax-form.js"></script>
        <script src="./frontend_assets/js/wow.min.js"></script>
        <script src="./frontend_assets/js/aos.js"></script>
        <script src="./frontend_assets/js/jquery.waypoints.min.js"></script>
        <script src="./frontend_assets/js/jquery.counterup.min.js"></script>
        <script src="./frontend_assets/js/jquery.scrollUp.min.js"></script>
        <script src="./frontend_assets/js/imagesloaded.pkgd.min.js"></script>
        <script src="./frontend_assets/js/jquery.magnific-popup.min.js"></script>
        <script src="./frontend_assets/js/plugins.js"></script>
        <script src="./frontend_assets/js/main.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>


</html>
