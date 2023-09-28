<?php

session_start();
require("./config/db.php");

$users_select_query = "SELECT * FROM users";
$users_connect = mysqli_query($db_connect, $users_select_query);
$users = mysqli_fetch_assoc($users_connect);

$banner_image_select_query = "SELECT * FROM banner_image WHERE id='1'";
$banner_image_connect = mysqli_query($db_connect, $banner_image_select_query);
$banner_image = mysqli_fetch_assoc($banner_image_connect);

$contact_select_query = "SELECT * FROM contact_info WHERE id='1'";
$contact_info_connect = mysqli_query($db_connect, $contact_select_query);
$contact_info = mysqli_fetch_assoc($contact_info_connect);

$counter_select_query = "SELECT * FROM portfolio_count";
$counters = mysqli_query($db_connect,$counter_select_query);

$info_select_query = "SELECT * FROM personal_info";
$info_connect = mysqli_query($db_connect,$info_select_query);
$information = mysqli_fetch_assoc($info_connect);

$link_select_query = "SELECT * FROM social_link";
$social_links = mysqli_query($db_connect,$link_select_query);


$skills_select_query = "SELECT * FROM skills WHERE status='active'";
$skills = mysqli_query($db_connect,$skills_select_query);

$service_select_query = "SELECT * FROM services WHERE status='active'";
$services = mysqli_query($db_connect,$service_select_query);

$protfolio_select_query = "SELECT * FROM protfolio WHERE status='active'";
$protfolios = mysqli_query($db_connect,$protfolio_select_query);

