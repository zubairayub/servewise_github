<?php
include 'include/header.php'; 
?>
<style>
    .img-responsive{width: 80px;height:80px; flex-basis:20%}
    .sc-theme-default{width:100%;}
    .panel-heading{width: 100%;margin: 20px 0px;font-size: 14px;font-weight: 600; color:black;}
    .sc-cart-item-list{font-size:14px;overflow: auto;height: 300px;}
    .list-group-item{padding: 5px 0px; border:none; margin-bottom:10px; display: flex;justify-content: center;flex-wrap:wrap;align-items: center;}
    .sc-cart-remove{flex-basis: 7%;height: 20px;width:20px;margin-right: 10px;border: 1px solid rgba(0,0,0,0.2);border-radius: 50%;font-size: 16px;background: white;box-shadow: 0px 3px 6px rgba(0,0,0,0.2);background: #ffafaf;color: white;}
    .list-group-item-heading{padding:20px 0px;flex-basis: 20%;font-size: 14px;display: flex;justify-content: center;align-items: center;}
    .sc-cart-summary-subtotal{font-size:14px;display: flex;justify-content: flex-end;align-items: center;}
    .sc-cart-item-summary .sc-cart-item-qty{border-radius: 4px;border: 1px dashed rgba(0,0,0,0.4);padding: 2px 4px;width: 50px;}
    .sc-cart-checkout{font-size: 14px;color:black; background: white;border: 1px solid rgba(0,0,0,0.2);border-radius: 4px;padding: 5px;box-shadow: 0px 3px 6px rgba(0,0,0,0.2);}
    .sc-cart-clear{font-size: 14px;    color: black; background: white;border: 1px solid rgba(0,0,0,0.2);border-radius: 4px;padding: 5px;box-shadow: 0px 3px 6px rgba(0,0,0,0.2);}
    .section1{flex-basis:10%;}
    .section2{flex-basis:40%;}
    .section3{flex-basis:40%; color:black;}
    .section4{flex-basis:100%;margin-top: 10px;border-bottom: 1px solid rgba(0,0,0,0.2);padding-bottom: 10px; color:black;}
    .section4 .sc-cart-item-summary{display: flex;justify-content: space-around;align-items: center;}
    .cart-item-qty{border: 1px dashed black;border-radius: 4px;width: 60px;padding: 3px 6px;font-size: 19px;}
    
    
    #menuToggle
    {   
        font-size: 25px;
        display: block!important;
        position: absolute;
        top: 15px;
        right: 150px;
        z-index: 1;
        display: none;
        -webkit-user-select: none;
        user-select: none;
    }

#menuToggle a
{
  text-decoration: none;
  color: #232323;
  
  transition: color 0.3s ease;
}

#menuToggle a:hover
{
  color: tomato;
}




#menuToggle .checkbox
{
  display: block;
  width: 40px;
  height: 32px;
  position: absolute;
  top: -7px;
  left: -5px;
  
  cursor: pointer;
  
  opacity: 0; /* hide this */
  z-index: 2; /* and place it over the hamburger */
  
  -webkit-touch-callout: none;
}

#menuToggle .fa-shopping-cart
{
  display: block;
  width: 33px;
  height: 4px;
  margin-bottom: 5px;
  position: relative;
  
  border-radius: 3px;
  
  z-index: 1;
  
  transform-origin: 4px 0px;
  
  transition: transform 0.5s cubic-bezier(0.77,0.2,0.05,1.0),
              background 0.5s cubic-bezier(0.77,0.2,0.05,1.0),
              opacity 0.55s ease;
}

#menuToggle:hover .fa-shopping-cart{
    transform: scale(1.1);
}



#menuToggle input:checked ~ .fa-shopping-cart
{
  opacity: 1;
}

#menu
{
    position: absolute;
    display: block;
    width: 260px;
    margin: 40px 0 0 -230px;
    padding: 5px;
    padding-top: 5px;
    border-radius: 4px;
    box-shadow: 0px 3px 6px rgb(0 0 0 / 20%);
    background: white;
    list-style-type: none;
    -webkit-font-smoothing: antialiased;
    transform-origin: 0% 0%;
    transform: translate(0, -170%);
    transition: transform 0.5s cubic-bezier(0.77,0.2,0.05,1.0);
}



