<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="container-fluid form" style="margin-top: -23px; padding: 20px">
    <div class="row">
        <div class="col-sm-12">
            <div class="main-prd">
                <div class="prd-images">
                    <!-- Ảnh chính -->
                    <img src="<?php echo $data['anhchinh']; ?>" class="main-prd-img" id="mainImage">
                    
                    <!-- Các ảnh phụ -->
                  
                    <div class="thumbs">
                        <?php 
                        // Kiểm tra nếu có ảnh phụ
                        if (!empty($data['additionalImages'])) {
                            foreach ($data['additionalImages'] as $image) {
								
                                echo '<img src="' . $image['anhphu'] . '" class="thumb-img" onclick="changeImage(\'' . $image['anhphu'] . '\')">';
                            }
                        }
                        ?>
                    </div>


                   
                </div>
                
                <!-- Thông tin cơ bản -->
                <div class="basic-info">
                    <h2><?php echo $data['tensp']; ?></h2>
                    <span class="main-prd-price"><?php echo $data['gia']; ?> VND</span>
                    <h4><b>Thông tin cơ bản</b></h4>
                    <ul>
                        <li>Màu sắc: <?php echo $data['mau']; ?></li>
                        <li>Bảo hành: <?php echo $data['baohanh']; ?> tháng</li>
                        <li><span class="km">Khuyến mãi: <?php echo $data['khuyenmai']; ?> %</span></li>
                        <br><a class="btn btn-primary" href="client/buynow/<?php echo $data['masp']; ?>">Mua ngay</a>
                    </ul>
                </div>	
            </div>

            <div style="clear: both;"></div>

            <div class="introduce-prd">
                <h3>Thông số kỹ thuật</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Đặc điểm</th><th>Giá trị</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>Bảo hành</td><td><?php echo $data['baohanh']; ?> tháng</td></tr>
                        <tr><td>Trọng lượng(g)</td><td><?php echo $data['trongluong']; ?></td></tr>
                        <tr><td>Chất liệu</td><td><?php echo $data['chatlieu']; ?></td></tr>
                        <tr><td>Loại hình bảo hành</td><td><?php echo $data['loaibh']; ?></td></tr>
                        <tr><td>Kích thước (d x r) (cm)</td><td><?php echo $data['kichthuoc']; ?></td></tr>
                        <tr><td>Màu</td><td><?php echo $data['mau']; ?></td></tr>
                        <tr><td>Phụ kiện đi kèm</td><td><?php echo $data['phukien']; ?></td></tr>
                        <tr><td>Khuyễn mãi/ Quà tặng</td><td><?php echo $data['khuyenmai']; ?> %</td></tr>
                        <tr><td>Tình trạng</td><td><?php echo $data['tinhtrang']; ?></td></tr>
                        <tr><td>Chi tiết sản phẩm</td><td><?php echo $data['thongtinchitiet']; ?></td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // Hàm thay đổi ảnh chính khi người dùng nhấp vào ảnh phụ
	function changeImage(imageSrc) {
    console.log('Changing image to: ' + imageSrc);  // In ra để kiểm tra
    document.getElementById('mainImage').src = imageSrc;  // Thay đổi nguồn ảnh chính
}

</script>  