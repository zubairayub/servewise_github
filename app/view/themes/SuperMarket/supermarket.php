<?php
include 'include/header.php';
?>
<style>
    .img-responsive{width: 140px; flex-basis:20%}
    .panel-heading{width: 100%;margin: 20px 0px;font-size: 20px;font-weight: 600;}
    .list-group-item{margin-bottom:10px; display: flex;justify-content: center;align-items: center;}
    .sc-cart-remove{flex-basis: 7%;height: 40px;margin-right: 10px;border: 1px solid rgba(0,0,0,0.2);border-radius: 4px;font-size: 30px;background: white;box-shadow: 0px 3px 6px rgba(0,0,0,0.2);background: #ffafaf;color: white;}
    .list-group-item-heading{flex-basis: 20%;font-size: 10px;display: flex;justify-content: center;align-items: center;}
    .sc-cart-summary-subtotal{display: flex;justify-content: flex-end;align-items: center;border-top: 1px solid rgba(0,0,0,0.2);}
    .sc-cart-checkout{font-size: 18px;background: white;border: 1px solid rgba(0,0,0,0.2);border-radius: 4px;padding: 10px;box-shadow: 0px 3px 6px rgba(0,0,0,0.2);}
    .sc-cart-clear{font-size: 18px;background: white;border: 1px solid rgba(0,0,0,0.2);border-radius: 4px;padding: 10px;box-shadow: 0px 3px 6px rgba(0,0,0,0.2);}
    #menuToggle
    {   
        font-size: 25px;
        display: block!important;
        position: absolute;
        top: 35px;
        right: 48px;
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


#menuToggle input
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
    transform: rotate(360deg);
}



#menuToggle input:checked ~ .fa-shopping-cart
{
  opacity: 1;
}

#menu
{
  position: absolute;
  width: 1351px;
  margin: -100px 0 0 -1270px;
  padding: 50px;
  padding-top: 125px;
  
  background: white;
  list-style-type: none;
  -webkit-font-smoothing: antialiased;
  transform-origin: 0% 0%;
  transform: translate(-100%, 0);
  
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








</style>
<body> 
    <header>
        <section class="nav">
            <div class="container">
                <nav>
                    <div class="logo">
                        <img src="assets/5.jpg" alt="LOGO" width="100px">
                    </div>
                    <div class="navigation">
                        <a href="#">Product</a>
                        <a href="#">About</a>
                        <a href="#">Contact</a>
                        <div id="menuToggle">
                        <input type="checkbox" />
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

        <section class="hero-main">
            <div class="container">
                <div class="hero-content">
                    <div class="left-side"  data-aos="fade-right"
                    
                    data-aos-duration="1000">
                        <h1>Heading</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias pariatur sapiente sit neque necessitatibus quos voluptatem facilis, minima, consectetur temporibus explicabo est voluptatum non alias perferendis ipsam veritatis quis delectus.</p>
                        <a href="#">Go To Product &#8594;</a>
                    </div>
                    <div class="right-side" data-aos="fade-left"
                    data-aos-duration="1000">
                        <img width="500px" src="assets/hero-main.png" alt="Hero-banner">
                    </div>
                </div>
            </div>
        </section>
    </header>

    <!-- product-cat -->
    <section class="product-cat">
        <div class="container">
            
            <div class="heading">Feature Products</div>
            <div class="product-cat-card" data-aos="fade-up" >
            <?php 
            foreach ($result as $key => $value) {
if($value['is_featured'] == '1'){
     $image = getproductsimages($value['product_id'],$DB_CLASS);
$image_path =   $image[0]['image_path'];
              ?>


             
<div class="sc-product-item product-card">
                    <div class="product-card-upper">
                        <img src='<?php echo $PRODUCT_DIRECTORY.$image_path ; ?>' alt="Product-img" data-name="product_image" style="width:100%;height:100%;">
                    </div>
                    <div class="product-card-content">
                       <div class="product-content-heading"><h4 data-name="product_name"><?php echo $value['name'] ; ?></h4></div>
                       <div class="product-content-dis"><?php echo $value['description'] ; ?></div>
                        <div class="form-group2">
                            <input class="sc-cart-item-qty" name="product_quantity" min="1" value="1" type="number">
                        </div>
                       <div class="product-content-price"><span>$</span><?php echo $value['price'] ; ?></div>
                       
                    </div>

                    <div class="product-card-button">
                        <input name="product_price" value="<?= $value['price']?>" type="hidden" />
                        <input name="product_id" value="<?= $value['product_id'] ?>" type="hidden" />
                        <a href="#" class="sc-add-to-cart">Add to Cart<i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                    </div>
                </div>


<?php
}
               }
            ?>
            
               
               
            </div>
        </div>
    </section>

    <section class="product-cat">
        <div class="container">
            <div class="product-cat-card" data-aos="fade-up">


                 <?php 
            foreach ($result as $key => $value) {

                 $image = getproductsimages($value['product_id'],$DB_CLASS);
                $image_path =   $image[0]['image_path'];
                
                
              ?>
                <div class="sc-product-item product-card">
                    <div class="product-card-upper">
                        <img src='<?php echo $PRODUCT_DIRECTORY.$image_path ; ?>' alt="Product-img" data-name="product_image" style="width:100%;height:100%;">
                    </div>
                    <div class="product-card-content">
                       <div class="product-content-heading"><h4 data-name="product_name"><?php echo $value['name'] ; ?></h4></div>
                       <div class="product-content-dis"><?php echo $value['description'] ; ?></div>
                        <div class="form-group2">
                            <input class="sc-cart-item-qty" name="product_quantity" min="1" value="1" type="number">
                        </div>
                       <div class="product-content-price"><span>$</span><?php echo $value['price'] ; ?></div>
                       
                    </div>

                    <div class="product-card-button">
                        <input name="product_price" value="<?= $value['price']?>" type="hidden" />
                        <input name="product_id" value="<?= $value['product_id'] ?>" type="hidden" />
                        <a href="#" class="sc-add-to-cart">Add to Cart<i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
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
                    <img src="assets/hot product.png" alt="Hot product">
                </div>
                <div class="hot-right-side" data-aos="fade-up-left">
                    <div class="hot-product-heading">Product Name <span>Hot Deal</span></div>
                    <div class="hot-product-dis">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Non, ab sit! Nisi, blanditiis animi aperiam ratione fugiat esse ut odio similique, nihil id alias iste tenetur rerum beatae, sed libero.</div>
                    <div class="hot-product-btn">
                        <a href="#">Add to Cart<i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Ads -->

    <section class="ads">
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
    </section>

    <!-- About us -->

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
