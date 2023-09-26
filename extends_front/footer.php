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