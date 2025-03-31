<?php

class Products extends Controller {
    public array $data = [];
    public mixed $categories;
    public mixed $products;
    public function __construct() {
        $this->products = $this->model('ProductsModel');
        $this->categories = $this->model('CategoriesModelBk');
    }

    /**
     * Trang cửa hàng
     */
    public function store() {
        $this->data['sub_content']['title'] = 'Cửa hàng';
        $this->data['sub_content']['category'] = $this->categories->all();
        $this->data['sub_content']['products'] = $this->products->all();
        $this->data['sub_content']['latest-products'] = self::getLatestProducts();
        $this->data['content'] = 'frontend/pages/shop'; // truyền dữ liệu qua bên view
        $this->render('frontend/app_layout', $this->data);
    }

    /**
     * Hiển thị chi tiết sản phẩm theo id
     * @param $id
     * @return void
     */
    public function getProductDetailById($id){
        $productDetail = $this->products->find($id);
        $productCatId = $productDetail['category_id']; // Lấy id chuyên mục
        $this->data['sub_content']['title'] = $productDetail['title'];
        $this->data['sub_content']['product-content'] = $productDetail;
        $this->data['sub_content']['related-product'] = self::getRelatedProduct($productCatId, $id);
        $this->data['sub_content']['cat_title'] = self::getProductCategoryName($productCatId);
        $this->data['content'] = 'frontend/pages/product_detail';
        $this->render('frontend/app_layout', $this->data);
    }

    /**
     * Lấy sản phẩm mới nhất
     * @return mixed
     */
    public function getLatestProducts() {
        return $this->products->latestProducts();
    }

    /**
     * Lấy sản phẩm liên quan
     * @param $productCatId
     * @param $productId
     * @return mixed
     */
    public function getRelatedProduct($productCatId, $productId){
        return $this->products->relatedProduct($productCatId, $productId);
    }

    /**
     * Giải thích hàm này dùng lấy ra tên chuyên mục của sản phẩm
     */
    public function getProductCategoryName($productCatId){
        return $this->categories->categoryName($productCatId);
    }

    // Hiển thị sản phẩm theo chuyên mục
    function ProductCategory($id){
        $this->data['sub_content']['page_title'] = "Danh mục sản phẩm";
        $this->data['sub_content']['category'] = $this->categories->all();
        $this->data['sub_content']['products'] = $this->products->getProductCategory($id);
        $this->data['sub_content']['latest-products'] = self::getLatestProducts();
        $this->data['content'] = 'frontend/pages/product_category';
        $this->render('frontend/app_layout', $this->data);
    }
}