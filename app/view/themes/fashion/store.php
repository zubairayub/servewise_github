<?php
include 'include/header.php'; 
?>
<style>
    .img-responsive{width: 140px; flex-basis:20%}
    .panel-heading{width: 100%;margin: 20px 0px;font-size: 14px;font-weight: 600;}
    .sc-cart-item-list{font-size:14px;}
    .list-group-item{border-top: 1px solid rgba(0,0,0,0.2);padding: 20px 0px; margin-bottom:10px; display: flex;justify-content: center;flex-wrap:wrap;align-items: center;}
    .sc-cart-remove{flex-basis: 7%;height: 40px;margin-right: 10px;border: 1px solid rgba(0,0,0,0.2);border-radius: 4px;font-size: 30px;background: white;box-shadow: 0px 3px 6px rgba(0,0,0,0.2);background: #ffafaf;color: white;}
    .list-group-item-heading{padding:20px 0px;flex-basis: 20%;font-size: 20px;display: flex;justify-content: center;align-items: center;}
    .sc-cart-summary-subtotal{font-size:14px;display: flex;justify-content: flex-end;align-items: center;border-top: 1px solid rgba(0,0,0,0.2);}
    .sc-cart-checkout{font-size: 14px;background: white;border: 1px solid rgba(0,0,0,0.2);border-radius: 4px;padding: 5px;box-shadow: 0px 3px 6px rgba(0,0,0,0.2);}
    .sc-cart-clear{font-size: 14px;background: white;border: 1px solid rgba(0,0,0,0.2);border-radius: 4px;padding: 5px;box-shadow: 0px 3px 6px rgba(0,0,0,0.2);}
    .section1{flex-basis:10%;}
    .section2{flex-basis:80%;}
    .section3{flex-basis:100%;}
    .section4{flex-basis:100%;}
    .cart-item-qty{border: 1px dashed black;border-radius: 4px;width: 60px;padding: 3px 6px;font-size: 19px;}
    
    
    #menuToggle
    {   
        font-size: 25px;
        display: block!important;
        position: absolute;
        top: 6px;
        right: 8px;
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
  width: 351px;
  margin: -100px 0 0 -310px;
  padding: 50px;
  padding-top: 125px;
  
  background: white;
  list-style-type: none;
  -webkit-font-smoothing: antialiased;
  transform-origin: 0% 0%;
  transform: translate(0, -100%);
  
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


/* add to cart */

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
    background: rgb(131,58,180);
    background: linear-gradient(74deg, rgba(131,58,180,1) 0%, rgba(253,29,29,1) 50%, rgba(252,176,69,1) 100%);
    color: #fff;
    border: none;
    height: 48px;
    width: 100%;
    padding: 10px;
    border-radius: 4px;
    line-height: 0px;
    overflow: hidden;
    cursor: pointer
}

.cart-button:focus {
    outline: none !important
}

.cart-button .fa-cart-arrow-down {
    position: absolute;
    z-index: 2;
    top: 50%;
    left: -20%;
    font-size: 1.8em;
    transform: translate(-50%, -50%)
}

.cart-button .fa-gift {
    position: absolute;
    z-index: 1;
    top: -20%;
    left: 53%;
    font-size: 1.2em;
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

.cart-button.clicked .fa-cart-arrow-down {
    animation: cart 2s ease-in forwards
}

.cart-button.clicked .fa-gift {
    animation: box 2s ease-in forwards
}

.cart-button.clicked span.add-to-cart {
    animation: addcart 2s ease-in forwards
}

.cart-button.clicked span.added {
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



</style>
<body>

    <header></header>
    <section class="store-nav">
        <nav>
            <div class="container">
                <div class="nav">
                    <div class="logo">
                    <a herf="#" class="header-logo-section">
                    <img src="https://picsum.photos/200/300?random=1" alt="">
                </a>
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
        </nav>
    </section>
    <section class="slider">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="overlay">
                    <img src="asset/1.jpg" class="d-block w-100" alt="1">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                </div>
              </div>
              <div class="carousel-item">
                <img src="asset/2.jpg" class="d-block w-100" alt="2">
                <div class="carousel-caption d-none d-md-block">
                </div>
              </div>
              <div class="carousel-item">
                <img src="asset/3.jpg" class="d-block w-100" alt="3">
                <div class="carousel-caption d-none d-md-block">
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
    <section class="section-product-slider" data-aos="fade-up">
            <?php 
            foreach ($result as $key => $value) {
                if($value['is_featured'] == '1'){
                    $image = getproductsimages($value['product_id'],$DB_CLASS);
                    if(!empty($image)){
                   $image_path =   $image[0]['image_path'];
               }
              ?>

        <div class="card sc-product-item">
            <div class="product-img">
                <img src='<?php echo $PRODUCT_DIRECTORY.$image_path ; ?>' alt="product">
            </div>
            <div class="product-content">
                <h1 data-name="product_name"><?= $value['name']; ?></h1>
                <h3><?= $value['description']; ?></h3>
                <p><span class="dollor">$</span> <?= $value['price']; ?></p>

                <div class="product-card-button product-buy">
                    <input name="product_price" value="<?= $value['price']?>" type="hidden" />
                    <input name="product_id" value="<?= $value['product_id'] ?>" type="hidden" />
                    <div class="buttons"> 
                        <button class="cart-button sc-add-to-cart product-btn"> 
                            <span class="add-to-cart ">Add to cart</span> 
                            <span class="added">Item added</span> 
                            <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                            <i class="fa fa-gift" aria-hidden="true"></i>
                        </button> 
                    </div>
                </div>
            </div>
        </div>
        <?php }
                }
        ?>
        <!--<div class="card">
            <div class="product-img">
            <img src="asset/p2.jpg" alt="product">
            </div>
            <div class="product-content">
                <h1>Product Name</h1>
                <h3>Description</h3>
                <p><span class="dollor">$</span> 99.00</p>
                <div class="product-buy">
                <a href="#">add to cart</a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="product-img">
            <img src="asset/p3.jpg" alt="product">
            </div>
            <div class="product-content">
                <h1>Product Name</h1>
                <h3>Description</h3>
                <p><span class="dollor">$</span> 99.00</p>
                <div class="product-buy">
                <a href="#">add to cart</a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="product-img">
            <img src="asset/p1.jpg" alt="product">
            </div>
            <div class="product-content">
                <h1>Product Name</h1>
                <h3>Description</h3>
                <p><span class="dollor">$</span> 99.00</p>
                <div class="product-buy">
                <a href="#">add to cart</a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="product-img">
            <img src="asset/p2.jpg" alt="product">  
            </div>
            <div class="product-content">
                <h1>Product Name</h1>
                <h3>Description</h3>
                <p><span class="dollor">$</span> 99.00</p>
                <div class="product-buy">
                <a href="#">add to cart</a>
                </div>
            </div>
        </div> -->
        
        <div class="heading">Feature Products</div>
    </section>
    <section class="features-product">
        <div class="heading">
            <h1 class="feature-heading">HEADING</h1>
        </div>
        <div class="des">
            <h3 class="des-heading">Your Description</h3>
        </div>
        <div class="product-slider"></div>
    </section>
    <div class="hero-product"  data-aos="flip-left">
    
        <div class="container">
            <div class="hero-card">
                <div class="left-side">
                    <img src='<?= $PRODUCT_DIRECTORY.$image_path; ?>' alt="hero">
                </div>
                <div class="right-side">
                    <div class="right-heading"><?= $value['name']; ?>
                        <span class="hot-span">Hot Product</span></div>
                    <div class="right-des"><?= $value['description']; ?></div>
                    <div class="right-price"><?= $value['price']; ?></div>
                    <div class="product-card-button right-btn">
                        <input name="product_price" value="<?= $value['price']?>" type="hidden" />
                        <input name="product_id" value="<?= $value['product_id'] ?>" type="hidden" />
                        <div class="buttons"> 
                            <button class="cart-button sc-add-to-cart product-btn"> 
                                <span class="add-to-cart ">Add to cart</span> 
                                <span class="added">Item added</span> 
                                <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                                <i class="fa fa-gift" aria-hidden="true"></i>
                            </button> 
                        </div>
                    </div>
                </div>
            </div>
           

        </div>
    </div>
    <section class="features-product">
        <div class="heading">
            <h1 class="feature-heading">BEST PRODUCT</h1>
        </div>
        <div class="product-slider"></div>
    </section>
    <section class="section-product-slider" data-aos="fade-up"
    data-aos-duration="500">
        <?php 
            foreach ($result as $key => $value) {
                $image = getproductsimages($value['product_id'],$DB_CLASS);
                $image_path =   $image[0]['image_path'];
        ?>
        <div class="card sc-product-item">
            <div class="product-img">
                <img src='<?php echo $PRODUCT_DIRECTORY.$image_path ; ?>' alt="product">
                <div class="sub-heading">Brand LOGO</div>
            </div>
            <div class="product-content">
                <h1><?= $value['name'];?></h1>
                <h3><?= $value['description']; ?></h3>
                <p><span class="dollor">$</span> <?= $value['price']; ?></p>
                <div class="product-buy">
                    <input name="product_price" value="<?= $value['price']?>" type="hidden" />
                    <input name="product_id" value="<?= $value['product_id'] ?>" type="hidden" />
                    <div class="buttons"> 
                        <button class="cart-button sc-add-to-cart product-btn"> 
                            <span class="add-to-cart ">Add to cart</span> 
                            <span class="added">Item added</span> 
                            <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                            <i class="fa fa-gift" aria-hidden="true"></i>
                        </button> 
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <!-- <div class="card">
            <div class="product-img">
            <img src="asset/p2.jpg" alt="product">
            <div class="sub-heading">Brand LOGO</div>
            </div>
            <div class="product-content">
                <h1>Product Name</h1>
                <h3>Description</h3>
                <p><span class="dollor">$</span> 99.00</p>
                <div class="product-buy">
                <a href="#">add to cart</a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="product-img">
            <img src="asset/p3.jpg" alt="product">
            <div class="sub-heading">Brand LOGO</div>
            </div>
            <div class="product-content">
                <h1>Product Name</h1>
                <h3>Description</h3>
                <p><span class="dollor">$</span> 99.00</p>
                <div class="product-buy">
                <a href="#">add to cart</a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="product-img">
            <img src="asset/p1.jpg" alt="product">
            <div class="sub-heading">Brand LOGO</div>
            </div>
            <div class="product-content">
                <h1>Product Name</h1>
                <h3>Description</h3>
                <p><span class="dollor">$</span> 99.00</p>
                <div class="product-buy">
                <a href="#">add to cart</a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="product-img">
            <img src="asset/p2.jpg" alt="product">  
            <div class="sub-heading">Brand LOGO</div>
            </div>
            <div class="product-content">
                <h1>Product Name</h1>
                <h3>Description</h3>
                <p><span class="dollor">$</span> 99.00</p>
                <div class="product-buy">
                <a href="#">add to cart</a>
                </div>
            </div>
        </div> -->
    </section>
    <section class="ad-product">
        <div class="container">
            <div class="ad-content">
                <div class="left-side-content" data-aos="fade-right">
                    <a class="ads-1" href="#">
                        <img src="asset/5c8474f363d797009216d1ad9362ea36.jpg" alt="ads">
                    </a>
                </div>
                <div class="right-side-content" data-aos="fade-up">
                    <a class="ads-2" href="#">
                        <img src="asset/New-Sport-Collection-Banner-Template.jpg" alt="">
                    </a>
                </div>
            </div>    
            <div class="ad-content">
                <div class="left-side-content2" data-aos="fade-up-right">
                    <a class="ads-2" href="#">
                        <img src="asset/Winter-Collection-Promotion-Banner-Template.jpg" alt="ads">
                    </a>
                </div>
                <div class="right-side-content2" data-aos="fade-up-left">
                    <a class="ads-1" href="#">
                        <img src="asset/sale-banner-template_24972-824.jpg" alt="ads">
                    </a>
                </div>
                </div>
            </div>
        </div>
    </section>
    <section class="brand-logo">
        <div class="container">
            <div class="brand-content">
                <a href="#"  data-aos="flip-left">
                    <img src="asset/louis-vuitton-1.png" alt="logo">
                </a>
                <a href="#"  data-aos="flip-left">
                    <img src="asset/louis-vuitton-1.png" alt="logo">
                </a>
                <a href="#"  data-aos="flip-left">
                    <img src="asset/louis-vuitton-1.png" alt="logo">
                </a>
                <a href="#"  data-aos="flip-left">
                    <img src="asset/louis-vuitton-1.png" alt="logo">
                </a>
                <a href="#"  data-aos="flip-left">
                    <img src="asset/louis-vuitton-1.png" alt="logo">
                </a>
                <a href="#"  data-aos="flip-left">
                    <img src="asset/louis-vuitton-1.png" alt="logo">
                </a>
            </div>
        </div>
    </section>
    <section class="about">
        <div class="container">
            <div class="about-content">
                <div class="heading-about" data-aos="fade-right">
                    <img src="asset/2.jpg" alt="about">
                </div>
                <div class="para-about" data-aos="fade-left">
                <div class="about-content1">
                    <h2>About</h2>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magni dolor aperiam sequi minima quia vero adipisci est, magnam recusandae aliquid odio possimus. Iure nisi temporibus quae iste id quisquam exercitationem?
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magni dolor aperiam sequi minima quia vero adipisci est, magnam recusandae aliquid odio possimus. Iure nisi temporibus quae iste id quisquam exercitationem?Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magni dolor aperiam sequi minima quia vero adipisci est, magnam recusandae aliquid odio possimus. Iure nisi temporibus quae iste id quisquam exercitationem?
                    </p>
                </div>
            </div>
            </div>
        </div>
    </section>
    <section class="shipping">
        <div class="container">
            <div class="shipping-content">

            </div>
        </div>
    </section>
    <?php
include '../../../../chat/index.php'; 

?>
    

    </section>
    <section class="payment"></section>
    <?php  include 'include/footer.php'; ?>