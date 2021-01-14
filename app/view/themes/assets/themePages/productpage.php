<?php
REQUIRE '../../include/config.php';
?>
        <div class = "products">
            <div class = "container">
                <h1 class = "lg-title">Product</h1>
                <p class = "text-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur quos sit consectetur, ipsa voluptatem vitae necessitatibus dicta veniam, optio, possimus assumenda laudantium. Temporibus, quis cum.</p>
 
                <div class = "product-items">
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
                    <!-- end of single product -->
                    <!-- single product -->
                    
                    <!-- end of single product -->
                </div>
            </div>
        </div>

       