#menu li
{
  padding: 10px 0;
  font-size: 22px;
  transition: .3s ease;
}

#menuToggle input:checked ~ ul
{
  transform: none;
}

/*  */

.nav{
    position:fixed;
    position: fixed;
    top: 35px;
    z-index: 9;
    left: 0px;
    width: 100%;
}

.buttons {
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center
}

.cart-button {
    position: relative;
    outline: 0;
    background-color: #4949f5;
    color: #fff;
    border: none;
    height: 48px;
    width: 100%;
    padding: 10px;
    line-height: 0px;
    overflow: hidden;
    cursor: pointer
}

.cart-button:focus {
    outline: none !important
}

.cart-button .fa-shopping-basket {
    position: absolute;
    z-index: 2;
    top: 50%;
    left: -20%;
    font-size: 1.8em;
    transform: translate(-50%, -50%)
}

.cart-button .fa-square {
    position: absolute;
    z-index: 1;
    top: -20%;
    left: 53%;
    font-size: 0.8em;
    transform: translate(-50%, -50%)
}

.cart-button span {
    position: absolute;
    left: 50%;
    top: 50%;
    color: #fff;
    transform: translate(-50%, -50%)
}

.cart-button span.added {
    opacity: 0
}

/*  */
.cart-button.clicked1 .fa-shopping-basket {
    animation: cart 2s ease-in forwards
}

.cart-button.clicked1 .fa-square {
    animation: box 2s ease-in forwards
}

.cart-button.clicked1 span.add-to-cart {
    animation: addcart 2s ease-in forwards
}

.cart-button.clicked1 span.added {
    animation: added 2s ease-in forwards
}

@keyframes cart {
    0% {
        left: -10%
    }

    40%,
    60% {
        left: 50%
    }

    100% {
        left: 110%
    }
}

@keyframes box {

    0%,
    40% {
        top: -20%
    }

    60% {
        top: 36%;
        left: 53%
    }

    100% {
        top: 40%;
        left: 112%
    }
}

@keyframes addcart {

    0%,
    30% {
        opacity: 1
    }

    30%,
    100% {
        opacity: 0
    }
}

@keyframes added {

    0%,
    80% {
        opacity: 0
    }

    100% {
        opacity: 1
    }
}

/*  */

.cart-button.clicked .fa-shopping-basket {
    animation: cart 2s ease-in forwards
}

.cart-button.clicked .fa-square {
    animation: box 2s ease-in forwards
}

.cart-button.clicked span.add-to-cart {
    animation: addcart 2s ease-in forwards
}

.cart-button.clicked span.added {
    animation: added 2s ease-in forwards;
    width:100%;
}

@keyframes cart {
    0% {
        left: -10%
    }

    40%,
    60% {
        left: 50%
    }

    100% {
        left: 110%
    }
}

@keyframes box {

    0%,
    40% {
        top: -20%
    }

    60% {
        top: 36%;
        left: 53%
    }

    100% {
        top: 40%;
        left: 112%
    }
}

@keyframes addcart {

    0%,
    30% {
        opacity: 1
    }

    30%,
    100% {
        opacity: 0
    }
}

@keyframes added {

    0%,
    80% {
        opacity: 0
    }

    100% {
        opacity: 1
    }
}

/*  */


#chatbox {
    height: 220px!important;
}
/* selector */

            
              
.wrapper .title{
    font-weight: 700;
    font-size: 24px;
    color: #fff;
}
              
.select_wrap{
    width: 125px;
    height: 30px;
    top: 0px;
    position: absolute;
    user-select: none;
    z-index: 9;
    left: 0px;
}
    
.dashboard-lang{
    width: 125px;
    height: 30px;
    top: 0%;
    position: absolute;
    user-select: none;
    z-index: 999;
    left: 90%;
}
    
.select_wrap .default_option{
    background: #fff;
    border-radius: 5px;
    position: relative;
    cursor: pointer;
    list-style:none;
}
    
    .select_wrap .default_option li{
    padding: 3px 10px;
}
    
