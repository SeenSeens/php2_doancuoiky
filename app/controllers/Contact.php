<?php
class Contact extends Controller {
    public array $data = [];
    public $categories;
    public function __construct(){
        $this->categories = $this->model('CategoriesModel');
    }

    public function index(){
        $this->data['sub_content']['title'] = 'Liên hệ';
        // $this->data['sub_content']['category_menu'] = $this->categories->all();
        // $this->data['content'] = 'frontend/pages/contact';
        $this->render('frontend/app_layout', $this->data);
    }
}


