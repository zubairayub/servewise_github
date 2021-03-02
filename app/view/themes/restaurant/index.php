<?php
include 'include/header.php'; 
?>

<body data-scroll-animation="true">

    <div class="body">
        <div class="main-wrapper">
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
                            <img src="<?= $logo ;?>" alt="LOGO" width="50px">
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
                            <li>
                            <div id="menuToggle">
                        <input type="checkbox" class="checkbox" />
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <ul id="menu">
                            <!-- Cart submit form -->
                            <form action="../assets/cart/viewcart.php" method="POST"> 
                            <!-- SmartCart element -->
                                <div id="smartcart"></div>
                            </form>  
                        </ul>
                            
                            </li>
                        </ul>
                    </div>
                    <!--/.navbar-collapse -->
                </div>
            </nav>

            <!-- Home page-->
            <section class="home">
                <div class="tittle-block">
                    <div class="logo">
                    </div>
                    <h1>DELICIOUS Food</h1>
                    <h2>Restaurant</h2>
                </div>
                <div class="scroll-down">
                    <a href="#about">
                        <img src="img/img/arrow-down.png" alt="down-arrow">
                    </a>
                </div>
            </section>

            <!-- About page-->
            <section class="about" id="about">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-header wow fadeInDown">
                                <h1>the restaurant<small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed eveniet,</small></h1>
                            </div>
                        </div>
                    </div>
                    <div class="row wow fadeInUp">
                        <div class="col-md-4">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-12 hidden-sm about-photo">
                                        <div class="image-thumb">
                                            <img src="img/img/about 1.jpg" data-mfp-src="img/fullImages/pic1.jpg" class="img-responsive" alt="logo">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 about-photo hidden-xs">
                                        <img src="img/img/about 2.jpg" data-mfp-src="img/fullImages/pic2.jpg" class="img-responsive" alt="logo">
                                    </div>
                                    <div class="col-sm-6 about-photo hidden-xs">
                                        <img src="img/img/about 3.jpg" data-mfp-src="img/fullImages/pic3.jpg" class="img-responsive" alt="logo">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore doloremque adipisci doloribus dignissimos veniam accusantium cupiditate, excepturi architecto blanditiis. At nulla iure cupiditate ab. Nostrum aspernatur dignissimos corrupti porro incidunt.
                            </p>
                          
                        </div>
                    </div>
                </div>
            </section>
            <section class="special">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-header wow fadeInDown">
                                <h1 class="white">today's Menu<small>A little about us and a breif history of how we started.</small></h1>
                            </div>
                        </div>
                    </div>
                    <div class="row wow fadeInUp">
                        <div class="col-md-offset-1 col-md-10">
                            <div class="flexslider special-slider">
                                <ul class="slides">
                                    <?php 
                                        foreach ($result as $key => $value) {
                                                $image = getproductsimages($value['product_id'],$DB_CLASS);
                                                if(!empty($image)){
   $image_path =   $image[0]['image_path'];
                        }
                                    ?>

                                    <li>
                                        <div class="slider-img">
                                            <img src='<?php echo $PRODUCT_DIRECTORY.$image_path ; ?>' alt="" />
                                        </div>
                                        <div class="slider-content">
                                            <div class="page-header">
                                                <h1><?= $value['name']?><small>Dish Discription</small></h1>
                                            </div>
                                            <p><?= $value['description'] ?></p>
                                            <a class="btn btn-default" href="./index.html" role="button">Order now</a>
                                        </div>
                                    </li>
                                    <!-- <?php } ?>        
                                    <li>
                                        <div class="slider-img">
                                            <img src="img/img/zachariah-hagy-q6_pBvGsqn8-unsplash.jpg" alt="" />
                                        </div>
                                        <div class="slider-content">
                                            <div class="page-header">
                                                <h1>Dish Name<small>Dish Discribtion</small></h1>
                                            </div>
                                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nesciunt dolores porro earum minima totam modi nobis iusto explicabo cum tempore qui veniam, molestiae praesentium fugit, nostrum reiciendis reprehenderit voluptates quidem.</p>
                                            <a class="btn btn-default" href="./index.html" role="button">Order now</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="slider-img">
                                            <img src="img/img/zachariah-hagy-q6_pBvGsqn8-unsplash.jpg" alt="" />
                                        </div>
                                        <div class="slider-content">
                                            <div class="page-header">
                                                <h1>Dish Name<small>Dish Discribtion</small></h1>
                                            </div>
                                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nesciunt dolores porro earum minima totam modi nobis iusto explicabo cum tempore qui veniam, molestiae praesentium fugit, nostrum reiciendis reprehenderit voluptates quidem.</p>
                                            <a class="btn btn-default" href="./index.html" role="button">Order now</a>
                                        </div>
                                    </li> -->
                                </ul>
                                <div class="direction-nav hidden-sm">
                                    <div class="next">
                                        <a><img src="img/img/right-arrow.png" alt="" /></a>
                                    </div>
                                    <div class="prev">
                                        <a><img src="img/img/left-arrow.png" alt="" /></a>
                                    </div>
                                </div>
                            </div>
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
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="text" class="form-control" id="datepicker" placeholder="Pick a date">
                                    <i class="fa fa-calendar-o"></i>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group">
                                    <label>Your Name</label>
                                    <input type="text" class="form-control" placeholder="Full Name">
                                    <i class="fa fa-pencil-square-o"></i>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group">
                                    <label>Time</label>
                                    <input type="text" class="form-control" id="timepicker" placeholder="Pick a time">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" class="form-control" placeholder="Your Email ID">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group">
                                    <label>Guests</label>
                                    <input class="form-control" type="number" placeholder="How many of you?">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control" placeholder="Enter your Phone Number">
                                    <i class="fa fa-phone"></i>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="reservation-btn">
                                    <a class="btn btn-default btn-lg" role="button">Make Reservation</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="reservation-footer">
                        <p>You can also call: <strong>+1 234 0000 000</strong> to make a reservation.</p>
                        <span></span>
                    </div>
                </div>
            </section>

            <!-- Our features-->
            <section class="features">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-header wow fadeInDown">
                                <h1 class="white">Our features<small>Dishes</small></h1>
                            </div>
                        </div>
                    </div>
                    <div class="row wow fadeInUp">
                        <div class="col-md-4 col-sm-6">
                            <?php 
                                foreach ($result as $key => $value) {
                                    if($value['is_featured'] == '1'){
                                        $image = getproductsimages($value['product_id'],$DB_CLASS);
                                       if(!empty($image)){
   $image_path =   $image[0]['image_path'];
                        }
                            ?>
                            <div class="features-tile sc-product-item">
                                <div class="features-img">
                                    <img src='<?php echo $PRODUCT_DIRECTORY.$image_path ; ?>' alt="" />
                                </div>
                                <div class="features-content">
                                    <div class="page-header">
                                        <h1 data-name="product_name"><?= $value['name'] ?></h1>
                                    </div>
                                    <p><?= $value['description']; ?></p>
                                    <p>$<?= $value['price']; ?></p>
                                    <div class="product-card-button">
                                        <input name="product_price" value="<?= $value['price']?>" type="hidden" />
                                        <input name="product_id" value="<?= $value['product_id'] ?>" type="hidden" />
                                        <a href="#" class="sc-add-to-cart product-btn">Add to Cart<i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                            <?php }
                                }
                            ?>
                        <!-- </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="features-tile">
                                <div class="features-img">
                                    <img src="img/img/about 2.jpg" alt="" />
                                </div>
                                <div class="features-content">
                                    <div class="page-header">
                                        <h1>Dish Name</h1>
                                    </div>
                                    <p>Dish Discribtion</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="features-tile">
                                <div class="features-img">
                                    <img src="img/img/about 2.jpg" alt="" />
                                </div>
                                <div class="features-content">
                                    <div class="page-header">
                                        <h1>Dish Name</h1>
                                    </div>
                                    <p>Dish Discribtion</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 visible-sm">
                            <div class="features-tile">
                                <div class="features-img">
                                    <img src="img/img/about 2.jpg" alt="" />
                                </div>
                                <div class="features-content">
                                    <div class="page-header">
                                        <h1>Dish Name</h1>
                                    </div>
                                    <p>Dish Discribtion</p>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </section>

            <!-- menu-->
            <section class="menu">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-header wow fadeInDown">
                                <h1>Our menu</h1>
                            </div>
                        </div>
                    </div>
                    <div class="food-menu wow fadeInUp">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="menu-tags">
                                    <span data-filter="*" class="tagsort-active">All</span>
                                    <span data-filter=".starter">starters</span>
                                    <span data-filter=".breakfast">breakfast</span>
                                    <span data-filter=".lunch">lunch</span>
                                    <span data-filter=".dinner">dinner</span>
                                    <span data-filter=".desserts">desserts</span>
                                </div>
                            </div>
                        </div>
                        <div class="row menu-items">
                        
                            <?php 
                                foreach ($result as $key => $value) {
                                        $image = getproductsimages($value['product_id'],$DB_CLASS);
                                       if(!empty($image)){
   $image_path =   $image[0]['image_path'];
                        }
                            ?>
                            <div class="menu-item col-sm-6 col-xs-12 starter dinner desserts">
                                <div class="clearfix menu-wrapper">
                                    <h4><?= $value['name']; ?></h4>
                                    <span class="price"><?= $value['price']; ?></span>
                                    <div class="dotted-bg"></div>
                                </div>
                                <p>dish discribtion</p>
                            </div>
                            <?php } ?>        

                            <!-- <div class="menu-item col-sm-6 col-xs-12 starter">
                                <div class="clearfix menu-wrapper">
                                    <h4>Dish 1</h4>
                                    <span class="price">$14.95</span>
                                    <div class="dotted-bg"></div>
                                </div>
                                <p>pellentesque enim. Aliquam tempor</p>
                            </div>
                            <div class="menu-item col-sm-6 col-xs-12 breakfast desserts starter">
                                <div class="clearfix menu-wrapper">
                                    <h4>Dish 1</h4>
                                    <span class="price">$14.95</span>
                                    <div class="dotted-bg"></div>
                                </div>
                                <p>pellentesque enim. Aliquam tempor</p>
                            </div>
                            <div class="menu-item col-sm-6 col-xs-12 breakfast">
                                <div class="clearfix menu-wrapper">
                                    <h4>Dish 1</h4>
                                    <span class="price">$14.95</span>
                                    <div class="dotted-bg"></div>
                                </div>
                                <p>pellentesque enim. Aliquam tempor</p>
                            </div>
                            <div class="menu-item col-sm-6 col-xs-12 lunch starter breakfast">
                                <div class="clearfix menu-wrapper">
                                    <h4>Dish 1</h4>
                                    <span class="price">$14.95</span>
                                    <div class="dotted-bg"></div>
                                </div>
                                <p>pellentesque enim. Aliquam tempor</p>
                            </div>
                            <div class="menu-item col-sm-6 col-xs-12 lunch">
                                <div class="clearfix menu-wrapper">
                                    <h4>Dish 1</h4>
                                    <span class="price">$14.95</span>
                                    <div class="dotted-bg"></div>
                                </div>
                                <p>pellentesque enim. Aliquam tempor</p>
                            </div>
                            <div class="menu-item col-sm-6 col-xs-12 dinner breakfast lunch">
                                <div class="clearfix menu-wrapper">
                                    <h4>Dish 1</h4>
                                    <span class="price">$14.95</span>
                                    <div class="dotted-bg"></div>
                                </div>
                                <p>pellentesque enim. Aliquam tempor</p>
                            </div>
                            <div class="menu-item col-sm-6 col-xs-12 dinner">
                                <div class="clearfix menu-wrapper">
                                    <h4>Dish 1</h4>
                                    <span class="price">$14.95</span>
                                    <div class="dotted-bg"></div>
                                </div>
                                <p>pellentesque enim. Aliquam tempor</p>
                            </div>
                            <div class="menu-item col-sm-6 col-xs-12 desserts lunch dinner">
                                <div class="clearfix menu-wrapper">
                                    <h4>Dish 1</h4>
                                    <span class="price">$14.95</span>
                                    <div class="dotted-bg"></div>
                                </div>
                                <p>pellentesque enim. Aliquam tempor</p>
                            </div>
                            <div class="menu-item col-sm-6 col-xs-12 desserts">
                                <div class="clearfix menu-wrapper">
                                    <h4>Dish 1</h4>
                                    <span class="price">$14.95</span>
                                    <div class="dotted-bg"></div>
                                </div>
                                <p>pellentesque enim. Aliquam tempor</p>
                            </div> -->
                        </div>  
                    </div>
                </div>
            </section>

            <!-- Trusted BY-->
            <section class="trusted">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-header wow fadeInDown">
                                <h1>About Us<small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, iure tenetur. Aut, consequuntur sunt temporibus quaerat repudiandae delectus aliquam nostrum ab laudantium. Doloribus commodi asperiores fugiat reprehenderit magnam veritatis consequatur.</small></h1>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quotes section-->
                <!-- <div class="trusted-quote">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-offset-1 col-md-10">
                                <div class="trusted-slider">
                                    <ul class="slides">
                                        <li>
                                            <img src="img/img/quote.png" alt="quote">
                                            <p class="quote-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis laudantium, dolorem tempora eligendi quae porro nulla! Quaerat at, quis rem fuga est quas dolor reprehenderit. Placeat dolores consequuntur maiores unde!</p>
                                            <p class="quote-author">Muzzamil qureshi, <span>Pakistan</span></p>
                                        </li>
                                        <li>
                                            <img src="img/img/quote.png" alt="quote">
                                            <p class="quote-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis laudantium, dolorem tempora eligendi quae porro nulla! Quaerat at, quis rem fuga est quas dolor reprehenderit. Placeat dolores consequuntur maiores unde!</p>
                                            <p class="quote-author">Muzzamil qureshi, <span>Pakistan</span></p>
                                        </li>
                                        <li>
                                            <img src="img/img/quote.png" alt="quote">
                                            <p class="quote-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis laudantium, dolorem tempora eligendi quae porro nulla! Quaerat at, quis rem fuga est quas dolor reprehenderit. Placeat dolores consequuntur maiores unde!</p>
                                            <p class="quote-author">Muzzamil qureshi, <span>Pakistan</span></p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->

            <section class="instagram">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-header wow fadeInDown">
                                <h1>Your Tag Line<small>We love posting photos of our coustomers having a good time</small></h1>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- instafeed div-->
                <!-- Change your settings in the data- attributes (See documentation for help) -->
            </section>

<?php  include 'include/footer.php'; ?>

            