.select_wrap .default_option:before{
    content: "";
    position: absolute;
    top: 8px;
    right: 18px;
    width: 6px;
    height: 6px;
    border: 2px solid;
    border-color: transparent transparent #555555 #555555;
    transform: rotate(-45deg);
}
    
.select_wrap .select_ul{
    position: absolute;
    top: 25px;
    left: 0;
    width: 100%;
    background: #fff;
    border-radius: 5px;
    display: none;
}   
.select_wrap .select_ul li{
    padding: 3px 20px;
    cursor: pointer;
}
.select_wrap .select_ul li:first-child:hover{
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
}
    
.select_wrap .select_ul li:last-child:hover{
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
}
    
.select_wrap .select_ul li:hover{
    background: #fff4dd;
}
    
.select_wrap .en{
    display: flex;
    align-items: center;
}

.select_wrap .pt{
    display: flex;
    align-items: center;
}
    
.select_wrap .en .icon{
    background: url(assets/us-flag.png) no-repeat 0 0;
    width: 30px;
    height: 11px;
    background-size: contain;
    background-position: center;
}
.select_wrap .en p{
    margin:0px;
    font-size:12px;
}
.select_wrap .pt .icon{
    background: url(assets/pt-flag.png) no-repeat 0 0;
    width: 30px;
    height: 11px;
    background-size: contain;
    background-position: center;
}    
.select_wrap .pt p{
    margin:0px;
    font-size:12px;
}


.select_wrap.active .select_ul{
    display: block;
    list-style:none;
}             
.select_wrap.active .default_option:before{
    top: 12px;
    transform: rotate(-225deg);
}

            /* selector end */


            .chatbox__support{display: none!important;
            }
            .chatbox--active{
                display:flex!important;
            }

            #name {
                margin-top: 5px!important;
                margin-bottom: 5px!important;
            }

