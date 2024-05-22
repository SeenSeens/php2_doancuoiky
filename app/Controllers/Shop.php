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
        // Lấy giỏ hàng từ local storage nếu có
        $cart = isset($_POST['cart']) ? json_decode($_POST['cart'], true) : [];
        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng hay chưa
        $existingItem = array_search($data['id'], array_column($cart, 'id'));

        if ($existingItem !== false) {
            // Nếu sản phẩm đã tồn tại, tăng số lượng
            $cart[$existingItem]['quantity']++;
        } else {
            // Nếu sản phẩm chưa tồn tại, thêm vào giỏ hàng
            $item = [
                'id' => $data['id'],
                'title' => $data['title'],
                'price' => $data['price'],
                'quantity' => 1
            ];
            array_push($cart, $item);
        }

        // Trả về giỏ hàng sau khi thêm sản phẩm
        echo json_encode($cart);

    }
    public function shopingCart() {

    }
    public function checkout() {

    }

}