<?php
include 'include/header.php';
?>
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
                    </div>
                </nav>
              <?php   include '../assets/cart/minicart.php'; ?>
            </div>
             <aside class="col-md-4">
                
                <!-- Cart submit form -->
                <form action="viewcart.php" method="POST"> 
                    <!-- SmartCart element -->
                    <div id="smartcart"></div>
                </form>
                
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


            <div class="product-card">
                    <div class="product-card-upper">
                        <img src="<?php echo $PRODUCT_DIRECTORY.$image_path ; ?>" alt="Product-img">
                    </div>
                    <div class="product-card-content">
                       <div class="product-content-heading"><?php echo $value['name'] ; ?></div>
                       <div class="product-content-dis"><?php echo $value['description'] ; ?></div>
                       <div class="product-content-price"><span>$</span><?php echo $value['price'] ; ?></div>
                       
                    </div>
                    <div class="form-group2">
                    <input class="sc-cart-item-qty" name="product_quantity" min="1" value="1" type="number">
                    </div>
                    <div class="product-card-button ">
                       <a href="#" class='sc-add-to-cart'>Add to Cart<i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                    </div>
                </div>
                  <input name="product_price" value="<?php echo $value['price'] ; ?>" type="hidden" />
                  <input name="product_id" value="<?php echo $value['product_id'] ; ?>" type="hidden" />


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
                <div class="product-card">
                    <div class="product-card-upper">
                        <img src='<?php echo $PRODUCT_DIRECTORY.$image_path ; ?>' alt="Product-img">
                    </div>
                    <div class="product-card-content">
                       <div class="product-content-heading"><?php echo $value['name'] ; ?></div>
                       <div class="product-content-dis"><?php echo $value['description'] ; ?></div>
                       <div class="product-content-price"><span>$</span><?php echo $value['price'] ; ?></div>
                       
                    </div>
                    <div class="product-card-button">
                       <button class="sc-add-to-cart"><a href="#">Add to Cart<i class="fa fa-shopping-cart" aria-hidden="true"></i></a></button>
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
