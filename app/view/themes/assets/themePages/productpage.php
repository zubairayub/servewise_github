
<?php
REQUIRE '../../include/config.php';
?>
<style>
body{font-family: sans-serif;}
.product-items{display: flex;justify-content: center;align-items: center;flex-wrap: wrap;}
.product-items .product-card{margin: 10px 10px;box-shadow: 0px 3px 6px rgba(0,0,0,0.2);border-radius: 4px;padding: 4px;border: 1px solid rgba(0,0,0,0.2);}
.product-items .product-card .product-card-upper{height: 210px;width:100%; border-radius: 4px;border: none;overflow: hidden;}
.product-items .product-card .product-card-content{display: flex;justify-content: center;align-items: flex-start;flex-direction: column;}
.product-items .product-card .product-card-content .product-content-heading{width: 100%;font-size: 20px;}
.product-items .product-card .product-card-content .product-content-heading h4{margin: 15px 0px;}
.product-items .product-card .product-card-content .form-group2{display: flex;justify-content: center;align-items: center;width: 100%;}
.product-items .product-card .product-card-content .form-group2 .form-group-sub1{margin:0px 10px;}
.product-items .product-card .product-card-content .form-group2 .form-group-sub1 input{font-size: 18px;width: 110px;border-radius: 4px;border: 1px solid rgba(0,0,0,0.4);}
.product-items .product-card .product-card-content .product-content-price{padding-bottom: 5px;border-bottom: 1px solid rgba(0,0,0,0.2); width: 100%;text-align: center;margin: 10px 0px;font-size: 20px;}
.product-items .product-card .product-card-content .product-content-dis{width: 100%;margin: 10px 0px;font-size: 10px;padding: 5px 0px;border-top: 1px solid rgba(0,0,0,0.2);border-bottom: 1px solid rgba(0,0,0,0.2);}
.product-items .product-card .product-card-content .product-content-heading .product-content-dis{width: 100%;font-size: 10px;margin: 5px 0px;}
.product-items .product-card .product-card-button{width: 100%;display: flex;justify-content: center;align-items: center;}
.product-items .product-card .product-card-button .sc-add-to-cart{width: 100%;justify-content: center;align-items: center;text-align: center;text-decoration: none;color: rgba(0,0,0,0.7);transition: .3s ease;}
.product-items .product-card .product-card-button .sc-add-to-cart:hover{color:black;letter-spacing: 4px;}
.lg-title{text-align: center;}
.text-light{text-align: center;width: 40%;margin: 40px auto;color: rgba(0,0,0,0.7);}

</style>
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
                            <div class="form-group-sub1"><p>Quantity</p></div>
                            <div class="form-group-sub1"><input class="sc-cart-item-qty" name="product_quantity" min="1" value="1" type="number"></div>
                        </div>
                       <div class="product-content-price"><span style="color:green;">$</span><?php echo $value['price'] ; ?></div>
                       
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

       