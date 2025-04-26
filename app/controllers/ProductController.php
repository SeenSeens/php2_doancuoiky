<?php
class ProductController extends Controller
{
    public array $data = [];

    public function __construct()
    {

    }

    public function index(){
        $this->data['sub_content']['page_title'] = "Danh mục sản phẩm";
        $this->data['content'] = 'frontend/woocommerce/archive'; // truyền dữ liệu qua bên view
        $this->render('frontend/templates/app_layout', $this->data);
    }

    public function detail () {
        $this->data['sub_content']['page_title'] = "Chi tiết sản phẩm";
        $this->data['content'] = 'frontend/woocommerce/single'; // truyền dữ liệu qua bên view
        $this->render('frontend/templates/app_layout', $this->data);
    }
}

?>
