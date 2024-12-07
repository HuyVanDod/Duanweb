<div class='product-container' onclick="Display_PrdDetail('<?php echo $data[$i]['masp'] ?>')">
	<a  href='product/PrdDetail/<?php echo $data[$i]['masp'] ?>'>
		<div style="text-align: center;" class='product-img'>
			<img src='<?php echo $data[$i]['anhchinh'] ?>'>
		</div>
		<div class='product-info'>
			<h4 style="font-size: 10px; color:aliceblue"><?php echo $data[$i]['tensp']; ?></h4>
			<b class='price'>Giá: <?php echo $data[$i]['gia']; ?> VND</b>
			<div class='buy'>
				<a class='btn btn-primary btn-md cart-container <?php
				if(isset($_SESSION['cart'])){
					if(array_search($data[$i]['masp'], $_SESSION['cart']) !== false){
						echo 'cart-ordered';
					}
				} ?>' data-masp='<?php echo $data[$i]['masp'] ?>' >
				<i title='Thêm vào giỏ hàng' class='glyphicon glyphicon-shopping-cart cart-item'></i>
			</a>
			<a href="client/buynow/<?php echo $data[$i]['masp'] ?>" class="snip0050"><span>Mua ngay</span><i class="glyphicon glyphicon-ok"></i>
			</a>
		</div>
	</div>
</a>
</div>