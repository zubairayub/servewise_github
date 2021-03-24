<!-- Footer-->
<section class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <h1>About us</h1>
                            <p><?= $footer_about_disc ?></p>
                        </div>
                        <div class="col-md-4  col-sm-6">
                        </div>

                        <div class="col-md-4  col-sm-6">
                            <h1>Reach us</h1>
                            <div class="footer-social-icons">
                                <a href="<?= $footer_fb_link ?>">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                                <a href="<?= $footer_tw_link ?>">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="<?= $footer_in_link ?>">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </div>
                            <div class="footer-address">
                                <p><i class="fa fa-map-marker"></i><?= $foote_ad ?></p>
                                <p><i class="fa fa-phone"></i>Phone: <?= $footer_contact ?></p>
                                <p><i class="fa fa-envelope-o"></i><?= $footer_email ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            </div>

        </div>

        <!-- Javascript -->
        <script src="js/vendor/jquery-1.11.2.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/vendor/jquery.flexslider-min.js"></script>
        <script src="js/vendor/spectragram.js"></script>
        <script src="js/vendor/owl.carousel.min.js"></script>
        <script src="js/vendor/velocity.min.js"></script>
        <script src="js/vendor/velocity.ui.min.js"></script>
        <script src="js/vendor/bootstrap-datepicker.min.js"></script>
        <script src="js/vendor/bootstrap-clockpicker.min.js"></script>
        <script src="js/vendor/jquery.magnific-popup.min.js"></script>
        <script src="js/vendor/isotope.pkgd.min.js"></script>
        <script src="js/vendor/slick.min.js"></script>
        <script src="js/vendor/wow.min.js"></script>
        <script src="js/animation.js"></script>
        <script src="js/vendor/vegas/vegas.min.js"></script>
        <script src="js/vendor/jquery.mb.YTPlayer.js"></script>
        <script src="js/vendor/jquery.stellar.js"></script>
        <script src="js/main.js"></script>
        <script src="js/vendor/mc/jquery.ketchup.all.min.js"></script>
        <script src="js/vendor/mc/main.js"></script>
        <script src="../assets/js/jquery.smartCart.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                
                // Initialize Smart Cart        
                $('#smartcart').smartCart();
            });

            $(document).ready(function(){
    $(".default_option").click(function(){
      $(this).parent().toggleClass("active");
    })

    $(".select_ul li").click(function(){
      var currentele = $(this).html();
      $(".default_option li").html(currentele);
      $(this).parents(".select_wrap").removeClass("active");
    })
});

window.onscroll = function() {scrollFunction()};
  
  function scrollFunction() {
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
      document.getElementById("navTop").style.cssText = "background: green; top:30px;"  ;
    } else {
      document.getElementById("navTop").style.background = "transparent";
    }
  };
        </script>
</body>

</html>