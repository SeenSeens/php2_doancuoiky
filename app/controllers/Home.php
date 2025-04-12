<?php
class Home extends Controller {
    public array $data = [];
    public $categories;
    public $products;
    public $posts;
    public function __construct() {
        // $this->categories = $this->model('CategoriesModelBk');
        // $this->products = $this->model('ProductsModel');
        // $this->posts = $this->model('PostModel');
    }
    public function index () {
        $this->data['sub_content']['page_title'] = "Trang chủ";
        // $this->data['sub_content']['category_menu'] = $this->categories->all();
        // $this->data['sub_content']['products'] = $this->products->all();
        // $this->data['sub_content']['posts'] = $this->posts->getLatestPosts();
        // $this->data['sub_content']['latest_products'] = $this->products->latestProducts();
        $this->data['content'] = 'frontend/pages/home'; // truyền dữ liệu qua bên view
        $this->render('frontend/app_layout', $this->data);
    }
}

?>