$testimonial_select_query = "SELECT * FROM testimonials WHERE status='active'";
$testimonials = mysqli_query($db_connect,$testimonial_select_query);

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

        <link rel="shortcut icon" type="image/x-icon" href="./frontend_assets/img/<?= $site_identity['favicon'] ?>">
        <!-- <?= $site_identity['favicon'] ?> -->
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

        <!-- main-area -->
        <main>

            <!-- banner-area -->
            <section id="home" class="banner-area banner-bg fix">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-7 col-lg-6">
                            <div class="banner-content">
                                <h6 class="wow fadeInUp" data-wow-delay="0.2s">HELLO!</h6>
                                <h2 class="wow fadeInUp" data-wow-delay="0.4s">I am <?= $information['name'] ?></h2>
                                <p class="wow fadeInUp" data-wow-delay="0.6s"><?= $information['intro'] ?></p>
                                <div class="banner-social wow fadeInUp" data-wow-delay="0.8s">
                                    <ul>
                                        <?php foreach($social_links as $social_link) :?>
                                            <li><a href="<?= $social_link['link']?>"><i class="<?= $social_link['icon'] ?>"></i></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <a href="#" class="btn wow fadeInUp" data-wow-delay="1s">DOWNLOAD CV</a>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6 d-none d-lg-block">
                            <div class="banner-img text-right">
                                <img src="./frontend_assets/img/banners/<?= $banner_image['image_1'] ?>" alt="" style="width: 600px; height: 850px; object-fit: cover;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-shape"><img src="./frontend_assets/img/shape/dot_circle.png" class="rotateme" alt="img"></div>
            </section>
            <!-- banner-area-end -->

            <!-- about-area-->
            <section id="about" class="about-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="about-img">
                                <img src="./frontend_assets/img/banners/<?= $banner_image['image_2'] ?>" title="me-01" alt="me-01" style="width: 434px;">
                            </div>
                        </div>
                        <div class="col-lg-6 pr-90">
                            <div class="section-title mb-25">
                                <span>Introduction</span>
                                <h2>About Me</h2>
                            </div>
                            <div class="about-content">
                                <p><?= $information['details_about'] ?></p>
                                <h3>Skills:</h3>
                            </div>

                            <?php foreach($skills as $skill): ?>
                            <!-- Education Item -->
                            <div class="education">
                                <div class="year"><?= $skill['year'] ?></div>
                                <div class="line"></div>
                                <div class="location">
                                    <span><?= $skill['title'] ?></span>
                                    <div class="progressWrapper">
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLefts" data-wow-delay="0.2s" data-wow-duration="2s" role="progressbar" style="width: <?= $skill['percentage'] ?>%;" aria-valuenow="<?= $skill['percentage'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <!-- End Education Item -->

                           
                        </div>
                    </div>
                </div>
            </section>
            <!-- about-area-end -->

            <!-- Services-area -->
            <section id="service" class="services-area pt-120 pb-50">
				<div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>WHAT WE DO</span>
                                <h2>Services and Solutions</h2>
                            </div>
                        </div>
                    </div>
					<div class="row">

                        <?php foreach($services as $service): ?>
						<div class="col-lg-4 col-md-6">
							<div class="icon_box_01 wow fadeInLeft" data-wow-delay="0.2s">
                                <i class="<?= $service['icon'] ?>"></i>
								<h3><?= $service['title'] ?></h3>
								<p>
                                <?= $service['description'] ?>
								</p>
							</div>
						</div>
                        <?php endforeach; ?>
						
					</div>
				</div>
			</section>
            <!-- Services-area-end -->

            <!-- Portfolios-area -->
            <section id="portfolio" class="portfolio-area primary-bg pt-120 pb-90">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>Portfolio Showcase</span>
                                <h2>My Recent Best Works</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                    <?php foreach($protfolios as $protfolio): ?>
                        <div class="col-lg-4 col-md-6 pitem">
                            <div class="speaker-box">
								<div class="speaker-thumb">
									<img src="./images/protfolio_images/<?= $protfolio['image'] ?>" alt="img" style="object-fit: cover; height: 250px; width: 400px">
								</div>
								<div class="speaker-overlay">
									<span><?= $protfolio['title'] ?></span>
									<h4><a href="single_page.php?post_id=<?= $protfolio['id'] ?>"><?= implode(' ', array_slice(str_word_count($protfolio['description'], 1), 0, 10)); ?> ...</a></h4>
									<a href="single_page.php?post_id=<?= $protfolio['id'] ?>" class="arrow-btn">More information <span></span></a>
								</div>
							</div>
                        </div>
                    <?php endforeach; ?>
                        
                    </div>
                </div>
            </section>
            <!-- Portfolios-area-end -->


            <!-- fact-area -->
            <section class="fact-area">
                <div class="container">
                    <div class="fact-wrap">
                        <div class="row justify-content-between">

                        <?php foreach($counters as $counter) :?>
                            <div class="col-xl-2 col-lg-3 col-sm-6">
                                <div class="fact-box text-center mb-50">
                                    <div class="fact-icon">
                                        <i class="<?= $counter['icon'] ?>"></i>
                                    </div>
                                    <div class="fact-content">
                                        <h2><span class="count"><?= $counter['counter'] ?></span></h2>
                                        <span><?= $counter['title'] ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            
                        </div>
                    </div>
                </div>
            </section>
            <!-- fact-area-end -->

            <!-- testimonial-area -->
            <section class="testimonial-area primary-bg pt-115 pb-115">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>testimonial</span>
                                <h2>happy customer quotes</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10">
                            <div class="testimonial-active">

                            <?php foreach($testimonials as $testimonial) :?>
                                <div class="single-testimonial text-center">
                                    <div class="testi-avatar">
                                        <img src="./images/testimonial_images/<?= $testimonial['image'] ?>" alt="img" style="height: 86px; width: 86px; border-radius: 50%">
                                    </div>
                                    <div class="testi-content">
                                        <h4><span>“</span> <?= $testimonial['testimonial'] ?> <span>”</span></h4>
                                        <div class="testi-avatar-info">
                                            <h5><?= $testimonial['name'] ?></h5>
                                            <span><?= $testimonial['designation'] ?></span>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- testimonial-area-end -->

            <!-- brand-area -->
            <div class="barnd-area pt-100 pb-100">
                <div class="container">
                    <div class="row brand-active">
                        <div class="col-xl-2">
                            <div class="single-brand">
                                <img src="./frontend_assets/img/brand/brand_img01.png" alt="img">
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="single-brand">
                                <img src="./frontend_assets/img/brand/brand_img02.png" alt="img">
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="single-brand">
                                <img src="./frontend_assets/img/brand/brand_img03.png" alt="img">
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="single-brand">
                                <img src="./frontend_assets/img/brand/brand_img04.png" alt="img">
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="single-brand">
                                <img src="./frontend_assets/img/brand/brand_img05.png" alt="img">
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="single-brand">
                                <img src="./frontend_assets/img/brand/brand_img03.png" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- brand-area-end -->

            <!-- contact-area -->
            <section id="contact" class="contact-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="section-title mb-20">
                                <span>information</span>
                                <h2>Contact Information</h2>
                            </div>
                            <div class="contact-content">
                                <p><?= $contact_info['contact_intro'] ?></p>
                                <h5>OFFICE ADDRESS</h5>
                                <div class="contact-list">
                                    <ul>
                                        <li><i class="fas fa-map-marker"></i><span>Address :</span><?= $contact_info['address'] ?></li>
                                        <li><i class="fas fa-headphones"></i><span>Phone :</span><?= $contact_info['phone'] ?></li>
                                        <li><i class="fas fa-globe-asia"></i><span>e-mail :</span><?= $contact_info['email'] ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                  
                            <form action="mail_post.php" method="POST">

                            <?php if(isset($_SESSION['mail_sent_err'])) : ?>
                                    <div class="alert alert-custom" role="alert">
                                        <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">done</i></div>
                                        <div class="alert-content">
                                            <span class="alert-title">Failed!</span>
                                            <span class="alert-text text-danger"><?= $_SESSION['mail_sent_err'] ?></span>
                                        </div>
                                    </div>
                                <?php endif; unset($_SESSION['mail_sent_err']); ?>

                                <?php if(isset($_SESSION['mail_sent'])) : ?>
                                    <div class="alert alert-custom" role="alert">
                                        <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                                        <div class="alert-content">
                                            <span class="alert-title">Great!</span>
                                            <span class="alert-text"><?= $_SESSION['mail_sent'] ?></span>
                                        </div>
                                    </div>
                                <?php endif; unset($_SESSION['mail_sent']); ?>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Name *</label>
                                    <input type="text" required class="form-control" name="name" placeholder="Enter your name">
                                    
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email address *</label>
                                    <input type="email" required class="form-control" placeholder="Enter your email" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                                
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Subject</label>
                                    <input type="text" required class="form-control" name="subject" placeholder="Enter your subject">
                                    
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Message *</label>
                                    <textarea name="message" required class="form-control" rows="5" placeholder="Your message"></textarea>
                                </div>
                                    
                                    <button type="submit" name="mail_send_btn" class="btn">SEND</button>
                                </form>

                                
                          
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact-area-end -->

        </main>
        <!-- main-area-end -->

        <!-- footer -->
        <footer>
            <div class="copyright-wrap">
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
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

        <script>
        $(document).ready(function () {
            // Show/hide the back to top button based on scroll position
            $(window).scroll(function () {
                if ($(this).scrollTop() > 100) {
                    $('#backToTop').fadeIn();
                } else {
                    $('#backToTop').fadeOut();
                }
            });

            // Scroll to top when the button is clicked
            $('#backToTop').click(function () {
                $('html, body').animate({ scrollTop: 0 }, 800);
                return false;
            });
        });
    </script>

    </body>

</html>
