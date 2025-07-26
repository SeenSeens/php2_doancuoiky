<?php
require_once __DIR_ROOT__ . '/app/services/TermService.php';
require_once __DIR_ROOT__ . '/app/services/ProductService.php';
require_once __DIR_ROOT__ . '/app/services/CustomerService.php';
require_once __DIR_ROOT__ . '/app/services/OrderService.php';
class ShopController extends Controller {
    public array $data = [];
    private TermService $termService;
    private ProductService $productService;
    private CustomerService $customerService;
    private OrderService $orderService;
    public function __construct(){
        $this->termService = new TermService();
        $this->productService = new ProductService();
        $this->customerService = new CustomerService();
        $this->orderService = new OrderService();
    }

    public function index(){
        $this->data['sub_content']['page_title'] = "Cửa hàng";
        // $this->categories();
        $this->data['sub_content']['product_categories'] = $this->termService->getTerms('product_cat');
        $this->data['sub_content']['products'] = $this->productService->getAll();
        $this->data['content'] = 'frontend/woocommerce/archive'; // truyền dữ liệu qua bên view
        $this->render('frontend/templates/app_layout', $this->data);
    }
    // Trang giỏ hàng
    public function cart() {
        $this->data['sub_content']['page_title'] = "Giỏ hàng";
        $this->data['content'] = 'frontend/woocommerce/cart/cart';
        $this->render('frontend/templates/app_layout', $this->data);
    }
    // Trang thanh toán
    public function checkout() {
        $this->data['sub_content']['page_title'] = "Thanh toán";
        $this->data['sub_content']['product_categories'] = $this->termService->getTerms('product_cat');
        $this->data['content'] = 'frontend/woocommerce/cart/checkout';
        $this->render('frontend/templates/app_layout', $this->data);
    }
    // Đặt hàng
    public function order() {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $cartData = json_decode($_POST['cart'], true);

                $customerResult = $this->customerService->saveCustomer(null);

                if (!$customerResult['success']) {
                    FlashMessage::set('danger', $customerResult['message']);
                    header("Location: " . __WEB_ROOT__ . "/thanh-toan");
                    exit();
                }

                $customer_id = $customerResult['customer_id'];
                $orderResult = $this->orderService->createOrder($cartData, $customer_id);

                if ($orderResult['success']) {
                    FlashMessage::set('success', $orderResult['message']);
                    header("Location: " . __WEB_ROOT__ . "/cua-hang");
                } else {
                    FlashMessage::set('danger', $orderResult['message']);
                    header("Location: " . __WEB_ROOT__ . "/thanh-toan");
                }

                exit();
            }
        }
        catch (Exception $e) {
            FlashMessage::set('danger', 'Đã xảy ra lỗi khi đặt hàng: ' . $e->getMessage());
            header("Location: " . __WEB_ROOT__ . "/thanh-toan");
            exit;
        }
    }
    private function categories (){
        return $this->data['sub_content']['product_categories'] = $this->termService->getTerms('product_cat');
    }
}

?>
