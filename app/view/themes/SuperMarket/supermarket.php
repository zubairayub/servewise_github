<?php
include 'include/header.php'; 
?>
<style>
    .img-responsive{width: 50px;height:50px;}
    .sc-theme-default{width:100%;}
    .panel-heading{width: 100%;margin: 5px 0px;font-size: 14px;font-weight: 600;}
    .sc-cart-item-list{font-size:14px;}
    .list-group-item{padding: 10px 0px; margin-bottom:3px; display: flex;justify-content: center;flex-wrap:wrap;align-items: center;border:none;border-top:1px solid rgba(0,0,0,0.2); }
    .sc-cart-remove{height: 50px;width:15px;border: 1px solid rgba(0,0,0,0.2);border-radius: 4px;font-size: 16px;background: white;box-shadow: 0px 3px 6px rgba(0,0,0,0.2);background: #ffafaf;color: white;}
    .list-group-item-heading{padding:10px 0px;flex-basis: 20%;font-size: 12px; margin:0px;display: flex;justify-content: center;align-items: center;}
    .sc-cart-summary-subtotal{font-size:14px;display: flex;justify-content: flex-end;align-items: center;border-top: 1px solid rgba(0,0,0,0.2);}
    .sc-cart-item-summary .sc-cart-item-qty{border-radius: 4px;border: 1px dashed rgba(0,0,0,0.4);padding: 0px 3px;width: 45px;}
    .sc-cart-checkout{font-size: 14px;background: #17a2b8;border: 1px solid #17a2b8;border-radius: 4px;padding: 5px;box-shadow: 0px 3px 6px rgba(0,0,0,0.2);}
    .sc-cart-clear{font-size: 14px;background: #dc3545;border: 1px solid #dc3545;border-radius: 4px;padding: 5px;box-shadow: 0px 3px 6px rgba(0,0,0,0.2);}
    .section1{flex-basis:5%;margin-right:1%;}
    .section2{flex-basis:19%;}
    .section3{flex-basis:40%;}
    .section4{flex-basis:30%;overflow:hidden;}
    .section4 .sc-cart-item-summary{display: flex;justify-content: space-around;align-items: center;}
    .cart-item-qty{border: 1px dashed black;border-radius: 4px;width: 60px;padding: 3px 6px;font-size: 19px;}
    
    
    #menuToggle
    {   
        font-size: 35px;
        display: block!important;
        position: absolute;
        top: 23px;
        right: 98px;
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
#menuToggle .checkbox::before{
    font-family: FontAwesome;
    content: "\f095";
}

#menuToggle .fa-shopping-cart
{
  display: block;
  width: 33px;
  height: 4px;
  margin-bottom: 5px;
  position: relative;
  font-size:24px;
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
  width: 380px;
  margin: -1px 0 0 -360px;
  padding: 5px;
  padding-top: 10px;
  
  background: white;
  list-style-type: none;
  -webkit-font-smoothing: antialiased;
  transform-origin: 0% 0%;
  transform: translate(0, -150%);
  
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
    top: 2%;
    position: absolute;
    user-select: none;
    z-index: 9999;
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
    top: 3px;
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

#loginform form #name{
    margin-top: 0px;
}

.list-group-item {

}




</style>
<body> 
	
<!-- Google Tag Manager (noscript) -->
<!-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MXSHQXW"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>-->
<!-- End Google Tag Manager (noscript) -->

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MXSHQXW"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

</head>
<div class="upper-head">
    <div class="container">
        <div class="upper-head-content">
            <div class="left-content">
                <div class="phone-content">
                    <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                    <div class="number"><?= $footer_contact ;?></div>
                </div>
            </div>
            <div class="right-content">
                <div class="social-content">
                    <div class="icons-content">
                    <div class="icons"><a href="<?= $footer_tw_link ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></div>
                    <div class="icons"><a href="<?= $footer_fb_link ?>"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></div>
                    <div class="icons"><a href="<?= $footer_inst_link ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></div>
                    <div class="icons"><a href="<?= $footer_in_link ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
        <section class="nav" id="myNav">
            <div class="container">
                <nav>
                    <div class="logo item">
                        <img src="<?php echo $logo ;?>" alt="LOGO" width="100px">
                    </div>
                    <div class="navigation">
                        <a href="../assets/themePages/productpage.php">Product</a>
                        <a href="#about">About</a>
                        <div id="menuToggle">
                            <!-- <span class="count">2</span>    -->
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
                </nav>
            </div>
             <aside class="col-md-4">
                
             
                
            </aside>
        </section>

        <!-- <section class="hero-main">
            <div class="container">
                <div class="hero-content">
                    <div class="left-side"  data-aos="fade-right"
                    
                    data-aos-duration="1000">
                        <h1>Best Quality Food On your Door Step</h1>
                        <p>get best Quality food and Supply here with Amazing Discount Offer</p>
                        <a href="../assets/themePages/productpage.php">Go To Product &#8594;</a>
                    </div>
                    <div class="right-side" data-aos="fade-left"
                    data-aos-duration="1000">
                        <img width="500px" src="assets/hero-main.png" alt="Hero-banner">
                    </div>
                </div>
            </div>
        </section> -->
    </header>
    <!-- slider -->
    <div class="your-class">
        <div class="slider-1">
            <div class="slider-content">
                <div class="content">
                    <div class="icon" data-aos="zoom-in">
                        <img src="//cdn.shopify.com/s/files/1/0108/7370/0415/files/slider-icon_100X.png?v=1581426760" alt="Icons">
                    </div>
                    <div class="heading-1" data-aos="fade-left">100% Healthy & Affordable</div>
                    <div class="heading-2" data-aos="fade-up-left">Organic Vegetables</div>
                    <div class="btn" data-aos="flip-right"> 
                        <a href="#">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-2">
            <div class="slider-content">
                <div class="content">
                    <div class="heading-1" data-aos="fade-left">Vegetables 100% Organic</div>
                    <div class="heading-2" data-aos="fade-right">Natural Health Care Ingredients</div>
                    <div class="btn"  data-aos="flip-right">
                        <a href="#">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-3">
            <div class="slider-content">
                <div class="content">
                    <div class="heading-1" data-aos="fade-left">Natural Health Care Ingredients</div>
                    <div class="heading-2" data-aos="fade-right">Grocery Shopping</div>
                    <div class="btn" data-aos="flip-right">
                        <a href="#">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- slider End-->


    <!-- Add Section -->
    <section class="add">
        <div class="container">
            <div class="add-content">
                <div class="left-content" data-aos="fade-up">
                    <div class="content-left"></div>
                    <div class="content-right">
                        <div class="head">Veggies</div>
                        <div class="head">
                            <p><b>100%</b> Organic <br> Products</p>
                        </div>
                        <div class="btn">
                            <a href="#">Buy Now</a>
                        </div>
                    </div>
                </div>
                <div class="right-content" data-aos="fade-up">
                    <div class="content-left"></div>
                    <div class="content-right">
                        <div class="head">Fruits</div>
                        <div class="head">
                            <p><b>100%</b> Organic <br> Products</p>
                        </div>
                        <div class="btn">
                            <a href="#">Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Add Section End -->

    <!-- Our Product -->
    <section class="our-product">
        <div class="container">
            <div class="heading">
                <div class="head">
                    Our Product
                </div>
                <div class="dis">
                    the best product you can find
                </div>
            </div>
            <div class="content">
                <div class="img-container" data-aos="flip-up">
                    <div class="icons">
                        <img src="//cdn.shopify.com/s/files/1/0108/7370/0415/files/icon-6_medium.png?v=1580284143" alt="Milk">
                        <div class="name">Milk</div>
                    </div>
                </div>
                <div class="img-container" data-aos="flip-down">
                    <div class="icons">
                        <img src="//cdn.shopify.com/s/files/1/0108/7370/0415/files/icon-5_medium.png?v=1580284176" alt="fruit">
                        <div class="name">Fruits</div>
                    </div>
                </div>
                <div class="img-container" data-aos="flip-left">
                    <div class="icons">
                        <img src="//cdn.shopify.com/s/files/1/0108/7370/0415/files/icon-4_medium.png?v=1580284192" alt="Flow">
                        <div class="name">
                            Flour
                        </div>
                    </div>
                </div>
                <div class="img-container" data-aos="flip-right">
                    <div class="icons">
                        <img src="//cdn.shopify.com/s/files/1/0108/7370/0415/files/icon-3_medium.png?v=1580284218" alt="Meat">
                        <div class="name">
                            Fresh Meat
                        </div>
                    </div>
                </div>
                <div class="img-container" data-aos="flip-up">
                    <div class="icons">
                        <img src="//cdn.shopify.com/s/files/1/0108/7370/0415/files/icon-2_medium.png?v=1580284239" alt="Vegis">
                        <div class="name">
                            Fresh Vegies
                        </div>
                    </div>
                </div>
                <div class="img-container" data-aos="flip-down">
                    <div class="icons">
                        <img src="//cdn.shopify.com/s/files/1/0108/7370/0415/files/icon-1_medium.png?v=1580284251" alt="Eggs">
                        <div class="name">
                            Eggs
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- product-cat -->
    <section class="product-cat">
        <div class="container">
            <div class="product-heading-div">
                <div class="heading">Feature Products</div>
                <div class="ouderline"></div>
            </div>
            <div class="product-cat-card" data-aos="fade-up" >


             
  <?php
                foreach ($result as $key => $value) {
                    if($value['is_featured'] == '1'){
                        $image = getproductsimages($value['product_id'],$DB_CLASS);
                     if(!empty($image)){
   $image_path =   $PRODUCT_DIRECTORY. $image[0]['image_path'];
   $found = $value['name'];
if (!file_exists($image_path)) {
 
$images = glob($default_image_store . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

$randomImage = $images[array_rand($images)]; // See comments

 $image_path = $randomImage;


    $found = $value['name'];

 }


                        }else{
                           $images = glob($default_image_store . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

$randomImage = $images[array_rand($images)]; // See comments

 $image_path = $randomImage;
                               $found = $value['name'];
                        }
            ?>
         
                <div class="sc-product-item product-card items">
                    <div class="product-card-upper img1">
                        <img data-name="product_cart_img" class="product_cart_img" src='<?php echo $image_path ; ?>' alt="<?=    $found ?>" style="width:100%;height:100%;">
                    </div>
                    <div class="product-card-content">
                       <div class="product-content-heading"><h4 data-name="product_name"><?php echo $value['name'] ; ?></h4></div>
                       <div class="product-content-dis"><?php echo $value['description'] ; ?></div>
                        <div class="form-group2">
                            <input class="sc-cart-item-qty" name="product_quantity" min="1" value="1" type="number">
                        </div>
                       <div class="product-content-price"><span>$</span><?php echo $value['price'] ; ?></div>

                       
                    </div>

                    <div class="product-card-button item">
                    <input name="product_purchase_price" value="<?= '50'?>"type="hidden" />
                        <input name="product_price" value="<?= $value['price']?>"type="hidden" />
                        <input name="product_id" value="<?= $value['product_id'] ?>" type="hidden" />
                        <a href="#" class="sc-add-to-cart-<?= $value['product_id'];?>" id="<?= $value['name']; ?>" onclick="dataLayer.push({
                        event: 'eec.impressionClick',
                        ecommerce: {
                            click: {
                            actionField: {
                                list: 'Featured products'
                            },
                            products: [{
                                'name': <?= $value['name']; ?>,       // Name or ID is required.
                                'id': <?= $value['product_id']; ?>,
                                'category': 'Devesa/SuperMarket',
                                'position': <?= count($value['name']); ?>
                            }]
                            }
                        }
                        });">Add to Cart<i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                        <script>
                        window.dataLayer = window.dataLayer || [];
                        window.dataLayer.push({
                        'event': 'eec.impressionView',  
                        'ecommerce': {
                            'currencyCode': 'USD',                       // Local currency is optional.
                            'impressions': [
                            {
                            'name': <?= $value['name']; ?>,       // Name or ID is required.
                            'id': <?= $value['product_id']; ?>,
                            'price': <?= $value['price']; ?>,
                            'category': 'Devesa/SuperMarket',
                            'list': 'Featured Products',
                            'position': <?= count($value['name']); ?>
                            },]
                        }
                        });
                        
                        window.dataLayer.push({
                        event: 'eec.impressionClick',
                        ecommerce: {
                            click: {
                            actionField: {
                                list: 'Featured products'
                            },
                            products: [{
                                'name': <?= $value['name']; ?>,       // Name or ID is required.
                                'id': <?= $value['product_id']; ?>,
                                'category': 'Devesa/SuperMarket',
                                'position': <?= count($value['name']); ?>
                            }]
                            }
                        }
                        });
                        </script>
                        <script>
                            dataLayer.push({
                                'event': 'addToCart',
                                'ecommerce': {
                                    'currencyCode': 'USD',
                                    'add': {
                                        'products': [{
                                            'name': '<?= $value['name']; ?>',
                                            'id': '<?= $value['product_id']; ?>',
                                            'price': '<?= $value['price']; ?>',
                                            'brand': 'Devesa',
                                            'category': 'Devesa/SuperMarket',
                                            'quantity': 1
                                        }]
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>


<?php
}
               }
            ?>
            
               
               
            
        </div>
    </section>


    <section class="add-2">
        <div class="container">
            <div class="add-2-content">
                <div class="left-content">
                    <div class="heading">
                        Special Discount <br> for all Grocery products
                    </div>
                    <div class="dis">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non nesciunt fuga ipsa excepturi vero dignissimos quis sed maiores sint officiis!
                    </div>
                    <div class="btn">
                        <a href="#">
                            Buy Now
                        </a>
                    </div>
                </div>
                <div class="right-content"></div>
            </div>
        </div>
    </section>


    <section class="product-cat">
        <div class="container">
            <div class="product-heading-div">
                <div class="heading">Latest Products</div>
                <div class="ouderline"></div>
            </div>
            <div class="product-cat-card" data-aos="fade-up">


                 <?php 
            foreach ($result as $key => $value) {

                 $image = getproductsimages($value['product_id'],$DB_CLASS);
                if(!empty($image)){
   $image_path =   $PRODUCT_DIRECTORY. $image[0]['image_path'];
   $found = $value['name'];
if (!file_exists($image_path)) {
 
$images = glob($default_image_store . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

$randomImage = $images[array_rand($images)]; // See comments

 $image_path = $randomImage;


    $found = $value['name'];

 }


                        }else{
                           $images = glob($default_image_store . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

$randomImage = $images[array_rand($images)]; // See comments

 $image_path = $randomImage;
                               $found = $value['name'];
                        }
                
                
              ?>
                <div class="sc-product-item product-card items">
                    <div class="product-card-upper">
                        <img data-name="product_cart_img" class="product_cart_img" src='<?php echo $image_path ; ?>' alt="<?= $found?>" style="width:100%;height:100%;">
                    </div>
                    <div class="product-card-content">
                       <div class="product-content-heading"><h4 data-name="product_name"><?php echo $value['name'] ; ?></h4></div>
                       <div class="product-content-dis"><?php echo $value['description'] ; ?></div>
                        <div class="form-group2">
                            <input class="sc-cart-item-qty" name="product_quantity" min="1" value="1" type="number">
                        </div>
                       <div class="product-content-price"><span>$</span><?php echo $value['price'] ; ?></div>
                       
                    </div>

                    <div class="product-card-button item">
                        <input name="product_purchase_price" value="<?= '50'?>"type="hidden" />
                        <input id="product_price" name="product_price" value="<?= $value['price']?>" type="hidden" />
                        <input id="product_id" name="product_id" value="<?= $value['product_id'] ?>" type="hidden" />
                        <a href="#" class="sc-add-to-cart add-to-cart" id="<?= $value['name'];?>">Add to Cart<i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                        <script>
                        window.dataLayer = window.dataLayer || [];
                        window.dataLayer.push({
                        'event': 'eec.impressionView',  
                        'ecommerce': {
                            'currencyCode': 'USD',                       // Local currency is optional.
                            'impressions': [
                            {
                            'name': <?= $value['name']; ?>,       // Name or ID is required.
                            'id': <?= $value['product_id']; ?>,
                            'price': <?= $value['price']; ?>,
                            'category': 'Devesa/SuperMarket',
                            'list': 'Latest Products',
                            'position': <?= count($value['name']); ?>
                            },]
                        }
                        });
                        </script>
                        <script>
                            var qty = $('.sc-cart-item-qty').val();
                            dataLayer.push({

                            'event': 'addToCart',

                            'ecommerce': {

                            'currencyCode': 'USD',

                            'add': {'products': [{'name': '<?= $value['name']; ?>',

                            'id': '<?= $value['product_id']; ?>',

                            'price': '<?= $value['price']; ?>',

                            'quantity': qty

                            }]

                            }

                            }

                            });
                        </script>
                    </div>
                </div>
               <?php
}
               ?>
            </div>
        </div>
    </section>

    <!-- Hot Product -->

    <section class="hot-product">
        <div class="container">
            <div class="hot-product-content">
                <div class="hot-left-side" data-aos="fade-up-right">
                    <img src="assets/hot-product.png" alt="Hot product" data-name="product_image">
                </div>
                <div class="hot-right-side sc-product-item" data-aos="fade-up-left">
                    <div class="hot-product-heading"><h4 data-name="product_name"><?php echo $value['name'] ; ?></h4><span>Hot Deal</span></div>
                    <div class="hot-product-dis"><?php echo $value['description'] ; ?></div>
                    <div class="product-card-button">
                        <input name="product_purchase_price" value="<?= '50'?>"type="hidden" />
                        <input name="product_price" value="<?= $value['price']?>" type="hidden" />
                        <input name="product_id" value="<?= $value['product_id'] ?>" type="hidden" />
                        <a href="#" class="sc-add-to-cart add-to-cart" id="<?= $value['name']; ?>" onclick="dataLayer.push({
                        event: 'eec.impressionClick',
                        ecommerce: {
                            click: {
                            actionField: {
                                list: 'Hot products'
                            },
                            products: [{
                                'name': <?= $value['name']; ?>,       // Name or ID is required.
                                'id': <?= $value['product_id']; ?>,
                                'category': 'Devesa/SuperMarket',
                                'position': <?= count($value['name']); ?>
                            }]
                            }
                        }
                        });">Add to Cart<i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sub">
        <div class="container">
            <div class="content">
                <div class="heading">
                    <div class="head">
                        Subscribe to our Newsletter
                    </div>
                    <form class="input-box">
                        <input type="text" placeholder="Your email address">
                        <input type="button" value="SEND">
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Ads -->

    <!-- <section class="ads">
        <div class="container">
            <div class="content-ad-1"  data-aos="flip-left">
                <a class="ad1" href="#">
                    <img src="assets/ad1.png" alt="ad1">
                </a>
                <a class="ad2" href="#" data-aos="flip-right"><img src="assets/ad2.jpg" alt="ad2">
                </a>
            </div>
            <div class="content-ad-2">
                <a class="ad2" href="#" data-aos="flip-up">
                    <img src="assets/ad2.jpg" alt="ad2">
                </a>
                <a class="ad1" href="#" data-aos="flip-down">
                    <img src="assets/ad1.png" alt="ad1">
                </a>
            </div>
        </div>
    </section> -->

    <!-- About us -->

    <?php include '../../../../chat/index.php'; ?>

    <section class="about" id="about">
        <div class="container">
            <div class="about-content" data-aos="zoom-in"   data-aos-duration="1000">
                <div class="about-head-main">
                    <div class="about-heading">About Us</div>
                    <div class="underline-div"></div>
                </div>
                <div class="about-dis"><?= $footer_about_disc ?></div>
            </div>
        </div>
    </section>

    <section class="details">
        <div class="container">
            <div class="content">
                <div class="details-content">
                    <div class="icons">
                        <i class="fa fa-truck" aria-hidden="true"></i>
                    </div>
                    <div class="dis">
                        <div class="head">Free Shipping</div>
                    </div>
                </div>
                
                <div class="details-content">
                    <div class="icons">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                    </div>
                    <div class="dis">
                        <div class="head">Helpline</div>
                        <div class="main"><?= $footer_contact ?></div>
                    </div>
                </div>
                
                <div class="details-content">
                    <div class="icons">
                        <i class="fa fa-headphones" aria-hidden="true"></i>
                    </div>
                    <div class="dis">
                        <div class="head">24x7</div>
                        <div class="main">Customer Support</div>
                    </div>
                </div>
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
