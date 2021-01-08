<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>resarvation</title>
    <!-- Favicons -->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Responsive Tag -->
    <meta name="viewport" content="width=device-width">
    <!-- lib Files -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="css/plugin.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>

    <div class="body">

        <div class="main-wrapper">
            <!-- Navigation-->
            <nav class="navbar navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="./index.html">
                            <img src="" alt="LOGO">
                        </a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                            </li>
                            <li class="dropdown">
                                <a href="./menu.html">Menu</a>
                            </li>
                            <li class="dropdown">
                                <a href="./reservation.html" >Reservation</a>
                            </li>
                            <li><a href="./contact.html">Contact</a></li>
                        </ul>
                    </div>
                    <!--/.navbar-collapse -->
                </div>
            </nav>

            <!-- Page Header -->
            <section class="page_header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="text-uppercase">Reservation</h2>
                            <p>Tomato is a delicious restaurant website template</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Reservations page-->
            <section class="reservation">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-header wow fadeInDown">
                                <h1>Reservations<small>Book a table online. Leads will reach in your email.</small></h1>
                            </div>
                        </div>
                    </div>
                    <div class="reservation-form wow fadeInUp">
                        <form action="php/reservation.php" id="reservationform" method="POST">
                            <div class="row">
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label for="datepicker">Date</label>
                                        <input type="text" name="date" class="form-control" id="datepicker" placeholder="Pick a date" title="Please choose a date" required>
                                        <i class="fa fa-calendar-o"></i>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Your Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" title="Your Full Name please" required>
                                        <i class="fa fa-pencil-square-o"></i>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label for="timepicker">Time</label>
                                        <input type="text" class="form-control" id="timepicker" name="time" placeholder="Pick a time" title="Choose Preferred Time" required>
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email Address</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email ID" title="Please enter your email id" required>
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label for="guests">Guests</label>
                                        <input class="form-control" type="number" id="guests" name="guests" placeholder="How many of you?" title="Please enter number of guests" required>
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your Phone Number" title="Please enter your phone number" required>
                                        <i class="fa fa-phone"></i>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="reservation-btn">
                                        <button type="submit" class="btn btn-default btn-lg" id="js-reservation-btn">Make Reservation</button>
                                        <div id="js-reservation-result" data-success-msg="Form submitted successfully." data-error-msg="Oops. Something went wrong."></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="reservation-footer">
                        <p>You can also call: <strong>+1 234 0000 000</strong> to make a reservation.</p>
                        <span></span>
                    </div>
                </div>
            </section>

           
           <!-- Footer-->
           <section class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <h1>About us</h1>
                        <p>Duis leo justo, condimentum at purus eu,Aenean sed dolor sem. Etiam massa libero, auctor vitae egestas et, accumsan quis nunc.Duis leo justo, condimentum at purus eu, posuere pretium tellus.</p>
                    </div>
                    <div class="col-md-4  col-sm-6">
                    </div>

                    <div class="col-md-4  col-sm-6">
                        <h1>Reach us</h1>
                        <div class="footer-social-icons">
                            <a href="http://www.facebook.com">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                            <a href="http://www.twitter.com">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="http://plus.google.com">
                                <i class="fa fa-google"></i>
                            </a>
                            <a href="http://www.youtube.com">
                                <i class="fa fa-youtube-play"></i>
                            </a>
                            <a href="http://www.vimeo.com">
                                <i class="fa fa-vimeo"></i>
                            </a>
                            <a href="http://www.pinterest.com">
                                <i class="fa fa-pinterest-p"></i>
                            </a>
                            <a href="http://www.linkedin.com">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </div>
                        <div class="footer-address">
                            <p><i class="fa fa-map-marker"></i>ABC Street, ABC City, 10014</p>
                            <p><i class="fa fa-phone"></i>Phone: (111) 111-1111</p>
                            <p><i class="fa fa-envelope-o"></i>support@restaurant.com</p>
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
    <script src="js/vendor/validate.js"></script>
    <script src="js/reservation.js"></script>
    <script src="js/vendor/mc/main.js"></script>

</body>

</html>
