<?php 
include '../include/config.php';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $theme_title;?></title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/pharmacy.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    
    <header>
        <div class="container">
            <div class="nav">
                <div class="nav-logo">
                    <img src="assets/logo.jpg" alt="LOGO">
                </div>
                <div class="nav-navigation">
                    <a href="#">Products</a>
                    <a href="#">Contact us</a>
                    <a href="#">About</a>
                </div>
            </div>
            <div class="hero-main">
                <div class="hero-left" data-aos="fade-right"
                data-aos-offset="300"
                data-aos-easing="ease-in-sine">
    
                    <img src="assets/Hero.png" alt="hero">
                </div>
                <div class="hero-right" data-aos="flip-right">
                    <div class="hero-heading">Product Name</div>
                    <div class="hero-dis">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque quis culpa harum est, voluptatibus, iste doloribus consequuntur eum quae, numquam magni asperiores? Laborum placeat ducimus assumenda totam. Non, itaque harum!</div>
                    <div class="hero-btn">
                        <a href="#">Add to Cart <span><i class="fa fa-shopping-cart" aria-hidden="true"></i></span></a>
                    </div>
                </div>
            </div>
        </div>
    </header>

   <section class="product" data-aos="fade-up"
   data-aos-anchor-placement="top-bottom" data-aos-duration="2000">
       <h1 class="product-heading">Feature product</h1>
    <div class="container1">
        <div id="slide-left-container">
          <div class="slide-left">
          </div>
        </div>
        <div id="cards-container">
          <div class="cards">
            <div class="card">
              <img src="http://via.placeholder.com/220x220" alt="Animals" style="width:100%">
              <div class="container">
                <h4>
                  <b>Product Name</b>
                  <br>
                  <span>Discribtion</span>
                  <br>
                  <span>$ 99.00</span>
                </h4>
                <a class="product-btn" href="#">Add to Cart <i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
              </div>
            </div>
            <div class="card">
              <img src="http://via.placeholder.com/220x220" alt="Nature" style="width:100%">
              <div class="container">
                <h4>
                    <b>Product Name</b>
                    <br>
                    <span>Discribtion</span>
                    <br>
                    <span>$ 99.00</span>
                  </h4>
                  <a class="product-btn" href="#">Add to Cart<i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="card">
              <img src="http://via.placeholder.com/220x220" alt="Architecture" style="width:100%">
              <div class="container">
                <h4>
                    <b>Product Name</b>
                    <br>
                    <span>Discribtion</span>
                    <br>
                    <span>$ 99.00</span>
                  </h4>
                  <a class="product-btn" href="#">Add to Cart<i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="card">
              <img src="http://via.placeholder.com/220x220" alt="Technology" style="width:100%">
              <div class="container">
                <h4>
                    <b>Product Name</b>
                    <br>
                    <span>Discribtion</span>
                    <br>
                    <span>$ 99.00</span>
                  </h4>
                  <a class="product-btn" href="#">Add to Cart<i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="card">
              <img src="http://via.placeholder.com/220x220" alt="People" style="width:100%">
              <div class="container">
                <h4>
                    <b>Product Name</b>
                    <br>
                    <span>Discribtion</span>
                    <br>
                    <span>$ 99.00</span>
                  </h4>
                  <a class="product-btn" href="#">Add to Cart<i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="card">
              <img src="http://via.placeholder.com/220x220" alt="Animals" style="width:100%">
              <div class="container">
                <h4>
                    <b>Product Name</b>
                    <br>
                    <span>Discribtion</span>
                    <br>
                    <span>$ 99.00</span>
                  </h4>
                  <a class="product-btn" href="#">Add to Cart<i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="card">
              <img src="http://via.placeholder.com/220x220" alt="Nature" style="width:100%">
              <div class="container">
                <h4>
                    <b>Product Name</b>
                    <br>
                    <span>Discribtion</span>
                    <br>
                    <span>$ 99.00</span>
                  </h4>
                  <a class="product-btn" href="#">Add to Cart<i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="card">
              <img src="http://via.placeholder.com/220x220" alt="Architecture" style="width:100%">
              <div class="container">
                <h4>
                    <b>Product Name</b>
                    <br>
                    <span>Discribtion</span>
                    <br>
                    <span>$ 99.00</span>
                  </h4>
                  <a class="product-btn" href="#">Add to Cart<i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="card">
              <img src="http://via.placeholder.com/220x220" alt="Technology" style="width:100%">
              <div class="container">
                <h4>
                    <b>Product Name</b>
                    <br>
                    <span>Discribtion</span>
                    <br>
                    <span>$ 99.00</span>
                  </h4>
                  <a class="product-btn" href="#">Add to Cart<i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="card">
              <img src="http://via.placeholder.com/220x220" alt="People" style="width:100%">
              <div class="container">
                <h4>
                    <b>Product Name</b>
                    <br>
                    <span>Discribtion</span>
                    <br>
                    <span>$ 99.00</span>
                  </h4>
                  <a class="product-btn" href="#">Add to Cart<i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                </div>
            </div>
          </div>
        </div>
    
        <div id="slide-right-container">
          <div class="slide-right">
          </div>
        </div>
    
      </div>
    </section>   
    <section class="brand">
        <div class="container">
            <div class="brand-content">
                <div class="brand-heading">Popular Brands & Manufactures</div>
                <div class="brand-content-logo">
                <div class="brand-logo" data-aos="zoom-out">
                    <img src="assets/logo.jpg" alt="blogo">
                </div>
                <div class="brand-logo" data-aos="zoom-out">
                    <img src="assets/logo.jpg" alt="blogo">
                </div>
                <div class="brand-logo" data-aos="zoom-out">
                    <img src="assets/logo.jpg" alt="blogo">  
                </div>
                <div class="brand-logo" data-aos="zoom-out">
                    <img src="assets/logo.jpg" alt="blogo">  
                </div>
                <div class="brand-logo" data-aos="zoom-out">
                    <img src="assets/logo.jpg" alt="blogo">
                </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ad" data-aos="flip-right">
        <div class="container">
            <div class="ad-content">
               <a href="#"><img src="assets/side-effects-banner.jpg" alt="ad"></a> 
            </div>
        </div>
    </section>
    <section class="homopatic" class="product" data-aos="fade-up"
    data-aos-anchor-placement="top-bottom" data-aos-duration="2000">
        <h1 class="product-heading">
        <div class="container">
            <div class="homo-heading">Homeopathic & Herbal Products</div>
            <div class="homo-content">
                <div class="homo-product-card">
                    <div class="homo-card-upper"><img src="http://via.placeholder.com/220x220" alt=""></div>
                    <div class="homo-card-content">
                        <h4>
                            <b>Product Name</b>
                            <br>
                            <span>Discribtion</span>
                            <br>
                            <span>$ 99.00</span>
                          </h4>        
                    </div>
                    <div class="homo-card-btn">
                        <a class="homo-btn" href="#">Add to Cart<i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                
                    </div>
                </div>
                <div class="homo-product-card">
                    <div class="homo-card-upper"><img src="http://via.placeholder.com/220x220" alt=""></div>
                    <div class="homo-card-content">
                        <h4>
                            <b>Product Name</b>
                            <br>
                            <span>Discribtion</span>
                            <br>
                            <span>$ 99.00</span>
                          </h4>        
                    </div>
                    <div class="homo-card-btn">
                        <a class="homo-btn" href="#">Add to Cart<i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                
                    </div>
                </div>
                <div class="homo-product-card">
                    <div class="homo-card-upper"><img src="http://via.placeholder.com/220x220" alt=""></div>
                    <div class="homo-card-content">
                        <h4>
                            <b>Product Name</b>
                            <br>
                            <span>Discribtion</span>
                            <br>
                            <span>$ 99.00</span>
                          </h4>        
                    </div>
                    <div class="homo-card-btn">
                        <a class="homo-btn" href="#">Add to Cart<i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                
                    </div>
                </div>
                <div class="homo-product-card">
                    <div class="homo-card-upper"><img src="http://via.placeholder.com/220x220" alt=""></div>
                    <div class="homo-card-content">
                        <h4>
                            <b>Product Name</b>
                            <br>
                            <span>Discribtion</span>
                            <br>
                            <span>$ 99.00</span>
                          </h4>        
                    </div>
                    <div class="homo-card-btn">
                        <a class="homo-btn" href="#">Add to Cart<i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                
                    </div>
                </div>
                <div class="homo-product-card">
                    <div class="homo-card-upper"><img src="http://via.placeholder.com/220x220" alt=""></div>
                    <div class="homo-card-content">
                        <h4>
                            <b>Product Name</b>
                            <br>
                            <span>Discribtion</span>
                            <br>
                            <span>$ 99.00</span>
                          </h4>        
                    </div>
                    <div class="homo-card-btn">
                        <a class="homo-btn" href="#">Add to Cart<i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="homopatic" class="product" data-aos="fade-up"
    data-aos-anchor-placement="top-bottom" data-aos-duration="2000">
        <h1 class="product-heading">
        <div class="container">
            <div class="homo-heading">Sexual Wellness</div>
            <div class="homo-content">
                <div class="homo-product-card">
                    <div class="homo-card-upper"><img src="http://via.placeholder.com/220x220" alt=""></div>
                    <div class="homo-card-content">
                        <h4>
                            <b>Product Name</b>
                            <br>
                            <span>Discribtion</span>
                            <br>
                            <span>$ 99.00</span>
                          </h4>        
                    </div>
                    <div class="homo-card-btn">
                        <a class="homo-btn" href="#">Add to Cart<i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                
                    </div>
                </div>
                <div class="homo-product-card">
                    <div class="homo-card-upper"><img src="http://via.placeholder.com/220x220" alt=""></div>
                    <div class="homo-card-content">
                        <h4>
                            <b>Product Name</b>
                            <br>
                            <span>Discribtion</span>
                            <br>
                            <span>$ 99.00</span>
                          </h4>        
                    </div>
                    <div class="homo-card-btn">
                        <a class="homo-btn" href="#">Add to Cart<i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                
                    </div>
                </div>
                <div class="homo-product-card">
                    <div class="homo-card-upper"><img src="http://via.placeholder.com/220x220" alt=""></div>
                    <div class="homo-card-content">
                        <h4>
                            <b>Product Name</b>
                            <br>
                            <span>Discribtion</span>
                            <br>
                            <span>$ 99.00</span>
                          </h4>        
                    </div>
                    <div class="homo-card-btn">
                        <a class="homo-btn" href="#">Add to Cart<i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                
                    </div>
                </div>
                <div class="homo-product-card">
                    <div class="homo-card-upper"><img src="http://via.placeholder.com/220x220" alt=""></div>
                    <div class="homo-card-content">
                        <h4>
                            <b>Product Name</b>
                            <br>
                            <span>Discribtion</span>
                            <br>
                            <span>$ 99.00</span>
                          </h4>        
                    </div>
                    <div class="homo-card-btn">
                        <a class="homo-btn" href="#">Add to Cart<i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                
                    </div>
                </div>
                <div class="homo-product-card">
                    <div class="homo-card-upper"><img src="http://via.placeholder.com/220x220" alt=""></div>
                    <div class="homo-card-content">
                        <h4>
                            <b>Product Name</b>
                            <br>
                            <span>Discribtion</span>
                            <br>
                            <span>$ 99.00</span>
                          </h4>        
                    </div>
                    <div class="homo-card-btn">
                        <a class="homo-btn" href="#">Add to Cart<i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ad" data-aos="flip-right">
        <div class="container">
            <div class="ad-content">
               <a href="#"><img src="assets/side-effects-banner.jpg" alt="ad"></a> 
            </div>
        </div>
    </section>
    <section class="homopatic" class="product" data-aos="fade-up"
    data-aos-anchor-placement="top-bottom" data-aos-duration="2000">
        <h1 class="product-heading">
        <div class="container">
            <div class="homo-heading">Medical Equipment</div>
            <div class="homo-content">
                <div class="homo-product-card">
                    <div class="homo-card-upper"><img src="http://via.placeholder.com/220x220" alt=""></div>
                    <div class="homo-card-content">
                        <h4>
                            <b>Product Name</b>
                            <br>
                            <span>Discribtion</span>
                            <br>
                            <span>$ 99.00</span>
                          </h4>        
                    </div>
                    <div class="homo-card-btn">
                        <a class="homo-btn" href="#">Add to Cart<i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                
                    </div>
                </div>
                <div class="homo-product-card">
                    <div class="homo-card-upper"><img src="http://via.placeholder.com/220x220" alt=""></div>
                    <div class="homo-card-content">
                        <h4>
                            <b>Product Name</b>
                            <br>
                            <span>Discribtion</span>
                            <br>
                            <span>$ 99.00</span>
                          </h4>        
                    </div>
                    <div class="homo-card-btn">
                        <a class="homo-btn" href="#">Add to Cart<i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                
                    </div>
                </div>
                <div class="homo-product-card">
                    <div class="homo-card-upper"><img src="http://via.placeholder.com/220x220" alt=""></div>
                    <div class="homo-card-content">
                        <h4>
                            <b>Product Name</b>
                            <br>
                            <span>Discribtion</span>
                            <br>
                            <span>$ 99.00</span>
                          </h4>        
                    </div>
                    <div class="homo-card-btn">
                        <a class="homo-btn" href="#">Add to Cart<i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                
                    </div>
                </div>
                <div class="homo-product-card">
                    <div class="homo-card-upper"><img src="http://via.placeholder.com/220x220" alt=""></div>
                    <div class="homo-card-content">
                        <h4>
                            <b>Product Name</b>
                            <br>
                            <span>Discribtion</span>
                            <br>
                            <span>$ 99.00</span>
                          </h4>        
                    </div>
                    <div class="homo-card-btn">
                        <a class="homo-btn" href="#">Add to Cart<i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                
                    </div>
                </div>
                <div class="homo-product-card">
                    <div class="homo-card-upper"><img src="http://via.placeholder.com/220x220" alt=""></div>
                    <div class="homo-card-content">
                        <h4>
                            <b>Product Name</b>
                            <br>
                            <span>Discribtion</span>
                            <br>
                            <span>$ 99.00</span>
                          </h4>        
                    </div>
                    <div class="homo-card-btn">
                        <a class="homo-btn" href="#">Add to Cart<i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about">
        <div class="container">
            <div class="about-content" data-aos="zoom-in"   data-aos-duration="1000">
                <div class="about-heading">About Us</div>
                <div class="about-dis">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum nobis dolores qui debitis, nam odit repellendus obcaecati, modi adipisci beatae, esse autem hic ullam laboriosam magni! Voluptas suscipit qui tenetur?Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti eos numquam hic consectetur in illo vitae, quo harum veniam magnam non, provident ex quasi! Aliquam eaque commodi autem voluptatum alias.</div>
            </div>
        </div>
    </section>
    <section class="contactus">
        <div class="container">
            <div class="contact-content">
                <div class="contact-left-side" data-aos="zoom-in-right">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387190.2799160891!2d-74.25987584510595!3d40.69767006338158!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2s!4v1603793955455!5m2!1sen!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="contact-right-side" data-aos="zoom-in-left">
                    <div class="contact-heading">Contact Form</div>
                    <form action="sumit">
                        <input type="text" placeholder="First Name">
                        <br>
                        <input type="text" placeholder="Last Name">
                        <br>
                        <input type="email" placeholder="Your Email">
                        <br>
                        <input type="text" placeholder="Your Contact Number">
                        <br>
                        <textarea name="Messege" id="#" cols="30" rows="10" placeholder="Your Messege here"></textarea>
                        <br>
                        <button type="submit">SUBMIT<i class="fa fa-dropbox" aria-hidden="true"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="js/pharmacy.js"></script>

</body>
</html>