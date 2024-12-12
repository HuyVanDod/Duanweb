<?php 
/**
* Class Bootstrap: Phần tử điều hướng chính trong ứng dụng MVC
* Mục đích của lớp này là nhận yêu cầu URL, phân tích cú pháp URL và gọi controller/method tương ứng.
*/
class Bootstrap
{
    // Hàm __construct được gọi khi khởi tạo lớp này
	function __construct()
	{
		// Lấy URL từ query string và chuẩn hóa URL (xóa ký tự '/' ở cuối và lọc dữ liệu không hợp lệ)
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url,'/'); // Loại bỏ ký tự '/' cuối cùng nếu có
		$url = filter_var($url, FILTER_SANITIZE_URL); // Lọc các ký tự không hợp lệ trong URL
		$url = explode('/',$url); // Tách URL thành một mảng theo dấu '/' (mảng này sẽ chứa các phần của URL)

		// Nếu URL không có controller (ví dụ: http://localhost), chuyển hướng đến trang mặc định (IndexController)
		if(empty($url[0])){
			require_once 'controllers/default/IndexController.php'; // Nạp controller mặc định
			$object_controller = new IndexController(); // Khởi tạo controller mặc định
			$object_controller->index(); // Gọi phương thức index() của controller mặc định
			return false; // Dừng thực thi tiếp
		} else {
			// Nếu URL có controller, sẽ tạo tên controller dựa trên URL (ví dụ: product -> ProductController)
			$controller = ucfirst($url[0])."Controller"; // Viết hoa chữ cái đầu để tạo tên controller đúng chuẩn

			// Kiểm tra đường dẫn của controller và xác định xem controller đó có tồn tại không
			$ctrlerPath = "";
			if(file_exists("controllers/default/".$controller.".php")){ // Kiểm tra trong thư mục controllers/default
				$ctrlerPath = "controllers/default/".$controller.".php";
			} elseif(file_exists("controllers/users/".$controller.".php")){ // Kiểm tra trong thư mục controllers/users
				$ctrlerPath = "controllers/users/".$controller.".php";
			} elseif(file_exists("controllers/admin/".$controller.".php")){ // Kiểm tra trong thư mục controllers/admin
				$ctrlerPath = "controllers/admin/".$controller.".php";
			} else {
				$ctrlerPath = ""; // Nếu không tìm thấy controller thì trả về chuỗi rỗng
			}

			// Nếu tìm thấy controller, nạp nó và gọi phương thức tương ứng
			if($ctrlerPath != ""){
				require_once $ctrlerPath; // Nạp controller
				$object_controller = new $controller; // Khởi tạo controller tương ứng
				// Nếu không có phương thức nào trong URL, gọi phương thức index() mặc định của controller
				if(empty($url[1])){
					$object_controller->index();
				} else {
					// Kiểm tra xem phương thức trong URL có tồn tại trong controller không
					if(method_exists($controller, $url[1])){
						// Dùng Reflection để lấy thông tin về phương thức
						$classMethod = new ReflectionMethod($controller,$url[1]);
						$argumentCount = count($classMethod->getParameters()); // Số lượng tham số của phương thức
						$argsArr = array(); // Mảng để chứa các tham số

						// Lặp qua các tham số trong URL và thêm vào mảng argsArr
						for($i=2;$i<=$argumentCount+1;$i++){
							if(isset($url[$i])){
								$argsArr[] = $url[$i];
							}
						}	
						// Tạo một chuỗi từ các tham số
						$args = implode(",",$argsArr);
						$args = rtrim($args); // Xóa ký tự thừa ở cuối chuỗi tham số

						// Kiểm tra xem có thừa tham số không
						if(isset($url[$argumentCount+2])){
							echo "du tham so"; // Nếu có tham số thừa, thông báo lỗi
							return 0;
						}
						
						// Gọi phương thức với các tham số đã chuẩn bị
						call_user_func_array([$object_controller, $url[1]],$argsArr);
					} else {
						// Nếu không tìm thấy phương thức, hiển thị lỗi 404
						echo "ERR 404: Request not found!";
						return false;
					}
				}
			} else {
				// Nếu không tìm thấy controller, hiển thị lỗi 404
				echo "ERR 404: Request not found!";
				return false;
			}
		}
	}
}

?>
