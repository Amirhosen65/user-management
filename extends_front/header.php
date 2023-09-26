<?php

session_start();
require("./config/db.php");

    $users_select_query = "SELECT * FROM users";
    $users_connect = mysqli_query($db_connect, $users_select_query);
    $users = mysqli_fetch_assoc($users_connect);
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
        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
        <link rel="stylesheet" href="./frontend_assets/css/responsive.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


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
                                    <a href="index.php" class="navbar-brand logo-sticky-none"><img src="../frontend_assets/img/logo/<?= $site_identity['white_logo'] ?>" alt="Logo" style="height: 30px; width: auto;"></a>
                                    <a href="index.php" class="navbar-brand s-logo-none"><img src="../frontend_assets/img/logo/<?= $site_identity['logo'] ?>" alt="Logo" style="height: 30px; width: auto;"></a>
                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarNav">
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarNav">
                                        <ul class="navbar-nav ml-auto">
                                            <li class="nav-item active"><a class="nav-link" href="#home">Home</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#about">about</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#service">service</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#portfolio">portfolio</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
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