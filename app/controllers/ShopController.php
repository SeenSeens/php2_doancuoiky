<?php
require_once __DIR_ROOT__ . '/app/services/TermService.php';
require_once __DIR_ROOT__ . '/app/services/ProductService.php';
class ShopController extends Controller {
    public array $data = [];
    private TermService $termService;
    private ProductService $productService;

    public function __construct(){
        $this->termService = new TermService();
        $this->productService = new ProductService();
    }

    public function index(){
        $this->data['sub_content']['page_title'] = "Cửa hàng";
        $this->categories();
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

    private function categories (){
        return $this->data['sub_content']['categories'] = $this->termService->getTerms('product_cat');
    }
}

?>
