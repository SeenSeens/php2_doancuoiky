<?php
class Taxonomy extends Controller{
    public array $data = [];
    public function __construct(){}
    public function index() {
        $this->data['sub_content']['page_title'] = "Danh mục";
        $this->data['content'] = 'backend/category/index';
        $this->render('backend/admin_layout', $this->data);
    }
    public function create() {}
    public function update() {}
    public function delete() {}
}