</style>
<body  data-aos-easing="ease" data-aos-duration="400" data-aos-delay="0">
    
    
    <section class="head-upper">
        <div class="container">
            <div class="content">
                <div class="left-content">
                   <p>Free Shipping for all Order of <b>$99</b></p>  
                </div>
                <div class="mid-content">
                    <div class="social-icons">
                        <div class="icon">
                            <a href="#">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="icon">
                            <a href="#">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="icon">
                            <a href="#">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="icon">
                            <a href="#">
                                <i class="fa fa-google-plus" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="right-content">
                <!-- lang selector -->
                    <div class="select_wrap dashboard-lang">
                        <ul class="default_option">
                            <li>
                                <div class="option en">
                                <div class="icon"></div>
                                    <p>EN</p>
                                </div>
                            </li>
                        </ul>
                        <ul class="select_ul">
                            <li>
                                <div class="option en">
                                    <div class="icon"></div>
                                    <p>EN</p>
                                </div>
                            </li>
                            <li>
                                <div class="option pt">
                                    <div class="icon"></div>
                                    <p>PT</p>
                                </div>  
                            </li>
                        </ul>
                    </div>
                <!-- lang selector End --> 
                </div>
            </div>
        </div>
    </section>
    <header>
        <!-- lang selector -->
        <div class="select_wrap dashboard-lang">
            <ul class="default_option">
                <li>
                    <div class="option en">
                    <div class="icon"></div>
                        <p>EN</p>
                    </div>
                </li>
            </ul>
            <ul class="select_ul">
                <li>
                    <div class="option en">
                        <div class="icon"></div>
                        <p>EN</p>
                    </div>
                </li>
                <li>
                    <div class="option pt">
                        <div class="icon"></div>
                        <p>PT</p>
                    </div>  
                </li>
            </ul>
        </div>
        <!-- lang selector End -->
        <div class="container">
            <div class="nav" id="myNav">
                <div class="nav-logo">
                <?php 
                        if(!empty($logo)){
                            $logo_base = $logo;
                        }else{

                            $logo_base = '../asstes/logo.jpg';
                        }
                    ?>
                    <img src="<?= $logo_base?>" alt="LOGO">
                </div>
                    <div class="navigation">
                        <a href="../assets/themePages/productpage.php">Product</a>
                        <a href="#">About</a>
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
                    </div>
            </div>
        </div>
        <!-- <div class="hero-main">
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
            </div> --> 


    </header>

 <section class="slider">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="overlay" style="background-image:url(assets/backgoround.jpg);background-repeat:no-repeat;background-size:cover;">
                    <div class="carousel-content">
                        <div class="carosel-section">
                            <img src="assets/h1-new02.png" alt="pic1" style="width: 510px;height: 340px;">
                        </div>
                        <div class="carosel-section" style="color:white;">
                            <h1>Flat 25% Off <br> Medicine order</h1>
                            <div class="icons">

                            </div>
                            <a href="#">Add to cart <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
              </div>
            <div class="carousel-item">
                <div class="overlay" style="background-image:url(assets/background-2.jpg);background-repeat:no-repeat;background-size:cover;">
                    <div class="carousel-content">
                        <div class="carosel-section">
                        <img src="assets/h1-new04.png" alt="2">
                        </div>
                        <div class="carosel-section" style="color:white;">
                             <h1>Flat 25% Off <br> Medicine order</h1>
                            <div class="icons">
                                
                            </div>
                            <a href="#">Add to cart <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="overlay" style="background-image:url(assets/background-2.jpg);background-repeat:no-repeat;background-size:cover;">
                    <div class="carousel-content">
                        <div class="carosel-section">
                        <img src="assets/h1-news01.png" alt="2">
                        </div>
                        <div class="carosel-section" style="color:white;">
                        <h1>Flat 25% Off <br> Medicine order</h1>
                            <div class="icons">
                                
                            </div>
                            <a href="#">Add to cart <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

    </section>

    <section class="our-products">
        <div class="container">
            <div class="our-product-content">
                <div class="heading">Our Products</div>
                <div class="content">
                        <div class="product-card">
                            <img src="include/categorios-1.jpg" alt="product">
                            <p>Fitness</p>
                        </div>
                        <div class="product-card">
                            <img src="include/categorios-2.jpg" alt="product">
                            <p>Daily Products</p>
                        </div>
                        <div class="product-card">
                            <img src="include/categorios-3.jpg" alt="product">
                            <p>Devices</p>
                        </div>
                        <div class="product-card">
                            <img src="include/categorios-4.jpg" alt="product">
                            <p>Covid Essentials</p>
                        </div>
                        <div class="product-card">
                            <img src="include/categorios-6.jpg" alt="product">
                            <p>Skin Care</p>
                        </div>
                        <div class="product-card">
                            <img src="include/categorios-7.jpg" alt="product">
                            <p>Hair Care</p>
                        </div>
                </div>
            </div>
        </div>
    </section>

   <section class="product" data-aos="fade-up"
   data-aos-anchor-placement="top-bottom" data-aos-duration="2000">
       <h1 class="product-heading">Feature product</h1>
    <div class="container1">
        <div class="left-content">
            h1
        </div>
        <div class="right-content">
            <div class="slide-click">
                <div id="slide-left-container">
                    <div class="slide-left">
                    </div>
                </div>
                <div id="slide-right-container">
                    <div class="slide-right">
                    </div>
                </div>
            </div>
        <div id="cards-container">
          <div class="cards">
            <?php 
                foreach ($result as $key => $value) {
                    if($value['is_featured'] == '1'){
                        $image = getproductsimages($value['product_id'],$DB_CLASS);
                        if(!empty($image)){
   $image_path =   $image[0]['image_path'];
                        }
                     
              ?>
            <div class="card sc-product-item items">
                <img data-name="product_cart_img" src='<?php echo $PRODUCT_DIRECTORY.$image_path ; ?>' alt="Animals" style="width:100%">
                <div class="container-alpha">
                    
                        <h4 class="aplha-head" data-name="product_name"><?php echo $value['name'] ; ?></h4>
                        <div class="disc-feature-product-phy">
                            <span><?php echo $value['description'] ; ?></span>
                        </div>
                        <div class="form-group2">
                            <p>Quantity</p><input class="sc-cart-item-qty" name="product_quantity" min="1" value="1" type="number">
                        </div>
                        <div class="feature-product-phy-price">
                            <p>Price</p>    
                            <div class="f-p-p-value">
                                <span>$</span><?php echo $value['price'] ; ?>
                            </div>
                        </div>
                    <div class="product-card-button item">
                        <input name="product_price" value="<?= $value['price']?>" type="hidden" />
                        <input name="product_id" value="<?= $value['product_id'] ?>" type="hidden" />
                        <div class="buttons"> <button class="cart-button sc-add-to-cart product-btn"> <span class="add-to-cart ">Add to cart</span> <span class="added">click to add more</span> <i class="fa fa-shopping-basket"></i> <i class="fa fa-square"></i> </button> </div>
                    </div>
               </div>
            </div>   
                <?php
                        }
                    }
                ?>
            </div>
          </div>
        </div>
    
        </div>
    
      </div>
    </section>   
    <!-- <section class="brand">
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
    </section> -->
    <!-- <section class="ad" data-aos="flip-right">
        <div class="container">
            <div class="ad-content">
               <a href="#"><img src="assets/side-effects-banner.jpg" alt="ad"></a> 
            </div>
        </div>
    </section> -->
    <section class="homopatic" class="product" data-aos="fade-up"
    data-aos-anchor-placement="top-bottom" data-aos-duration="2000">
        <h1 class="product-heading">
        <div class="container">
            <div class="homo-heading">Herbal Products</div>
            <div class="homo-content">
            <?php 
            foreach ($result as $key => $value) {
                $image = getproductsimages($value['product_id'],$DB_CLASS);
                if(!empty($image)){
   $image_path =   $image[0]['image_path'];
                        }
              ?>
                <div class="homo-product-card sc-product-item items">
                    <div class="homo-card-upper"><img data-name="product_cart_img" src='<?= $PRODUCT_DIRECTORY.$image_path ; ?>' alt=""></div>
                        <div class="homo-card-content">
                            <div class="homo-content1">
                                <b data-name="product_name"><?php echo $value['name'] ; ?></b>
                                <span class="product-dis-homo"><?php echo $value['description'] ; ?></span>
                            
                                <div class="form-group2">
                                    Quantity<input class="sc-cart-item-qty" name="product_quantity" min="1" value="1" type="number">
                                </div>
                            <div class="form-group3"><span>$</span><?php echo $value['price'] ; ?></div>
                        </div>        
                    </div>
                    <div class="homo-card-btn item">
                        <input name="product_price" value="<?= $value['price']?>" type="hidden" />
                        <input name="product_id" value="<?= $value['product_id'] ?>" type="hidden" />
                        <div class="buttons">
                            <button class="cart-button sc-add-to-cart product-btn"> 
                                <span class="add-to-cart ">Add to cart</span> 
                                <span class="added">click to add more</span> 
                                <i class="fa fa-shopping-basket"></i> <i class="fa fa-square"></i> 
                            </button> 
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- add Section -->
    <section class="add">
        <div class="container">
            <div class="add-content">
                <div class="left-add">
                    <div class="add-heading">
                        Deal of the Day
                    </div>
                    <div class="add-short-dis">
                        Best Digital Thermometer In The Market.
                    </div>
                    <div class="add-Price">
                       <span>$</span> 326.00
                    </div>
                    <div class="add-btn">
                        <a href="#">
                        <div class="content">SHOP NOW</div>
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <div class="right-add">
                    <div class="img">
                        <img src="assets/add.png" alt="add">
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- add Section End-->



    <section class="homopatic" class="product" data-aos="fade-up"
    data-aos-anchor-placement="top-bottom" data-aos-duration="2000">
        <h1 class="product-heading">
        <div class="container">
            <div class="homo-heading">Best Selling Products</div>
            <div class="homo-content">
            <?php 
            foreach ($result as $key => $value) {
                $image = getproductsimages($value['product_id'],$DB_CLASS);
                if(!empty($image)){
   $image_path =   $image[0]['image_path'];
                        }
              ?>
                <div class="homo-product-card sc-product-item">
                    <div class="homo-card-upper"><img src='<?php echo $PRODUCT_DIRECTORY.$image_path ; ?>' alt=""></div>
                    <div class="homo-card-content">
                        <div class="homo-content1">
                            <b data-name="product_name"><?php echo $value['name'] ; ?></b>
                            
                            <span class="product-dis-homo"><?php echo $value['description'] ; ?></span>
                            
                            <div class="form-group2">
                                Quantity<input class="sc-cart-item-qty" name="product_quantity" min="1" value="1" type="number">
                            </div>
                            <div class="form-group3"><span>$</span><?php echo $value['price'] ; ?></div>
            </div>        
                    </div>
                    <div class="homo-card-btn">
                        <input name="product_price" value="<?= $value['price']?>" type="hidden" />
                        <input name="product_id" value="<?= $value['product_id'] ?>" type="hidden" />

                        <div class="buttons">
                            <button class="cart-button sc-add-to-cart product-btn"> 
                                <span class="add-to-cart ">Add to cart</span> 
                                <span class="added">click to add more</span> 
                                <i class="fa fa-shopping-basket"></i> <i class="fa fa-square"></i> 
                            </button> 
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- <section class="ad" data-aos="flip-right">
        <div class="container">
            <div class="ad-content">
               <a href="#"><img src="assets/side-effects-banner.jpg" alt="ad"></a> 
            </div>
        </div>
    </section> -->
    <section class="homopatic" class="product" data-aos="fade-up"
    data-aos-anchor-placement="top-bottom" data-aos-duration="2000">
        <h1 class="product-heading">
        <div class="container">
            <div class="homo-heading">Latest Products</div>
            <div class="homo-content">
            <?php 
            foreach ($result as $key => $value) {
                $image = getproductsimages($value['product_id'],$DB_CLASS);
               if(!empty($image)){
   $image_path =   $image[0]['image_path'];
                        }
              ?>
                <div class="homo-product-card sc-product-item">
                    <div class="homo-card-upper"><img src='<?php echo $PRODUCT_DIRECTORY.$image_path ; ?>' alt=""></div>
                    <div class="homo-card-content">
                        <div class="homo-content1">
                            <b data-name="product_name"><?php echo $value['name'] ; ?></b>
                            
                            <span class="product-dis-homo"><?php echo $value['description'] ; ?></span>
                            
                            <div class="form-group2">
                                Quantity<input class="sc-cart-item-qty" name="product_quantity" min="1" value="1" type="number">
                            </div>
                            <div class="form-group3"><span>$</span><?php echo $value['price'] ; ?></div>
            </div>        
                    </div>
                    <div class="homo-card-btn">
                        <input name="product_price" value="<?= $value['price']?>" type="hidden" />
                        <input name="product_id" value="<?= $value['product_id'] ?>" type="hidden" />
                        <div class="buttons">
                            <button class="cart-button sc-add-to-cart product-btn"> 
                                <span class="add-to-cart ">Add to cart</span> 
                                <span class="added">click to add more </span> 
                                <i class="fa fa-shopping-basket"></i> <i class="fa fa-square"></i> 
                            </button> 
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <section class="sub">
        <div class="container">
            <div class="sub-content">
                <div class="heading">Sign Up For Newsletter</div>
                <div class="dis">Join 60,000+ Subscribers and get a new discount <br> coupon on every Saturday.</div>
                <form class="input">
                    <input type="text" placeholder="Your email address">
                    <button><span>SUBCRIBE</span></button>
                </form>
            </div>
        </div>
    </section>

    <section class="detail">
        <div class="container">
            <div class="detail-content">
                <div class="detail-card">
                    <div class="content-left"><i class="fa fa-globe" aria-hidden="true"></i></div>
                    <div class="content-right">
                        <h2>Address</h2>
                        <p>123 House, ABC Street , XYZ State</p>
                    </div>
                </div>
                <div class="detail-card">
                    <div class="content-left"><i class="fa fa-volume-control-phone" aria-hidden="true"></i></div>
                    <div class="content-right">
                        <h2>WHATSAPP US</h2>
                        <p class="p1">(000) 123 456</p>
                        <p class="p2">Contact@Example.com</p>
                    </div>
                </div>
                <div class="detail-card">
                    <div class="content-left">Our Payment Method</div>
                    <div class="content-right">
                        <img src="include/payment.png" alt="payment">
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
    
   
    <?php  include 'include/footer.php'; ?>
 

<!-- js lib -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- js lib end -->

<script>  



        AOS.init();
  </script>
  
</body>
</html>