<?php
class Home extends Controller {
    public array $data = [];
    public $categories;
    public $products;
    public function __construct() {
        $this->categories = $this->model('CategoriesModel');
    }
    public function index () {
        $dataCategory = $this->categories->all();
        $this->data['sub_content']['page_title'] = "Trang chủ";
        $this->data['sub_content']['category_menu'] = $dataCategory;
        $this->data['content'] = 'frontend/home/main'; // truyền dữ liệu qua bên view
        $this->render('frontend/layouts/app_layout', $this->data);
    }
}

?>
