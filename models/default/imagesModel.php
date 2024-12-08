<?php

class imagesModel extends Model {

    public function getImagesByProductId($masp) {
        // Kiểm tra kết nối PDO
        if ($this->conn === null) {
            throw new Exception('PDO connection is not established');
        }

        $sql = "SELECT * FROM images WHERE masp = :masp";
        $stmt = $this->conn->prepare($sql);  // Sử dụng kết nối kế thừa từ lớp Model
        $stmt->bindParam(':masp', $masp, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
