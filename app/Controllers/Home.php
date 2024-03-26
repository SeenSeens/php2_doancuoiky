<?php
class Home extends Controller {
    public array $data = [];
    public $categories;
    public $products;
    public $posts;
    public function __construct() {
        $this->categories = $this->model('CategoriesModel');
        $this->products = $this->model('ProductsModel');
        $this->posts = $this->model('PostsModel');
    }
    public function index () {
        $dataCategory = $this->categories->all();
        $dataProduct = $this->products->all();
        $dataPosts = $this->posts->getLatestPosts();
        $this->data['sub_content']['page_title'] = "Trang chủ";
        $this->data['sub_content']['category_menu'] = $dataCategory;
        $this->data['sub_content']['products'] = $dataProduct;
        $this->data['sub_content']['posts'] = $dataPosts;
        $this->data['content'] = 'frontend/pages/home'; // truyền dữ liệu qua bên view
        $this->render('frontend/layouts/app_layout', $this->data);
    }
}

?>
