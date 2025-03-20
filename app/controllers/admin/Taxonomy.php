<?php
class Taxonomy extends Controller{
    public array $data = [];
    public function __construct(){}

    // category
    public function category() {
        $this->data['sub_content']['page_title'] = "Danh mục";
        $this->data['content'] = 'backend/category/index';
        $this->render('backend/admin_layout', $this->data);
    }
    public function createCategory() {}
    public function update() {}
    public function delete() {}

    // post_tag
    public function postTag() {
        $this->data['sub_content']['page_title'] = "Thẻ";
        $this->data['sub_content']['button_title'] = "Thêm thẻ mới";
        $this->data['content'] = 'backend/post_tag/index';
        $this->render('backend/admin_layout', $this->data);
    }
    // product_brand
    public function productBrand(){
        $this->data['sub_content']['page_title'] = "Thương hiệu";
        $this->data['sub_content']['button_title'] = "Thêm thương hiệu mới";
        $this->data['content'] = 'backend/post_tag/index';
        $this->render('backend/admin_layout', $this->data);
    }
    // product_cat
    public function productCat(){
        $this->data['sub_content']['page_title'] = "Danh mục sản phẩm";
        $this->data['sub_content']['button_title'] = "Thêm danh mục mới";
        $this->data['content'] = 'backend/post_tag/index';
        $this->render('backend/admin_layout', $this->data);
    }
    // product_tag
    public function productTag(){
        $this->data['sub_content']['page_title'] = "Thẻ sản phẩm";
        $this->data['sub_content']['button_title'] = "Thêm thẻ mới";
        $this->data['content'] = 'backend/post_tag/index';
        $this->render('backend/admin_layout', $this->data);
    }


    public function  productAttributes(){
        $this->data['sub_content']['page_title'] = "Các thuộc tính";
        $this->render('backend/admin_layout', $this->data);
    }
    public function productReviews(){
        $this->data['sub_content']['page_title'] = "Đánh giá";
        $this->render('backend/admin_layout', $this->data);
    }
}