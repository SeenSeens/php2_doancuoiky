<?php
class ShopController extends Controller
{
    public array $data = [];

    public function __construct()
    {

    }

    public function index(){
        $this->data['sub_content']['page_title'] = "Cửa hàng";
        $this->data['content'] = 'frontend/woocommerce/archive'; // truyền dữ liệu qua bên view
        $this->render('frontend/templates/app_layout', $this->data);
    }
    // Trang giỏ hàng
    public function cart() {
        $this->data['sub_content']['page_title'] = "Giỏ hàng";
        $this->data['content'] = 'frontend//woocommerce/cart/cart';
        $this->render('frontend/templates/app_layout', $this->data);
    }
}

?>
