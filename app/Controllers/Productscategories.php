<?php
class Productscategories extends Controller {
    public array $data = [];
    public $categories;
    function __construct() {
        $this->categories = $this->model('CategoriesModel');
    }
    function index() {
        $this->data['sub_content']['page_title'] = "Danh mục sản phẩm";
        $this->data['content'] = 'frontend/pages/product_category';
        $this->render('frontend/app_layout', $this->data);
    }
}