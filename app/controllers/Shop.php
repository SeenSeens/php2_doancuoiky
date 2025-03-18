<?php
class Shop extends Controller {
    public array $data = [];
    public $categories;
    public $products;
    public $orders;
    public $order_details;
    public function __construct() {
        $this->categories = $this->model('CategoriesModel');
        $this->products = $this->model('ProductsModel');
        $this->orders = $this->model('OrdersModel');
        $this->order_details = $this->model('OrderDetailsModel');
    }

    public function addToCart() {

//        // Lấy dữ liệu từ yêu cầu POST
//        $data = json_decode(file_get_contents('php://input'), true);
//        // Lấy giỏ hàng từ local storage nếu có
//        $cart = isset($_POST['cart']) ? json_decode($_POST['cart'], true) : [];
//        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng hay chưa
//        $existingItem = array_search($data['id'], array_column($cart, 'id'));
//
//        if ($existingItem !== false) {
//            // Nếu sản phẩm đã tồn tại, tăng số lượng
//            $cart[$existingItem]['quantity']++;
//        } else {
//            // Nếu sản phẩm chưa tồn tại, thêm vào giỏ hàng
//            $item = [
//                'id' => $data['id'],
//                'title' => $data['title'],
//                'price' => $data['price'],
//                'quantity' => 1
//            ];
//            array_push($cart, $item);
//        }
//
//        // Trả về giỏ hàng sau khi thêm sản phẩm
//        echo json_encode($cart);

    }
    // Trang giỏ hàng
    public function shopingCart() {
        $this->data['sub_content']['page_title'] = "Giỏ hàng";
        $this->data['content'] = 'frontend/pages/shoping_cart';
        $this->render('frontend/app_layout', $this->data);
    }
    // Trang checkout
    public function checkout() {
        $this->data['sub_content']['page_title'] = "Thanh toán";
        $this->data['content'] = 'frontend/pages/checkout';
        $this->render('frontend/app_layout', $this->data);
        try {
            $form_data = json_decode(file_get_contents('php://input'),true);
            $data = [
                'buyername' => $form_data['buyername'],
                'address' => $form_data['address'],
                'phone' => $form_data['phone'],
                'email' => $form_data['email'],
//                'products' => $form_data['products'],
                'subtotal' => $form_data['subtotal'],
                'total' => $form_data['total'],
                'notes' => $form_data['notes'],
            ];
            $order_id = $this->orders->insertOrder($data);
            // Chèn sản phẩm vào bảng order_products
            foreach ($form_data['products'] as $product) {
                $product_data = [
                    'order_id' => $order_id,
                    'product_id' => $product['id'],
                    'quantity' => $product['quantity'],
                    'price' => $product['price']
                ];
                $this->order_details->insertOrderProduct($product_data);
            }
            $message = 'Đơn hàng đã được đặt thành công!';
            echo json_encode(['message' => $message]);
        } catch (PDOException $e){
            echo json_encode(['error' => 'Đã xảy ra lỗi khi đặt hàng: ' . $e->getMessage()]);
        }
    }
    // Phần đặt hàng
}