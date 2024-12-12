<div class="row">
    <?php foreach ($data['list_products'] as $product) { ?>
        <div class="col-md-4">
            <div class="product-container">
                <a href="product/PrdDetail/<?php echo $product['masp']; ?>">
                    <div style="text-align: center;" class="product-img">
                        <img src="<?php echo $product['anhchinh']; ?>" alt="Product Image">
                    </div>
                    <div class="product-info">
                        <h4 style="font-size: 14px; color:aliceblue"><b><?php echo $product['tensp']; ?></b></h4>
                        <?php 
                        // Ensure 'gia' is a valid number by removing non-numeric characters and converting to float
                        $price = str_replace('.', '', $product['gia']);
                        $price = floatval($price);
                        ?>
                        <b class="price">Giá: <?php echo number_format($price); ?> VND</b>
                        <div class="buy">
                            <a class="btn btn-primary btn-md cart-container
                                <?php
                                if (isset($_SESSION['cart'])) {
                                    if (array_search($product['masp'], $_SESSION['cart']) !== false) {
                                        echo 'cart-ordered';
                                    }
                                }
                                ?>" data-masp="<?php echo $product['masp']; ?>">
                                <i title="Thêm vào giỏ hàng" class="glyphicon glyphicon-shopping-cart cart-item"></i>
                            </a>
                            <a href="client/buynow/<?php echo $product['masp']; ?>" class="snip0050">
                                <span>Mua ngay</span><i class="glyphicon glyphicon-ok"></i>
                            </a>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    <?php } ?>
</div>
