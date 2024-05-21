<?php
class Shop extends Controller {
    public array $data = [];
    public $categories;
    public $products;
    public function __construct() {
        $this->categories = $this->model('CategoriesModel');
        $this->products = $this->model('ProductsModel');
    }

    public function addToCart() {

        // Lấy dữ liệu từ yêu cầu POST
        $data = json_decode(file_get_contents('php://input'), true);

        // Kiểm tra xem giỏ hàng đã được khởi tạo trong phiên hay chưa
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng hay chưa
        $existingItem = array_search($data['id'], array_column($_SESSION['cart'], 'id'));

        if ($existingItem !== false) {
            // Nếu sản phẩm đã tồn tại, tăng số lượng
            $_SESSION['cart'][$existingItem]['quantity']++;
        } else {
            // Nếu sản phẩm chưa tồn tại, thêm vào giỏ hàng
            $item = [
                'id' => $data['id'],
                'name' => $data['name'],
                'price' => $data['price'],
                'quantity' => 1
            ];
            array_push($_SESSION['cart'], $item);
        }

        // Trả về giỏ hàng sau khi thêm sản phẩm
        echo json_encode($_SESSION['cart']);

    }
    public function shopingCart() {

    }
    public function checkout() {

    }

}