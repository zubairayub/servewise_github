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
        top: 58px;
        right: 38px;
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
  border-radius:4px;
  box-shadow:0px 3px 6px rgba(0,0,0,0.2);
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

/*  */

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
    border-radius: 4px;
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







</style>
<body  data-aos-easing="ease" data-aos-duration="400" data-aos-delay="0">
    
    <header>
        <div class="container">
            <div class="nav">
                <div class="nav-logo">
                    <img src="assets/logo.jpg" alt="LOGO">
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
            <?php 
                foreach ($result as $key => $value) {
                    if($value['is_featured'] == '1'){
                        $image = getproductsimages($value['product_id'],$DB_CLASS);
                        $image_path =   $image[0]['image_path'];
              ?>
            <div class="card sc-product-item items">
                <img data-name="product_cart_img" src='<?php echo $PRODUCT_DIRECTORY.$image_path ; ?>' alt="Animals" style="width:100%">
                <div class="container-alpha">
                    <h4>
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
                    </h4>
                    <div class="product-card-button item">
                        <input name="product_price" value="<?= $value['price']?>" type="hidden" />
                        <input name="product_id" value="<?= $value['product_id'] ?>" type="hidden" />
                        <div class="buttons"> <button class="cart-button sc-add-to-cart product-btn"> <span class="add-to-cart ">Add to cart</span> <span class="added">Item added</span> <i class="fa fa-shopping-basket"></i> <i class="fa fa-square"></i> </button> </div>
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
            <?php 
            foreach ($result as $key => $value) {
                $image = getproductsimages($value['product_id'],$DB_CLASS);
                $image_path =   $image[0]['image_path'];
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
                                <span class="added">Item added</span> 
                                <i class="fa fa-shopping-basket"></i> <i class="fa fa-square"></i> 
                            </button> 
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <section class="homopatic" class="product" data-aos="fade-up"
    data-aos-anchor-placement="top-bottom" data-aos-duration="2000">
        <h1 class="product-heading">
        <div class="container">
            <div class="homo-heading">Sexual Wellness</div>
            <div class="homo-content">
            <?php 
            foreach ($result as $key => $value) {
                $image = getproductsimages($value['product_id'],$DB_CLASS);
                $image_path =   $image[0]['image_path'];
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
                                <span class="added">Item added</span> 
                                <i class="fa fa-shopping-basket"></i> <i class="fa fa-square"></i> 
                            </button> 
                        </div>
                    </div>
                </div>
                <?php } ?>
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
            <?php 
            foreach ($result as $key => $value) {
                $image = getproductsimages($value['product_id'],$DB_CLASS);
                $image_path =   $image[0]['image_path'];
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
                                <span class="added" onclick="cartClick()">Item added</span> 
                                <i class="fa fa-shopping-basket"></i> <i class="fa fa-square"></i> 
                            </button> 
                        </div>
                    </div>
                </div>
                <?php } ?>
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
    <?php
include '../../../../chat/index.php'; 
?>

    <?php  include 'include/footer.php'; ?>

<!-- js lib -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- js lib end -->

<script>  


document.addEventListener("DOMContentLoaded", function(event) {


const cartButtons = document.querySelectorAll('.cart-button');

cartButtons.forEach(button => {

button.addEventListener('click',cartClick);

});

function cartClick(){
let button =this;
button.classList.add('clicked');
}



});

        AOS.init();
  </script>
</body>
</html>